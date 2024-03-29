<?php

namespace App\Providers;

use App\Repositories\CommentRepositoryInterface;
use App\Repositories\GuestRepositoryInterface;
use App\Repositories\Impl\CommentRepositoryImpl;
use App\Repositories\Impl\GuestRepositoryImpl;
use App\Repositories\Impl\LikeRepositoryImpl;
use App\Repositories\Impl\PlaylistRepositoryImpl;
use App\Repositories\Impl\SingerRepositoryImpl;
use App\Repositories\Impl\SongRepositoryImpl;
use App\Repositories\Impl\UserRepositoryImpl;
use App\Repositories\LikeRepositoryInterface;
use App\Repositories\PlaylistRepositoryInterface;
use App\Repositories\SingerRepositoryInterface;
use App\Repositories\SongRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Services\CommentServiceInterface;
use App\Services\GuestServiceInterface;
use App\Services\Impl\CommentServiceImpl;
use App\Services\Impl\GuestServiceImpl;
use App\Services\Impl\LikeServiceImpl;
use App\Services\Impl\PlaylistServiceImpl;
use App\Services\Impl\SingerServiceImpl;
use App\Services\Impl\SongServiceImpl;
use App\Services\Impl\UserServiceImpl;
use App\Services\LikeServiceInterface;
use App\Services\PlaylistServiceInterface;
use App\Services\SingerServiceInterface;
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
        $this ->app->singleton(GuestRepositoryInterface::class, GuestRepositoryImpl::class);
        $this->app->singleton(GuestServiceInterface::class, GuestServiceImpl::class);
        $this->app->singleton(PlaylistRepositoryInterface::class, PlaylistRepositoryImpl::class);
        $this->app->singleton(PlaylistServiceInterface::class, PlaylistServiceImpl::class);
        $this->app->singleton(SingerRepositoryInterface::class, SingerRepositoryImpl::class);
        $this->app->singleton(SingerServiceInterface::class, SingerServiceImpl::class);
        $this->app->singleton(CommentRepositoryInterface::class, CommentRepositoryImpl::class);
        $this->app->singleton(CommentServiceInterface::class, CommentServiceImpl::class);
        $this->app->singleton(LikeRepositoryInterface::class, LikeRepositoryImpl::class);
        $this->app->singleton(LikeServiceInterface::class, LikeServiceImpl::class);
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
