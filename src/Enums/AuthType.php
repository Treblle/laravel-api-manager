<?php

declare(strict_types=1);

namespace Treblle\ApiManager\Enums;

enum AuthType: string
{
    case Bearer = 'Bearer';
    case Header = 'Header';
}
