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
use App\Http\Requests\NuevoProyectoRequest;
use App\Http\Requests\NuevoBecarioRequest;
use App\Http\Requests\BajaBecarioRequest;
use App\Http\Requests\RecursosRequest;
use App\Http\Requests\LaborRequest;
use App\Http\Requests\NoticiaRequest;
use App\Http\Requests\EquipoRequest;
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
//Rekacion Becario / Equipo
use App\BE;
// EVALUACIONES
use App\Evaluacion;
use App\Tarea;
//Sin relaicon
use App\Recurso;
use App\Labor;
use App\Noticia;
use App\Equipo;
use App\Proyecto;
use App\Proyecto_archivo;
use Storage;
use Carbon\Carbon;
//use DB;
//
//
//
//
class AdministradorController extends Controller
{
    //
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $user = Auth::user();
        // :::::::::::  Becarios  :::::::::::
        $becarios = User::where('rol','becario')->get();
        $activos = User::where('rol','becario')
                        ->where('activo','1')
                        ->get();
        $mujeres=Becario::where('genero','femenino')->get();
        $hombres=Becario::where('genero','masculino')->get();
        $total = count($becarios);
        $a = count($activos);
        $m = (count($mujeres)*100)/$a;
        $h = (count($hombres)*100)/$a;
        $s= (count(Becario::where('area','software')->get())*100)/$a;
        $ha= (count(Becario::where('area','hardware')->get())*100)/$a;
        $d= (count(Becario::where('area','diseño')->get())*100)/$a;
        $so= (count(Becario::where('area','social')->get())*100)/$a;

        // :::::::::::  Proyectos  :::::::::::
        $tp = count(Proyecto::all());
        $pa =count(Proyecto::whereBetween('progreso',[1,99])->get());
        $pt = count(Proyecto::where('progreso','100')->get());
        return view('Admin/index',compact('user','total','a','m','h','s','ha','d','so','tp','pa','pt'));
    }

// :::::::::::  Contenidos  :::::::::::

    public function contenidos(){
        $user = Auth::user();
        $recursos = Recurso::all();
        $labores = Labor::all();
        $equipos = Equipo::all();
        $noticias = Noticia::all();
        return view('Admin/Contenido/index',compact('recursos','labores','equipos','noticias'));
    }


    public function agregar_recurso(RecursosRequest $request){
        $recurso = new Recurso();
        $recurso->nombre = $request->input('nombre');

        $file = $request->file('archivo');
        $extension = $request->file('archivo')->getClientOriginalExtension();
        $nombre = $request->input('nombre').'.'.$extension;
        Storage::put('recursos/'.$nombre, \File::get($file));
        $recurso->url_recurso = $nombre;
        $recurso->save();

        return redirect('admin/contenido');
    }

    public function agregar_tarea(LaborRequest $request){
        $labor = new Labor();
        $labor->nombre = $request->input('nombre');
        $labor->link = $request->input('link');
        $labor->descripcion = $request->input('descripcion');
        $labor->save();

        return redirect('admin/contenido');
    }


    public function agregar_noticia(NoticiaRequest $request){
        $noticia = new Noticia();
        $noticia->titulo = $request->input('titulo');
        $noticia->link = $request->input('link');
        $noticia->descripcion = $request->input('text');

        $file = $request->file('file-1');
        $extension = $request->file('file-1')->getClientOriginalExtension();
        $nombre = $request->input('titulo').'.'.$extension;
        Storage::put('noticias/'.$nombre, \File::get($file));
        $noticia->url_noticia = $nombre;
        $noticia->save();


        return redirect('admin/contenido');

    }

    public function agregar_equipo(EquipoRequest $request){
        $equipo = new Equipo();
        $equipo->equipo = $request->input('equipo');
        $equipo->serie = $request->input('serie');
        $equipo->ano = $request->input('ano');
        $equipo->save();

        return redirect('admin/contenido');
    }

