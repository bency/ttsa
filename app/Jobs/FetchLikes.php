<?php

namespace App\Jobs;

use App\Post;
use App\FacebookTrait\Helper;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;

class FetchLikes implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels, Helper;

    private $post_id = null;
    private $token = null;
    private $options = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($post_id, $token, array $options = [])
    {
        $this->post_id = $post_id;
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
            'likes',
        ];
        $comment_fields = $this->formatFields($comment_fields);
        $fb->setDefaultAccessToken($this->token);
        try {
            $response = $fb->get("{$this->post_id}?fields={$comment_fields}");
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }
        $data = $response->getGraphNode();
        $post = Post::find($this->post_id);
        $post->update(['like_count' => 0]);
        $likes = $data->getProperty('likes');
        do {
            if (!$likes) {
                break;
            }
            $post->like_count += $likes->count();
        } while ($likes = $fb->next($likes));
        $post->save();
    }
}
