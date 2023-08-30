<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PublisherRepositoryInterface;
use App\Repositories\PublisherRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PublisherRepositoryInterface::class, PublisherRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
