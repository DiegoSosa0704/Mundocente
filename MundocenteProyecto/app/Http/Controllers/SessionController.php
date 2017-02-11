<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Redirect;
use DB;
use Session;
use OAuth;

use Mundocente\User;

use Mundocente\Http\Requests;
use Mundocente\Http\Requests\SessionRequest;
use Mundocente\Http\Controllers\Controller;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
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
     * Se inicia sesión con correo y contraseña
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SessionRequest $request)
    {
        if(Auth::attempt(['email'=>$request['email'], 'password'=> $request['password']])){
                    if($request['checkboxrememberpassword']=='on'){
                        if (setcookie("email_cookie",$request['email'], time()+(60*60*24*365),"/")) {
                            if (setcookie("pass_cookie",$request['password'], time()+(60*60*24*365),"/")) {
                               
                            }
                        }
                    }else{
                        if((isset($_COOKIE["email_cookie"]))||(isset($_COOKIE["pass_cookie"]))){
                                if (setcookie("email_cookie",$_COOKIE["email_cookie"], time()-(5),"/")) {
                                    if (setcookie("pass_cookie",$_COOKIE["pass_cookie"], time()-(5),"/")) {
                                    }
                                }
                        } 
                    }
            return Redirect::to('publicaciones');
        }
        Session::flash('message-error-session', 'Los datos son incorrectos');
            return Redirect::to('login');
    }



     /**
     * Ingesa con facebook
     *
     * @return \Illuminate\Http\Response
     */
    public function authfacebook()
    {     
        return OAuth::authorize('facebook');
    }





       /**
     * Inicia sesión con facebook
     *
     * @return \Illuminate\Http\Response
     */
    public function sesionfacebook()
    {

        
    
OAuth::login('facebook',  function($user, $details) {
    $usersQuantity = DB::table('users')
            ->where('email', $details->email)
            ->count();
        if($usersQuantity==0){
            $user->name = $details->nickname;
            $user->email = $details->email;
            $user->photo_url = $details->avatar;
            $user->rol = 'seeker';
            $user->recibe_not='no';
            $user->nivel_formacion='ninguno';
            $user->save();
        }

        });
    return Redirect::to('publicaciones');


        dd(Auth::user());
       
        
    }







     /**
     * Ingesa con google
     *
     * @return \Illuminate\Http\Response
     */
    public function authgoogle()
    {     
        return OAuth::authorize('google');
    }





       /**
     * Inicia sesión con google
     *
     * @return \Illuminate\Http\Response
     */
    public function sesiongoogle()
    {
       OAuth::login('google',  function($user, $details) {
    $usersQuantity = DB::table('users')
            ->where('email', $details->email)
            ->count();
        if($usersQuantity==0){
            $user->name = $details->full_name;
            $user->email = $details->email;
            $user->photo_url = $details->avatar;
            $user->rol = 'seeker';
            $user->recibe_not='no';
            $user->nivel_formacion='ninguno';
            $user->save();
        }

        });
    return Redirect::to('publicaciones');


        dd(Auth::user());
         
        
        
    }






         /**
     * Ingesa con linkedin
     *
     * @return \Illuminate\Http\Response
     */
    public function authlinkedin()
    {     
        return OAuth::authorize('linkedin');
    }





       /**
     * Inicia sesión con linkedin
     *
     * @return \Illuminate\Http\Response
     */
    public function sesionlinkedin()
    {
       OAuth::login('linkedin',  function($user, $details) {
    $usersQuantity = DB::table('users')
            ->where('email', $details->email)
            ->count();
        if($usersQuantity==0){
            $user->name = $details->full_name;
            $user->email = $details->email;
            $user->photo_url = $details->avatar;
            $user->rol = 'seeker';
            $user->recibe_not='no';
            $user->nivel_formacion='ninguno';
            $user->save();
        }

        });
    return Redirect::to('publicaciones');


        dd(Auth::user());
         
         
        
        
    }



        /**
     * Cierra sesión
     *
     * @return \Illuminate\Http\Response
     */
    public function enviarexistente()
    {
        return view('registro', ['existe' => '1']);
    }




        /**
     * Cierra sesión
     *
     * @return \Illuminate\Http\Response
     */
    public function cerrarsesion()
    {
        if((isset($_COOKIE["email_cookie"]))||(isset($_COOKIE["pass_cookie"]))){
                if (setcookie("email_cookie",$_COOKIE["email_cookie"], time()-(5),"/")) {
                    if (setcookie("pass_cookie",$_COOKIE["pass_cookie"], time()-(5),"/")) {
                    }
                }
        } 
        Auth::logout();
        return Redirect::to('/');
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
