<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = 'shops';
   
    public function products(){
        return $this->hasMany('App\Produto', 'shop_id', 'id');
    }
    public function shop()
    {
        return $this->belongsTo('App\User', 'user_admin');
    }


}
