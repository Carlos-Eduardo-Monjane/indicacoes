<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use Notifiable;
    use SoftDeletes;

    public $table = 'oferta';

// Oferta do Profissinal
public function oferta_do_profissinal(){
    return $this->belongsTo('App\User', 'profissional_id');
}
}
