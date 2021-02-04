<?php

declare(strict_types=1);

namespace Tailflow\HumanReadableKeys\Tests\Fixtures\App\Models;

use Illuminate\Database\Eloquent\Model;
use Tailflow\HumanReadableKeys\Concerns\HasHumanReadableKey;

class User extends Model
{
    use HasHumanReadableKey;

    protected $fillable = ['name', 'email', 'password'];
}