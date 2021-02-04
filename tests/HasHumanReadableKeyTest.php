<?php

declare(strict_types=1);

namespace Tailflow\HumanReadableKeys\Tests;

use Mockery;
use Tailflow\HumanReadableKeys\Generators\DefaultKeyGenerator;
use Tailflow\HumanReadableKeys\Tests\Fixtures\App\Models\User;
use Tailflow\HumanReadableKeys\Contracts\KeyGenerator as KeyGeneratorContract;

class HasHumanReadableKeyTest extends TestCase
{
    /** @test */
    public function generating_key_on_model_creation(): void
    {
        $keyGeneratorMock = Mockery::mock(DefaultKeyGenerator::class);
        $keyGeneratorMock->expects('generate')
            ->with('user', 24)
            ->once()
            ->andReturn('test-human-readable-key');

        app()->instance(KeyGeneratorContract::class, $keyGeneratorMock);

        $user = factory(User::class)->create();

        self::assertSame('test-human-readable-key', $user->getKey());
    }
}