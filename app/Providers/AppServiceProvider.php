<?php

namespace App\Providers;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\DateTimeType;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::directive('money', function ($amount) {
            return "<?php echo 'P' . number_format($amount, 2); ?>";
        });

        if (!Type::hasType('timestamp')) {
            Type::addType('timestamp', DateTimeType::class);
        }
    }
}
