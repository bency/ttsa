<?php

namespace App\Jobs;

use App\Post;
use App\Facebook\Token;
use App\FacebookTrait\Helper;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;

class FetchLikes implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels, Helper;

    private $post_ids = null;
    private $token = null;
    private $options = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($post_ids, array $options = [])
    {
        $this->post_ids = $post_ids;
        $this->token = Token::getValidToken();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(LaravelFacebookSdk $fb)
    {
        if ('' == $this->post_ids) {
            return;
        }
        $fb->setDefaultAccessToken($this->token->token);
        try {
            $response = $fb->get("/likes?ids={$this->post_ids}");
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            $this->token->delete();
            dd($e->getMessage());
        }
        $data = $response->getGraphNode();
        foreach ($data as $post_id => $likes) {
            $post = Post::find($post_id);
            $post->update(['like_count' => 0]);
            do {
                if (!$likes) {
                    break;
                }
                $post->like_count += $likes->count();
            } while ($likes = $fb->next($likes));
            $post->save();
        }
    }
}
