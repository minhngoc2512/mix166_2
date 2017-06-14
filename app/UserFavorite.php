<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
    protected $table = 'user-favorite';
    public $timestamps = true;
    protected $fillable = [
        'user_id','file_id'
    ];

    protected function File(){
        return $this->belongsTo('App\File');
    }
    protected function User(){
        return $this->belongsTo('App\User');
    }
    //
}
