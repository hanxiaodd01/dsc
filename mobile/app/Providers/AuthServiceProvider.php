<?php

namespace App\Providers;

use App\Models\Users;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->app['auth']->viaRequest('api', function($request) {
            if ($request->input('api_token')) {
                return Users::where('api_token', $request->input('api_token'))->first();
            }
        });
    }
}