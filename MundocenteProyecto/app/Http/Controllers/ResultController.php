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
use Illuminate\Database\Eloquent\Collection;

class ResultController extends Controller
{



     public function __construct(){
        $this->middleware('auth', ['only' => ['index','publications', 'searchPublicationForWordKey', 'listPublicationsInterestRecomendation','returnListPublications', 'addValueThemeInteres', 'buscarconocatorias']]);
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

    public function returnWordProcces($word){
        $wordFinishSinse = "";
        $wordFinishSinse = str_replace(" se ", " ", $word);
        $wordFinishSinde = "";
        $wordFinishSinde = str_replace(" de ", " ", $wordFinishSinse);
        $wordFinishSinpara = "";
        $wordFinishSinpara = str_replace(" para ", " ", $wordFinishSinde);
        $wordFinishSinpor = "";
        $wordFinishSinpor = str_replace(" por ", " ", $wordFinishSinpara);
        $wordFinishSiny = "";
        $wordFinishSiny = str_replace(" y ", " ", $wordFinishSinpor);
        $wordFinishSinla = "";
        $wordFinishSinla = str_replace(" la ", " ", $wordFinishSiny);
        $wordFinishSines = "";
        $wordFinishSines = str_replace(" es ", " ", $wordFinishSinla);
        $wordFinishSinen = "";
        $wordFinishSinen = str_replace(" en ", " ", $wordFinishSines);
        $wordFinishSinuna = "";
        $wordFinishSinuna = str_replace(" una ", " ", $wordFinishSinen);
        $wordFinishSinun = "";
        $wordFinishSinun = str_replace(" un ", " ", $wordFinishSinuna);
        $wordFinishSicon = "";
        $wordFinishSicon = str_replace(" con ", " ", $wordFinishSinun);
        $wordFinishSina = "";
        $wordFinishSina = str_replace(" a ", " ", $wordFinishSicon);
        $wordFinishSinque = "";
        $wordFinishSinque = str_replace(" que ", " ", $wordFinishSina);
        $wordFinishSinmuy = "";
        $wordFinishSinmuy = str_replace(" muy ", " ", $wordFinishSinque);
        $wordFinishSinmucho = "";
        $wordFinishSinmucho = str_replace(" mucho ", " ", $wordFinishSinmuy);
        $wordFinishSinmuchos = "";
        $wordFinishSinmuchos = str_replace(" muchos ", " ", $wordFinishSinmucho);
        $wordFinishSinellos = "";
        $wordFinishSinellos = str_replace(" ellos ", " ", $wordFinishSinmuchos);
        $wordFinishSinellas = "";
        $wordFinishSinellas = str_replace(" ellas ", " ", $wordFinishSinellos);
        $wordFinishSinel = "";
        $wordFinishSinel = str_replace(" el ", " ", $wordFinishSinellas);
        $wordFinishSinlas = "";
        $wordFinishSinlas = str_replace(" las ", " ", $wordFinishSinel);
        $wordFinishSinlos = "";
        $wordFinishSinlos = str_replace(" los ", " ", $wordFinishSinlas);
        $wordFinishSinlo = "";
        $wordFinishSinlo = str_replace(" lo ", " ", $wordFinishSinlos);
        $wordFinishSinsFinal = "";
        $wordFinishSinsFinal = str_replace("s ", " ", $wordFinishSinlo);
        //dd($wordFinishSinsFinal);
        return $wordFinishSinsFinal;
    }


public function searchPublicationForWordKey(Request $request){

    $title_separate  = $this->returnWordProcces($request['text_search']);

    
    
    $porciones = explode(" ", $title_separate);
    
    $cuantity_title = count($porciones);
    
    $listResultArray = array();


    if($request['search_type_publication']==6){
        if($cuantity_title==1){
        
           foreach ($this->returnListInterest() as $id_publi) {
                $publication_interest = DB::table('publicacions')
                            ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                            ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                            ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                            ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                            ->where('publicacions.title_publication', 'like', '%'.$porciones[0].'%')
                            ->select('publicacions.*', 'institucions.*',  'lugars.*')
                            ->get();
                            
                    $listResultArray = array_merge($publication_interest, $listResultArray);
            }

    }else if($cuantity_title==2){
               foreach ($this->returnListInterest() as $id_publi) {
                    $publication_interest = DB::table('publicacions')
                                ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[0].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[1].'%')
                                ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                ->get();
                        $listResultArray = array_merge($publication_interest, $listResultArray);
                }
        }else if($cuantity_title==3){
               foreach ($this->returnListInterest() as $id_publi) {
                    $publication_interest = DB::table('publicacions')
                                ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[0].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[1].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[2].'%')
                                ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                ->get();
                        $listResultArray = array_merge($publication_interest, $listResultArray);
                }
        }else if($cuantity_title==4){
               foreach ($this->returnListInterest() as $id_publi) {
                    $publication_interest = DB::table('publicacions')
                                ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[0].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[1].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[2].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[3].'%')
                                ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                ->get();
                        $listResultArray = array_merge($publication_interest, $listResultArray);
                }
        }else if($cuantity_title==5){
                   foreach ($this->returnListInterest() as $id_publi) {
                        $publication_interest = DB::table('publicacions')
                                    ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                    ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                    ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                    ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                    ->where('publicacions.title_publication', 'like', '%'.$porciones[0].'%')
                                    ->where('publicacions.title_publication', 'like', '%'.$porciones[1].'%')
                                    ->where('publicacions.title_publication', 'like', '%'.$porciones[2].'%')
                                    ->where('publicacions.title_publication', 'like', '%'.$porciones[3].'%')
                                    ->where('publicacions.title_publication', 'like', '%'.$porciones[4].'%')
                                    ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                    ->get();
                            $listResultArray = array_merge($publication_interest, $listResultArray);
                    }
        }else if($cuantity_title==6){
               foreach ($this->returnListInterest() as $id_publi) {
                    $publication_interest = DB::table('publicacions')
                                ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[0].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[1].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[2].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[3].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[4].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[5].'%')
                                ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                ->get();
                        $listResultArray = array_merge($publication_interest, $listResultArray);
                }
                
        }else if($cuantity_title==7){
               foreach ($this->returnListInterest() as $id_publi) {
                    $publication_interest = DB::table('publicacions')
                                ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[0].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[1].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[2].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[3].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[4].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[5].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[6].'%')
                                ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                ->get();
                        $listResultArray = array_merge($publication_interest, $listResultArray);
                }
                
        }else if($cuantity_title==8){
               foreach ($this->returnListInterest() as $id_publi) {
                    $publication_interest = DB::table('publicacions')
                                ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[0].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[1].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[2].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[3].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[4].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[5].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[6].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[7].'%')
                                ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                ->get();
                        $listResultArray = array_merge($publication_interest, $listResultArray);
                }
                
        }else if($cuantity_title>=9){
               foreach ($this->returnListInterest() as $id_publi) {
                    $publication_interest = DB::table('publicacions')
                                ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[0].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[1].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[2].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[3].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[4].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[5].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[6].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[7].'%')
                                ->where('publicacions.title_publication', 'like', '%'.$porciones[8].'%')
                                ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                ->get();
                        $listResultArray = array_merge($publication_interest, $listResultArray);
                }
                
        }
    }else{
         foreach ($this->returnListInterest() as $id_publi) {
                $publication_interest = DB::table('publicacions')
                            ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                            ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                            ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                            ->where('publicacions.id_type_publication', $request['search_type_publication'])
                            ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                            ->where('publicacions.title_publication', 'like', '%'.$porciones[0].'%')
                            ->select('publicacions.*', 'institucions.*',  'lugars.*')
                            ->get();
                            
                    $listResultArray = array_merge($publication_interest, $listResultArray);
            }
    }

    

            $currentPageSearch = LengthAwarePaginator::resolveCurrentPage();
            $collectionSearch = new Collection($listResultArray);
            $perPage = 1000;        
            $currentPageSearchResultsSearch = $collectionSearch->slice(($currentPageSearch - 1) * $perPage, $perPage)->all();
            $listPublications = new LengthAwarePaginator(
            $currentPageSearchResultsSearch,
            count($collectionSearch),
            $perPage,
            Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath()]
            );
          
            return view('main.publication', compact('listPublications'));
   
}











