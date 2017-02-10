<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'HomeController@index');
Route::get('login', 'HomeController@login');
Route::get('publications', 'HomeController@publications');
Route::get('edit-perfil', 'HomeController@editarmiperfil');
Route::get('publicar-convocatoria', 'HomeController@publicarconvocatoria');
Route::get('publicar-revista', 'HomeController@publicarrevista');
Route::get('publicar-solicitud', 'HomeController@publicarSolicitud');
Route::get('publicar-evento', 'HomeController@publicarevento');
Route::get('signup', 'HomeController@registrar');

//Show details
Route::get('detalles-convocatoria', 'HomeController@verdetallesConvocatoria');
Route::get('detalles-evento', 'HomeController@verdetallesEvento');
Route::get('detalles-revista', 'HomeController@verdetallesrevista');
Route::get('detalles-solicitud', 'HomeController@verdetallesSolicitud');



/*Resultado*/
Route::get('registration', 'UserController@showRegistrationInit');


//Edita mi perfil en la parde de vinculación

Route::resource('user', 'UserController');
Route::post('editaperfil', 'UserController@editarusuario');
Route::post('addUniversity' , 'UserController@agregarUniversidad');
Route::post('addUniversityNew' , 'UserController@agregarUniversidadNueva');
Route::post('deleteUniversity' , 'UserController@eliminarVinculacion');
Route::post('editPassword', 'UserController@cambiarContrasena');
Route::post('delete-account', 'UserController@deleteAccount');



//Agrega  elimina a lista de áreas de formación

Route::post('addNewLargeAreaTraining' , 'UserController@agregarGranAreaDeFormacion');
Route::post('deleteLargeAreaTraining' , 'UserController@eliminarGranAreaDeFormacion');


//Agrega  elimina a lista de áreas de interés

Route::post('addNewLargeAreaInterest' , 'UserController@agregarGranAreaDeInterest');
Route::post('deleteLargeAreaInterest' , 'UserController@eliminarGranAreaDeInterest');






Route::resource('session', 'SessionController');
Route::get('userExist', 'SessionController@enviarexistente');

Route::resource('logout', 'SessionController@cerrarsesion');
Route::get('authfacebook', 'SessionController@authfacebook');
Route::get('loginfacebook', 'SessionController@sesionfacebook');

Route::get('authgoogle', 'SessionController@authgoogle');
Route::get('logingoogle', 'SessionController@sesiongoogle');

Route::get('authlinkedin', 'SessionController@authlinkedin');
Route::get('loginlinkedin', 'SessionController@sesionlinkedin');


//Selects dinámicos
Route::get('listCity/{id_pais}' , 'HomeController@obtenerCiudades');


Route::get('area/{id}' , 'HomeController@obtenerArea');
Route::get('disciplina/{id_pais}' , 'HomeController@obtenerDisciplina');

Route::get('university/{id_city}' , 'HomeController@obtenerUniversidades');
Route::get('get-pocation-institution/{id_institution}', 'HomeController@obtenerPaisYCiudadConInstitucion');



//crear publicaciones

Route::post('add-announcement', 'PublicationsController@agregarConvocatoria');
Route::post('add-evento', 'PublicationsController@agregarEvento');
Route::post('add-revista', 'PublicationsController@agregarRevista');
Route::post('add-solicitud', 'PublicationsController@agregarSolicitud');

Route::post('upload-image-publication', 'PublicationsController@uploadImagePublication');

