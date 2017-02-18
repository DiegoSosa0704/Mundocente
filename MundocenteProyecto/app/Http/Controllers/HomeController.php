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
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{



    public function __construct(){
        $this->middleware('auth', ['only' => ['editarmiperfil', 'publicarconvocatoria', 'publicarrevista' ,'publicarinvitacion', 'publicarevento','verdetallesConvocatoria', 'verdetallesEvento', 'verdetallesrevista', 'verdetallesSolicitud', 'mostrarmiperfil', 'mostrarmispublicacionesfavoritas', 'mostrarinteresados']]);

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








//muestra mi perfil y mis publicaciones
    public function mostrarmiperfil(){

        $institucionesVinvulado = $this->mispublicaciones();

         $listPublications = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->where('id_user_fk', Auth::user()->id)
                        ->select('publicacions.*', 'institucions.*', 'tema__notificacions.*', 'lugars.*')
                        ->orderBy('publicacions.created_at', 'desc')
                        ->paginate(30);


                        //dd($listPublications);

        return view('perfil.mi-perfil', compact('listPublications', 'institucionesVinvulado'));
    }













//muestra mis publicaciones favoritas
    public function mostrarmispublicacionesfavoritas(){
          

        
          $lista_publicaciones_favoritas = DB::table('favoritos')
        ->where('favoritos.id_user_fk', Auth::user()->id)
        ->get();

       $listResultArrayRecomendation = array();
       foreach ($lista_publicaciones_favoritas as $id_publi) {
            $publication_recomendation = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                        ->select('publicacions.*', 'institucions.*', 'tema__notificacions.*', 'lugars.*')
                        ->distinct()
                        ->get();
                $listResultArrayRecomendation = array_merge($publication_recomendation, $listResultArrayRecomendation);
                
        }


         
            
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $collection = new Collection($listResultArrayRecomendation);
        

        
        $perPage = 15;

        
        $currentPageSearchResults = $collection->slice (($currentPage - 1) * $perPage, $perPage) -> all ();

        
          $listPublications = new LengthAwarePaginator(
            $currentPageSearchResults,
            count($collection),
            $perPage,
            Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath()]
            );
          //dd($listPublications);
            

        return view('perfil.mis-publicaciones-guardadas', compact('listPublications'));
    }











//muestra interesados en mis publicaciones
    public function mostrarinteresados(){

        DB::table('notifications')->where('id_user_notification', Auth::user()->id)->delete();

        $lista_interesados = DB::table('interesados')
                        ->join('publicacions', 'interesados.id_publication_fk', '=', 'publicacions.id_publication')
                        ->join('users', 'interesados.id_user_fk', '=', 'users.id')
                        ->where('publicacions.id_user_fk', Auth::user()->id)
                        ->select('publicacions.id_publication', 'publicacions.title_publication', 'users.name', 'users.photo_url', 'users.id')
                        ->orderBy('interesados.created_at', 'desc')
                        ->paginate(20);


        $lista_denuncias = DB::table('denuncias')
                        ->join('publicacions', 'denuncias.id_publication_fk', '=', 'publicacions.id_publication')
                        ->join('users', 'denuncias.id_user_fk', '=', 'users.id')
                        ->where('publicacions.id_user_fk', Auth::user()->id)
                        ->select('publicacions.id_publication', 'publicacions.title_publication', 'users.name', 'users.photo_url', 'users.id')
                        ->orderBy('denuncias.created_at', 'desc')
                        ->paginate(20);

        return view('perfil.lista-interesados', compact('lista_interesados', 'lista_denuncias'));
    }















public function verifyCookies(){
    if((isset($_COOKIE["email_cookie"]))||(isset($_COOKIE["pass_cookie"]))){
            if(Auth::attempt(['email'=>$_COOKIE["email_cookie"], 'password'=> $_COOKIE["pass_cookie"]])){
           return Redirect::to('publicaciones');
       }

    }
}




public function verdetallesConvocatoria(Request $request){
    if($request->ajax()){
        $publication_interest = DB::table('publicacions')
                            ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                            ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                            ->where('publicacions.id_publication', $request['id_publication_details'])
                            ->select('publicacions.*', 'institucions.*', 'tema__notificacions.*')
                            ->get();
        return view('details.detalles-convocatoria', compact('publication_interest'));
    }
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
    return DB::table('temas')->where('type_theme', 'disciplina')->select('temas.*')->get();
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
        

       

$areas_all = DB::table('temas')->where('type_theme', 'disciplina')->get();


        $disciplina_de_formacion = DB::table('areas_formacions')
            ->join('temas', 'areas_formacions.id_theme_fk', '=', 'temas.id_tema')
            ->join('users', 'areas_formacions.id_user_fk', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->where('temas.type_theme', 'disciplina')
            ->select('temas.id_tema')
            ->get();

        $listaAreaFormation = array();

        foreach ($disciplina_de_formacion as $area_formation) {
            $areas = DB::select('select ag.id_tema as id_tema_gran, aa.id_tema as id_tema_area, ad.id_tema as id_tema_disciplina, ag.name_theme as name_tema_gran, aa.name_theme as name_tema_area, ad.name_theme as name_tema_disciplina from temas ag, temas aa, temas ad where ad.id_tema_area=aa.id_tema and aa.id_tema_area=ag.id_tema and ad.id_tema='.$area_formation->id_tema);
                $listaAreaFormation = array_merge($areas, $listaAreaFormation);
        }



        $disciplina_de_interest = DB::table('areas_interes')
            ->join('temas', 'areas_interes.id_theme_fk', '=', 'temas.id_tema')
            ->join('users', 'areas_interes.id_user_fk', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->where('temas.type_theme', 'disciplina')
            ->select('temas.id_tema')
            ->get();

        $listaAreaInterest = array();

        foreach ($disciplina_de_interest as $area_formation) {
            $areas = DB::select('select ag.id_tema as id_tema_gran, aa.id_tema as id_tema_area, ad.id_tema as id_tema_disciplina, ag.name_theme as name_tema_gran, aa.name_theme as name_tema_area, ad.name_theme as name_tema_disciplina from temas ag, temas aa, temas ad where ad.id_tema_area=aa.id_tema and aa.id_tema_area=ag.id_tema and ad.id_tema='.$area_formation->id_tema);
                $listaAreaInterest = array_merge($areas, $listaAreaInterest);
        }





        $institucionesVinvulado = $this->mispublicaciones();


         $recibonotifide = DB::table('tema__notificacions')
         ->select('id_type_publications', 'name_theme_notifications')
         ->get();

         $milista_notificacion_recibe = DB::table('tema_notificacion_usuarios')
         ->where('id_user_fk', Auth::user()->id)
         ->select('id_type_notifications_fk')
         ->get();


            return view('formularios.formulariousuario', compact('lugares','areas_all', 'listaAreaFormation', 'listaAreaInterest', 'institucionesVinvulado', 'recibonotifide', 'milista_notificacion_recibe'));
    }















    public function mispublicaciones(){
       $mispublicaciones =  DB::table('vinculacions')
            ->join('institucions', 'vinculacions.id_institution_fk', '=', 'institucions.id_institution')
            ->join('users', 'vinculacions.id_user_fk', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->select('institucions.*')
            ->get();

        return $mispublicaciones;

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

     /**
     * Llama a los temas completo
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerAreas(Request $request, $id_area){
        if($request->ajax()){
            $areas = DB::select('select ag.id_tema as id_tema_gran, aa.id_tema as id_tema_area, ad.id_tema as id_tema_disciplina, ag.name_theme as name_tema_gran, aa.name_theme as name_tema_area, ad.name_theme as name_tema_disciplina from temas ag, temas aa, temas ad where ad.id_tema_area=aa.id_tema and aa.id_tema_area=ag.id_tema and ad.id_tema='.$id_area);
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
