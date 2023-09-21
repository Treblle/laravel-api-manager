<?php

declare(strict_types=1);

use Illuminate\Http\Client\PendingRequest;
use Treblle\ApiManager\DataObjects\Integration;
use Treblle\ApiManager\Exceptions\UnregisteredIntegrationException;
use Treblle\ApiManager\Http\Manager;

it('can call the static make method', function (): void {
    expect(
        Manager::make(
            config: __DIR__ . '/../Stubs/integrations.yaml',
        ),
    )->toBeInstanceOf(Manager::class);
});

it('can create the integrations from the configuration', function (): void {
    $manager = Manager::make(
        config: __DIR__ . '/../Stubs/integrations.yaml',
    );

    expect(
        $manager->integrations['github'],
    )->toBeInstanceOf(Integration::class);
});

it('can create a pending request', function (): void {
    $manager = Manager::make(
        config: __DIR__ . '/../Stubs/integrations.yaml',
    );

    expect(
        $manager->for(
            key: 'github',
        ),
    )->toBeInstanceOf(PendingRequest::class);
});

it('will throw an exception if the integration is not registered', function (): void {
    $manager = Manager::make(
        config: __DIR__ . '/../Stubs/integrations.yaml',
    );

    $manager->for(
        key: 'test',
    );
})->throws(UnregisteredIntegrationException::class);
