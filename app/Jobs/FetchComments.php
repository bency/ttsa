<?php

namespace App\Jobs;

use App\Comment;
use App\User;
use App\Facebook\Token;
use App\FacebookTrait\Helper;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;

class FetchComments implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels, Helper;

    private $comment_id = null;
    private $token = null;
    private $options = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($comment_id, array $options = [])
    {
        $this->token = Token::getValidToken();
        $this->comment_id = $comment_id;
        $this->options = $options;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(\SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
    {
        $token = $this->token->token;
        $fb->setDefaultAccessToken($token);
        $fields = [
            'id',
            'from',
            'message',
            'comment_count',
            'can_comment',
            'created_time',
            'like_count',
            'likes',
            'permalink_url',
            'parent',
            'is_hidden',
            'comments' => [
                'id',
                'from',
                'message',
                'comment_count',
                'can_comment',
                'created_time',
                'like_count',
                'likes',
                'permalink_url',
                'parent',
                'is_hidden',
            ],
        ];
        $fields = $this->formatFields($fields);
        $uri = sprintf('/%s/comments?fields=%s', $this->comment_id, $fields);
        try {
            $response = $fb->get($uri);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            $this->token->delete();
            dd($e->getMessage());
        }

        $data = $response->getGraphEdge();
        do {
            foreach ($data as $node) {

                $commenter = $node->getProperty('from');
                User::updateOrCreate(['facebook_user_id' => $commenter['id']], ['facebook_user_id' => $commenter['id'], 'name' => $commenter['name']]);
                $comment = Comment::createOrUpdateGraphNode($node);
                if (!$comment->parent) {
                    $comment->parent = $this->comment_id;
                    $comment->save();
                }

                if (0 === $node['comment_count'] or !isset($node['comments'])) {
                    continue;
                }

                $comments_data = $node['comments'];
                do {
                    foreach ($comments_data as $node) {
                        $commenter = $node->getProperty('from');
                        User::updateOrCreate(['facebook_user_id' => $commenter['id']], ['facebook_user_id' => $commenter['id'], 'name' => $commenter['name']]);
                        $comment = Comment::createOrUpdateGraphNode($node);
                        if (!$comment->parent) {
                            dd($comment);
                        }
                    }
                } while ($comments_data = $fb->next($comments_data));
            }
        } while($data = $fb->next($data));
    }
}
