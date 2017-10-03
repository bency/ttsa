<?php

namespace App\Http\Middleware;

use Closure;
use Facebook;
use View;
use Auth;
use Session;

class FacebookAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $fb = app(\SammyK\LaravelFacebookSdk\LaravelFacebookSdk::class);
        if (Auth::check() and $token = Session::get('fb_user_access_token')) {
            $fb->setDefaultAccessToken($token);
            $account_list = $fb->get('/me/accounts')->getGraphEdge();
            View::share(['account_list' => $account_list]);
        }
        return $next($request);
    }
}
