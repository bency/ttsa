<?php

namespace App\Jobs;

use App\Comment;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;

class FetchComments implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $comment_id = null;
    private $token = null;
    private $options = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($comment_id, $token, array $options = [])
    {
        $this->token = $token;
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
        $token = $this->token;
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
        ];
        $fields = implode(',', $fields);
        $uri = sprintf('/%s/comments?fields=is_hidden,parent,created_time,comment_count,from,message,permalink_url,like_count,comments{%s}', $this->comment_id, $fields);
        try {
            $response = $fb->get($uri);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }

        $data = $response->getGraphEdge();
        do {
            foreach ($data->all() as $node) {

                $commenter = $node->asArray()['from'];
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
                        $commenter = $node->asArray()['from'];
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
