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
        $this->middleware('auth', ['only' => ['editarmiperfil', 'publicarconvocatoria', 'publicarrevista' ,'publicarinvitacion', 'publicarevento','verdetallesConvocatoria', 'verdetallesEvento', 'verdetallesrevista', 'verdetallesSolicitud', 'mostrarmiperfil', 'mostrarmispublicacionesfavoritas', 'mostrarinteresados' ,'mostrarmiperfildeUsuario', 'editarConvocatoria', 'editarEvento' ,'editarRevista', 'editarSolicitud']]);

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



    	if((isset($_COOKIE["email_cookie"]))||(isset($_COOKIE["pass_cookie"]))){
            if(Auth::attempt(['email'=>$_COOKIE["email_cookie"], 'password'=> $_COOKIE["pass_cookie"]])){
	           return Redirect::to('publicaciones');
	       }
    	}else{
    		if (Auth::check()) {
	            return Redirect::to('publicaciones');
	        }else{

	            //$this->verifyCookies();

	            return view('home');
	        }
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






    //muestra mi perfil y mis publicaciones
    public function mostrarmiperfildeUsuario($user_name){
    	
    	$id_user_search = DB::table('users')->where('last_name',$user_name)->get();
    	$id_user = 0;
    	foreach ($id_user_search as $user) {
    		$id_user = $user->id;
    	}
    	if($id_user!=0){
    	$institucionesVinvulado = $this->mispublicacionesdeUsuario($id_user);
        $listPublications =  array();

         $listPublicUser = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->where('id_user_fk', $id_user)
                        ->select('publicacions.*', 'institucions.*', 'tema__notificacions.*', 'lugars.*')
                        ->orderBy('publicacions.created_at', 'desc')
                        ->get();
                        //echo "id: ".$id_user;

                        $currentPageSearch = LengthAwarePaginator::resolveCurrentPage();
			            $collection = new Collection($listPublicUser);
			            $perPage = 30;        
			            $currentPageSearchResultsSearch = $collection->slice(($currentPageSearch - 1) * $perPage, $perPage)->all();
			            
			            $listPublications = new LengthAwarePaginator(
			            $currentPageSearchResultsSearch,
			            count($collection),
			            $perPage,
			            Paginator::resolveCurrentPage(),
			            ['path' => Paginator::resolveCurrentPath()]
			            );
			            
                       //dd($listPublications);

         $user_perfil = DB::table('users')->where('id', $id_user)->select('name', 'email', 'curriculo_url', 'photo_url', 'nivel_formacion', 'last_name', 'id')->get();
         

       return view('perfil.perfil-usuario', compact('listPublications', 'institucionesVinvulado', 'user_perfil'));
    	}else{
    		return Redirect::to('publicaciones');
    	}
    	
        
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
        
        $perPage = 20;

        $currentPageSearchResults = $collection->slice (($currentPage - 1) * $perPage, $perPage) -> all ();

        
          $listPublications = new LengthAwarePaginator(
            $currentPageSearchResults,
            count($collection),
            $perPage,
            Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath()]
            );
        
            

        return view('perfil.mis-publicaciones-guardadas', compact('listPublications'));
    }











//muestra interesados en mis publicaciones
    public function mostrarinteresados(){

        DB::table('notifications')->where('id_user_notification', Auth::user()->id)->delete();

        $lista_interesados = DB::table('interesados')
                        ->join('publicacions', 'interesados.id_publication_fk', '=', 'publicacions.id_publication')
                        ->join('users', 'interesados.id_user_fk', '=', 'users.id')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->where('publicacions.id_user_fk', Auth::user()->id)
                        ->select('publicacions.*', 'users.name', 'users.photo_url', 'users.id', 'users.last_name', 'institucions.name_institution',  'lugars.name_lugar')
                        ->orderBy('interesados.created_at', 'desc')
                        ->paginate(20);

        $lista_denuncias = DB::table('denuncias')
                        ->join('publicacions', 'denuncias.id_publication_fk', '=', 'publicacions.id_publication')
                        ->join('users', 'denuncias.id_user_fk', '=', 'users.id')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->where('publicacions.id_user_fk', Auth::user()->id)
                        ->select('publicacions.*', 'users.name', 'users.photo_url', 'users.id', 'users.last_name', 'institucions.name_institution',  'lugars.name_lugar')
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
    return DB::table('temas')->where('type_theme', 'gran_area')->where('id_tema', '!=','1')->get();
}

