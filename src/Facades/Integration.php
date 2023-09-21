<?php

declare(strict_types=1);

namespace Treblle\ApiManager\Facades;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Facade;
use Treblle\ApiManager\Http\Manager;

/**
 * @method static PendingRequest for(string $key)
 */
final class Integration extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Manager::class;
    }
}
