<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $table = 'notificacao';
    protected $fillable = [
        'iduser', 'assunto', 'valor','nome',
    ];
}
