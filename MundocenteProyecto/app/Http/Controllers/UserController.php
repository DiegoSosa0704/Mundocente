<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use Mundocente\Http\Requests;
use DB;
use Auth;
use Redirect;
use Mail;
use Mundocente\Http\Controllers\Controller;

use Mundocente\User;
use Mundocente\Institucion;
use Mundocente\Vinculacion;
use Mundocente\temaNotificacionUsuario;
use Mundocente\Areas_formacion;
use Mundocente\AreasInteres;

use Illuminate\Support\Facades\Password;
use Mundocente\Http\Controllers\Auth\PasswordController;



use Hash;




class UserController extends Controller
{
    public static $emailGlobal = '';

     public function __construct(){
        if((isset($_COOKIE["email_cookie"]))||(isset($_COOKIE["pass_cookie"]))){
            if(Auth::attempt(['email'=>$_COOKIE["email_cookie"], 'password'=> $_COOKIE["pass_cookie"]])){
                return Redirect::to('publicaciones');
            }
        }
        $this->middleware('auth', ['only' => ['editarusuario', 'agregarUniversidad', 'agregarUniversidadNueva', 'eliminarVinculacion', 'agregarGranAreaDeInterest','desactivarUsuario', 'editarUsuarioDesdeAdmin']]);
        
        
    }


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





public function callLocationCountry(){
    return DB::table('lugars')->where('type_lugar','country')->get();
}

public function callLargesAreasTheme(){
    return DB::table('temas')->where('type_theme', 'gran_area')->get();
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
            $arrayData = [
                "nombre" => $request['username'],
            ];
           $GLOBALS["email_global"]=$request['email'];
            global $email_global;
            
            Mail::send('emails.welcome',$arrayData, function($mensaje){
                    $mensaje->subject('Bienvenido a Mundocente');
                    $mensaje->to($GLOBALS["email_global"]);
                });
             
            if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
                $emailAuth = Auth::user()->email;
                $emailUser = $this->creation_user_name_diferent($emailAuth);
                DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['last_name' => $emailUser.''.Auth::user()->id]);

