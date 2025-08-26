<?php

namespace GeoffTech\LaravelDefaults;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        // $this->mergeConfigFrom(__DIR__.'/../config/defaults.php', 'defaults');
    }

    public function boot(): void
    {
        Model::shouldBeStrict(App::isProduction());

        Date::use(CarbonImmutable::class);

        Blade::if('admin', fn() => Auth::user()?->is_admin);

        // $this->publishes([
        //     __DIR__.'/../config/defaults.php' => config_path('defaults.php'),
        // ]);

        // $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'defaults');
    }
}
