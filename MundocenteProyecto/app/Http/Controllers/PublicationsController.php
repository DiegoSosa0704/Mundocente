<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;
use Mundocente\Publicacion;
use Mundocente\AreasPublicacion;
use Auth;
use DB;
use Mundocente\RevistaNivel;
use Mundocente\Favorito;
use Mundocente\Guardado;
use Mundocente\Notification;
use Mundocente\Denuncia;
class PublicationsController extends Controller
{



     public function __construct(){
        $this->middleware('auth', ['only' => ['uploadImagePublication', 'agregarConvocatoria', 'agregarEvento','agregarRevista','agregarSolicitud', 'obtienetablaareas', 'agregarafavoritos', 'agregaraainteresados', 'agregarDenuncia', 'ediatrEvento', 'editarConvocatoria', 'editarSolicitud']]);

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






    public function converterToDateMysql($date){
        
        $sincoma = str_replace(",", "", $date);
        $porciones = explode(" ", $sincoma);
        $p1 = $porciones[0]; 
        $p2 = $porciones[1]; 
        $p3 = $porciones[2];


        if($p1=='Enero'){
            $p1 = '01';
        }else if($p1=='Febrero'){
            $p1 = '02';
        }else if($p1=='Marzo'){
            $p1 = '03';
        }else if($p1=='Abril'){
            $p1 = '04';
        }else if($p1=='Mayo'){
            $p1 = '05';
        }else if($p1=='Junio'){
            $p1 = '06';
        }else if($p1=='Julio'){
            $p1 = '07';
        }else if($p1=='Agosto'){
            $p1 = '08';
        }else if($p1=='Septiembre'){
            $p1 = '09';
        }else if($p1=='Octubre'){
            $p1 = '10';
        }else if($p1=='Noviembre'){
            $p1 = '11';
        }else if($p1=='Diciembre'){
            $p1 = '12';
        }

        $union = $p3.'-'.$p1.'-'.$p2;

        return $union;
    }





    public function uploadImagePublication(){
        $publication_last= Publicacion::all();
        $last_id_publication = $publication_last->last()->id_publication;
        if(isset($_FILES["file"])){
            $file = $_FILES["file"];
            $name_image = $file["name"];
            $type = $file["type"];
            $routAux = $file["tmp_name"];
            $size = $file["size"];
            $dimensions = getimagesize($routAux);
            
            $withImage = $dimensions[0];
            $heigthImage = $dimensions[1];
            $name_folder = "files/";
          
                $srcImage = $name_folder.Auth::user()->id.$last_id_publication.$name_image;
                move_uploaded_file($routAux, $srcImage);
                
               

                if($type == 'image/jpg' || $type == 'image/jpeg'){
                    $image =  imagecreatefromjpeg($srcImage);
                }else if($type == 'image/png'){
                    $image =  imagecreatefrompng($srcImage);
                }else if($type == 'image/gif'){
                    $image =  imagecreatefromgif($srcImage);
                }
                
                
                $imageScaled = imagescale($image, 100);
                
                imagejpeg($image, $srcImage,20);
                
                imagedestroy($image);

                $imageSize = getimagesize($srcImage);
                
            
        }
        return $srcImage;
    }



/**
     * Método que sirve para crear una nueva convocatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function agregarConvocatoria(Request $request)
    {
           if($request->ajax()){
                
                $fecha_inicio = PublicationsController::converterToDateMysql($request['dateStart']);
                $fecha_fin = PublicationsController::converterToDateMysql($request['dateFinis']);
                
                 Publicacion::create([
                    'title_publication' => $request['title'],
                    'description_publication' => $request['description'],
                    'sector_publication' => $request['sector_request'],
                    'url_publication' => $request['url_link'],
                    'date_start' => "".$fecha_inicio,
                    'date_end' => "".$fecha_fin,
                    'contact_pubication' => $request['contact'],
                    'state_publication' => 'activo',
                    'id_type_publication' => 1,
                    'id_institution_fk' => $request['id_institute'],
                    'id_user_fk' => Auth::user()->id,
                    'id_lugar_fk' => $request['id_city'],

                ]);


                $publication_last= Publicacion::all();
                $last_id_publication = $publication_last->last()->id_publication;
                
                
                if ($request['allArea']=='1') {

                      if (!empty($request['disciplines'])) {
                        
                        for ($i = count($request['disciplines']) - 1; $i >= 0; $i--) {
                            
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => $request['disciplines'][$i],
                            ]);
                        }
                     }
                }else{
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => 1,
                            ]);
                }
        }
        $cero = 0;
        return  $cero;
    }











/**
     * Método que sirve para crear una nueva Evento
     *
     * @return \Illuminate\Http\Response
     */
    public function agregarEvento(Request $request)
    {
           if($request->ajax()){
                   
                $fecha_inicio = PublicationsController::converterToDateMysql($request['dateStart']);
                $fecha_fin = PublicationsController::converterToDateMysql($request['dateFinis']);
                
                 Publicacion::create([
                    'title_publication' => $request['title'],
                    'description_publication' => $request['description'],
                    'sector_publication' => $request['sector_request'],
                    'url_publication' => $request['url_link'],
                    'url_photo_publication' => $request['url_image'],
                    'date_start' => "".$fecha_inicio,
                    'date_end' => "".$fecha_fin,
                    'hour_start' => $request['hour_i'],
                    'hour_end' => $request['hour_f'],
                    'id_institution_fk' => $request['id_institute'],
                    'contact_pubication' => $request['contact'],
                    'state_publication' => 'activo',
                    'id_type_publication' => 3,
                    'id_user_fk' => Auth::user()->id,
                    'id_lugar_fk' => $request['id_city'],

                ]);


                $publication_last= Publicacion::all();
                $last_id_publication = $publication_last->last()->id_publication;
                
                if ($request['allArea']=='1') {
                      if (!empty($request['disciplines'])) {
                        
                        for ($i = count($request['disciplines']) - 1; $i >= 0; $i--) {
                            
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => $request['disciplines'][$i],
                            ]);
                        }
                     }
                       

                }else{
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => 1,
                            ]);
                }
                
              
                
                
               return  0;
           
        }
    }






    /**
     * Método que sirve para crear una nueva Revista
     *
     * @return \Illuminate\Http\Response
     */
    public function agregarRevista(Request $request)
    {
           if($request->ajax()){
                
                 Publicacion::create([
                    'title_publication' => $request['title'],
                    'url_publication' => $request['url_link'],
                    'url_photo_publication' => $request['url_image'],
                    'contact_pubication' => $request['contact'],
                    'state_publication' => 'activo',
                    'id_type_publication' => 2,
                    'id_institution_fk' => $request['id_institute'],
                    'id_user_fk' => Auth::user()->id,
                    'id_lugar_fk' => $request['id_city'],

                ]);


                $publication_last= Publicacion::all();
                $last_id_publication = $publication_last->last()->id_publication;
                
                if ($request['allArea']=='1') {
                      if (!empty($request['disciplines'])) {
                        
                        for ($i = count($request['disciplines']) - 1; $i >= 0; $i--) {
                            
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => $request['disciplines'][$i],
                            ]);
                        }
                     }
                      

                }else{
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => 1,
                            ]);
                }


                if (!empty($request['arraylevels'])) {
                    for ($i=0; $i < count($request['arraylevels']); $i++) { 
                        RevistaNivel::create([
                            'id_publications_fk' => $last_id_publication,
                            'id_level_fk' => $request['arraylevels'][$i],
                            ]);
                    }
                }
                
               return  0;
           
        }
    }



    /**
     * Método que sirve para crear una nueva Solicitud
     *
     * @return \Illuminate\Http\Response
     */
    public function agregarSolicitud(Request $request)
    {
           if($request->ajax()){
                 
               
                $fecha_inicio = PublicationsController::converterToDateMysql($request['dateStart']);
                $fecha_fin = PublicationsController::converterToDateMysql($request['dateFinis']);
                
                 Publicacion::create([
                    'title_publication' => $request['title'],
                    'description_publication' => $request['description'],
                    'date_start' => "".$fecha_inicio,
                    'date_end' => "".$fecha_fin,
                    'contact_pubication' => $request['contact'],
                    'sector_publication' => $request['sector_request'],
                    'state_publication' => 'activo',
                    'id_institution_fk' => $request['id_institute'],
                    'id_type_publication' => $request['type_request'],
                    'id_user_fk' => Auth::user()->id,
                    'id_lugar_fk' => $request['id_city'],
                ]);


                $publication_last= Publicacion::all();
                $last_id_publication = $publication_last->last()->id_publication;
                
                if ($request['allArea']=='1') {
                      if (!empty($request['disciplines'])) {
                        
                        for ($i = count($request['disciplines']) - 1; $i >= 0; $i--) {
                            
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => $request['disciplines'][$i],
                            ]);
                        }
                     }
                   

                }else{
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => 1,
                            ]);
                }
                
              
                
                
               
                
               return  0;
               return  0;
           
        }
    }



























