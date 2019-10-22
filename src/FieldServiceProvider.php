<?php

namespace OptimistDigital\NovaNotesField;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');

        // Serve assets
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-notes-field', __DIR__ . '/../dist/js/field.js');
            Nova::style('nova-notes-field', __DIR__ . '/../dist/css/field.css');
        });
    }

    protected function routes()
    {
        if ($this->app->routesAreCached()) return;

        Route::middleware(['nova', Authorize::class])
            ->prefix('nova-vendor/nova-notes')
            ->group(__DIR__ . '/../routes/api.php');
    }

    public function register()
    {
        //
    }
}
