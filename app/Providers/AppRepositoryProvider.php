<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
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
        $this->app->bind("App\Repositories\Product\IProductRepository", "App\Repositories\Product\ProductRepository");
        $this->app->bind("App\Repositories\Task\ITaskRepository", "App\Repositories\Task\TaskRepository");
        $this->app->bind("App\Repositories\Contact\IContactRepository", "App\Repositories\Contact\ContactRepository");
    }
}
