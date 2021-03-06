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
Route::get('mis-publicaciones-favoritas', 'HomeController@mostrarmispublicacionesfavoritas');
Route::get('notificaciones', 'HomeController@mostrarinteresados');






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


//mostrar editar publicaciones

Route::post('editar-convocatoria', 'HomeController@editarConvocatoria');
Route::post('editar-evento', 'HomeController@editarEvento');
Route::post('editar-revista', 'HomeController@editarRevista');
Route::post('editar-solicitud', 'HomeController@editarSolicitud');



//crear publicaciones

Route::post('add-announcement', 'PublicationsController@agregarConvocatoria');
Route::post('edit-announcement', 'PublicationsController@editarConvocatoria');
Route::post('add-evento', 'PublicationsController@agregarEvento');
Route::post('edit-event', 'PublicationsController@ediatrEvento');
Route::post('add-revista', 'PublicationsController@agregarRevista');
Route::post('edit-revista', 'PublicationsController@editarRevista');
Route::post('add-solicitud', 'PublicationsController@agregarSolicitud');
Route::post('edit-request', 'PublicationsController@editarSolicitud');


Route::post('delete-pulication-all','PublicationsController@eliminarPublicacion');



Route::post('upload-image-publication', 'PublicationsController@uploadImagePublication');
Route::get('obtener-areas-pulicacion/{id_publication}', 'PublicationsController@obtienetablaareas');
//retorna los índices y clasificaciones de cada revista
Route::get('obtener-niveles-revistass/{id_publication}', 'PublicationsController@obtenerClasificaciones');
Route::get('obtener-indices-revistass/{id_publication}', 'PublicationsController@obtenerTiposIndexacion');


//acciones para las publicaciones

Route::post('add-favorite', 'PublicationsController@agregarafavoritos');
Route::post('add-interest', 'PublicationsController@agregaraainteresados');
Route::post('add-report', 'PublicationsController@agregarDenuncia');


//Resultados de publicaciones
Route::get('publicaciones', 'ResultController@publications');
//aumenta el value_interest de la tabla de areas de interés
Route::post('add-value-theme-interest-user', 'ResultController@addValueThemeInteres');

Route::post('publicaciones-resultados', 'ResultController@searchPublicationForWordKey');
Route::get('publicaciones-resultados', 'ResultController@publications');







//Filtros
Route::post('resultados-convocatorias', 'FilternnouceentController@buscarconocatorias');
Route::get('resultados-convocatorias', 'ResultController@publications');

Route::post('solicitud-evaluadores', 'FilterEvaController@buscarevaluadores');
Route::get('solicitud-evaluadores', 'ResultController@publications');

Route::post('resultados-eventos', 'FilterEventController@buscareventos');
Route::get('resultados-eventos', 'ResultController@publications');

Route::post('solicitud-proyectos', 'FilterInveController@buscarsolicitudesInve');
Route::get('solicitud-proyectos', 'ResultController@publications');

Route::post('resultados-revistas', 'FilterPaperController@buscarrevistas');
Route::get('resultados-revistas', 'ResultController@publications');




Route::post('send-email-contact','EmailsController@enviarCorreoContactor');



// --------------------------------------------------- acciones para el administrador

Route::get('lugares-administrador', 'AdminController@administradorlugares');
Route::post('lugares-administrador-filtro', 'AdminController@administradorPalabraClaveLugar');

Route::get('instituciones-administrador', 'AdminController@administradorinstituciones');
Route::post('institucion-administrador-filtro', 'AdminController@adminsitradorInstitucionesFiltros');

Route::get('indices-administrador', 'AdminController@administradorindices');

Route::get('usuarios-administrador', 'AdminController@administradorusuarios');
Route::post('usuarios-administrador-filtro', 'AdminController@administradorPalabraClaveUsuario');

Route::get('publicaciones-administrador', 'AdminController@administradorpublicaciones');
Route::post('publicaciones-administrador-filtro', 'AdminController@adminsitradorPublicacionesFiltros');





Route::post('edit-user-admin', 'UserController@editarUsuarioDesdeAdmin');

Route::post('add-new-country', 'AdminController@agregarNuevoLugarPais');
Route::post('add-new-city', 'AdminController@agregarNuevoLugarCiudad');

Route::post('edit-index-admin', 'AdminController@editar_indice');


Route::post('edit-new-country', 'AdminController@editarNuevoLugarPais');
Route::post('edit-new-city', 'AdminController@editarNuevoLugarCiudad');

Route::post('add-new-institution-admin', 'AdminController@agregarNuevaInstitucion');
Route::post('edit-institution-admin', 'AdminController@editarInstitucion');

Route::post('inhabilite-user', 'UserController@desactivarUsuario');
Route::post('abilite-user', 'UserController@activarUsuario');

Route::post('inhabilite-publication', 'PublicationsController@desactivarPublicacion');
Route::post('abilite-publication', 'PublicationsController@activarPublicacion');

Route::get('get-country-edit/{id_city}', 'AdminController@obtienePaisEditar');


Route::get('publicaciones-denunciadas','AdminController@mostrarPublicacionesDenunciadas');







//perfil de usuario
//Route::get('perfil-usuario', 'HomeController@mostrarmiperfildeUsuario');
Route::get('/{last_name}', 'HomeController@mostrarmiperfildeUsuario');




