<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('escapeHtml', function ($expression) {
            return "<?php echo htmlspecialchars($expression, ENT_QUOTES, 'UTF-8'); ?>";
        });

        config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');
    }
}
