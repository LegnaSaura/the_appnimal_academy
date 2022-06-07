<?php

namespace App\Http\Controllers;

use App\Models\Donativo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class DonativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donativos = Donativo::paginate(10);
        $usuarios = User::all();

        return Inertia::render('Donativos/Index', ['donativos' => $donativos, 'usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return Inertia::render('Donativos/Create');
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
        $usuario_DNI = Auth::user()->DNI;

        Donativo::create([
            'fecha' => $request->fecha,
            'importe' => $request->importe,
            'tipo' => $request->tipo,
            'usuario_instagram' => $request->usuario_instagram,
            'usuario_facebook' => $request->usuario_facebook,
            'DNI' => $usuario_DNI,
            'pago_confirmado' => $request->pago_confirmado,
            'users_id' => $usuario_id,
        ]);

        return Redirect::route('donativos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donativo  $donativo
     * @return \Illuminate\Http\Response
     */
    public function edit(Donativo $donativo)
    {
        return Inertia::render('Donativos/Edit', [
            'donativo' => [
                'id' => $donativo->id,
                'fecha' => $donativo->fecha,
                'importe' => $donativo->importe,
                'tipo' => $donativo->tipo,
                'usuario_instagram' => $donativo->usuario_instagram,
                'usuario_facebook' => $donativo->usuario_facebook,
                'DNI' => $donativo->DNI,
                'pago_confirmado' => $donativo->pago_confirmado,
                'users_id' => $donativo->users_id,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donativo  $donativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donativo $donativo)
    {

        $data = [
            'id' => $request->id, 
            'fecha' => $request->fecha,
            'importe' => $request->importe,
            'tipo' => $request->tipo,
            'usuario_instagram' => $request->usuario_instagram,
            'usuario_facebook' => $request->usuario_facebook,
            'DNI' =>  $request->DNI,
            'pago_confirmado' => $request->pago_confirmado,
            'users_id' =>  $request->users_id,
        ];

        $donativo->update($data);

        return Redirect::route('donativos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donativo  $donativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donativo $donativo)
    {
        $donativo->delete();

        return Redirect::route('donativos.index');
    }
}
