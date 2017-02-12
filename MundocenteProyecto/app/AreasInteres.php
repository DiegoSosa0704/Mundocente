<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class AreasInteres extends Model
{
    protected $table = 'areas_interes';

    protected $fillable = ['id_areas_interes', 'id_user_fk', 'id_theme_fk', 'value_interest'];
}
