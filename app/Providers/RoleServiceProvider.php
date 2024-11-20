<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Role; // Pastikan namespace ini benar

class RoleServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Ubah binding method
        $this->app->singleton(Role::class, function ($app) {
            return new Role();
        });
    }

    public function boot()
    {
        //
    }
}