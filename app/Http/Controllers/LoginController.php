<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// Se agrega Auth y User
use App\User;
use App\Becario;
use App\Emergencia;
use App\Direccion;
use App\Habilidad;
use App\Academica;
use Auth;
use Carbon\Carbon;
//Se agregan los Request
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;



class LoginController extends Controller
{   //
  public function redir(){
      return redirect()->intended('login');
  }

  public function login(){
        // Verificamos que el usuario no esté autenticado
        if (Auth::check())
        {
          $user = Auth::user();
          if($user->rol == 'becario'){
            // Si está autenticado lo mandamos a la raíz donde estara el mensaje e bienvenida.
            return redirect()->intended('becario/home');
          }
          elseif ($user->rol == 'administrativo') {
            # code...
            return redirect()->intended('admin/home');
          }
            
        }
        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
        return \View::make('Login/login');
      }

    public function olvide(){
        return \View::make('Login/olvide');
    }

    public function acceso(LoginRequest $request){
         // Guardamos en un arreglo los datos del usuario.

        if (Auth::attempt(array(
            'carso' => $request->input('carso'),
            'password'=> $request->input('password'),
            'activo' => 1,
            'rol' => 'becario'
            )
          )
          )
        {
            return redirect()->intended('becario/home');
        }
        elseif(Auth::attempt(array(
            'carso' => $request->input('carso'),
            'password'=> $request->input('password'),
            'activo' => 1,
            'rol' => 'administrativo'
            )
          )){
            return redirect()->intended('admin/home'); 
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
       $usuario->activo = '1';
       $usuario->rol = 'becario';
       //$usuario->activo = $request->input('activo');
       // $usuario->rol = $request->input('rol');
       $usuario->password = bcrypt($request->input('password'));
       $usuario->save();
       //crear becario
       $becario = new Becario();
       // Trabajando con la fecha actual
      $date = Carbon::now();
      $becario->user_id = $usuario->id;
      $becario->url_img = 'user.png';
      $becario->fecha_ingreso = $date->toDateString(); // Imprime una fecha en el formato día/mes/año
      $becario->save();
       //crear emergencia
      $emergencia = new Emergencia();
      $emergencia->becario_id = $becario->id;
      $emergencia->save();
       //crear direccion
      $direccion = new Direccion();
      $direccion->becario_id = $becario->id;
      $direccion->save();
       //crear academica
      $academica = new Academica();
      $academica->becario_id = $becario->id;
      $academica->save();
       //crear habilidad
      $habilidad = new Habilidad();
      $habilidad->becario_id = $becario->id;
      $habilidad->save();

       return redirect('register');
   }


   public function logout(){
    Auth::logout();
    return redirect('login');
   }
}