public function call_areas($id_area){
	return DB::table('temas')->where('type_theme', 'area')->where('id_tema_area', $id_area)->get();
}
public function call_disciplines($id_area){
	return DB::table('temas')->where('type_theme', 'disciplina')->where('id_tema_area', $id_area)->get();
}

//public function callLargesAreasTheme(){
    //return DB::select('select ag.id_tema as id_tema_gran, aa.id_tema as id_tema_area, ad.id_tema as id_tema_disciplina, ag.name_theme as name_tema_gran, aa.name_theme as name_tema_area, ad.name_theme as name_tema_disciplina, ag.type_theme as tipo_area_gran, aa.type_theme as tipo_area, ad.type_theme as tipo_disciplina from temas ag, temas aa, temas ad where ad.id_tema_area=aa.id_tema and aa.id_tema_area=ag.id_tema');
//}
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
        

       

$areas_all = DB::table('temas')->where('type_theme', 'gran_area')->get();


        $disciplina_de_formacion = DB::table('areas_formacions')
            ->join('temas', 'areas_formacions.id_theme_fk', '=', 'temas.id_tema')
            ->join('users', 'areas_formacions.id_user_fk', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->select('temas.id_tema')
            ->get();

        $listaAreaFormation = array();

        foreach ($disciplina_de_formacion as $area_formation) {
            //$areas = DB::select('select ag.id_tema as id_tema_gran, aa.id_tema as id_tema_area, ad.id_tema as id_tema_disciplina, ag.name_theme as name_tema_gran, aa.name_theme as name_tema_area, ad.name_theme as name_tema_disciplina from temas ag, temas aa, temas ad where ad.id_tema_area=aa.id_tema and aa.id_tema_area=ag.id_tema and ad.id_tema='.$area_formation->id_tema);
                	$gran = DB::table('temas')->where('id_tema', $area_formation->id_tema)->get();
                	foreach ($gran as $g) {
        		
        		if ($g->type_theme=='gran_area') {

        			$areas = DB::select('select id_tema as id_tema_gran, name_theme as name_tema_gran, type_theme
        				from temas 
        				where id_tema='.$g->id_tema);
        		}else if ($g->type_theme=='area') {
        			$areas = DB::select('select ag.id_tema as id_tema_gran, aa.id_tema as id_tema_area, ag.name_theme as name_tema_gran, aa.name_theme as name_tema_area, aa.type_theme from temas ag, temas aa where aa.id_tema_area=ag.id_tema and aa.id_tema='.$g->id_tema);
        		}else if ($g->type_theme=='disciplina') {
        			$areas = DB::select('select ag.id_tema as id_tema_gran, aa.id_tema as id_tema_area, ad.id_tema as id_tema_disciplina, ag.name_theme as name_tema_gran, aa.name_theme as name_tema_area, ad.name_theme as name_tema_disciplina, ad.type_theme from temas ag, temas aa, temas ad where ad.id_tema_area=aa.id_tema and aa.id_tema_area=ag.id_tema and ad.id_tema='.$g->id_tema);
        		}
        	}


                $listaAreaFormation = array_merge($areas, $listaAreaFormation);
        }



        $disciplina_de_interest = DB::table('areas_interes')
            ->join('temas', 'areas_interes.id_theme_fk', '=', 'temas.id_tema')
            ->join('users', 'areas_interes.id_user_fk', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->select('temas.id_tema')
            ->get();

        $listaAreaInterest = array();

        foreach ($disciplina_de_interest as $area_formation) {
           // $areas = DB::select('select ag.id_tema as id_tema_gran, aa.id_tema as id_tema_area, ad.id_tema as id_tema_disciplina, ag.name_theme as name_tema_gran, aa.name_theme as name_tema_area, ad.name_theme as name_tema_disciplina from temas ag, temas aa, temas ad where ad.id_tema_area=aa.id_tema and aa.id_tema_area=ag.id_tema and ad.id_tema='.$area_formation->id_tema);
                


            $gran = DB::table('temas')->where('id_tema', $area_formation->id_tema)->get();
        	
        	foreach ($gran as $g) {
        		
        		if ($g->type_theme=='gran_area') {

        			$areas = DB::select('select id_tema as id_tema_gran, name_theme as name_tema_gran, type_theme
        				from temas 
        				where id_tema='.$g->id_tema);
        		}else if ($g->type_theme=='area') {
        			$areas = DB::select('select ag.id_tema as id_tema_gran, aa.id_tema as id_tema_area, ag.name_theme as name_tema_gran, aa.name_theme as name_tema_area, aa.type_theme from temas ag, temas aa where aa.id_tema_area=ag.id_tema and aa.id_tema='.$g->id_tema);
        		}else if ($g->type_theme=='disciplina') {
        			$areas = DB::select('select ag.id_tema as id_tema_gran, aa.id_tema as id_tema_area, ad.id_tema as id_tema_disciplina, ag.name_theme as name_tema_gran, aa.name_theme as name_tema_area, ad.name_theme as name_tema_disciplina, ad.type_theme from temas ag, temas aa, temas ad where ad.id_tema_area=aa.id_tema and aa.id_tema_area=ag.id_tema and ad.id_tema='.$g->id_tema);
        		}
        	}

                $listaAreaInterest = array_merge($areas, $listaAreaInterest);
        }

        //dd($listaAreaInterest);




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









 public function mispublicacionesdeUsuario($id_user){
       $mispublicaciones =  DB::table('vinculacions')
            ->join('institucions', 'vinculacions.id_institution_fk', '=', 'institucions.id_institution')
            ->join('users', 'vinculacions.id_user_fk', '=', 'users.id')
            ->where('users.id', $id_user)
            ->select('institucions.*')
            ->get();

        return $mispublicaciones;

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
     * Llama a los temas areas
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
        	$gran = DB::table('temas')->where('id_tema', $id_area)->get();
        	
        	foreach ($gran as $g) {
        		
        		if ($g->type_theme=='gran_area') {

        			$areas = DB::select('select id_tema as id_tema_gran, name_theme as name_tema_gran
        				from temas 
        				where id_tema='.$id_area);
        		}else if ($g->type_theme=='area') {
        			$areas = DB::select('select ag.id_tema as id_tema_gran, aa.id_tema as id_tema_area, ag.name_theme as name_tema_gran, aa.name_theme as name_tema_area from temas ag, temas aa where aa.id_tema_area=ag.id_tema and aa.id_tema='.$id_area);
        		}else if ($g->type_theme=='disciplina') {
        			$areas = DB::select('select ag.id_tema as id_tema_gran, aa.id_tema as id_tema_area, ad.id_tema as id_tema_disciplina, ag.name_theme as name_tema_gran, aa.name_theme as name_tema_area, ad.name_theme as name_tema_disciplina from temas ag, temas aa, temas ad where ad.id_tema_area=aa.id_tema and aa.id_tema_area=ag.id_tema and ad.id_tema='.$id_area);
        		}
        	}
            
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


    	if((isset($_COOKIE["email_cookie"]))||(isset($_COOKIE["pass_cookie"]))){
    		if(Auth::attempt(['email'=>$_COOKIE["email_cookie"], 'password'=> $_COOKIE["pass_cookie"]])){
    			return Redirect::to('publicaciones');
    		}
    	}


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


//obtiene el país de la ciudad de la publicación
public function getCountryPublicationLugar($id_city){
    return DB::select('select DISTINCT p.id_lugar, p.name_lugar, c.type_lugar from lugars p, lugars c where p.id_lugar=c.id_lugar_fk and  p.id_lugar='.$id_city);
}








//método para editar convocatoria
    public function editarConvocatoria(Request $request){
        //return "editando convocatoria ".$request['id_convocatoria_edit'];
        

        $institucionesVinvulado = $this->callInstitutionMy();
        $gran_areas = $this->callLargesAreasTheme();
        $lugares = $this->callLocationCountry();


        $publication_unique = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->where('publicacions.id_publication', $request['id_convocatoria_edit'])
                        ->select('publicacions.*', 'institucions.*',  'lugars.*')
                        ->get();

        $listThemesPub = DB::table('areas_publicacions')
                ->join('publicacions', 'areas_publicacions.id_publication_fk', '=', 'publicacions.id_publication')
                ->join('temas', 'areas_publicacions.id_theme_fk', '=', 'temas.id_tema')
                ->where('publicacions.id_publication', $request['id_convocatoria_edit'])
                ->select('temas.*')
                ->get();
        //dd($listThemesPub);


        return view('editPublication.formularioconvocatoriaedit', compact('lugares', 'institucionesVinvulado', 'gran_areas', 'publication_unique', 'listThemesPub'));
     

    }

//método para editar revista
    public function editarRevista(Request $request){
        //return "editando revista ".$request['id_revista_edit'];
        
            $institucionesVinvulado = $this->callInstitutionMy();
        $gran_areas = $this->callLargesAreasTheme();
        $lugares = $this->callLocationCountry();
        $indexpaper = DB::table('indices')->get();
        $clasificationpaper = DB::table('nivels')->get();
        $quantityIndex = DB::table('indices')->count();
        return view('editPublication.formulariorevistaedit', compact('lugares', 'institucionesVinvulado', 'gran_areas', 'indexpaper', 'clasificationpaper'), ['quantityIndex' => $quantityIndex]);
      
        
    }


//método para editar evento
    public function editarEvento(Request $request){
        //return "editando evento ".$request['id_event_edit'];
        $institucionesVinvulado = $this->callInstitutionMy();
        $gran_areas = $this->callLargesAreasTheme();
        $lugares = $this->callLocationCountry();
        $publication_unique = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->where('publicacions.id_publication', $request['id_event_edit'])
                        ->select('publicacions.*', 'institucions.*',  'lugars.*')
                        ->get();

        $listThemesPub = DB::table('areas_publicacions')
                ->join('publicacions', 'areas_publicacions.id_publication_fk', '=', 'publicacions.id_publication')
                ->join('temas', 'areas_publicacions.id_theme_fk', '=', 'temas.id_tema')
                ->where('publicacions.id_publication', $request['id_event_edit'])
                ->select('temas.*')
                ->get();
        //dd($listThemesPub);
        return view('editPublication.formularioeventoedit', compact('lugares', 'institucionesVinvulado', 'gran_areas', 'publication_unique', 'listThemesPub'));
    }


//método para editar solicitud
    public function editarSolicitud(Request $request){
        //return "editando soliciud ".$request['id_request_edit'];
        $institucionesVinvulado = $this->callInstitutionMy();
        $gran_areas = $this->callLargesAreasTheme();
        $lugares = $this->callLocationCountry();

        $publication_unique = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->where('publicacions.id_publication', $request['id_request_edit'])
                        ->select('publicacions.*', 'institucions.*',  'lugars.*')
                        ->get();

        $listThemesPub = DB::table('areas_publicacions')
                ->join('publicacions', 'areas_publicacions.id_publication_fk', '=', 'publicacions.id_publication')
                ->join('temas', 'areas_publicacions.id_theme_fk', '=', 'temas.id_tema')
                ->where('publicacions.id_publication', $request['id_request_edit'])
                ->select('temas.*')
                ->get();
        //dd($listThemesPub);

        return view('editPublication.formulario-solicitudedit', compact('lugares', 'institucionesVinvulado', 'gran_areas', 'listThemesPub', 'publication_unique'));
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
