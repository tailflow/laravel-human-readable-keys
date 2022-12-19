# Laravel Human Readable Keys

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tailflow/laravel-human-readable-keys.svg)](https://packagist.org/packages/tailflow/laravel-human-readable-keys)
[![Build Status on Github Actions](https://img.shields.io/github/actions/workflow/status/tailflow/laravel-human-readable-keys/ci.yml?branch=main)](https://github.com/tailflow/laravel-human-readable-keys/actions)

Have you ever wanted to generate Stripe-like IDs for your Eloquent models? This package does exactly that!

## Installation

You can install the package via composer:

```bash
composer require tailflow/laravel-human-readable-keys
```

## Usage

1. Change type of the `id` (or whatever your primary key column is) to `string` in the migration

```php
Schema::create('users', function (Blueprint $table) {
    $table->string('id');
    
    ...
});
```

2. Add `HasHumanReadableKey` trait to a model

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tailflow\HumanReadableKeys\Concerns\HasHumanReadableKey;

class User extends Model
{
    use HasHumanReadableKey;

   ...
}
```

3. (Optional) Customize key prefix and length

By default, a singular form of the table name is used as prefix for generated keys. You can customize that by overriding
the `getKeyPrefix` method on the model:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tailflow\HumanReadableKeys\Concerns\HasHumanReadableKey;

class User extends Model
{
    use HasHumanReadableKey;

   ...
   
    public function getKeyPrefix(): string
    {
        return 'account';
    }
}
```

Generated keys contain a unique hash that is 24 characters in length. To customize hash length, override the `getKeyLength` method:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tailflow\HumanReadableKeys\Concerns\HasHumanReadableKey;

class User extends Model
{
    use HasHumanReadableKey;

   ...
   
    public function getKeyLength(): string
    {
        return 16;
    }
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
