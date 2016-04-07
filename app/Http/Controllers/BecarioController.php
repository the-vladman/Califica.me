<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//REQUESTS
use App\Http\Requests\PersonalRequest;
use App\Http\Requests\DireccionRequest;
use App\Http\Requests\EmergenciaRequest;
use App\Http\Requests\AcademicaRequest;
use App\Http\Requests\HabilidadRequest;
use App\Http\Requests\UpdateProyectoRequest;
use App\Http\Requests\RecursosRequest;
use App\Http\Requests\TareaRequest;
use App\Http\Requests\CambioRequest;
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
//Rekacion Becario / Proyecto
use App\BP;
// EVALUACIONES
use App\Evaluacion;
use App\Tarea;
//Sin relaicon
use App\Recurso;
use App\Proyecto;
use App\Proyecto_archivo;
use Storage;
//use DB;

class BecarioController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('becario');
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

     public function edit_p(CambioRequest $request){
        $id = $request->input('usuario');
        $usuario = User::find($id);
        //Se modifican los datos
        $usuario->password = bcrypt($request->input('password'));
       $usuario->save(); 

        return redirect('becario/perfil/edit');
    }

//////Lsita Becarios
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
//////PROYECTOSSS
    public function list_proyectos(){
        $user = Auth::user();
        $ctin = Proyecto::where('tipo','CTIN')->get();
        $carso = Proyecto::where('tipo','Carso')->get();
        $operacion = Proyecto::where('tipo','Operación CTIN')->get();
        //$becario = with('emergencia','direccion','academicas','habilidades');
        return view('Becario/Proyecto/index',compact('user','ctin','carso','operacion'));

    }

     public function show_proyecto($id){
        $user = Auth::user();
        $proyecto = Proyecto::find($id);
        return view('Becario/Proyecto/show_proyecto',compact('user','proyecto'));
    }

    public function edit_proyecto($id){
        $user = Auth::user();
        $proyecto = Proyecto::find($id);
        return view('Becario/Proyecto/edit_proyecto',compact('user','proyecto'));
    }

    public function update_proyecto($id,UpdateProyectoRequest $request){
        $proyecto = Proyecto::find($id);
        $proyecto->nombre = $request->input('nombre');
        $proyecto->progreso = $request->input('progreso');
        $proyecto->tipo = $request->input('tipo');
        $proyecto->area = $request->input('area');
        $proyecto->end = $request->input('end');
        $proyecto->descripcion = $request->input('descripcion');

        if($request->file('imagen')){
            $file = $request->file('imagen');
            $nombre = 'proyecto'.$proyecto->id;
            Storage::put('proyectos/logos/'.$nombre, \File::get($file));
            $proyecto->url_logo = $nombre;
            $proyecto->save();   
        }
        else{
            $proyecto->save();  
        }
        return redirect('becario/proyectos/'.$proyecto->id.'/edit');
    }


    public function subir_recursos($id,RecursosRequest $request){
        $proyecto = Proyecto::find($id);
        $infografia = Proyecto_archivo::where('url_archivo','infografia'.$proyecto->id)->first();
        $presentacion = Proyecto_archivo::where('url_archivo','presentacion'.$proyecto->id)->first();
        $plan = Proyecto_archivo::where('url_archivo','plan'.$proyecto->id)->first();
        $extra = Proyecto_archivo::where('url_archivo','extra'.$proyecto->id)->first();


        if($request->file('infografia')){
            $a_i = $request->file('infografia');
            $e_i = $request->file('infografia')->getClientOriginalExtension();
            $n_i = 'infografia'.$proyecto->id.'.'.$e_i;
            Storage::put('proyectos/recursos/'.$n_i, \File::get($a_i));
            $infografia->url_archivo = $n_i;
            $infografia->nombre = 'infografía';  
            $infografia->save();   
        }

        if($request->file('presentacion')){
            $a_p = $request->file('presentacion');
            $e_p = $request->file('presentacion')->getClientOriginalExtension();
            $n_p = 'presentacion'.$proyecto->id.'.'.$e_p;
            Storage::put('proyectos/recursos/'.$n_p, \File::get($a_p));
            $presentacion->url_archivo = $n_p;
            $presentacion->nombre = 'presentación';
            $presentacion->save();   
        }

        if($request->file('plan')){
            $a_l = $request->file('plan');
            $e_l = $request->file('plan')->getClientOriginalExtension();
            $n_l = 'plan'.$proyecto->id.'.'.$e_l;
            Storage::put('proyectos/recursos/'.$n_l, \File::get($a_l));
            $plan->url_archivo = $n_l;
            $plan->nombre = 'plan';
            $plan->save();   
        }

        if($request->file('extra')){
            $a_e = $request->file('extra');
            $e_e = $request->file('extra')->getClientOriginalExtension();
            $n_e = 'extra'.$proyecto->id.'.'.$e_e;
            Storage::put('proyectos/recursos/'.$n_e, \File::get($a_e));
            $extra->url_archivo = $n_e;
            $extra->nombre = 'extra';
            $extra->save();   
        }

        return redirect('becario/proyectos/'.$proyecto->id.'/edit');
    }


