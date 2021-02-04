<?php

declare(strict_types=1);

namespace Tailflow\HumanReadableKeys\Tests;

use Tailflow\HumanReadableKeys\Generators\DefaultKeyGenerator;

class KeyGeneratorTest extends TestCase
{
    /** @var DefaultKeyGenerator $keyGenerator */
    protected $keyGenerator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->keyGenerator = new DefaultKeyGenerator();
    }

    /** @test */
    public function generating_key(): void
    {
        $key = $this->keyGenerator->generate('user', 24);

        self::assertStringStartsWith('user_', $key);
        self::assertSame(29, strlen($key));
    }
}