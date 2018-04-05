<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class NavigationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerSection();
    }

    public function boot()
    {

    }

    protected function registerSection()
    {
        Request::macro('section', function () {
            if (request()->segment(1) === 'admin') {
                return 'back';
            }

            return 'front';
        });

        Request::macro('isFront', function () {
            return request()->section() === 'front';
        });

        Request::macro('isBack', function () {
            return request()->section() === 'back';
        });
    }
}
