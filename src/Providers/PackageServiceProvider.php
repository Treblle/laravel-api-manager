<?php

declare(strict_types=1);

namespace Treblle\ApiManager\Providers;

use Illuminate\Support\ServiceProvider;
use Treblle\ApiManager\Http\Manager;

final class PackageServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/api-manager.php' => \config_path('api-manager.php'),
        ], 'api-manager-config');
    }

    public function register(): void
    {
        /** @var array{definition:string} $config */
        $config = config('api-manager');

        $this->app->bind(
            abstract: Manager::class,
            concrete: fn () => Manager::make(
                config: $config['definition'],
            )
        );
    }
}
