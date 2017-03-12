<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use DB;

class FilterEvaController extends Controller
{


    public function __construct(){
         if((isset($_COOKIE["email_cookie"]))||(isset($_COOKIE["pass_cookie"]))){
            if(Auth::attempt(['email'=>$_COOKIE["email_cookie"], 'password'=> $_COOKIE["pass_cookie"]])){
                return Redirect::to('publicaciones');
            }
        }
        $this->middleware('auth', ['only' => ['index','searchLargeAreasFilter', 'buscarevaluadores']]);
        global $porciones;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }






//----------------------------------------------------------------------------------------buscar por filtros

//buscar por convocatoria

public function searchLargeAreasFilter($id_gra_area){
     $listaTotal = array();
        $listRepeat = array();

         $lista_gran_area = DB::table('areas_publicacions')
            ->where('id_theme_fk', $id_gra_area)
            ->select('id_publication_fk')
            ->distinct()
            ->get();

            $listaTotal = array_merge($lista_gran_area, $listaTotal);

        $lista_areas = DB::select('select a.id_tema from temas g, temas a where a.id_tema_area=g.id_tema and g.id_tema='.$id_gra_area);

        
        foreach ($lista_areas as $areas) {
             $lista_area = DB::table('areas_publicacions')
            ->where('id_theme_fk', $areas->id_tema)
            ->select('id_publication_fk')
            ->distinct()
            ->get();

            $listaTotal = array_merge($lista_area, $listaTotal);
        }

        $lista_disci = DB::select('select distinct d.id_tema from temas g, temas a, temas d where a.id_tema_area=g.id_tema and d.id_tema_area=a.id_tema and g.id_tema='.$id_gra_area);
        
        
        foreach ($lista_disci as $disc) {
             $lista_disciplina = DB::table('areas_publicacions')
            ->where('id_theme_fk', $disc->id_tema)
            ->select('id_publication_fk')
            ->distinct()
            ->get();

            $listaTotal = array_merge($lista_disciplina, $listaTotal);
        }

            

$arrayFinishResults = array();

    foreach ($listaTotal as $disci) {
            if(!in_array($disci->id_publication_fk, $listRepeat)){
                array_push($listRepeat, $disci->id_publication_fk);
                array_push($arrayFinishResults, $disci);
            }
    }
    //dd($arrayFinishResults);

    return $arrayFinishResults;
}









public function searchAreasFilter($id_gra_area){
   
    
     $lista_gra_area = DB::table('temas')
        ->where('id_tema_area', $id_gra_area)
        ->distinct()
        ->get();

    $listDisciplines = array();
    
    foreach ($lista_gra_area as $area) {
         $lista_area = DB::table('areas_publicacions')
            ->where('id_theme_fk', $area->id_tema)
            ->select('id_publication_fk')
            ->distinct()
            ->get();

            $listDisciplines = array_merge($lista_area, $listDisciplines);           
    }


    $arrayFinishResults = array();
    $listRepeat = array();
    foreach ($listDisciplines as $disci) {
            if(!in_array($disci->id_publication_fk, $listRepeat)){
                array_push($listRepeat, $disci->id_publication_fk);
                array_push($arrayFinishResults, $disci);
            }
    }

    return $arrayFinishResults;
}





public function searchDisciplinesAreasFilter($id_dicsiplina){
   
   
    
    
         $lista_area = DB::table('areas_publicacions')
            ->where('id_theme_fk', $id_dicsiplina)
            ->select('id_publication_fk')
            ->distinct()
            ->get();
         
    


    $arrayFinishResults = array();
    $listRepeat = array();
    foreach ($lista_area as $disci) {
            if(!in_array($disci->id_publication_fk, $listRepeat)){
                array_push($listRepeat, $disci->id_publication_fk);
                array_push($arrayFinishResults, $disci);
            }
    }

    return $arrayFinishResults;
}










public function buscarevaluadores(Request $request){
    
    $listResultArray = array();
    



    if ($request['city_filter_city_eva']=='') {
       
       
    if (isset($request['large_area_request_eva_filter'])) {
       
        if(!isset($request['area_request_eva_filter'])){

            if(!isset($request['discipline_request_eva_filter']) ){
    
                 foreach ($this->searchLargeAreasFilter($request['large_area_request_eva_filter']) as $id_publi) {
                    $publication_interest = DB::table('publicacions')
                                ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                ->where('id_type_publication',$request['type_filter_search_eva'])
                                ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                ->get();
                        $listResultArray = array_merge($publication_interest, $listResultArray);
                }
            }
        }
    }
    if (isset($request['area_request_eva_filter'])) {
        if(!isset($request['discipline_request_eva_filter']) ){

            foreach ($this->searchAreasFilter($request['area_request_eva_filter']) as $id_publi) {
                    $publication_interest = DB::table('publicacions')
                                ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                ->where('id_type_publication',$request['type_filter_search_eva'])
                                ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                ->get();
                        $listResultArray = array_merge($publication_interest, $listResultArray);
                }
                
        }
    }
    if (isset($request['discipline_request_eva_filter'])) {
        if (isset($request['area_request_eva_filter'])){
             foreach ($this->searchDisciplinesAreasFilter($request['discipline_request_eva_filter']) as $id_publi) {
                $publication_interest = DB::table('publicacions')
                            ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                            ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                            ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                            ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                            ->where('id_type_publication',$request['type_filter_search_eva'])
                            ->select('publicacions.*', 'institucions.*',  'lugars.*')
                            ->get();
                    $listResultArray = array_merge($publication_interest, $listResultArray);
            }
        }
        
    }







    }else{

         if ($request['institution_filter_isntitution_eva']=='') {
           

       
          if (isset($request['large_area_request_eva_filter'])) {
        if(!isset($request['area_request_eva_filter'])){

            if(!isset($request['discipline_request_eva_filter']) ){
    
                 foreach ($this->searchLargeAreasFilter($request['large_area_request_eva_filter']) as $id_publi) {
                    $publication_interest = DB::table('publicacions')
                                ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                ->where('publicacions.id_lugar_fk', $request['city_filter_city_eva'])
                                ->where('id_type_publication',$request['type_filter_search_eva'])
                                ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                ->get();
                        $listResultArray = array_merge($publication_interest, $listResultArray);
                }
            }
        }
    }
    if (isset($request['area_request_eva_filter'])) {
        if(!isset($request['discipline_request_eva_filter']) ){

            foreach ($this->searchAreasFilter($request['area_request_eva_filter']) as $id_publi) {
                    $publication_interest = DB::table('publicacions')
                                ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                ->where('publicacions.id_lugar_fk', $request['city_filter_city_eva'])
                                ->where('id_type_publication',$request['type_filter_search_eva'])
                                ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                ->get();
                        $listResultArray = array_merge($publication_interest, $listResultArray);
                }
                
        }
    }
    if (isset($request['discipline_request_eva_filter'])) {
        if (isset($request['area_request_eva_filter'])){
             foreach ($this->searchDisciplinesAreasFilter($request['discipline_request_eva_filter']) as $id_publi) {
                $publication_interest = DB::table('publicacions')
                            ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                            ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                            ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                            ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                            ->where('publicacions.id_lugar_fk', $request['city_filter_city_eva'])
                            ->where('id_type_publication',$request['type_filter_search_eva'])
                            ->select('publicacions.*', 'institucions.*',  'lugars.*')
                            ->get();
                    $listResultArray = array_merge($publication_interest, $listResultArray);
            }
        }
        
    }


        }else{

           
                     if (isset($request['large_area_request_eva_filter'])) {
                    if(!isset($request['area_request_eva_filter'])){

                        if(!isset($request['discipline_request_eva_filter']) ){
                
                             foreach ($this->searchLargeAreasFilter($request['large_area_request_eva_filter']) as $id_publi) {
                                $publication_interest = DB::table('publicacions')
                                            ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                            ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                            ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                            ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                            ->where('publicacions.id_institution_fk', $request['institution_filter_isntitution_eva'])
                                            ->where('id_type_publication',$request['type_filter_search_eva'])
                                            ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                            ->get();
                                    $listResultArray = array_merge($publication_interest, $listResultArray);
                            }
                        }
                    }
                }
                if (isset($request['area_request_eva_filter'])) {
                    if(!isset($request['discipline_request_eva_filter']) ){

                        foreach ($this->searchAreasFilter($request['area_request_eva_filter']) as $id_publi) {
                                $publication_interest = DB::table('publicacions')
                                            ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                            ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                            ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                            ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                            ->where('publicacions.id_institution_fk', $request['institution_filter_isntitution_eva'])
                                            ->where('id_type_publication',$request['type_filter_search_eva'])
                                            ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                            ->get();
                                    $listResultArray = array_merge($publication_interest, $listResultArray);
                            }
                            
                    }
                }
                if (isset($request['discipline_request_eva_filter'])) {
                    if (isset($request['area_request_eva_filter'])){
                         foreach ($this->searchDisciplinesAreasFilter($request['discipline_request_eva_filter']) as $id_publi) {
                            $publication_interest = DB::table('publicacions')
                                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                        ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                        ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                        ->where('publicacions.id_institution_fk', $request['institution_filter_isntitution_eva'])
                                        ->where('id_type_publication',$request['type_filter_search_eva'])
                                        ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                        ->get();
                                $listResultArray = array_merge($publication_interest, $listResultArray);
                        }
                    }
                    
                }
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
