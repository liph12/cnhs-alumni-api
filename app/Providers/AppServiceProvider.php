<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MemberServiceInterface;
use App\Services\MemberService;
use Illuminate\Contracts\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MemberServiceInterface::class, function (Application $app) {
            return new MemberServiceInterface($app->make(MemberService::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