/**
     * Método que sirve para editaruna convocatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function editarConvocatoria(Request $request)
    {
           if($request->ajax()){

        
                
                $fecha_inicio = PublicationsController::converterToDateMysql($request['dateStart']);
                $fecha_fin = PublicationsController::converterToDateMysql($request['dateFinis']);
             
                 DB::table('publicacions')
                ->where('id_publication', $request['id_p'])
                ->update([
                    'title_publication' => $request['title'],
                    'description_publication' => $request['description'],
                    'sector_publication' =>  $request['sector_request'],
                    'url_publication' => $request['url_link'],
                    'date_start' => "".$fecha_inicio,
                    'date_end' => "".$fecha_fin,
                    'contact_pubication' => $request['contact'],
                    'state_publication' => 'activo',
                    'id_type_publication' => 1,
                    'id_institution_fk' => $request['id_institute'],
                    'id_user_fk' => Auth::user()->id,
                    'id_lugar_fk' => $request['id_city'],

                ]);

                DB::table('areas_publicacions')->where('id_publication_fk', $request['id_p'])->delete();

                if ($request['allArea']=='1') {

                      if (!empty($request['disciplines'])) {
                        for ($i = count($request['disciplines']) - 1; $i >= 0; $i--) {
                            
                             AreasPublicacion::create([
                                'id_publication_fk' => $request['id_p'],
                                'id_theme_fk' => $request['disciplines'][$i],
                            ]);
                        }
                     }
                }else{
                             AreasPublicacion::create([
                                'id_publication_fk' => $request['id_p'],
                                'id_theme_fk' => 1,
                            ]);
                }
        }
        $cero = 0;
        return  $cero;
    }



    

    /**
     * Método que sirve para editar un Evento
     *
     * @return \Illuminate\Http\Response
     */
    public function ediatrEvento(Request $request)
    {
           if($request->ajax()){
                   
                $fecha_inicio = PublicationsController::converterToDateMysql($request['dateStart']);
                $fecha_fin = PublicationsController::converterToDateMysql($request['dateFinis']);
                
                 DB::table('publicacions')
                ->where('id_publication', $request['id_p'])
                ->update([
                    'title_publication' => $request['title'],
                    'description_publication' => $request['description'],
                    'sector_publication' => $request['sector_request'],
                    'url_publication' => $request['url_link'],
                    'url_photo_publication' => $request['url_image'],
                    'date_start' => "".$fecha_inicio,
                    'date_end' => "".$fecha_fin,
                    'hour_start' => $request['hour_i'],
                    'hour_end' => $request['hour_f'],
                    'id_institution_fk' => $request['id_institute'],
                    'contact_pubication' => $request['contact'],
                    'state_publication' => 'activo',
                    'id_type_publication' => 3,
                    'id_user_fk' => Auth::user()->id,
                    'id_lugar_fk' => $request['id_city'],

                ]);



                DB::table('areas_publicacions')->where('id_publication_fk', $request['id_p'])->delete();
                
                if ($request['allArea']=='1') {
                      if (!empty($request['disciplines'])) {
                        
                        for ($i = count($request['disciplines']) - 1; $i >= 0; $i--) {
                            
                             AreasPublicacion::create([
                                'id_publication_fk' => $request['id_p'],
                                'id_theme_fk' => $request['disciplines'][$i],
                            ]);
                        }
                     }
                       

                }else{
                             AreasPublicacion::create([
                                'id_publication_fk' => $request['id_p'],
                                'id_theme_fk' => 1,
                            ]);
                }
                
              
                
                
               return  0;
           
        }
    }






