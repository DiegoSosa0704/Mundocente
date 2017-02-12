<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Recomendacione extends Model
{
    protected $table = 'recomendaciones';

    protected $fillable = ['id_recomendation', 'id_user_fk', 'id_theme_fk', 'value_recomendation'];
}
