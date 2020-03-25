<?php

namespace App\Providers;

use App\QueryLog;
use App\Support\Views;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * @param Views $views
     */
    public function boot(Views $views)
    {
        Schema::defaultStringLength(191);
        View::share('notification_count', $views->notificationCount());

        View::share('subscriptions', $views->subscriptions());

        View::share('platform_name', env('APP_NAME'));

        View::share('reservation_count', $views->reservations());
        View::share('delivery_count', $views->deliveries());
        View::share('takeaway_count', $views->takeaways());

        \Config::set('mail.driver', setting('mail_server'));
        \Config::set('mail.from.address', setting('mail_from_address'));
        \Config::set('mail.from.name', setting('mail_from_name'));

        \Config::set('services.ip_info_token', setting('ip_info_token'));

        \Config::set('app.name', setting('app_name'));
        \Config::set('app.url', setting('app_url'));

        \Config::set('broadcasting.connections.pusher.key', setting('pusher_app_key'));
        \Config::set('broadcasting.connections.pusher.secret', setting('pusher_app_secret'));
        \Config::set('broadcasting.connections.pusher.app_id', setting('pusher_app_id'));
        \Config::set('broadcasting.connections.pusher.options.cluster', setting('pusher_app_cluster'));

        DB::listen(
            function ($query) {
                if (strpos($query->sql, 'query_logs') !== false || strpos($query->sql, 'select') !== false || strpos($query->sql, 'SELECT') !== false) {
                    return;
                }

                if (Auth::check()) {
                    $user = Auth::id();
                } else {
                    $user = 'guest';
                }

                $bindings = [];

                foreach ($query->bindings as $binding) {
                    $bindings[] = json_encode($binding);
                }

                Log::info([
                    'sql' => $query->sql,
                    'bindings' => implode(', ', $bindings),
                    'time' => $query->time,
                    'user' => $user
                ]);
            }
        );

//        if (session('language') == null) {
//            session(['language' => 'fr']);
//        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public', function () {
            return base_path('public_html');
        });
    }
}
