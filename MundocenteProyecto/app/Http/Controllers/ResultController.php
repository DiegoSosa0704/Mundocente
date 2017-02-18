<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Redirect;
use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;
use Mundocente\Publicacion;
use Mundocente\Recomendacione;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ResultController extends Controller
{



     public function __construct(){
        $this->middleware('auth', ['only' => ['publications', 'searchPublicationForWordKey', 'listPublicationsInterestRecomendation','returnListPublications', 'addValueThemeInteres']]);
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


public function searchPublicationForWordKey(Request $request){

    $title_separate  = $request['text_search'];
    
    $porciones = explode(" ", $title_separate);

    $cuantity_title = count($porciones);

    
    if($request['search_type_publication']!=6){

        $listPublications = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->where('tema__notificacions.id_type_publications', $request['search_type_publication'])
                        ->where('publicacions.title_publication', 'like', '%'.$request['text_search'].'%')
                        ->select('publicacions.*', 'institucions.*', 'tema__notificacions.*', 'lugars.*')
                        
                        ->orderBy('publicacions.count_view', 'desc')
                        ->paginate(15);
                        
                        

          return view('main.publication', compact('listPublications'));
    }else{

    if($cuantity_title==1){
        
            $listPublications = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[0].'%')
                        ->orWhere('publicacions.description_publication', 'like', '%'.$porciones[0].'%')
                        ->select('publicacions.*', 'institucions.*', 'tema__notificacions.*', 'lugars.*')
                        
                        ->orderBy('publicacions.count_view', 'desc')
                        ->paginate(15);
                        
                        

          return view('main.publication', compact('listPublications'));

    }else if($cuantity_title==2){
            $listPublications = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[0].'%')
                        ->orWhere('publicacions.description_publication', 'like', '%'.$porciones[0].'%')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[1].'%')
                        ->select('publicacions.*', 'institucions.*', 'tema__notificacions.*', 'lugars.*')
                        
                        ->orderBy('publicacions.count_view', 'desc')
                        ->paginate(15);

                        
                        

            return view('main.publication', compact('listPublications'));
        }else if($cuantity_title==3){
            $listPublications = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[0].'%')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[1].'%')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[2].'%')
                        ->orWhere('publicacions.description_publication', 'like', '%'.$porciones[0].'%')
                        
                        ->select('publicacions.*', 'institucions.*', 'tema__notificacions.*', 'lugars.*')
                        ->orderBy('publicacions.count_view', 'desc')
                        ->paginate(15);

                        
                        

            return view('main.publication', compact('listPublications'));
        }else if($cuantity_title==4){
            $listPublications = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[0].'%')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[1].'%')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[2].'%')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[3].'%')
                        ->orWhere('publicacions.description_publication', 'like', '%'.$porciones[0].'%')
                        
                        ->select('publicacions.*', 'institucions.*', 'tema__notificacions.*', 'lugars.*')
                        ->orderBy('publicacions.count_view', 'desc')
                        ->paginate(15);

                        
                        

            return view('main.publication', compact('listPublications'));
        }else if($cuantity_title==5){
            $listPublications = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[0].'%')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[1].'%')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[2].'%')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[3].'%')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[4].'%')
                        ->orWhere('publicacions.description_publication', 'like', '%'.$porciones[0].'%')
                        
                        ->select('publicacions.*', 'institucions.*', 'tema__notificacions.*', 'lugars.*')
                        ->orderBy('publicacions.count_view', 'desc')
                        ->paginate(15);

                        
                        

            return view('main.publication', compact('listPublications'));
        }else if($cuantity_title>5){
            $listPublications = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[0].'%')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[1].'%')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[2].'%')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[3].'%')
                        ->orWhere('publicacions.title_publication', 'like', '%'.$porciones[4].'%')
                        ->orWhere('publicacions.description_publication', 'like', '%'.$porciones[0].'%')
                        ->select('publicacions.*', 'institucions.*', 'tema__notificacions.*', 'lugars.*')
                        ->orderBy('publicacions.count_view', 'desc')
                        ->paginate(15);
                        
                        


            return view('main.publication', compact('listPublications'));
        }
    }



  

    
  
}






  public static function makeLengthAware($collection, $total, $perPage)
  {
    $paginator = new LengthAwarePaginator(
      $collection, 
      $total, 
      $perPage, 
      Paginator::resolveCurrentPage(), 
      ['path' => Paginator::resolveCurrentPath()]);

    return  $paginator;
  }






public function listPublicationsInterestRecomendation(){
    $publicationsHomeInterestRecomendation = DB::table('recomendaciones')
                        ->where('id_user_fk', Auth::user()->id)
                        ->select('recomendaciones.*')
                        ->get();
    return $publicationsHomeInterestRecomendation;
}


public function returnListInterest(){
    $listaUniono = DB::table('areas_publicacions')
        ->join('areas_interes', 'areas_publicacions.id_theme_fk', '=', 'areas_interes.id_theme_fk')
        ->where('areas_interes.id_user_fk', Auth::user()->id)
        ->select('areas_publicacions.id_publication_fk')
        
        ->orderBy('areas_interes.value_interest', 'asc')
        ->get();
        return $listaUniono;
}


