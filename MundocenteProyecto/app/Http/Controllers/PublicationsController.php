<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;
use Mundocente\Publicacion;
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




/**
     * Método que sirve para crear una nueva convocatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function agregarConvocatoria(Request $request)
    {
           if($request->ajax()){
                
                echo "<br>id país".$request['id_country'];
                
                echo "<br>dato inicio".$request['dateStart'];
                echo "<br>dato final".$request['dateFinis'];
                
                

                $institutionTable = DB::table('institucions')->where('id_institution', $request['id_institute'])->select('state_institution')->get();
                $sectorInstitution = '';
                foreach ($institutionTable as $ins) {
                    $sectorInstitution = $ins->state_institution;
                }
                
                
                echo "<br>todas: ".$request['allArea'];


                 Publicacion::create([
                    'title_publication' => $request['title'],
                    'description_publication' => $request['description'],
                    'sector_publication' => $sectorInstitution,
                    'url_publication' => $request['url_link'],
                    'contact_pubication' => $request['contact'],
                    'state_publication' => 'activo',
                    'id_type_publication' => 1,
                    'id_user_fk' => Auth::user()->id,
                    'id_lugar_fk' => $request['id_city'],

                ]);


                if ($request['allArea']=='0') {
                      if (!empty($request['disciplines'])) {
                        for ($i = count($request['disciplines']) - 1; $i >= 0; $i--) {
                            echo "<br>id discipline: ".$request['disciplines'][$i];
                        }
                        echo "<br>gran área".$request['large_area'];
                        echo "<br>área".$request['area'];
                    }
                }else{
                    echo "Se guardan todas las áreas";
                }
                
              
                
                
               

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
