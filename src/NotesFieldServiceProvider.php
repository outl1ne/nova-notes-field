<?php

namespace OptimistDigital\NovaNotesField;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use OptimistDigital\NovaTranslationsLoader\LoadsNovaTranslations;

class NotesFieldServiceProvider extends ServiceProvider
{
    use LoadsNovaTranslations;

    public function boot()
    {
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');

        // Publish migrations
        $this->publishes([
            __DIR__ . '/../migrations' => database_path('migrations'),
        ], 'migrations');

        // Config
        $this->publishes([
            __DIR__ . '/../config/nova-notes-field.php' => config_path('nova-notes-field.php'),
        ], 'config');

        // Load translations
        $this->loadTranslations(__DIR__ . '/../resources/lang', 'nova-notes-field', true);

        // Serve assets
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-notes-field', __DIR__ . '/../dist/js/field.js');
        });

        // Load routes
        $this->app->booted(function () {
            $this->routes();
        });
    }

    protected function routes()
    {
        if ($this->app->routesAreCached()) return;

        Route::middleware(['nova'])
            ->prefix('nova-vendor/nova-notes')
            ->namespace('\OptimistDigital\NovaNotesField\Http\Controllers')
            ->group(__DIR__ . '/../routes/api.php');
    }

    public static function getTableName()
    {
        return config('nova-notes-field.table_name', 'nova_notes');
    }

    public static function getNotesModel()
    {
        return config('nova-notes-field.notes_model', \OptimistDigital\NovaNotesField\Models\Note::class);
    }
}
