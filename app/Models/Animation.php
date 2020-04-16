<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animation extends Model
{
    protected $fillable = [
        'title', 'content', 'connection'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

}
