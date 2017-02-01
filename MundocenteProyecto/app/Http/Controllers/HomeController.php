<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Nos lleva al landingpage/index de la aplicación 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

/**
     * Nos lleva al formulario para editar mi perfils
     *
     * @return \Illuminate\Http\Response
     */
    public function editarmiperfil()
    {
        return view('formularios.formulariousuario');
    }



 /**
     * Nos lleva al formulario para logueo
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login');
    }



     /**
     * Nos lleva a la página de registro 
     *
     * @return \Illuminate\Http\Response
     */
    public function registrar()
    {
        return view('registro', ['existe' => '0']);
    }




 /**
     * Nos lleva a la página de publicaciones
     *
     * @return \Illuminate\Http\Response
     */
    public function publications()
    {
        return view('main.publication');
    }




 /**
     * Nos lleva a la página de publicar convocatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function publicarconvocatoria()
    {
        return view('formularios.formularioconvocatoria');
    }


     /**
     * Nos lleva a la página de publicar convocatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function publicarrevista()
    {
        return view('formularios.formulariorevista');
    }




     /**
     * Nos lleva a la página de publicar convocatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function publicarinvitacion()
    {
        return view('formularios.formularioinvitacion');
    }



     /**
     * Nos lleva a la página de publicar convocatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function publicarevento()
    {
        return view('formularios.formularioevento');
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
