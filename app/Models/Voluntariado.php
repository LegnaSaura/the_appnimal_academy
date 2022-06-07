<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voluntariado extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [

        'id',

        'tipo',

        'disponibilidad',

        'coche_propio',

        'tareas',

        'users_id'

    ];

    /**
    * 
    * Se establece una relación 1:N con el usuario.
    * 
    */
    public function User()
    {

        return $this->belongsTo(User::class);

    }

}
