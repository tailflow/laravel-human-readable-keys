<?php

declare(strict_types=1);

namespace Tailflow\HumanReadableKeys\Contracts;

interface KeyGenerator
{
    public function generate(string $prefix, int $length): string;
}