<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Order
 *
 * @mixin \Eloquent
 */
class Partner extends Model
{
    public $fillable = [
        'email',
        'name'
    ];
}
