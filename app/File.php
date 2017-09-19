<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;
    protected $table='files';
    public $timestamps='true';
    protected $fillable= [
        'name','path','category_id','artists_id','genre_id','user_id','type','status'
    ];
    protected function Category(){
        return $this->belongsTo('App\Category');


    }
    protected function Artist(){
        return $this->belongsTo('App\Artist');
    }
    protected  function UserFavorite(){
        return $this->hasMany('App\UserFavorite');
    }
    protected function User(){
        return $this->belongsTo('App\User');
    }
    protected  function Genre(){
        return $this->hasOne(\App\Genre::class,'id','genre_id');
    }


    //
}
