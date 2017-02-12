<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;


use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;

use Mundocente\Lugar;
use Mundocente\Institucion;
use Mundocente\Tema;
use Mundocente\Tema_Notificacion;

class HomeController extends Controller
{



    public function __construct(){
        $this->middleware('auth', ['only' => ['editarmiperfil', 'publicarconvocatoria', 'publicarrevista' ,'publicarinvitacion', 'publicarevento','verdetallesConvocatoria', 'verdetallesEvento', 'verdetallesrevista', 'verdetallesSolicitud']]);

    }



    public function find(Route $route){
        $this->notFount($this->route);
    }
    /**
     * Nos lleva al landingpage/index de la aplicación 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if (Auth::check()) {
            return Redirect::to('publicaciones');
        }else{

            $this->verifyCookies();

            return view('home');
        }
        
    }



public function verifyCookies(){
    if((isset($_COOKIE["email_cookie"]))||(isset($_COOKIE["pass_cookie"]))){
            if(Auth::attempt(['email'=>$_COOKIE["email_cookie"], 'password'=> $_COOKIE["pass_cookie"]])){
           return Redirect::to('publicaciones');
       }

    }
}




public function verdetallesConvocatoria(){
    return view('details.detalles-convocatoria');
}

public function verdetallesEvento(){
    return view('details.detalles-evento');
}

public function verdetallesrevista(){
    return view('details.detalles-revista');
}
public function verdetallesSolicitud(){
    return view('details.detalles-solicitud');
}

    
public function callLocationCountry(){
    return DB::table('lugars')->where('type_lugar','country')->get();
}

public function callLargesAreasTheme(){
    return DB::table('temas')->where('type_theme', 'gran_area')->get();
}
public function callInstitutionMy(){
    return DB::table('vinculacions')
            ->join('institucions', 'vinculacions.id_institution_fk', '=', 'institucions.id_institution')
            ->join('users', 'vinculacions.id_user_fk', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->select('institucions.*')
            ->get();
}



/**
     * Nos lleva al formulario para editar mi perfils
     *
     * @return \Illuminate\Http\Response
     */
    public function editarmiperfil()
    {
       

       $lugares = $this->callLocationCountry();
        
        $gran_areas = $this->callLargesAreasTheme();

        $gran_areas_de_formacion = DB::table('areas_formacions')
            ->join('temas', 'areas_formacions.id_theme_fk', '=', 'temas.id_tema')
            ->join('users', 'areas_formacions.id_user_fk', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->where('temas.type_theme', 'gran_area')
            ->select('temas.*', 'areas_formacions.*')
            ->get();

         $areas_de_formacion = DB::table('areas_formacions')
            ->join('temas', 'areas_formacions.id_theme_fk', '=', 'temas.id_tema')
            ->join('users', 'areas_formacions.id_user_fk', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->where('temas.type_theme', 'area')
            ->select('temas.*', 'areas_formacions.*')
            ->get();


        $disciplina_de_formacion = DB::table('areas_formacions')
            ->join('temas', 'areas_formacions.id_theme_fk', '=', 'temas.id_tema')
            ->join('users', 'areas_formacions.id_user_fk', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->where('temas.type_theme', 'disciplina')
            ->select('temas.*', 'areas_formacions.*')
            ->get();












        $gran_areas_de_interes = DB::table('areas_interes')
            ->join('temas', 'areas_interes.id_theme_fk', '=', 'temas.id_tema')
            ->join('users', 'areas_interes.id_user_fk', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->where('temas.type_theme', 'gran_area')
            ->select('temas.*', 'areas_interes.*')
            ->get();

         $areas_de_interes = DB::table('areas_interes')
            ->join('temas', 'areas_interes.id_theme_fk', '=', 'temas.id_tema')
            ->join('users', 'areas_interes.id_user_fk', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->where('temas.type_theme', 'area')
            ->select('temas.*', 'areas_interes.*')
            ->get();


        $disciplina_de_interes = DB::table('areas_interes')
            ->join('temas', 'areas_interes.id_theme_fk', '=', 'temas.id_tema')
            ->join('users', 'areas_interes.id_user_fk', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->where('temas.type_theme', 'disciplina')
            ->select('temas.*', 'areas_interes.*')
            ->get();


        $institucionesVinvulado = DB::table('vinculacions')
            ->join('institucions', 'vinculacions.id_institution_fk', '=', 'institucions.id_institution')
            ->join('users', 'vinculacions.id_user_fk', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->select('institucions.*')
            ->get();


         $recibonotifide = DB::table('tema__notificacions')
         ->select('id_type_publications', 'name_theme_notifications')
         ->get();

         $milista_notificacion_recibe = DB::table('tema_notificacion_usuarios')
         ->where('id_user_fk', Auth::user()->id)
         ->select('id_type_notifications_fk')
         ->get();


            return view('formularios.formulariousuario', compact('lugares', 'gran_areas', 'gran_areas_de_formacion', 'areas_de_formacion', 'disciplina_de_formacion', 'gran_areas_de_interes', 'areas_de_interes', 'disciplina_de_interes', 'institucionesVinvulado', 'recibonotifide', 'milista_notificacion_recibe'));
    }






 /**
     * Llama las ciudades del país selccionado
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerCiudades(Request $request, $id_pais){
        if($request->ajax()){
            $ciudades = Lugar::mostrarCiudades($id_pais);
            return response()->json($ciudades);
        }
    }



     /**
     * Llama a los temas gran_areas
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerArea(Request $request, $id_gran_area){
        if($request->ajax()){
            $areas = Tema::mostrarAreas($id_gran_area);
            return response()->json($areas);
        }
    }


    public function obtenerUniversidades(Request $request, $id_city){
         if($request->ajax()){
            $institution = Institucion::mostrarinstitution($id_city);
            return response()->json($institution);
        }
    }


    public function obtenerPaisYCiudadConInstitucion(Request $request, $id_institution){
        if($request->ajax()){
            $lugar = Lugar::mostrarPaisyCiudad($id_institution);
            return response()->json($lugar);
        }
    }

 /**
     * Nos lleva al formulario para logueo
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if (Auth::check()) {
            return Redirect::to('publicaciones');
        }else{
            $this->verifyCookies();
             return view('login');
        }
       
    }



     /**
     * Nos lleva a la página de registro 
     *
     * @return \Illuminate\Http\Response
     */
    public function registrar()
    {
         if (Auth::check()) {
            return Redirect::to('publicaciones');
        }else{
            $this->verifyCookies();
             return view('registro', ['existe' => '0']);
        }
        
    }












 /**
     * Nos lleva a la página de publicar convocatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function publicarconvocatoria()
    {


        $institucionesVinvulado = $this->callInstitutionMy();

            $gran_areas = $this->callLargesAreasTheme();

            $lugares = $this->callLocationCountry();

            


        return view('formularios.formularioconvocatoria', compact('lugares', 'institucionesVinvulado', 'gran_areas'));
    }


     /**
     * Nos lleva a la página de publicar convocatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function publicarrevista()
    {
         $institucionesVinvulado = $this->callInstitutionMy();

            $gran_areas = $this->callLargesAreasTheme();

            $lugares = $this->callLocationCountry();

            $indexpaper = DB::table('indices')->get();
            $clasificationpaper = DB::table('nivels')->get();

            $quantityIndex = DB::table('indices')->count();


        return view('formularios.formulariorevista', compact('lugares', 'institucionesVinvulado', 'gran_areas', 'indexpaper', 'clasificationpaper'), ['quantityIndex' => $quantityIndex]);

        
    }




     /**
     * Nos lleva a la página de publicar convocatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function publicarSolicitud()
    {
        $institucionesVinvulado = $this->callInstitutionMy();

            $gran_areas = $this->callLargesAreasTheme();

            $lugares = $this->callLocationCountry();

            


        return view('formularios.formulario-solicitud', compact('lugares', 'institucionesVinvulado', 'gran_areas'));
        
    }



     /**
     * Nos lleva a la página de publicar convocatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function publicarevento()
    {
         $institucionesVinvulado = $this->callInstitutionMy();

            $gran_areas = $this->callLargesAreasTheme();

            $lugares = $this->callLocationCountry();

            


        return view('formularios.formularioevento', compact('lugares', 'institucionesVinvulado', 'gran_areas'));
        
        
    }

   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
