<?php

namespace App\Http\Controllers;

use App\Models\Voluntariado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class VoluntariadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voluntariados = Voluntariado::paginate(10);
        $usuarios = User::all();

        return Inertia::render('Voluntariados/Index', ['voluntariados' => $voluntariados, 'usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return Inertia::render('Voluntariados/Create');
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

        Voluntariado::create([
            'tipo' => $request->tipo,
            'disponibilidad' => $request->disponibilidad,
            'coche_propio' => $request->coche_propio,
            'tareas' => $request->tareas,
            'users_id' => $usuario_id
        ]);

        // Cambiar a vista de las tareas voluntariado:
        return Redirect::route('voluntariados.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voluntariado  $voluntariado
     * @return \Illuminate\Http\Response
     */
    public function edit(Voluntariado $voluntariado)
    {
        return Inertia::render('Voluntariados/Edit', [
            'voluntariado' => [
                'id' => $voluntariado->id,
                'tipo' => $voluntariado->tipo,
                'tareas' => $voluntariado->tareas,
                'disponibilidad' => $voluntariado->disponibilidad,
                'coche_propio' => $voluntariado->coche_propio,
                'users_id' => $voluntariado->users_id,
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voluntariado  $voluntariado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voluntariado $voluntariado)
    {
        $data = [
            'id' => $request->id,
            'tipo' => $request->tipo,
            'disponibilidad' => $request->disponibilidad,
            'tareas' => $request->tareas,
            'coche_propio' => $request->coche_propio,
            'users_id' => $request->users_id,
        ];

        $voluntariado->update($data);

        return Redirect::route('voluntariados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voluntariado  $voluntariado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voluntariado $voluntariado)
    {
        $voluntariado->delete();

        return Redirect::route('voluntariados.index');
    }
}
