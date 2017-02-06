<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;


use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;

use Mundocente\Lugar;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['only' => ['editarmiperfil', 'publications', 'publicarconvocatoria', 'publicarrevista' ,'publicarinvitacion', 'publicarevento']]);
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
        return view('home');
    }

/**
     * Nos lleva al formulario para editar mi perfils
     *
     * @return \Illuminate\Http\Response
     */
    public function editarmiperfil()
    {
        $lugares = Lugar::lists('name_lugar', 'id_lugar', 'type_lugar', 'id_lugar_fk');
        return view('formularios.formulariousuario', compact('lugares'));
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
     * Nos lleva al formulario para logueo
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login');
    }



     /**
     * Nos lleva a la página de registro 
     *
     * @return \Illuminate\Http\Response
     */
    public function registrar()
    {
        return view('registro', ['existe' => '0']);
    }




 /**
     * Nos lleva a la página de publicaciones
     *
     * @return \Illuminate\Http\Response
     */
    public function publications()
    {
        
            if(Auth::user()->email==''){
                Auth::logout();
                return Redirect::to('userExist');
            }else{
                return view('main.publication');
            }

        
    }




 /**
     * Nos lleva a la página de publicar convocatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function publicarconvocatoria()
    {
        return view('formularios.formularioconvocatoria');
    }


     /**
     * Nos lleva a la página de publicar convocatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function publicarrevista()
    {
        return view('formularios.formulariorevista');
    }




     /**
     * Nos lleva a la página de publicar convocatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function publicarSolicitud()
    {
        return view('formularios.formulario-solicitud');
    }



     /**
     * Nos lleva a la página de publicar convocatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function publicarevento()
    {
        return view('formularios.formularioevento');
    }

    /**
     * Nos lleva a la página de publicar convocatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function showResult()
    {
        return view('result');
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