public function agregar_integrantes($id,Request $request){
        $proyecto = Proyecto::find($id);
        //0$int = $proyecto->integrantes;
        $entradas = count($request->all());
        for ($i=0; $i < $entradas; $i++) {
            if ($request->input('integrante'.($proyecto->integrantes+($i+1)))) {
                
                //Busca al usuario en la tabla User
                $user = User::where('carso',$request->input('integrante'.($proyecto->integrantes+($i+1))))->firstOrFail();
                //crea el nuevo integrante con las relaciones
                $int = $proyecto->integrantes;
                $integrante[$i] = new BP();
                $integrante[$i]->proyecto_id = $proyecto->id;
                $integrante[$i]->becario_id = $user->becario->id;
                $integrante[$i]->save();
                
                //Aumenta el contador de integrantes
                $proyecto->integrantes = $int +1;
                $proyecto->save();
             } 
        }
        return redirect('becario/proyectos/'.$proyecto->id.'/edit');
    }

////////////////EVALUAICIONES

    public function mis_tareas(){
        $user = Auth::user();
        $becario = Becario::where('user_id',$user->id)->first();
        $activa = Evaluacion::where('becario_id',$becario->id)
                                ->where('activa',1)
                            ->first();
        if($activa){
             return view('Becario/Evaluacion/tareas',compact('activa'));
        }
        else{
            $activa = false;
            return view('Becario/Evaluacion/tareas',compact('activa'));
        }
    }

    public function subir_tarea(TareaRequest $request){
        $h = $request->input('horas');
        $m = $request->input('minutos');
        $tarea = new Tarea();
        $tarea->evaluacion_id = $request->input('evaluacion_id');
        $tarea->tarea = $request->input('tarea');
        $tarea->proyecto = $request->input('proyecto');
        $tarea->tipo = $request->input('tipo');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->horas = $h.':'.$m;
        $tarea->save();
        return redirect('becario/evaluacion/mis_tareas');
    }

    public function mis_proyectos(){
        $user = Auth::user();
        $becario = Becario::where('user_id',$user->id)->first();
        return view('Becario/Evaluacion/proyectos',compact('user','becario'));
    }

    public function proyecto_integrantes($id){
        $user = Auth::user();
        $proyecto = Proyecto::find($id);
        return view('Becario/Evaluacion/integrantes',compact('user','proyecto'));
    }

    public function preguntas($p,$i){
        $id_proyecto = $p;
        $integrante = Becario::find($i);
        return view('Becario/Evaluacion/preguntas',compact('id_proyecto','integrante'));        
    }

    public function calificar($p,$i,Request $request){
        $id_proyecto = $p;
        $integrante = Becario::find($i);
        $activa = Evaluacion::where('becario_id',$integrante->id)
                                ->where('activa',1)
                            ->first();
        $c = $activa->constancia;
        $p = $activa->puntualidad;
        $cl = $activa->colaboracion;
        $pr = $activa->proactividad;
        $e = $activa->ensenanza;
        $po = $activa->popularidad;
        $me = $activa->me_evaluo;

        $activa->constancia = $c + $request->input('constancia');
        $activa->puntualidad = $p + $request->input('puntualidad');
        $activa->colaboracion = $cl + $request->input('colaboracion');
        $activa->proactividad = $pr + $request->input('proactividad');
        $activa->ensenanza = $e + $request->input('ensenanza');
        $activa->popularidad = $po + $request->input('popularidad');
        $activa->me_evaluo = $me + 1;
        $activa->save();

        return redirect('becario/evaluacion/mis_proyectos/'.$id_proyecto);
    }
}
