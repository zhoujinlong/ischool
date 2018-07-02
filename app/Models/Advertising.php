<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected $fillable = [
        'advertising_space_id',
        'title',
        'image',
        'url',
        'sort'
    ];

    public function advertising_space(){
        return $this->belongsTo(AdvertisingSpace::class);
    }
}
