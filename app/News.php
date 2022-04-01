<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use Notifiable;
    use SoftDeletes;

    public $table = 'news';
}
