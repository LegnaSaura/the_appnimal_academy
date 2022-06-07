<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Equipo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;


class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animales = Animal::paginate(10);
        $equipos = Equipo::all();

        return Inertia::render('Animales/Index', ['animales' => $animales, 'equipos' => $equipos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipos = Equipo::all();

        return Inertia::render('Animales/Create', ['equipos' => $equipos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Animal::create(
            Request::validate([
                'nombre' => ['required', 'max:90'],
                'historia' => ['required', 'max:255'],
                'superpoder' => ['required', 'max:90'],
                'fecha_entrada' => ['required', 'date'],
                'fecha_fallecimiento' => ['nullable', 'date'],
                'equipos_id' => ['required', 'max:90'],
            ])
        );

        return Redirect::route('animales.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        
        return Inertia::render('Animales/Edit', [
            'animal' => [
                'id' => $animal->id,
                'nombre' => $animal->nombre,
                'historia' => $animal->historia,
                'superpoder' => $animal->superpoder,
                'fecha_entrada' => $animal->fecha_entrada,
                'fecha_fallecimiento' => $animal->fecha_fallecimiento,
                'equipos_id' => $animal->equipos_id,
            ],
            'equipos' => Equipo::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $request = Request::validate([
            'nombre' => ['required', 'max:90'],
            'historia' => ['required', 'max:255'],
            'superpoder' => ['required', 'max:90'],
            'fecha_entrada' => ['required', 'date'],
            'fecha_fallecimiento' => [ 'date'],
            'equipos_id' => ['required', 'max:90'],
        ]);
        
        $animal->update($request);

        return Redirect::route('animales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();

        return Redirect::route('animales.index');
    }
}
