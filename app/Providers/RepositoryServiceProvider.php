<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\BookRepositoryInterface;
use App\Interfaces\UserLogRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\UserLogRepository;
use App\Repositories\BookRepository;
use App\Repositories\UserRepository;


class RepositoryServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
        $this->app->bind(UserLogRepositoryInterface::class, UserLogRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

}
