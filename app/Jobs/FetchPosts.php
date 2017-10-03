<?php

namespace App\Jobs;

use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;

class FetchPosts implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

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
        $fb->setDefaultAccessToken($this->token);
        try {
            $response = $fb->get("{$this->fb_id}/feed?fields=from,message,id,created_time,permalink_url,comments{id},likes{id,link,name},picture,admin_creator,type,link,shares");
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
                $id = $node->all()['id'];
                dispatch((new FetchComments($id, $this->token))->onQueue('processing')->onConnection('database'));
            }
        } while ($data = $fb->next($data));
    }
}
