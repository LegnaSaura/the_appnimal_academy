<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public $timestamps = false;

    protected $fillable = [

        'email',

        'password',

        'DNI',

        'nombre',

        'primer_apellido',

        'segundo_apellido',

        'fecha_nacimiento',

        'pais_residencia',

        'domicilio',

        'codigo_postal',

        'poblacion',

        'telefono',

        'consentimiento_imagenes',

        'consentimiento_comunicaciones',

        'rol',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

        'password',

        'remember_token',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * 
     * Se establece una relación 1:N con los voluntariados.
     * 
     */
    public function Voluntariados()
    {

        return $this->hasMany(Voluntariado::class);
    }

    /**
     * 
     * Se establece una relación 1:N con 
     * 
     */
    public function Donativos()
    {

        return $this->hasMany(Donativo::class);
    }

    /**
     * 
     * Se establece una relación 1:N con 
     * 
     */
    public function Visitas()
    {

        return $this->hasMany(Visita::class);
    }

    /**
     * 
     * Se establece una relación con la ternaria. 
     * 
     */
    public function Apadrinamientos()
    {

        return $this->hasMany(Apadrinamiento::class);
    }

}
