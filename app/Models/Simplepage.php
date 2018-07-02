<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simplepage extends Model
{
    protected $fillable =[
      'name', 'keywords', 'description', 'content'
    ];
}
