<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use Mundocente\Http\Requests;
use DB;
use Auth;
use Redirect;
use Mundocente\Http\Controllers\Controller;

use Mundocente\User;

class UserController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
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

        $usersQuantity = DB::table('users')
            ->where('email', $request['email'])
            ->count();

        if($usersQuantity==1){
            
            return view('registro', ['existe' => '1']);
        }else{
                 User::create([
                    'name'=>$request['username'],
                    'email'=>$request['email'],
                    'rol'=>'seeker',
                    'password'=>bcrypt($request['password']),
                    'recibe_not'=>'no',
                    'nivel_formacion'=>'ninguno',
                    'photo_url'=>'images/user.png',
                    
                ]);
             if(Auth::attempt(['email'=>$request['email'], 'password'=> $request['password']])){
            return Redirect::to('publications');
            }
        }

       

        
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