public function listPublicationsInterestRecomendation(){
    $publicationsHomeInterestRecomendation = DB::table('recomendaciones')
                        ->where('id_user_fk', Auth::user()->id)
                        ->select('recomendaciones.*')
                        ->get();
    return $publicationsHomeInterestRecomendation;
}









//  Retorna lista de intrés y recomendaciones

public function returnListInterest(){
  
   

    $listResultArrayUnionIntRecom = array();




   

     $listaUniono = DB::table('areas_publicacions')
            ->join('areas_interes', 'areas_publicacions.id_theme_fk', '=', 'areas_interes.id_theme_fk')
            ->where('areas_interes.id_user_fk', Auth::user()->id)
            ->select('areas_publicacions.id_publication_fk')
            ->orderBy('areas_interes.value_interest', 'asc')
            ->distinct()
            ->get();


        $listResultArrayUnionIntRecom = array_merge($listaUniono, $listResultArrayUnionIntRecom);


         $listaUnionoTodosTheme = DB::table('areas_publicacions')
            ->where('areas_publicacions.id_theme_fk', '1')
            ->select('areas_publicacions.id_publication_fk')
            ->take(10)
            ->distinct()
            ->get();

            //dd($listaUnionoTodosTheme);

        $listResultArrayUnionIntRecom = array_merge($listaUnionoTodosTheme, $listResultArrayUnionIntRecom);


        $listaUnionoRecom = DB::table('areas_publicacions')
            ->join('recomendaciones', 'areas_publicacions.id_theme_fk', '=', 'recomendaciones.id_theme_fk')
            ->where('recomendaciones.id_user_fk', Auth::user()->id)
            ->select('areas_publicacions.id_publication_fk')
            ->orderBy('recomendaciones.value_recomendation', 'asc')
            ->distinct()
            ->get();


        $listResultArrayUnionIntRecom = array_merge($listaUnionoRecom, $listResultArrayUnionIntRecom);


        $collectionSearch = collect($listResultArrayUnionIntRecom);
        
        $uniqueList = $collectionSearch->unique();
        
        //dd($uniqueList);
       return $uniqueList; 
    


 
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
                        ->select('publicacions.*', 'institucions.*',  'lugars.*')
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
           
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $collection = new Collection($listResultArray);
        $perPage = 40;        
        $currentPageSearchResults = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
          $paginatedSearchResults = new LengthAwarePaginator(
            $currentPageSearchResults,
            count($collection),
            $perPage,
            Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath()]
            );
            return  $paginatedSearchResults;
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

     $listThemesGeneral = DB::table('areas_publicacions')
    ->where('id_publication_fk', $request['id_publication_fk'])
    ->select('id_theme_fk')
    ->get();

    
    foreach ($listThemesGeneral as $area) {
         $existThemeInterest = DB::table('areas_interes')
        ->where('id_theme_fk', $area->id_theme_fk)
        ->where('id_user_fk', Auth::user()->id)
        ->count();
        
        if($existThemeInterest==0){
            $existRecomendation =  DB::table('recomendaciones')->where('id_user_fk', Auth::user()->id)->where('id_theme_fk', $area->id_theme_fk)->count();
            
            if($existRecomendation==0){
                
            Recomendacione::create([
                'id_user_fk' => Auth::user()->id,
                'id_theme_fk' => $area->id_theme_fk,
                ]);
            }else{
                
                $list_exit_ecomendation =  DB::table('recomendaciones')->where('id_user_fk', Auth::user()->id)->where('id_theme_fk', $area->id_theme_fk)->get();

                foreach ($list_exit_ecomendation as $recomen) {
                    $newVlueRecomendation = $recomen->value_recomendation;
                    DB::table('recomendaciones')
                    ->where('id_user_fk', Auth::user()->id)
                    ->where('id_theme_fk', $area->id_theme_fk)
                    ->update(['value_recomendation' => ($newVlueRecomendation+1)]);
                }
                }
            }
            
        }
    
    



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



            $quantityValueeCountView = DB::table('publicacions')->where('id_publication', $request['id_publication_fk'])->get();
             
             foreach ($quantityValueeCountView as $publication) {
                 $auqntity = $publication->count_view;
                  DB::table('publicacions')
                     ->where('id_publication', $publication->id_publication)
                     ->update(['count_view' => ($auqntity+1)]);
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
