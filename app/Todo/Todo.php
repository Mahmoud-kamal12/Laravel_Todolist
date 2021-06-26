<?php

namespace App\Todo;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $hidden = ['created_at','updated_at'];
    // to set defualte value
    protected $attributes = [
        'completed' => false
    ];
}
