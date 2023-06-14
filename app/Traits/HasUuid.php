<?php

namespace App\Traits;

use phpDocumentor\Reflection\Types\This;
use Ramsey\Uuid\Nonstandard\Uuid;

trait HasUuid
{
    protected static function bootHasUuid(): void
    {
        static::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
        });
    }
}
