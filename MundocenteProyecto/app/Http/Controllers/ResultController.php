<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Redirect;
use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;
use Mundocente\Publicacion;
use Illuminate\Support\Collection as Collection;

class ResultController extends Controller
{



     public function __construct(){
        $this->middleware('auth', ['only' => ['publications']]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }




public function listPublicationsInterestRecomendation(){

    $publicationsHomeInterestRecomendation = DB::table('recomendaciones')
                        ->where('id_user_fk', Auth::user()->id)
                        ->select('recomendaciones.*')
                        ->get();
    
    return $publicationsHomeInterestRecomendation;
}





//Retorna toda la lista de ublicaciones
public function returnListPublications(){

    $listaAreasPublication = DB::table('areas_publicacions')->get();

    $listaUniono = DB::table('areas_publicacions')
        ->join('areas_interes', 'areas_publicacions.id_theme_fk', '=', 'areas_interes.id_theme_fk')
        ->where('areas_interes.id_user_fk', Auth::user()->id)
        ->select('areas_publicacions.id_publication_fk')
        ->orderBy('areas_interes.value_interest', 'asc')
        ->get();

       $listResultArray = array();
       foreach ($listaUniono as $id_publi) {
            $publication_interest = DB::table('publicacions')
                        ->join('institucions', 'publicacions.id_institution_fk', '=', 'institucions.id_institution')
                        ->join('tema__notificacions', 'publicacions.id_type_publication', '=', 'tema__notificacions.id_type_publications')
                        ->where('publicacions.id_publication', $id_publi->id_publication_fk)
                        ->select('publicacions.*', 'institucions.*', 'tema__notificacions.*')
                        ->get();
                $listResultArray = array_merge($publication_interest, $listResultArray);
        }
    return  $listResultArray;
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


public function listPublicationsInterest(){

    $publicationsHomeInterest = DB::table('areas_interes')
                        ->where('id_user_fk', Auth::user()->id)
                        ->select('areas_interes.*')
                        ->get();
    
    return $publicationsHomeInterest;
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
