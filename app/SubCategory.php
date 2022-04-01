<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use Notifiable;
    use SoftDeletes;



    public $table = 'profissional_subcategories';

    public function category_main()
    {
        return $this->belongsTo('App\Cat_Profissional', 'id');
    }

    public function subspecialty()
    {
        return $this->belongsTo('App\User', 'id');
    }

}
