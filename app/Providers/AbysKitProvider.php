<?php

namespace AbysKit\Providers;

use AbysKit\Console\Commands\AbysKitRefreshMigration;
use AbysKit\Console\Commands\AbysKitSeed;
use AbysKit\Locale;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use AbysKit\Console\Commands\AbysKitInstall;

class AbysKitProvider extends ServiceProvider
{
    public function boot(Request $request)
    {
        $this->set_route_locale($request);
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../../routes/dashboard.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'abyskit');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'abyskit');

        $this->publishes([
            __DIR__.'/../../public' => public_path(),
        ], 'public');

        $this->publishes([
            __DIR__.'/../../config/abyskit.php' => config_path('abyskit.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/abyskit.php', 'abyskit');

        if ($this->app->runningInConsole()) {
            $this->commands(AbysKitInstall::class);
            $this->commands(AbysKitSeed::class);
            $this->commands(AbysKitRefreshMigration::class);
        }
    }

    public function set_route_locale($request)
    {
        $requestFirstSegment = $request->segment(1);

        if(Schema::hasTable('locales')) {
            $locales = Locale::all();

            if(count($locales)) {
                $routeLocales = [];

                foreach ($locales as $locale) {
                    array_push($routeLocales, $locale->slug);
                }

                config(['abyskit.route_locales' => $routeLocales]);
            }
        }

        if(in_array($requestFirstSegment, config('abyskit.route_locales')))  {
            config(['abyskit.route_locale' => $requestFirstSegment]);
            config(['app.locale' => $requestFirstSegment]);
        }
    }
}