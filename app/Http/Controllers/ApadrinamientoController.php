<?php

namespace App\Http\Controllers;

use App\Models\Apadrinamiento;
use App\Models\Animal;
use App\Models\User;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ApadrinamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        $equipos = Equipo::all();
        $animales = Animal::all();
        $apadrinamientos = Apadrinamiento::paginate(10);

        return Inertia::render('Apadrinamientos/Index', [
            'apadrinamientos' => $apadrinamientos,
            'equipos' => $equipos,
            'usuarios' => $usuarios,
            'animales' => $animales
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipos = Equipo::all();
        $animales = Animal::all();
        return Inertia::render('Apadrinamientos/Create', ['equipos' => $equipos, 'animales' => $animales]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario_id = Auth::user()->id;
        $fecha_fin = null;
        $tipo = $request->tipo;
        $fecha_inicio = $request->fecha_inicio;

        if ($tipo == 'Anual') {
            $fecha_fin = strtotime($fecha_inicio . "+ 1 year");
        } else if ($tipo == 'Trimestral') {
            $fecha_fin = strtotime($fecha_inicio . "+ 3 months");
        } else {
            $fecha_fin = strtotime($fecha_inicio . "+ 31 days");
        };

        $fecha_fin = date('Y-m-j', $fecha_fin);


        Apadrinamiento::create([
            'tipo' => $request->tipo,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $fecha_fin,
            'cantidad' => $request->cantidad,
            'confirmacion_pago' => $request->confirmacion_pago,
            'users_id' => $usuario_id,
            'animales_id' => $request->animales_id,
        ]);

        return Redirect::route('apadrinamientos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apadrinamiento  $apadrinamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Apadrinamiento $apadrinamiento)
    {

        $equipos = Equipo::all();
        $animales = Animal::all();

        return Inertia::render('Apadrinamientos/Edit', [
            'apadrinamiento' => [
                'id' => $apadrinamiento->id,
                'fecha_inicio' => $apadrinamiento->fecha_inicio,
                'fecha_fin' => $apadrinamiento->fecha_fin,
                'cantidad' => $apadrinamiento->cantidad,
                'tipo' => $apadrinamiento->tipo,
                'confirmacion_pago' => $apadrinamiento->confirmacion_pago,
                'users_id' => $apadrinamiento->users_id,
                'animales_id' => $apadrinamiento->animales_id,
            ],
            'equipos' => $equipos,
            'animales' => $animales,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apadrinamiento  $apadrinamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apadrinamiento $apadrinamiento)
    {
        $data = [
            'id' => $request->id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'cantidad' => $request->cantidad,
            'tipo' => $request->tipo,
            'confirmacion_pago' => $request->confirmacion_pago,
            'users_id' => $request->usuario_id,
            'animales_id' => $request->animales_id,
        ];

        $apadrinamiento->update($data);

        return Redirect::route('apadrinamientos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apadrinamiento  $apadrinamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apadrinamiento $apadrinamiento)
    {
        $apadrinamiento->delete();

        return Redirect::route('apadrinamientos.index');
    }
}
