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
        $this->middleware('auth', ['only' => ['index','mainAdmin', 'administradorlugares', 'administradorinstituciones', 'administradorindices', 'administradorusuarios', 'administradorpublicaciones', 'agregarNuevoLugarPais', 'agregarNuevoLugarCiudad', 'editarNuevoLugarPais', 'editarNuevoLugarCiudad', 'obtienePaisEditar', 'agregarNuevaInstitucion', 'editarInstitucion']]);
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
        $lugares = DB::table('lugars')
                ->orderBy('name_lugar', 'asc')
                ->paginate(20);

        $paises = DB::table('lugars')->where('type_lugar', 'country')->get();
        return view('admin.lugares-administracion', compact('lugares', 'paises'));
    }


    public function administradorinstituciones(){
        $instituciones = DB::table('institucions')
        ->orderBy('name_institution', 'asc')
        ->paginate(20);
        $ciudades = DB::table('lugars')->where('type_lugar', 'city')->get();
        return view('admin.instituciones-administracion', compact('instituciones', 'ciudades'));
    }


    public function administradorindices(){
        $niveles = DB::table('nivels')
        ->join('indices','nivels.id_index_fk','=','indices.id_index')
        ->paginate(20);
        return view('admin.indices-administracion', compact('niveles'));
    }


    public function administradorusuarios(){
        return view('admin.usuarios-administracion');
    }










    public function administradorpublicaciones(){
        $publication_recomendation = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('users', 'publicacions.id_user_fk', '=', 'users.id')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->select('publicacions.*', 'institucions.*', 'tema__notificacions.*', 'lugars.*', 'users.*')
                        ->distinct()
                        ->paginate(30);
        return view('admin.publicaciones-administracion', compact('publication_recomendation'));
    }


public function adminsitradorPublicacionesFiltros(Request $request){
       $publication_recomendation = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('users', 'publicacions.id_user_fk', '=', 'users.id')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->where('publicacions.title_publication', 'like', '%'.$request['palabra'].'%')
                        ->select('publicacions.*', 'institucions.*', 'tema__notificacions.*', 'lugars.*', 'users.*')
                        ->distinct()
                        ->paginate(30);
        return view('admin.publicaciones-administracion', compact('publication_recomendation'));
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
                'setor_institution' => $request['sector_i'],
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



    //método que edita una institución
    public function editarInstitucion(Request $request){
        if($request->ajax()){
             DB::table('institucions')
                ->where('id_institution', $request['id_i'])
                ->update([
                'name_institution' => $request['name_i'],
                'id_lugar_fk' => $request['id_lugar'],
                'setor_institution' =>  $request['sector_in'],
                'telephone_institution' =>  $request['phone_i'],
                'state_institution' =>  $request['state_i'],
            ]);
                return 0;
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
