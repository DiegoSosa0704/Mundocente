<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Areas_formacion extends Model
{
       protected $table = 'areas_formacions';

    protected $fillable = ['id_areas_formacion', 'id_user_fk', 'id_theme_fk'];
}
