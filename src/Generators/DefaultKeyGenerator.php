<?php

declare(strict_types=1);

namespace Tailflow\HumanReadableKeys\Generators;

use Illuminate\Support\Str;
use Tailflow\HumanReadableKeys\Contracts\KeyGenerator as KeyGeneratorContract;

class DefaultKeyGenerator implements KeyGeneratorContract
{
    public function generate(string $prefix, int $length): string
    {
        $uniqueHash = Str::random($length);

        return "{$prefix}_{$uniqueHash}";
    }
}