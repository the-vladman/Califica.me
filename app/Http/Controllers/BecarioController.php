<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//REQUESTS
use App\Http\Requests\PersonalRequest;
use App\Http\Requests\DireccionRequest;
use App\Http\Requests\EmergenciaRequest;
use App\Http\Requests\AcademicaRequest;
use App\Http\Requests\HabilidadRequest;
//
use App\Http\Requests;
use App\Http\Controllers\Controller;
// Se agrega Auth y User
use App\User;
use App\Becario;
use App\Direccion;
use App\Emergencia;
use App\Academica;
use App\Habilidad;
use Auth;
//Sin relaicon
use App\Recurso;
use App\Proyecto;
use Storage;
//use DB;

class BecarioController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
        $recursos = Recurso::all();
        //$becario = DB::table('becarios')->where('user_id',$user->id)->first();
        return view('Becario/index',compact('user','recursos'));
    }

    public function my_perfil(){
        $user = Auth::user();
        $becario = Becario::where('user_id',$user->id)->first();
        //$becario = with('emergencia','direccion','academicas','habilidades');
        return view('Becario/perfil',compact('user','becario'));
    }

    public function my_perfil_edit(){
        $user = Auth::user();
        $becario = Becario::where('user_id',$user->id)->first();
        $direccion = Direccion::where('becario_id',$becario->id)->first();
        $emergencia = Emergencia::where('becario_id',$becario->id)->first();
        $academica = Academica::where('becario_id',$becario->id)->first();
        $habilidad = Habilidad::where('becario_id',$becario->id)->first();
        return view('Becario/perfil_edit',compact('user','becario','direccion','emergencia','academica','habilidad'));
    }

    public function edit_n(PersonalRequest $request){
        $id = $request->input('id_becario');
        $becario = Becario::find($id);
        //Se modifican los datos
        $becario->nombres = $request->input('nombres');
        $becario->apellido_p = $request->input('apellido_p');
        $becario->apellido_m = $request->input('apellido_m');
        $becario->telefono = $request->input('telefono');
        $becario->email = $request->input('email');
        $becario->descripcion = $request->input('descripcion');
        $becario->sangre = $request->input('sangre');
        $becario->genero = $request->input('genero');
        $becario->area = $request->input('area');

        if($request->file('imagen')){
            $file = $request->file('imagen');
            $nombre = 'becario'.$becario->id;
            Storage::put('becarios/'.$nombre, \File::get($file));
            $becario->url_img = $nombre;
            $becario->save();   
        }
        else{
            $becario->save();  
        }
        return redirect('becario/perfil/edit');
    }


    public function edit_d(DireccionRequest $request){
        $id = $request->input('id_direccion');
        $direccion = Direccion::find($id);
        //Se modifican los datos
        $direccion->calle = $request->input('calle');
        $direccion->numero = $request->input('numero');
        $direccion->CP = $request->input('CP');
        $direccion->delegacion = $request->input('delegacion');
        $direccion->estado = $request->input('estado');
        $direccion->save();  

        return redirect('becario/perfil/edit');
    }

    public function edit_e(EmergenciaRequest $request){
        $id = $request->input('id_emergencia');
        $emergencia = Emergencia::find($id);
        //Se modifican los datos
        $emergencia->nombre = $request->input('nombre');
        $emergencia->apellido_p = $request->input('apellido_p');
        $emergencia->apellido_m = $request->input('apellido_m');
        $emergencia->telefono = $request->input('telefono');
        $emergencia->save();  

        return redirect('becario/perfil/edit');
    }

    public function edit_a(AcademicaRequest $request){
        $id = $request->input('id_academica');
        $academica = Academica::find($id);
        //Se modifican los datos
        $academica->universidad = $request->input('universidad');
        $academica->carrera = $request->input('carrera');
        $academica->tipo = $request->input('tipo');
        $academica->status = $request->input('status');
        $academica->save();  

        return redirect('becario/perfil/edit');
    }

    public function edit_h(HabilidadRequest $request){
        $id = $request->input('id_habilidad');
        $habilidad = Habilidad::find($id);
        //Se modifican los datos
        $habilidad->habilidad = $request->input('habilidad');
        $habilidad->save();  

        return redirect('becario/perfil/edit');
    }

    public function list_becarios(){
        $user = Auth::user();
        $users = User::all();
        return view('Becario/list_becarios',compact('user','users'));
    }
    public function show_becario($id){
        $user = Auth::user();
        $becario = Becario::find($id);
        return view('Becario/show_becario',compact('user','becario'));
    }

    public function list_proyectos(){
        $user = Auth::user();
        $ctin = Proyecto::where('tipo','CTIN')->get();
        $carso = Proyecto::where('tipo','Carso')->get();
        $operacion = Proyecto::where('tipo','Operación CTIN')->get();
        //$becario = with('emergencia','direccion','academicas','habilidades');
        return view('Proyecto/index',compact('user','ctin','carso','operacion'));

    }

     public function show_proyecto($id){
        $user = Auth::user();
        $proyecto = Proyecto::find($id);
        return view('Proyecto/show_proyecto',compact('user','proyecto'));
    }
}
