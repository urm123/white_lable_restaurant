<?php

namespace App\Providers;

use App\MenuItem;
use App\Restaurant;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Route::bind('menu-item', function ($value) {
            if (Route::currentRouteName() == 'admin.menu-item.update') {
                return MenuItem::withTrashed()->find($value);
            }
            if (Route::currentRouteName() == 'master-admin.menu-item.update') {
                return MenuItem::withTrashed()->find($value);
            }
            return MenuItem::find($value);
        });

        Route::bind('user', function ($value) {
            if (Route::currentRouteName() == 'master-admin.user.destroy') {
                return User::withTrashed()->find($value);
            }
            if (Route::currentRouteName() == 'master-admin.user.restore') {
                return User::withTrashed()->find($value);
            }

            if (Route::currentRouteName() == 'master-admin.admin-user.destroy') {
                return User::withTrashed()->find($value);
            }
            if (Route::currentRouteName() == 'master-admin.admin-user.restore') {
                return User::withTrashed()->find($value);
            }

            return User::find($value);
        });

        Route::bind('restaurant', function ($value) {
            if (Route::currentRouteName() == 'master-admin.restaurant.edit') {
                return Restaurant::withTrashed()->find($value);
            }
            if (Route::currentRouteName() == 'master-admin.restaurant.update') {
                return Restaurant::withTrashed()->find($value);
            }
            if (Route::currentRouteName() == 'master-admin.restaurant.destroy') {
                return Restaurant::withTrashed()->find($value);
            }
            if (Route::currentRouteName() == 'admin.restaurant.edit') {
                return Restaurant::withTrashed()->find($value);
            }
            if (Route::currentRouteName() == 'admin.restaurant.update') {
                return Restaurant::withTrashed()->find($value);
            }
            return Restaurant::find($value);
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
