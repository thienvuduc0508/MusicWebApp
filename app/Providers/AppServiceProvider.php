<?php

namespace App\Providers;

use App\Repositories\Impl\SongRepositoryImpl;
use App\Repositories\Impl\UserRepositoryImpl;
use App\Repositories\SongRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Services\Impl\SongServiceImpl;
use App\Services\Impl\UserServiceImpl;
use App\Services\SongServiceInterface;
use App\Services\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this ->app->singleton(UserRepositoryInterface::class, UserRepositoryImpl::class);
        $this->app->singleton(UserServiceInterface::class, UserServiceImpl::class);
        $this ->app->singleton(SongRepositoryInterface::class, SongRepositoryImpl::class);
        $this->app->singleton(SongServiceInterface::class, SongServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
