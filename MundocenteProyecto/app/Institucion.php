<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
     protected $table = 'institucions';

    protected $fillable = ['id_institution', 'name_institution', 'setor_institution', 'telephone_institution', 'state_institution', 'id_lugar_fk'];


 public static function mostrarinstitution($id_city){
    	return Institucion::where('id_lugar_fk', $id_city)->get();
    }
   
}
