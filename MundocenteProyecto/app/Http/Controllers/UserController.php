<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use Mundocente\Http\Requests;
use DB;
use Auth;
use Redirect;
use Mundocente\Http\Controllers\Controller;

use Mundocente\User;
use Mundocente\Institucion;
use Mundocente\Vinculacion;
use Mundocente\temaNotificacionUsuario;
use Mundocente\Areas_formacion;
use Mundocente\AreasInteres;

use Hash;




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

        
        
       


        if($request['notification']==true){
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['name' => $request['name'],
                    'curriculo_url'=>$request['link_curriculum'],
                    'nivel_formacion'=>$request['level_training'],
                    'recibe_not'=>'si']);
            
            DB::table('tema_notificacion_usuarios')->where('id_user_fk', Auth::user()->id)->delete();

             for ($n=0; $n < count($request['notification_type']); $n++) { 
                 temaNotificacionUsuario::create([
                'id_user_fk' => Auth::user()->id,
                'id_type_notifications_fk' => $request['notification_type'][$n],

                ]);
                
            }

        }else{
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['name' => $request['name'],
                    'curriculo_url'=>$request['link_curriculum'],
                    'nivel_formacion'=>$request['level_training'],
                    'recibe_not'=>'no']);
            DB::table('tema_notificacion_usuarios')->where('id_user_fk', Auth::user()->id)->delete();
        }
        return Redirect::to('edit-perfil');


    }












   /**
     * método que agrega universidad donde labora
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function agregarUniversidad(Request $request){
        if($request->ajax()){

            $quantityVinculation = Vinculacion::where('id_user_fk', Auth::user()->id)->where('id_institution_fk', $request['id_institute'])->count();

            if ($quantityVinculation==0) {
                    Vinculacion::create([
                   'id_user_fk' => Auth::user()->id,
                    'id_institution_fk' =>  $request['id_institute'],
                ]);
            }

           $instituto =  DB::table('institucions')->where('id_institution', $request['id_institute'])->limit(1)->get();
           foreach ($instituto as $ins) {
               return  response()->json($ins);

           }
           
        }
    }





   /**
     * método que agrega una nueva institución
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function agregarUniversidadNueva(Request $request){
        if($request->ajax()){
             Institucion::create([
                   'name_institution' => $request['name_new_institute'],
                    'setor_institution' =>  'universitario',
                    'state_institution' => 'nuevo',
                ]);

             $institutionNew= Institucion::all();

               Vinculacion::create([
                   'id_user_fk' => Auth::user()->id,
                    'id_institution_fk' =>  $institutionNew->last()->id_institution,
                ]);

             

               return  0;
           
        }
    }



   /**
     * Método que elimina una vinculación al usuario en sesión
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function eliminarVinculacion(Request $request){
        if($request->ajax()){
            DB::table('vinculacions')->where('id_institution_fk', $request['id_institute'])->delete();
            return 0;
        }
    }
 







   /**
     * método que agrega una gran área de formacion
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function agregarGranAreaDeFormacion(Request $request){
        if($request->ajax()){
            
             $quantityThemes = DB::table('areas_formacions')
                ->where('id_user_fk', Auth::user()->id)
                ->where('id_theme_fk', $request['id_gran_area_formacion_institute'])
                ->count();

                if ($quantityThemes==0) {
                     Areas_formacion::create([
                       'id_user_fk' => Auth::user()->id,
                        'id_theme_fk' =>  $request['id_gran_area_formacion_institute'],
                    ]);
                }

                 $gran_area_formacion =  DB::table('areas_formacions')
                    ->join('temas', 'areas_formacions.id_theme_fk', '=', 'temas.id_tema')
                     ->where('id_user_fk', Auth::user()->id)
                     ->where('id_theme_fk', $request['id_gran_area_formacion_institute'])
                     ->select('areas_formacions.*', 'temas.*')
                     ->limit(1)
                     ->get();
                   foreach ($gran_area_formacion as $gran_area_f) {
                       return  response()->json($gran_area_f);

                   }
        }
    }


      /**
     * Método que elimina una gran área de formación
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function eliminarGranAreaDeFormacion(Request $request){
        if($request->ajax()){
            DB::table('areas_formacions')->where('id_areas_formacion', $request['id_gran_area_formcion'])->delete();
            return 0;
        }
    }








 /**
     * método que agrega una gran área de formacion
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function agregarGranAreaDeInterest(Request $request){
        if($request->ajax()){
            
             $quantityThemes = DB::table('areas_interes')
                ->where('id_user_fk', Auth::user()->id)
                ->where('id_theme_fk', $request['id_gran_area_formacion_institute'])
                ->count();

                if ($quantityThemes==0) {
                     AreasInteres::create([
                       'id_user_fk' => Auth::user()->id,
                        'id_theme_fk' =>  $request['id_gran_area_formacion_institute'],
                    ]);
                }

                 $gran_area_formacion =  DB::table('areas_interes')
                    ->join('temas', 'areas_interes.id_theme_fk', '=', 'temas.id_tema')
                     ->where('id_user_fk', Auth::user()->id)
                     ->where('id_theme_fk', $request['id_gran_area_formacion_institute'])
                     ->select('areas_interes.*', 'temas.*')
                     ->limit(1)
                     ->get();
                   foreach ($gran_area_formacion as $gran_area_f) {
                       return  response()->json($gran_area_f);

                   }
        }
    }


      /**
     * Método que elimina una gran área de formación
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function eliminarGranAreaDeInterest(Request $request){
        if($request->ajax()){
            DB::table('areas_interes')->where('id_areas_interes', $request['id_gran_area_interes'])->delete();
            return 0;
        }
    }










    //Método para cambiar contraseña

    public function cambiarContrasena(Request $request){

         if($request->ajax()){
            $mypass = Auth::user()->password;
              

            $password_newChange = $request['passwordNowChange'];
           if (Hash::check($password_newChange, $mypass)) {

                $user = Auth::user();
                $user->password = bcrypt($password_newChange);
                $user->save();

                Hash::make(bcrypt($password_newChange));


                return 1;
            }else{
                return 0;
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
