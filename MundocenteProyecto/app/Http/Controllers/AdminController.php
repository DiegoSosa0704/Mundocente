<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Redirect;
use Mundocente\Lugar;
use Mundocente\Institucion;
use Auth;

use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;

class AdminController extends Controller
{





    public function __construct(){
         if((isset($_COOKIE["email_cookie"]))||(isset($_COOKIE["pass_cookie"]))){
            if(Auth::attempt(['email'=>$_COOKIE["email_cookie"], 'password'=> $_COOKIE["pass_cookie"]])){
                return Redirect::to('publicaciones');
            }
        }
        $this->middleware('auth', ['only' => ['index','mainAdmin', 'administradorlugares', 'administradorinstituciones', 'administradorindices', 'administradorusuarios', 'administradorpublicaciones', 'agregarNuevoLugarPais', 'agregarNuevoLugarCiudad', 'editarNuevoLugarPais', 'editarNuevoLugarCiudad', 'obtienePaisEditar', 'agregarNuevaInstitucion']]);
        global $porciones;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }


    //Se le manda toda la información de toda la base de datos
    public function mainAdmin(){
        return view('main.main-admin');
    }

    public function administradorlugares(){
        return view('admin.lugares-administracion');
    }


    public function administradorinstituciones(){
        return view('admin.instituciones-administracion');
    }


    public function administradorindices(){
        return view('admin.indices-administracion');
    }


    public function administradorusuarios(){
        return view('admin.usuarios-administracion');
    }

    public function administradorpublicaciones(){
        return view('admin.publicaciones-administracion');
    }


    function obtienePaisEditar($id_city){
        $country = DB::select('select p.id_lugar, p.name_lugar from lugars p, lugars c where c.id_lugar_fk=p.id_lugar and c.id_lugar='.$id_city);
         return response()->json($country);
        
    }

//crea un nuevo lugar pais
    public function agregarNuevoLugarPais(Request $request){
        if($request->ajax()){
            Lugar::create([
                'name_lugar' => $request['nombre_lugar_nuevo'],
                'type_lugar' => 'country',
            ]);

            $lugar_last= Lugar::all();
            $id_lugar_last_return = $lugar_last->last()->id_publication;

            $pais = array("nombre" => $request['nombre_lugar_nuevo'],"tipo" => "País", "id_l" => $id_lugar_last_return);

            return $pais;
        }
    }


//crea un nuevo lugar ciudad
    public function agregarNuevoLugarCiudad(Request $request){
        if($request->ajax()){
            Lugar::create([
                'name_lugar' => $request['nombre_lugar_nuevo'],
                'type_lugar' => 'city',
                'id_lugar_fk' =>  $request['id_country_new'],
            ]);
            $lugar_last= Lugar::all();
            $id_lugar_last_return = $lugar_last->last()->id_publication;

            $pais = array("nombre" => $request['nombre_lugar_nuevo'],"tipo" => "Ciudad", "id_l" => $id_lugar_last_return);

            return $pais;
        }
    }



    //crea un nuevo lugar pais
    public function editarNuevoLugarPais(Request $request){
        if($request->ajax()){
            DB::table('lugars')
                ->where('id_lugar', $request['id_l'])
                ->update([
                'type_lugar' => 'country',
                'name_lugar' => $request['nombre_lugar_nuevo'],
                'id_lugar_fk' => null,
            ]);
            $pais = array("nombre" => $request['nombre_lugar_nuevo'],"tipo" => "País",);

            return $pais;
        }
    }


//crea un nuevo lugar ciudad
    public function editarNuevoLugarCiudad(Request $request){
        if($request->ajax()){
            DB::table('lugars')
                ->where('id_lugar', $request['id_l'])
                ->update([
                'name_lugar' => $request['nombre_lugar_nuevo'],
                'type_lugar' => 'city',
                'id_lugar_fk' =>  $request['id_country_new'],
            ]);
            $pais = array("nombre" => $request['nombre_lugar_nuevo'],"tipo" => "Ciudad",);

            return $pais;
        }
    }






//crea un nuevo lugar ciudad
    public function agregarNuevaInstitucion(Request $request){
        if($request->ajax()){
            Institucion::create([
                'name_institution' => $request['nombre_i'],
                'sector_institution' => $request['sector_i'],
                'telephone_institution' =>  $request['tele_i'],
                'id_lugar_fk' =>  $request['id_l'],
                'state_institution' =>  'activo',
            ]);
            $lugar_last= Institucion::all();
            $id_lugar_last_return = $lugar_last->last()->id_institution;

            $name_lugar = DB::table('lugars')->where('id_lugar', $request['id_l'])->get();

            foreach ($name_lugar as $lugar) {
                 $institution = array("nombre" => $request['nombre_i'], "telefono" => $request['tele_i'],"sector" => $request['sector_i'], "estado" => "activo", 'id_ins' => $id_lugar_last_return, "lugar_nombre" => $lugar->name_lugar);
            }
           

            return $institution;
        }
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
