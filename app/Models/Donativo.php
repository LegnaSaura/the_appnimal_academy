<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donativo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [

        'id',

        'fecha',

        'importe',

        'tipo',

        'usuario_instagram',

        'usuario_facebook',

        'DNI',

        'pago_confirmado',
        
        'users_id',

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
