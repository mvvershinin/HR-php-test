<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Partner
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
