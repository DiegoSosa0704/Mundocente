<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use Mundocente\Http\Requests;
use DB;
use Auth;
use Redirect;
use Mundocente\Http\Controllers\Controller;

use Mundocente\User;
use Mundocente\Vinculacion;



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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $usersQuantity = DB::table('users')
            ->where('email', $request['email'])
            ->count();

        if ($usersQuantity == 1) {

            return view('registro', ['existe' => '1']);
        } else {
            User::create([
                'name' => $request['username'],
                'email' => $request['email'],
                'last_name' => $request['lastName'],
                'rol' => 'seeker',
                'password' => bcrypt($request['password']),
                'recibe_not' => 'no',
                'nivel_formacion' => 'ninguno',
                'photo_url' => 'images/user.png',
                'state_user' => 'activo',

            ]);
            if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
                return Redirect::to('publications');
            }
        }


    }





 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editarusuario(Request $request)
    {


        
        echo "<br>Ciudad: ".$request['city'];
        
        
        
         

        
        
        echo "<br>Activación cuenta: ".$request['activacion_cuenta'];
        echo " - ";
        for ($n=0; $n < count($request['notification_type']); $n++) { 
            echo " recibe de ".$request['notification_type'][$n];
        }


/*
        Vinculacion::create([
                'id_user_fk' => Auth::user()->id,
                'id_institution_fk' => $request['institution'];
            ]);
*/
       

        if($request['notification']==true){
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['name' => $request['name'],
                    'curriculo_url'=>$request['link_curriculum'],
                    'nivel_formacion'=>$request['level_training'],
                    'recibe_not'=>'si']);
        }else{
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['name' => $request['name'],
                    'curriculo_url'=>$request['link_curriculum'],
                    'nivel_formacion'=>$request['level_training'],
                    'recibe_not'=>'no']);
        }
        return Redirect::to('edit-perfil');


    }


    public function agregarUniversidad(Request $request){
        if($request->ajax()){
            
           
            Vinculacion::create([
                'id_user_fk' => Auth::user()->id,
                'id_institution_fk' =>  $request['id_institute'],
            ]);

           $instituto =  DB::table('institucions')->where('id_institution', $request['id_institute'])->limit(1)->get();
           foreach ($instituto as $ins) {
               return  response()->json($ins->name_institution);

           }
           
        }
    }
 

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
