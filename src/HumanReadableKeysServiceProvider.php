<?php

declare(strict_types=1);

namespace Tailflow\HumanReadableKeys;

use Illuminate\Support\ServiceProvider;
use Tailflow\HumanReadableKeys\Contracts\KeyGenerator as KeyGeneratorContract;
use Tailflow\HumanReadableKeys\Generators\DefaultKeyGenerator;

class HumanReadableKeysServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(KeyGeneratorContract::class, DefaultKeyGenerator::class);
    }
}