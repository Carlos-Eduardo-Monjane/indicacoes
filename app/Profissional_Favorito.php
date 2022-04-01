<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profissional_Favorito extends Model
{
    use Notifiable;
    use SoftDeletes;

    public $table = 'favorite_profissional';

        // Profissional Favorito
        public function pro_favorito(){
            return $this->belongsTo('App\User', 'profissional_id');
        }
    
        // Profissional Favorito - Cliente
        public function pro_favorito_cliente(){
            return $this->belongsTo('App\User', 'cliente_id');
        }

    
}
