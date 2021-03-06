<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Post;
use App\Facebook\Token;
use App\FacebookTrait\Helper;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;

class FetchPosts implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels, Helper;

    private $fb_id = null;
    private $token = null;
    private $options = [];
    private $type = '';

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($fb_id, array $options = [])
    {
        $this->fb_id = $fb_id;
        $this->type = $options['type'];
        $this->token = Token::getValidToken();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(LaravelFacebookSdk $fb)
    {
        $comment_fields = [
            'id',
            'from',
            'type',
            'link',
            'picture',
            'message',
            'comment_count',
            'can_comment',
            'created_time',
            'likes',
            'permalink_url',
            'is_hidden',
        ];
        $comment_fields = $this->formatFields($comment_fields);
        $fb->setDefaultAccessToken($this->token->token);
        try {
            $response = $fb->get("{$this->fb_id}/feed?fields={$comment_fields}");
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            $this->token->delete();
            dd($e->getMessage());
        }
        $data = $response->getGraphEdge();
        do {
            $ids = [];
            foreach ($data as $node) {
                $id = $node->getProperty('id');

                // 舊文章由 cron 負責處理
                if (('FETCH_NEW_POST' === $this->type) and ($post = Post::find($id))) {
                    continue;
                }
                try {
                    $post = Post::createOrUpdateGraphNode($node);
                } catch (\Illuminate\Database\QueryException $e) {
                    dd($e->getMessage(), $node->asArray());
                }
                $ids[] = $id;
                dispatch((new FetchComments($id))->onQueue('processing')->onConnection('database'));
                if (count($ids) == 50) {
                    dispatch((new FetchLikes(implode(',', $ids)))->onQueue('processing')->onConnection('database'));
                    $ids = [];
                }
            }
            if ($ids) {
                dispatch((new FetchLikes(implode(',', $ids)))->onQueue('processing')->onConnection('database'));
            }
        } while ($data = $fb->next($data));
    }
}
