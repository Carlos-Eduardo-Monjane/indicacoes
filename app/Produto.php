<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = 'products';
   
    public function products(){
        return $this->belongsTo('App\Shop');
    }

    public function category(){
        return $this->hasOne('App\Cat_Product', 'id', 'product_category_id');
    }

}
