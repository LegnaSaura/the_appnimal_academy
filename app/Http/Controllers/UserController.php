<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;



class UserController extends Controller
{
    /**
     * Página en la que se muestran todos los datos de la tabla: 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(10);

        return Inertia::render('Usuarios/Index', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        return Inertia::render('Usuarios/Edit', [
            'usuario' => [
                'id' => $usuario->id,
                'email' =>  $usuario-> email,
                'password' => $usuario->password,
                'DNI' =>  $usuario-> DNI,
                'nombre' =>  $usuario-> nombre,
                'primer_apellido' =>  $usuario-> primer_apellido,
                'segundo_apellido' =>  $usuario-> segundo_apellido,
                'fecha_nacimiento' => $usuario-> fecha_nacimiento,
                'pais_residencia' =>  $usuario-> pais_residencia,
                'domicilio' =>  $usuario-> domicilio,
                'codigo_postal' =>  $usuario-> codigo_postal,
                'poblacion' =>  $usuario-> poblacion,
                'telefono' => $usuario-> telefono,
                'consentimiento_imagenes' => $usuario->consentimiento_imagenes,
                'consentimiento_comunicaciones' => $usuario->consentimiento_comunicaciones,
                'rol' => $usuario-> rol,
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $data = array_slice($request->all(), 2);
        
        User::whereId($id)->update($data);

        return Redirect::route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();

        return Redirect::route('usuarios.index');
    }
}
