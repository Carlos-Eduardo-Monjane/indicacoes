<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Indicar extends Model
{
    use Notifiable;
    use SoftDeletes;

    public $table = 'indicacao';

    public function pro_indicado()
    {
        return $this->belongsTo('App\User', 'profissional_id');
    }

    public function afiliado_indicador()
    {
        return $this->belongsTo('App\User', 'afiliado_id');
    }
}
