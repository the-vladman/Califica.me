<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// Se agrega Auth y User
use App\User;
use App\Becario;
use Auth;
//use DB;

class BecarioController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
        //$becario = DB::table('becarios')->where('user_id',$user->id)->first();
        return view('Becario/index',compact('user'));
    }

    public function my_perfil(){
        $user = Auth::user();
        $becario = Becario::where('user_id',$user->id)->first();
        //$becario = with('emergencia','direccion','academicas','habilidades');
        return view('Becario/perfil',compact('user','becario'));
    }
}
