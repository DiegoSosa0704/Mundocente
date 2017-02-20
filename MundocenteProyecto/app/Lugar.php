<?php

namespace Mundocente;
use DB;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
     protected $table = 'lugars';

    protected $fillable = ['id_lugar', 'name_lugar', 'type_lugar', 'id_lugar_fk'];

    public static function mostrarCiudades($id_pais){
    	return Lugar::where('id_lugar_fk', $id_pais)->get();
    }

    public static function mostrarPaisyCiudad($id_institut){
    	return DB::select('select lp.id_lugar AS id_pais, lp.name_lugar as nombre_pais, lc.id_lugar as id_ciudad, lc.name_lugar as nombre_ciudad, i.setor_institution, i.name_institution as nombre_institucion FROM institucions i, lugars lp, lugars lc WHERE i.id_lugar_fk=lc.id_lugar AND lc.id_lugar_fk=lp.id_lugar AND i.id_institution='.$id_institut);

    }




   
}