/**
     * Método que sirve para editar Solicitud
     *
     * @return \Illuminate\Http\Response
     */
    public function editarSolicitud(Request $request)
    {
           if($request->ajax()){
                 

               
                $fecha_inicio = PublicationsController::converterToDateMysql($request['dateStart']);
                $fecha_fin = PublicationsController::converterToDateMysql($request['dateFinis']);
                
                DB::table('publicacions')
                ->where('id_publication', $request['id_p'])
                ->update([
                    'title_publication' => $request['title'],
                    'description_publication' => $request['description'],
                    'date_start' => "".$fecha_inicio,
                    'date_end' => "".$fecha_fin,
                    'contact_pubication' => $request['contact'],
                    'sector_publication' => $request['sector_request'],
                    'state_publication' => 'activo',
                    'id_institution_fk' => $request['id_institute'],
                    'id_type_publication' => $request['type_request'],
                    'id_user_fk' => Auth::user()->id,
                    'id_lugar_fk' => $request['id_city'],
                ]);

                DB::table('areas_publicacions')->where('id_publication_fk', $request['id_p'])->delete();
                
                if ($request['allArea']=='1') {
                      if (!empty($request['disciplines'])) {
                        
                        for ($i = count($request['disciplines']) - 1; $i >= 0; $i--) {
                            
                             AreasPublicacion::create([
                                'id_publication_fk' => $request['id_p'],
                                'id_theme_fk' => $request['disciplines'][$i],
                            ]);
                        }
                     }
                }else{
                             AreasPublicacion::create([
                                'id_publication_fk' => $request['id_p'],
                                'id_theme_fk' => 1,
                            ]);
                }
                
               return  0;
           
        }
    }












     /**
     * Método que sirve para editar Revista
     *
     * @return \Illuminate\Http\Response
     */
    public function editarRevista(Request $request)
    {
           if($request->ajax()){
                
                 DB::table('publicacions')
                ->where('id_publication', $request['id_p'])
                ->update([
                    'title_publication' => $request['title'],
                    'url_publication' => $request['url_link'],
                    'url_photo_publication' => $request['url_image'],
                    'contact_pubication' => $request['contact'],
                    'state_publication' => 'activo',
                    'id_type_publication' => 2,
                    'id_institution_fk' => $request['id_institute'],
                    'id_user_fk' => Auth::user()->id,
                    'id_lugar_fk' => $request['id_city'],

                ]);


                DB::table('areas_publicacions')->where('id_publication_fk', $request['id_p'])->delete();
                
                if ($request['allArea']=='1') {
                      if (!empty($request['disciplines'])) {
                        
                        for ($i = count($request['disciplines']) - 1; $i >= 0; $i--) {
                            
                             AreasPublicacion::create([
                                'id_publication_fk' => $request['id_p'],
                                'id_theme_fk' => $request['disciplines'][$i],
                            ]);
                        }
                     }
                      

                }else{
                             AreasPublicacion::create([
                                'id_publication_fk' => $request['id_p'],
                                'id_theme_fk' => 1,
                            ]);
                }

                DB::table('revista_nivels')->where('id_publications_fk', $request['id_p'])->delete();


                if (!empty($request['arraylevels'])) {
                    for ($i=0; $i < count($request['arraylevels']); $i++) { 
                        RevistaNivel::create([
                            'id_publications_fk' => $request['id_p'],
                            'id_level_fk' => $request['arraylevels'][$i],
                            ]);
                    }
                }
                
               return  0;
           
        }
    }
















