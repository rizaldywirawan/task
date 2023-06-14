<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalAccessToken extends \Laravel\Sanctum\PersonalAccessToken
{
    use HasFactory, HasUuid;

    protected $keyType = 'string';
    public $incrementing = false;

}
