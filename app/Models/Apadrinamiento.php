<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apadrinamiento extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [

        'id',

        'tipo',

        'fecha_inicio',

        'fecha_fin',

        'cantidad',

        'confirmacion_pago',

        'animales_id',

        'users_id'

    ];

    /**
     * 
     * Ses establece una relación ternaria con los otros modelos.  
     * 
     */
    public function Animales()
    {

        return $this->belongsTo(Animal::class);

    }

    /**
     * 
     * Ses establece una relación ternaria con los otros modelos.  
     * 
     */
    public function Users()
    {

        return $this->belongsTo(User::class);
        
    }
}