                 return Redirect::to('registration');

            }
        }
    }


    public function creation_user_name_diferent($email){
        $pos = strpos($email, "@");
        $newName = iconv_substr($email,0,$pos);
        return $newName;
    }




     /**
     * Si se registra por primera vez
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationInit()
    {
       

        $lugares = $this->callLocationCountry();
        
        $gran_areas = $this->callLargesAreasTheme();


        $areas_all = DB::table('temas')->get();
        

        $institucionesVinvulado = DB::table('vinculacions')
            ->join('institucions', 'vinculacions.id_institution_fk', '=', 'institucions.id_institution')
            ->join('users', 'vinculacions.id_user_fk', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->select('institucions.*')
            ->get();


         $recibonotifide = DB::table('tema__notificacions')
         ->select('id_type_publications', 'name_theme_notifications')
         ->get();

         $milista_notificacion_recibe = DB::table('tema_notificacion_usuarios')
         ->where('id_user_fk', Auth::user()->id)
         ->select('id_type_notifications_fk')
         ->get();


            return view('registration', compact('lugares', 'areas_all', 'institucionesVinvulado', 'recibonotifide', 'milista_notificacion_recibe'));

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
                    'photo_url' => $request['newimageinputperfil'],
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
                    'photo_url' => $request['newimageinputperfil'],
                    'recibe_not'=>'no']);
            DB::table('tema_notificacion_usuarios')->where('id_user_fk', Auth::user()->id)->delete();
        }
        return Redirect::to('editando-perfil');


    }



public function uploadPhotoPerfil(Request $request){

     if($request->ajax()){
        $imageCod = ''.$request['newImage'];     
        list(, $imageCod) = explode(';', $imageCod);
        list(, $imageCod) = explode(',', $imageCod);

        $imageCod = base64_decode($imageCod);

        file_put_contents('fotosperfil/'.Auth::user()->id.'.png', $imageCod);

        return 'fotosperfil/'.Auth::user()->id.'.png';
           
        }

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
                    'id_lugar_fk' => $request['id_lugar_city'],
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
            DB::table('vinculacions')->where('id_institution_fk', $request['id_institute'])->where('id_user_fk', Auth::user()->id)->delete();
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
                ->where('id_theme_fk', $request['id_area_formacion_add'])
                ->count();

                if ($quantityThemes==0) {
                     Areas_formacion::create([
                       'id_user_fk' => Auth::user()->id,
                        'id_theme_fk' =>  $request['id_area_formacion_add'],
                    ]);
                }

                 $gran_area_formacion =  DB::table('areas_formacions')
                    ->join('temas', 'areas_formacions.id_theme_fk', '=', 'temas.id_tema')
                     ->where('id_user_fk', Auth::user()->id)
                     ->where('id_theme_fk', $request['id_area_formacion_add'])
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
            DB::table('areas_formacions')->where('id_theme_fk', $request['id_gran_area_formcion'])->where('id_user_fk', Auth::user()->id)->delete();
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

            $listRecomendations = DB::table('recomendaciones')->where('id_user_fk', Auth::user()->id)->where('id_theme_fk', $request['id_area_interest_add'])->delete();



            $type_theme_save = DB::table('temas')->where('id_tema', $request['id_area_interest_add'])->get();

            

            foreach ($type_theme_save as $type_t) {
                if ($type_t->type_theme=='gran_area') {
                    $quantityThemes = DB::table('areas_interes')
                        ->where('id_user_fk', Auth::user()->id)
                        ->where('id_theme_fk', $type_t->id_tema)
                        ->count();

                        if ($quantityThemes==0) {
                             AreasInteres::create([
                               'id_user_fk' => Auth::user()->id,
                                'id_theme_fk' =>  $type_t->id_tema,
                            ]);
                        }
                }else if($type_t->type_theme=='area'){
                        $quantityThemes = DB::table('areas_interes')
                        ->where('id_user_fk', Auth::user()->id)
                        ->where('id_theme_fk', $type_t->id_tema)
                        ->count();

                        if ($quantityThemes==0) {
                             AreasInteres::create([
                               'id_user_fk' => Auth::user()->id,
                                'id_theme_fk' =>  $type_t->id_tema,
                            ]);
                        }

                        $listGranArea = DB::select('select g.id_tema from temas g, temas a where g.id_tema=a.id_tema_area and a.id_tema='.$type_t->id_tema);
                        foreach ($listGranArea as $list_the) {
                             $quantityThemeGran = DB::table('areas_interes')
                                ->where('id_user_fk', Auth::user()->id)
                                ->where('id_theme_fk', $list_the->id_tema)
                                ->count();

                                if ($quantityThemeGran==0) {
                                     AreasInteres::create([
                                       'id_user_fk' => Auth::user()->id,
                                        'id_theme_fk' =>  $list_the->id_tema,
                                    ]);
                                }
                        }
                }else{
                     $quantityThemes = DB::table('areas_interes')
                        ->where('id_user_fk', Auth::user()->id)
                        ->where('id_theme_fk', $type_t->id_tema)
                        ->count();

                        if ($quantityThemes==0) {
                             AreasInteres::create([
                               'id_user_fk' => Auth::user()->id,
                                'id_theme_fk' =>  $type_t->id_tema,
                            ]);
                        }

                        $listGranArea = DB::select('select g.id_tema from temas g, temas a where g.id_tema=a.id_tema_area and a.id_tema='.$type_t->id_tema);
                        foreach ($listGranArea as $list_the) {
                             $quantityThemeGran = DB::table('areas_interes')
                                ->where('id_user_fk', Auth::user()->id)
                                ->where('id_theme_fk', $list_the->id_tema)
                                ->count();

                                if ($quantityThemeGran==0) {
                                     AreasInteres::create([
                                       'id_user_fk' => Auth::user()->id,
                                        'id_theme_fk' =>  $list_the->id_tema,
                                    ]);
                                }

                                 $listGranArea_disci = DB::select('select g.id_tema from temas g, temas a, temas d where g.id_tema=a.id_tema_area and d.id_tema_area=a.id_tema and a.id_tema='.$list_the->id_tema);
                        foreach ($listGranArea_disci as $list_the_disc) {
                             $quantityThemeGran = DB::table('areas_interes')
                                ->where('id_user_fk', Auth::user()->id)
                                ->where('id_theme_fk', $list_the_disc->id_tema)
                                ->count();

                                if ($quantityThemeGran==0) {
                                     AreasInteres::create([
                                       'id_user_fk' => Auth::user()->id,
                                        'id_theme_fk' =>  $list_the_disc->id_tema,
                                    ]);
                                }
                        }

                        }

                        

                }
            }
            
             






                 $gran_area_formacion =  DB::table('areas_interes')
                    ->join('temas', 'areas_interes.id_theme_fk', '=', 'temas.id_tema')
                     ->where('id_user_fk', Auth::user()->id)
                     ->where('id_theme_fk', $request['id_area_interest_add'])
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
            DB::table('areas_interes')->where('id_theme_fk', $request['id_gran_area_interest'])->where('id_user_fk', Auth::user()->id)->delete();
            return 0;
        }
    }










    //Método para cambiar contraseña

    public function cambiarContrasena(Request $request){

         if($request->ajax()){
            $mypass = Auth::user()->password;
            
            $password_nowChange = $request['password'];
            $password_new = $request['password_confirmation'];

           if (Hash::check($password_nowChange, $mypass)) {

                $user = Auth::user();

                PasswordController::resetPassword($user, $password_new);

                return 1;
            }else{
                return 0;
            }
        }
    }



    public function deleteAccount(Request $request){
        if($request->ajax()){
              DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['state_user' => $request['stateUser']]);
                return 0;
        }   
    }






//desabilitar usuario
    public function desactivarUsuario(Request $request){
        if ($request->ajax()) {

            DB::table('users')
                ->where('id', $request['id_u'])
                ->update(['state_user' => 'inactivo']);
        }
        return 0;
    }


    //activar usuario
    public function activarUsuario(Request $request){
        if ($request->ajax()) {
            
            DB::table('users')
                ->where('id', $request['id_u'])
                ->update(['state_user' => 'activo']);
        }
        return 0;
    }




    //método que edita un usuario
    public function editarUsuarioDesdeAdmin(Request $request){
        if ($request->ajax()) {
            DB::table('users')
                ->where('id', $request['id_us'])
                ->update(['name' => $request['name'],
                    'email' => $request['email'],
                    'rol' => $request['rol'],
                    'state_user' => $request['state'],
                    ]);
        }
        return 0;
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
