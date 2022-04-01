<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = 'users';

    // Buscar Lojas do parceiro
    public function shop(){
        return $this->hasOne('App\Shop', 'user_admin', 'id');
    }

    // Profissional nas Indicacoes
    public function pro_indicado(){
        return $this->hasOne('App\Indicar', 'profissional_id', 'id');
    }

        // Afiliado nas Indicacoes
        public function afiliado_indicador(){
            return $this->hasOne('App\Indicar', 'afiliado_id', 'id');
        }

    // Profissional Favorito
    public function pro_favorito(){
        return $this->hasOne('App\Profissional_Favorito', 'profissional_id', 'id');
    }

        // Profissional Favorito - Cliente
        public function pro_favorito_cliente(){
            return $this->hasOne('App\Profissional_Favorito', 'cliente_id', 'id');
        }

                // Oferta do Profissinal
                public function oferta_do_profissinal(){
                    return $this->hasOne('App\Oferta', 'profissional_id', 'id');
                }

    // Buscar Categoria do Profissional da saude
    public function specialty(){
        return $this->hasOne('App\Cat_Profissional', 'id', 'category_id');
    }

    public function subspecialty(){
        return $this->hasOne('App\SubCategory', 'id', 'subcategory_id');
    }

    protected $fillable = [
        'name', 'email', 'status','user_type_id','password','biography','phone',
        'state','city','category_id','subcategory_id', 'address',

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
