<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hostal extends Model
{
    protected $fillable = [
        'title', 'body',
    ];
}
