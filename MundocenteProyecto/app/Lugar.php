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

   
}
