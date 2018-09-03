<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use App\User;
use App\Providers\FacebookProvider;

class CheckFacebookToken
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
		$validator = \Validator::make($request->header(), [
			'access-token' => 'required|min:10|max:60'
		]);

		if ($validator->fails()) {
			return response(['error' => 'Access token is invalid or missing'], 401);
		}

		$accessToken = $request->header('access-token');
		$userId = Cache::get($accessToken);
		if (!$userId) {
			// auth vs FB using access-token
			$fb = resolve(FacebookProvider::class);

			try {
				// Get the \Facebook\GraphNodes\GraphUser object for the current user.
				// If you provided a 'default_access_token', the '{access-token}' is optional.
				$response = $fb->get('/me', $accessToken);
			} catch(\Facebook\Exceptions\FacebookResponseException $e) {
				// When Graph returns an error
				return response(['error' => 'Graph returned an error: '.$e->getMessage()]);
			} catch(\Facebook\Exceptions\FacebookSDKException $e) {
				// When validation fails or other local issues
				return response(['error' => 'Facebook SDK returned an error: ' . $e->getMessage()]);
				echo ;
				exit;
			}

			dd($fb);
			$fbUser = $response->getGraphUser();

			// find user by fbid

			// set user ID and store it in the DB
		} 

		// set the current user
		User::$current = User::find($userId);

		// check here - auth against FB or take from cache

        return $next($request);
    }
}