//Método ue retorna los lugares de la publicación

  public function obtienetablaareas(Request $request, $id_publication){
        if($request->ajax()){
            $areas = DB::table('areas_publicacions')
                ->join('temas','areas_publicacions.id_theme_fk','=','temas.id_tema')
                ->where('areas_publicacions.id_publication_fk', $id_publication)
                ->get();
            return response()->json($areas);
        }
    }


//Método que extrae todos los índices y clasificaciones de una revista


 public function obtenerClasificaciones(Request $request, $id_publication){
        if($request->ajax()){
            $list_paper_index = DB::table('revista_nivels')
                ->join('nivels','revista_nivels.id_level_fk','=','nivels.id_level')
                ->where('revista_nivels.id_publications_fk', $id_publication)
                ->select('nivels.*')
                ->get();
            return response()->json($list_paper_index);
        }
    }

//Método que extrae todos los índices y clasificaciones de una revista


 public function obtenerTiposIndexacion(Request $request, $id_level){
        if($request->ajax()){
            $list_paper_index = DB::table('nivels')
                ->join('indices','nivels.id_index_fk','=','indices.id_index')
                ->where('nivels.id_level', $id_level)
                ->select('indices.*', 'nivels.*')
                ->get();
            return response()->json($list_paper_index);
        }
    }


