//Retorna toda la lista de ublicaciones
public function returnListPublications(){

       $listResultArray = array();
       foreach ($this->returnListInterest() as $id_publi) {
            $publication_interest = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                        ->select('publicacions.*', 'institucions.*', 'tema__notificacions.*', 'lugars.*')
                        ->get();
                $listResultArray = array_merge($publication_interest, $listResultArray);
        }
        
        
        
        if(count($listResultArray)==0){
             $listPublications = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                        ->select('publicacions.*', 'institucions.*', 'tema__notificacions.*', 'lugars.*')
                        ->orderBy('publicacions.count_view', 'desc')
                        ->paginate(15);

          return $listPublications;
        }else{
            $total = count($listResultArray);
            
            $arraNewPagitacion = $this->makeLengthAware($listResultArray, $total, 30);
            
            return  $arraNewPagitacion;
        }
        


    
}


 /**
     * Nos lleva a la página de publicaciones
     *
     * @return \Illuminate\Http\Response
     */
    public function publications()
    {
        $listPublications = $this->returnlistPublications();

            if(Auth::user()->email==''){
                Auth::logout();
                return Redirect::to('userExist');
            }else{
               return view('main.publication', compact('listPublications'));
            }
        
    }


public function returnAreasPublication($id_publicatin){
    $listAreasPublication = DB::table('areas_publicacions')
        ->join('publicacions', 'areas_publicacions.id_publication_fk', '=', 'publicacions.id_publication')
        ->join('temas', 'areas_publicacions.id_theme_fk', '=', 'temas.id_tema')
        ->where('areas_publicacions.id_publication_fk', $id_publicatin)
        ->select('temas.*')
        ->get();
        return $listAreasPublication;
}



public function unionThemesInterestAndThemesPublication(){
    $listaAreasInteres = DB::table('areas_interes')->get();
    $listaAreasPublication = DB::table('areas_publicacions')->get();

    $listaUniono = DB::table('areas_publicacions')
        ->join('areas_interes', 'areas_publicacions.id_theme_fk', '=', 'areas_interes.id_theme_fk')
        ->select('areas_publicacions*')
        ->get();

        return $listaUniono;

}

//retorna la cantidad de veces que ha sido favorito una publicación
public function returnPublicationFavorite($id_publicatin){
    $quantityFavorite = DB::table('favoritos')
        ->where('id_publication_fk', $id_publicatin)
        ->count();
    return $quantityFavorite;
}


//retorna 1 si al usuario logueado la agregó a favoritos la publicación que lleg por parámetro
public function verifyFavorite($id_publicatin){
    $quantityFavoriteMy = DB::table('favoritos')
        ->where('id_publication_fk', $id_publicatin)
        ->where('id_user_fk', Auth::user()->id)
        ->count();
    return $quantityFavoriteMy;
}



//retorna la cantidad de veces que ha sido de interés  una publicación
public function returnPublicationSave($id_publicatin){
    $quantitySave = DB::table('interesados')
        ->where('id_publication_fk', $id_publicatin)
        ->count();
    return $quantitySave;
}

//retorna 1 si al usuario logueado le interesa la publicación que lleg por parámetro
public function verifyInterest($id_publicatin){
    $quantityFavoriteMy = DB::table('interesados')
        ->where('id_publication_fk', $id_publicatin)
        ->where('id_user_fk', Auth::user()->id)
        ->count();
    return $quantityFavoriteMy;
}




//retorna la cantidad de veces que ha sido denunciado  una publicación
public function returnPublicationReport($id_publicatin){
    $quantityReport = DB::table('denuncias')
        ->where('id_publication_fk', $id_publicatin)
        ->count();
    return $quantityReport;
}


public function addValueThemeInteres(Request $request){
    if($request->ajax()){

        $listaUniono = DB::table('areas_publicacions')
        ->join('areas_interes', 'areas_publicacions.id_theme_fk', '=', 'areas_interes.id_theme_fk')
        ->where('id_publication_fk', $request['id_publication_fk'])
        ->select('areas_interes.value_interest','areas_interes.id_areas_interes', 'areas_interes.id_user_fk')
        ->get();


             foreach ($listaUniono as $id_interest_theme) {
            $quantutyValueLast = $id_interest_theme->value_interest;

            DB::table('areas_interes')
                ->where('id_areas_interes', $id_interest_theme->id_areas_interes)
                ->where('id_user_fk', Auth::user()->id)
                ->update(['value_interest' => ($quantutyValueLast+1)]);
            }
            
        
            return 1;

       

        
    }
     
}


public function listPublicationsInterest(){

    $publicationsHomeInterest = DB::table('areas_interes')
                        ->where('id_user_fk', Auth::user()->id)
                        ->select('areas_interes.*')
                        ->get();
    
    return $publicationsHomeInterest;
}

public function returnIndexPublicationPaper($id_publicatin){

    $listIndexClasification = DB::table('revista_nivels')
        ->where('id_publications_fk', $id_publicatin)
        ->count();
        return $listIndexClasification;
}









    /**
    muestra los resultaos según la búsqueda que haga
    **/


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
