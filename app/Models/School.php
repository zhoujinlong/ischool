<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable=[
        'code','name','logo','createdate',
        'type_id','category_id','nature_id','level_id',
        'department','http','click',
        'province','city','district',
        'province_code','city_code','district_code',
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function nature(){
        return $this->belongsTo(Nature::class);
    }

    public function levels(){
        return $this->belongsToMany(Level::class, 'level_schools');
    }
}
