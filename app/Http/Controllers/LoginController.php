<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// Se agrega Auth y User
use App\User;
use Auth;
//Se agregan los Request
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class LoginController extends Controller
{   //

        public function login(){
        // Verificamos que el usuario no esté autenticado
        if (Auth::check())
        {
            // Si está autenticado lo mandamos a la raíz donde estara el mensaje de bienvenida.
            return redirect()->intended('becario/home');
        }
        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
        return \View::make('Login/login');
    }

    public function olvide(){
        return \View::make('Login/olvide');
    }

    public function acceso(LoginRequest $request){
         // Guardamos en un arreglo los datos del usuario.
        $userdata = array(
            'carso' => $request->input('carso'),
            'password'=> $request->input('password')
        );
        if (Auth::attempt($userdata))
        {
            return redirect()->intended('becario/home');
        }
        else
        {
        return redirect('login')->withInput()->with('message', 'Login Failed');
        }
    }


    public function registrar(){
        return \View::make('Login/register');
    }


 public function registrado(RegisterRequest $request)
   {
       $usuario = new User();
       $usuario->carso = $request->input('carso');
       $usuario->activo = $request->input('activo');
       $usuario->rol = $request->input('rol');
       $usuario->password = bcrypt($request->input('password'));
       $usuario->save();
       return redirect('login');
   }


   public function logout(){
    Auth::logout();
    return redirect('login');
   }
}
