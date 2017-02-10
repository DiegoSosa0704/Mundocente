<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;
use Mundocente\Publicacion;
use Mundocente\AreasPublicacion;
use Auth;
use DB;

class PublicationsController extends Controller
{
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
                
                $institutionTable = DB::table('institucions')->where('id_institution', $request['id_institute'])->select('setor_institution')->get();
                $sectorInstitution = '';
                foreach ($institutionTable as $ins) {
                    $sectorInstitution = $ins->setor_institution;
                }
                
                $fecha_inicio = PublicationsController::converterToDateMysql($request['dateStart']);
                $fecha_fin = PublicationsController::converterToDateMysql($request['dateFinis']);
                
                 Publicacion::create([
                    'title_publication' => $request['title'],
                    'description_publication' => $request['description'],
                    'sector_publication' => $sectorInstitution,
                    'url_publication' => $request['url_link'],
                    'date_start' => "".$fecha_inicio,
                    'date_end' => "".$fecha_fin,
                    'contact_pubication' => $request['contact'],
                    'state_publication' => 'activo',
                    'id_type_publication' => 1,
                    'id_user_fk' => Auth::user()->id,
                    'id_lugar_fk' => $request['id_city'],

                ]);


                $publication_last= Publicacion::all();
                $last_id_publication = $publication_last->last()->id_publication;
                
                if ($request['allArea']=='1') {
                      if (!empty($request['disciplines'])) {
                        echo "<br>entró a id";
                        for ($i = count($request['disciplines']) - 1; $i >= 0; $i--) {
                            echo "for ----> "+$request['disciplines'][$i];
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => $request['disciplines'][$i],
                            ]);
                        }
                     }
                        echo "large: ".$request['large_area'];
                        if(!empty($request['large_area'])){

                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => $request['large_area'],
                            ]);
                        }
                         if(!empty($request['area'])){
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => $request['area'],
                            ]);
                        }

                }else{
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => 0,
                            ]);
                }
                
              
                
                
               
                echo "<br>";
               return  0;
           
        }
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
                        echo "<br>entró a id";
                        for ($i = count($request['disciplines']) - 1; $i >= 0; $i--) {
                            echo "for ----> "+$request['disciplines'][$i];
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => $request['disciplines'][$i],
                            ]);
                        }
                     }
                        echo "large: ".$request['large_area'];
                        if(!empty($request['large_area'])){

                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => $request['large_area'],
                            ]);
                        }
                         if(!empty($request['area'])){
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => $request['area'],
                            ]);
                        }

                }else{
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => 0,
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
                    'id_type_publication' => 3,
                    'id_user_fk' => Auth::user()->id,
                    'id_lugar_fk' => $request['id_city'],

                ]);


                $publication_last= Publicacion::all();
                $last_id_publication = $publication_last->last()->id_publication;
                
                if ($request['allArea']=='1') {
                      if (!empty($request['disciplines'])) {
                        echo "<br>entró a id";
                        for ($i = count($request['disciplines']) - 1; $i >= 0; $i--) {
                            echo "for ----> "+$request['disciplines'][$i];
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => $request['disciplines'][$i],
                            ]);
                        }
                     }
                        echo "large: ".$request['large_area'];
                        if(!empty($request['large_area'])){

                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => $request['large_area'],
                            ]);
                        }
                         if(!empty($request['area'])){
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => $request['area'],
                            ]);
                        }

                }else{
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => 0,
                            ]);
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
                    'id_type_publication' => $request['type_request'],
                    'id_user_fk' => Auth::user()->id,
                ]);


                $publication_last= Publicacion::all();
                $last_id_publication = $publication_last->last()->id_publication;
                
                if ($request['allArea']=='1') {
                      if (!empty($request['disciplines'])) {
                        echo "<br>entró a id";
                        for ($i = count($request['disciplines']) - 1; $i >= 0; $i--) {
                            echo "for ----> "+$request['disciplines'][$i];
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => $request['disciplines'][$i],
                            ]);
                        }
                     }
                        echo "large: ".$request['large_area'];
                        if(!empty($request['large_area'])){

                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => $request['large_area'],
                            ]);
                        }
                         if(!empty($request['area'])){
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => $request['area'],
                            ]);
                        }

                }else{
                             AreasPublicacion::create([
                                'id_publication_fk' => $last_id_publication,
                                'id_theme_fk' => 0,
                            ]);
                }
                
              
                
                
               
                echo "<br>";
               return  0;
               return  0;
           
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
