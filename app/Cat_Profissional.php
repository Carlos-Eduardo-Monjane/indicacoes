<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cat_Profissional extends Model
{
    use Notifiable;
    use SoftDeletes;



    public $table = 'profissional_categories';

    public function specialty()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function category_main()
    {
        return $this->hasMany('App\SubCategory','category_id', 'id');
    }

}
