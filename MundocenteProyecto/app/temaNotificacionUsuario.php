<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class temaNotificacionUsuario extends Model
{
        protected $table = 'tema_notificacion_usuarios';

    	protected $fillable = ['id_theme_notificatons_users', 'id_user_fk', 'id_type_notifications_fk'];
}
