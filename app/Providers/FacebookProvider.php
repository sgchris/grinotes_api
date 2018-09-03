<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Facebook\Facebook;

class FacebookProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
		$this->app->singleton(self::class, function($app) {
			return new Facebook([
				'app_id' => config('services.facebook.app_id'),
				'app_secret' => config('services.facebook.secret'),
				'default_graph_version' => 'v2.10',
			]);
		});
    }
}
