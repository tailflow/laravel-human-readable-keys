<?php

declare(strict_types=1);

namespace Tailflow\HumanReadableKeys\Concerns;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Str;
use Tailflow\HumanReadableKeys\Contracts\KeyGenerator;

trait HasHumanReadableKey
{
    /**
     * @throws BindingResolutionException
     */
    protected static function bootHasHumanReadableKey(): void
    {
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = app()->make(KeyGenerator::class)->generate(
                    $model->getKeyPrefix(),
                    $model->getKeyLength()
                );
            }
        });
    }

    public function getKeyPrefix(): string
    {
        return Str::singular($this->getTable());
    }

    public function getKeyLength(): int
    {
        return 24;
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}