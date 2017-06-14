<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table='artists';
    protected $fillable=[
        'name','image'
    ];
    public $timestamps = true;
    protected function File(){
        return $this->hasMany('App\File');
    }
    //
}
