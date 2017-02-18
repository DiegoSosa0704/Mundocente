<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $fillable = ['id_notification', 'id_user_notification'];
}
