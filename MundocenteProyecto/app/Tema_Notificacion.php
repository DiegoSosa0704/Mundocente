<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Tema_Notificacion extends Model
{
    protected $table = 'tema__notificacions';

    protected $fillable = ['id_type_publications', 'name_theme_notifications'];
}
