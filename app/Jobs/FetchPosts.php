<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Post;
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

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($fb_id, $token, array $options = [])
    {
        $this->fb_id = $fb_id;
        $this->token = $token;
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
        $fb->setDefaultAccessToken($this->token);
        try {
            $response = $fb->get("{$this->fb_id}/feed?fields={$comment_fields}");
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }
        $data = $response->getGraphEdge();
        do {
            foreach ($data as $node) {
                try {
                    $post = Post::createOrUpdateGraphNode($node);
                } catch (\Illuminate\Database\QueryException $e) {
                    dd($e->getMessage(), $node->asArray());
                }
                $id = $node->getProperty('id');
                $ids[] = $id;
                dispatch((new FetchComments($id, $this->token))->onQueue('processing')->onConnection('database'));
            }
            dispatch((new FetchLikes(implode(',', $ids), $this->token))->delay(Carbon::now()->addHours(1))->onQueue('processing')->onConnection('database'));
        } while ($data = $fb->next($data));
    }
}
