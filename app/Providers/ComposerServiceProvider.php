<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ViewFactory $view)
    {
        View::composer(
            'layouts.admin', 'App\Http\ViewComposers\AdminLayoutViewComposer',
        );
        View::composer(
            'layouts.app', 'App\Http\ViewComposers\UserLayoutViewComposer'
        );
    }
}
