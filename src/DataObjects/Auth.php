<?php

declare(strict_types=1);

namespace Treblle\ApiManager\DataObjects;

use Symfony\Component\Yaml\Tag\TaggedValue;
use Treblle\ApiManager\Enums\AuthType;

final readonly class Auth
{
    public function __construct(
        public AuthType $type,
        public string $value,
        public null|string $name = null,
    ) {}

    /**
     * @param array{type:string,value:TaggedValue,name:null|string} $data
     * @return Auth
     */
    public static function fromArray(array $data): Auth
    {
        return new Auth(
            type: AuthType::from(
                value: $data['type'],
            ),
            value: \env($data['value']->getValue()),
            name: $data['name'] ?? null,
        );
    }
}
