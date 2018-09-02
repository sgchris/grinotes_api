<?php

namespace App\Http\Middleware;

use Closure;

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
		$validator = \Validator::make($request->all(), [
			'access-token' => 'required|min:10|max:60'
		]);

		if ($validator->fails()) {
			return redirect('home');
		}

		$accessToken = $request('access-token');

		// check here - auth against FB or take from cache

        return $next($request);
    }
}
