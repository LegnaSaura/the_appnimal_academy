<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'DNI' => ['required', 'string', 'max:255', 'unique:users,DNI'],
            'nombre' => ['required', 'string', 'max:255'],
            'primer_apellido' => ['required', 'string', 'max:255'],
            'segundo_apellido' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date', 'max:255'],
            'pais_residencia' => ['required', 'string', 'max:255'],
            'domicilio' => ['required', 'string', 'max:255'],
            'codigo_postal' => ['required', 'string', 'max:255'],
            'poblacion' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'numeric'],
            'consentimiento_imagenes' => [  'max:255'],
            'consentimiento_comunicaciones' => [  'max:255'] 
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'DNI' =>  $request->DNI,
            'nombre' =>  $request->nombre,
            'primer_apellido' =>  $request->primer_apellido,
            'segundo_apellido' =>  $request->segundo_apellido,
            'fecha_nacimiento' =>  $request->fecha_nacimiento,
            'pais_residencia' =>  $request->pais_residencia,
            'domicilio' =>  $request->domicilio,
            'codigo_postal' =>  $request->codigo_postal,
            'poblacion' =>  $request->poblacion,
            'telefono' =>  $request->telefono,
            'consentimiento_imagenes' =>  $request->consentimiento_imagenes,
            'consentimiento_comunicaciones' =>  $request->consentimiento_comunicaciones,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
