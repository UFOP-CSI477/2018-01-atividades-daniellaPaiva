<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'user_id',
    ];
}
