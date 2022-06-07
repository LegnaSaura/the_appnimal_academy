<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario_rol = Auth::user()->rol;
        $rolesAutorizados = array("Veterinario", "Administrador");
        var_dump($usuario_rol);
        
        if (in_array($usuario_rol, $rolesAutorizados)) {
            $equipos = Equipo::paginate(10);

            return Inertia::render('Equipos/Index', ['equipos' => $equipos]);
        } else {
            return redirect('/dashboard');
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return Inertia::render('Equipos/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Equipo::create(
            Request::validate([
                'raza' => ['required', 'max:90'],
            ])
        );

        return Redirect::route('equipos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        return Inertia::render('Equipos/Edit', [
            'equipo' => [
                'id' => $equipo->id,
                'raza' => $equipo->raza,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        $request = Request::validate([
            'raza' => ['required', 'max:90'],
        ]);

        $equipo->update($request);

        return Redirect::route('equipos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();

        return Redirect::route('equipos.index');
    }
}