//////Lsita Becarios
    public function list_becarios(){
        $user = Auth::user();
        $users = User::all();
        return view('Admin/Becario/list_becarios',compact('user','users'));
    }
    public function show_becario($id){
        $user = Auth::user();
        $becario = Becario::find($id);
        $activa = Evaluacion::where('becario_id',$becario->id)
                                ->where('activa',1)
                            ->first();
        return view('Admin/Becario/show_becario',compact('user','becario','activa'));
    }

    public function alta_becario(NuevoBecarioRequest $request){
        $usuario = new User();
       $usuario->carso = $request->input('carso');
       $usuario->activo = '1';
       $usuario->rol = 'becario';
       //$usuario->activo = $request->input('activo');
       // $usuario->rol = $request->input('rol');
       $usuario->password = bcrypt($request->input('carso'));
       $usuario->save();
       //crear becario
       $becario = new Becario();
       // Trabajando con la fecha actual
      $date = Carbon::now();
      $becario->user_id = $usuario->id;
      $becario->nombres = $request->input('nombres');
      $becario->apellido_p = $request->input('apellido_p');
      $becario->apellido_m = $request->input('apellido_m');
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
      //crear evaluaciones
      //checar como se va a crwear
      $evaluacion = new Evaluacion();
      $evaluacion->becario_id = $becario->id;
      $evaluacion->start =$date->toDateString();
      //Checar este pdo!!
      $futuro = $date->addDays(15);
      //
      $evaluacion->end = $futuro->toDateString();
      $evaluacion->activa = '1';
      $evaluacion->save();
      return redirect('admin/becarios');
    }

    public function editar_becario($id){
        $user = Auth::user();
        $becario = Becario::find($id);
        $direccion = Direccion::where('becario_id',$becario->id)->first();
        $emergencia = Emergencia::where('becario_id',$becario->id)->first();
        $academica = Academica::where('becario_id',$becario->id)->first();
        $habilidad = Habilidad::where('becario_id',$becario->id)->first();
        return view('Admin/Becario/edit_becario',compact('user','becario','direccion','emergencia','academica','habilidad'));
    }

    ////
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
        return redirect('admin/becarios/'.$becario->id.'/editar');
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

        return redirect('admin/becarios/'.$direccion->becario_id.'/editar');
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

        return redirect('admin/becarios/'.$emergencia->becario_id.'/editar');
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

        return redirect('admin/becarios/'.$academica->becario_id.'/editar');
    }

    public function edit_h(HabilidadRequest $request){
        $id = $request->input('id_habilidad');
        $habilidad = Habilidad::find($id);
        //Se modifican los datos
        $habilidad->habilidad = $request->input('habilidad');
        $habilidad->save();  

        return redirect('admin/becarios/'.$habilidad->becario_id.'/editar');
    }

    public function edit_p(CambioRequest $request){
        $id = $request->input('usuario');
        $usuario = User::find($id);
        //Se modifican los datos
        $usuario->password = bcrypt($request->input('password'));
       $usuario->save(); 

        return redirect('admin/becarios/'.$usuario->becario->id.'/editar');
    }
    ////
    public function baja_becario(BajaBecarioRequest $request){
        $date = Carbon::now();
        $user = User::where('carso',$request->input('carso'))->firstOrFail();
        $user->activo = '0';
        $becario = Becario::find($user->id);
        $becario->fecha_egreso = $date->toDateString();
        $user->save();
        $becario->save();
        return redirect('admin/becarios');
    }

//////PROYECTOSSS
    public function list_proyectos(){
        $user = Auth::user();
        $proyectos = Proyecto::all();
        $ctin = Proyecto::where('tipo','CTIN')->get();
        $carso = Proyecto::where('tipo','Carso')->get();
        $operacion = Proyecto::where('tipo','Operación CTIN')->get();
        //$becario = with('emergencia','direccion','academicas','habilidades');
        return view('Admin/Proyecto/index',compact('user','proyectos','ctin','carso','operacion'));

    }

     public function show_proyecto($id){
        $user = Auth::user();
        $proyecto = Proyecto::find($id);
        return view('Admin/Proyecto/show_proyecto',compact('user','proyecto'));
    }
    public function alta_proyecto(NuevoProyectoRequest $request){
        
        if($request){
            $date = Carbon::now();
            $proyecto = new Proyecto();
            $in = $request->input('integrante');
            $proyecto->nombre = $request->input('proyecto');
            $proyecto->url_logo = 'project.png';
            $proyecto->max_integrantes = $request->input('maximo');
            $proyecto->tipo = $request->input('tipo');
            $proyecto->area = $request->input('area');
            $proyecto->start = $date->toDateString();
            $proyecto->save();
            //Busca al usuario en la tabla User
            $user = User::where('carso',$in)->firstOrFail();
            //crea el nuevo integrante con las relaciones
            $int = $proyecto->integrantes;
            $integrante = new BP();
            $integrante->proyecto_id = $proyecto->id;
            $integrante->becario_id = $user->becario->id;
            $integrante->save();
                
            //Aumenta el contador de integrantes
            $proyecto->integrantes = $int +1;
            $proyecto->save();

            //crear los recursos
            $infografia = new Proyecto_archivo();
            $infografia->proyecto_id = $proyecto->id;
            $infografia->url_archivo = 'infografia'.$proyecto->id;
            $infografia->save();
            $presentacion = new Proyecto_archivo();
            $presentacion->proyecto_id = $proyecto->id;
            $presentacion->url_archivo = 'presentacion'.$proyecto->id;
            $presentacion->save();            
            $plan = new Proyecto_archivo();
            $plan->proyecto_id = $proyecto->id;
            $plan->url_archivo = 'plan'.$proyecto->id;
            $plan->save();
            $extra = new Proyecto_archivo();
            $extra->proyecto_id = $proyecto->id;
            $extra->url_archivo = 'extra'.$proyecto->id;
            $extra->save();

        }
        return redirect('admin/proyectos');
    }


    public function edit_proyecto($id){
        $user = Auth::user();
        $proyecto = Proyecto::find($id);
        return view('Admin/Proyecto/edit_proyecto',compact('user','proyecto'));
    }

    public function update_proyecto($id,UpdateProyectoRequest $request){
        $proyecto = Proyecto::find($id);
        $proyecto->nombre = $request->input('nombre');
        $proyecto->progreso = $request->input('progreso');
        $proyecto->tipo = $request->input('tipo');
        $proyecto->area = $request->input('area');
        $proyecto->start = $request->input('start');
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
        return redirect('admin/proyectos/'.$proyecto->id.'/edit');
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

        return redirect('admin/proyectos/'.$proyecto->id.'/edit');
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
        return redirect('admin/proyectos/'.$proyecto->id.'/edit');
    }


    public function quitar_integrante($p,$b){
        $proyecto = Proyecto::find($p);
        $relacion = BP::where('becario_id',$b)
                    ->where('proyecto_id',$p)
                            ->first();
        $relacion->delete();
        $int = $proyecto->integrantes;
        $proyecto->integrantes = $int - 1;
        $proyecto->save();
        return redirect('admin/proyectos/'.$proyecto->id.'/edit');
    }
}
