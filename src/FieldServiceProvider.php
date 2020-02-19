<?php

namespace OptimistDigital\NovaNotesField;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class FieldServiceProvider extends ServiceProvider
{
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

        // Serve assets
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-notes-field', __DIR__ . '/../dist/js/field.js');
            Nova::style('nova-notes-field', __DIR__ . '/../dist/css/field.css');
        });

        // Load routes
        $this->app->booted(function () {
            $this->routes();
        });

        // Load translations
        $this->translations();
    }

    protected function routes()
    {
        if ($this->app->routesAreCached()) return;

        Route::middleware(['nova'])
            ->prefix('nova-vendor/nova-notes')
            ->namespace('\OptimistDigital\NovaNotesField\Http\Controllers')
            ->group(__DIR__ . '/../routes/api.php');
    }

    protected function translations()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../resources/lang' => resource_path('lang/vendor/nova-notes-field')], 'translations');
        } else if (method_exists('Nova', 'translations')) {
            $locale = app()->getLocale();
            $fallbackLocale = config('app.fallback_locale');

            if ($this->attemptToLoadTranslations($locale, 'project')) return;
            if ($this->attemptToLoadTranslations($locale, 'local')) return;
            if ($this->attemptToLoadTranslations($fallbackLocale, 'project')) return;
            if ($this->attemptToLoadTranslations($fallbackLocale, 'local')) return;
            $this->attemptToLoadTranslations('en', 'local');
        }
    }

    protected function attemptToLoadTranslations($locale, $from)
    {
        $filePath = $from === 'local'
            ? __DIR__ . '/../resources/lang/' . $locale . '.json'
            : resource_path('lang/vendor/nova-notes-field') . '/' . $locale . '.json';

        $localeFileExists = File::exists($filePath);
        if ($localeFileExists) {
            Nova::translations($filePath);
            return true;
        }
        return false;
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
