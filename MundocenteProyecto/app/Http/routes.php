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

Route::get('editando-perfil', 'HomeController@editarmiperfil');
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


Route::get('mi-peril', 'HomeController@mostrarmiperfil');
Route::get('mi-publicaciones-favoritas', 'HomeController@mostrarmispublicacionesfavoritas');
Route::get('interesados', 'HomeController@mostrarinteresados');



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
Route::post('chage-photo-perfil', 'UserController@uploadPhotoPerfil');



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
Route::get('areas-all/{id}' , 'HomeController@obtenerAreas');
Route::get('disciplina/{id_pais}' , 'HomeController@obtenerDisciplina');
Route::get('add-areas-disciplines', 'HomeController@callLargesAreasTheme');

Route::get('university/{id_city}' , 'HomeController@obtenerUniversidades');
Route::get('get-pocation-institution/{id_institution}', 'HomeController@obtenerPaisYCiudadConInstitucion');



//crear publicaciones

Route::post('add-announcement', 'PublicationsController@agregarConvocatoria');
Route::post('add-evento', 'PublicationsController@agregarEvento');
Route::post('add-revista', 'PublicationsController@agregarRevista');
Route::post('add-solicitud', 'PublicationsController@agregarSolicitud');

Route::post('upload-image-publication', 'PublicationsController@uploadImagePublication');
Route::get('obtener-areas-pulicacion/{id_publication}', 'PublicationsController@obtienetablaareas');
//retorna los índices y clasificaciones de cada revista
Route::get('obtener-niveles-revistass/{id_publication}', 'PublicationsController@obtenerClasificaciones');
Route::get('obtener-indices-revistass/{id_publication}', 'PublicationsController@obtenerTiposIndexacion');


//Resultados de publicaciones
Route::get('publicaciones', 'ResultController@publications');
//aumenta el value_interest de la tabla de areas de interés
Route::post('add-value-theme-interest-user', 'ResultController@addValueThemeInteres');

Route::post('publicaciones-resultados', 'ResultController@searchPublicationForWordKey');
Route::get('publicaciones-resultados', 'ResultController@publications');




Route::get('lugares-administrador', 'AdminController@administradorlugares');
Route::get('instituciones-administrador', 'AdminController@administradorinstituciones');
Route::get('indices-administrador', 'AdminController@administradorindices');
Route::get('usuarios-administrador', 'AdminController@administradorusuarios');
Route::get('publicaciones-administrador', 'AdminController@administradorpublicaciones');

