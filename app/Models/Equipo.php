<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [

        'id',

        'raza',
        
    ];

    /**
     * 
     * Se establece una relación 1:N con los animales.
     * 
     */
    public function Animales()
    {

        return $this->hasMany(Animal::class);

    }

}
