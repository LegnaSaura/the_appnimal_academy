<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [

        'id',

        'nombre',

        'historia',

        'superpoder',

        'fecha_entrada',

        'fecha_fallecimiento',

        'equipos_id'

    ];

    /**
     * 
     * Se establece una relación 1:N con los equipos.
     * 
     */
    public function Equipo()
    {

        return $this->belongsTo(Equipo::class);

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
