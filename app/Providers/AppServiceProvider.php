<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryImpl;
use App\Repositories\Post\PostRepository;
use App\Repositories\Post\PostRepositoryImpl;
use App\Repositories\Tag\TagRepository;
use App\Repositories\Tag\TagRepositoryImpl;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryImpl;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
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
        $this->app->bind(CategoryRepository::class, CategoryRepositoryImpl::class);
        $this->app->bind(PostRepository::class, PostRepositoryImpl::class);
        $this->app->bind(TagRepository::class, TagRepositoryImpl::class);
        $this->app->bind(UserRepository::class, UserRepositoryImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        if (env('APP_ENV') != 'local'){
            URL::forceScheme('https');
        }


    }
}
