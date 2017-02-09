<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;

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
