<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
class loginController
{
    public function showLogin()
    {
        return view('login.login');
    }

    /*El método login() valida los datos recibidos:*/
    public function login(Request $request)
    {


        $messages = [
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'Por favor, ingresa un correo electrónico válido.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'email.exists' => 'No encontramos un usuario con ese correo electrónico.',
        ];

        /*Se valida si los datos del usuario existe en la tabla usuarios*/
        $request->validate([
            'email' => ['required', 'email', 'exists:usuarios,email'],
            'password' => ['required'],
        ], $messages);

        /*Se construyen las credenciales con only('email', 'password').*/
        $credentials = $request->only('email', 'password');

        $remember = $request->has('remember');

        /*Se verifica la autenticación con Auth::attempt($credentials, $remember):*/
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
        /*Si la autenticación es correcta Se redirige según el rol (rol_id) del usuario*/
            $userRole = Auth::user()->rol_id;

            return match($userRole) {
                1 => redirect()->route('Página principal'),
                2 => redirect()->route('Home Administrador'),
                3 => redirect()->route('Home Colaborador'),
            };
        }else{
            /*Si la sesión es errada Se redirige al login con un mensaje de error.*/
           return redirect()->route('Iniciar sesión')->with('loginError', 'El usuario ingresado no se encuentra registrado en el sistema. Por favor, verifique sus datos e intente nuevamente.');
        };
    }
}
