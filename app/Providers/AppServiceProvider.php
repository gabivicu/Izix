<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\ArticleInterface;
use App\Contracts\CommentInterface;
use App\Repositories\ArticleRepository;
use App\Repositories\CommentRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ArticleInterface::class, ArticleRepository::class);
        $this->app->bind(CommentInterface::class, CommentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
