<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use DB;

class FilterController extends Controller
{


    public function __construct(){
        $this->middleware('auth', ['only' => ['index','searchLargeAreasFilter', 'buscarconocatorias']]);
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
    $tableLargeAreas = DB::table('temas')->where('id_tema_area',$id_gra_area)->get();
    $listareas = array();
    foreach ($tableLargeAreas as $gra_area) {
         $lista_gra_area = DB::table('temas')
            ->where('id_tema_area', $gra_area->id_tema)
            ->distinct()
            ->get();
        $listareas = array_merge($lista_gra_area, $listareas);
    }

    $listDisciplines = array();
    $listRepeat = array();
    
    foreach ($listareas as $area) {
         $lista_area = DB::table('areas_publicacions')
            ->where('id_theme_fk', $area->id_tema)
            ->select('id_publication_fk')
            ->distinct()
            ->get();

            $listDisciplines = array_merge($lista_area, $listDisciplines);           
    }


    $arrayFinishResults = array();

    foreach ($listDisciplines as $disci) {
            if(!in_array($disci->id_publication_fk, $listRepeat)){
                array_push($listRepeat, $disci->id_publication_fk);
                array_push($arrayFinishResults, $disci);
            }
    }

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











public function buscarconocatorias(Request $request){
    
    $listResultArray = array();
    


    if (isset($request['large_area_filter_annoucement'])) {
        if(!isset($request['area_filter_annoucement'])){
            if(!isset($request['discipline_filter_annoucement_name']) ){
                 foreach ($this->searchLargeAreasFilter($request['large_area_filter_annoucement']) as $id_publi) {
                    $publication_interest = DB::table('publicacions')
                                ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                ->where('id_type_publication','1')
                                ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                ->get();
                        $listResultArray = array_merge($publication_interest, $listResultArray);
                }
            }
        }
    }
    if (isset($request['area_filter_annoucement'])) {
        if(!isset($request['discipline_filter_annoucement_name']) ){
            foreach ($this->searchAreasFilter($request['area_filter_annoucement']) as $id_publi) {
                    $publication_interest = DB::table('publicacions')
                                ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                                ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                                ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                                ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                                ->where('id_type_publication','1')
                                ->select('publicacions.*', 'institucions.*',  'lugars.*')
                                ->get();
                        $listResultArray = array_merge($publication_interest, $listResultArray);
                }
                echo "if 1";
        }
    }


     if (isset($request['area_filter_annoucement'])) {
        if(!isset($request['discipline_filter_annoucement_name'])){
             foreach ($this->searchAreasFilter($request['area_filter_annoucement']) as $id_publi) {
                $publication_interest = DB::table('publicacions')
                            ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                            ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                            ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                            ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                            ->where('id_type_publication','1')
                            ->select('publicacions.*', 'institucions.*',  'lugars.*')
                            ->get();
                    $listResultArray = array_merge($publication_interest, $listResultArray);
            }
            echo "if 2";
        }
       
    }


      if (isset($request['discipline_filter_annoucement_name'])) {
        
             foreach ($this->searchAreasFilter($request['area_filter_annoucement']) as $id_publi) {
                $publication_interest = DB::table('publicacions')
                            ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                            ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                            ->join('lugars', 'publicacions.id_lugar_fk', '=', 'lugars.id_lugar')
                            ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                            ->where('id_type_publication','1')
                            ->select('publicacions.*', 'institucions.*',  'lugars.*')
                            ->get();
                    $listResultArray = array_merge($publication_interest, $listResultArray);
            }
            echo "if 3";
        
       
    }

    dd();




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


//    echo "<br>área: ".$request['area_filter_annoucement'];

    
    
//    for ($i=0; $i < count($request['discipline_filter_annoucement_name']); $i++) { 
//        echo "<br>Disciplina: ".$request['discipline_filter_annoucement_name'][$i];
//    }
        
    
//    echo "<br>País: ".$request['country_filter_country_annoucement'];
//    echo "<br>Ciudad: ".$request['city_filter_city_annoucement'];
//    echo "<br>Institución: ".$request['institution_filter_isntitution_annoucement'];
    
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
