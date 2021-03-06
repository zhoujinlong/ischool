<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertisingSpace extends Model
{
    protected $fillable = ['name', 'is_able', 'img_width', 'img_height'];

    protected $casts = ['is_able'];

    public function advertisings(){
        return $this->hasMany(Advertising::class);
    }
}