//agrega o quita usuarios a la tabla favoritos
public function agregarafavoritos(Request $request){
     if($request->ajax()){

        $compareExist = DB::table('favoritos')->where('id_user_fk', Auth::user()->id)->where('id_publication_fk', $request['id_publication'])->count();
        if($compareExist==0){
            Favorito::create([
                   'id_user_fk' => Auth::user()->id,
                    'id_publication_fk' =>  $request['id_publication'],
                ]);
            $quantityValueeCountView = DB::table('publicacions')->where('id_publication', $request['id_publication'])->get();
             
             foreach ($quantityValueeCountView as $publication) {
                 $auqntity = $publication->count_view;
                  DB::table('publicacions')
                     ->where('id_publication', $publication->id_publication)
                     ->update(['count_view' => ($auqntity+1)]);
             }
           
        }else{
            DB::table('favoritos')->where('id_user_fk', Auth::user()->id)->where('id_publication_fk', $request['id_publication'])->delete();
        }

        $quantitFavorite = DB::table('favoritos')->where('id_publication_fk', $request['id_publication'])->count();
            
            return $quantitFavorite;
        }
}

//agrega o quita a tbla de interesados


public function agregaraainteresados(Request $request){
     if($request->ajax()){
               $compareExist = DB::table('interesados')->where('id_user_fk', Auth::user()->id)->where('id_publication_fk', $request['id_publication'])->count();
        if($compareExist==0){
            Guardado::create([
                   'id_user_fk' => Auth::user()->id,
                    'id_publication_fk' =>  $request['id_publication'],
                ]);
            $id_user_publicator = DB::table('publicacions')->where('id_publication', $request['id_publication'])->select('publicacions.id_user_fk')->get();
            foreach ($id_user_publicator as $id_p) {
                 Notification::create([
                   'id_user_notification' =>$id_p->id_user_fk,
                ]);
             }
              $quantityValueeCountView = DB::table('publicacions')->where('id_publication', $request['id_publication'])->get();
             
             foreach ($quantityValueeCountView as $publication) {
                 $auqntity = $publication->count_view;
                  DB::table('publicacions')
                     ->where('id_publication', $publication->id_publication)
                     ->update(['count_view' => ($auqntity+1)]);
             }
        }else{
            DB::table('interesados')->where('id_user_fk', Auth::user()->id)->where('id_publication_fk', $request['id_publication'])->delete();
        }

        $quantitFavorite = DB::table('interesados')->where('id_publication_fk', $request['id_publication'])->count();
            
            return $quantitFavorite;
        }
}

    

//agrega o quita usuarios a la tabla denuncias
public function agregarDenuncia(Request $request){
     if($request->ajax()){
        $id_user_publicator = DB::table('publicacions')->where('id_publication', $request['id_publication'])->select('publicacions.id_user_fk')->get();
            foreach ($id_user_publicator as $id_p) {
                 Notification::create([
                   'id_user_notification' =>$id_p->id_user_fk,
                ]);
             }
            Denuncia::create([
                   'id_user_fk' => Auth::user()->id,
                    'id_publication_fk' =>  $request['id_publication'],
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
