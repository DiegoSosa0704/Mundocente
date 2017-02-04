<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
     protected $table = 'lugars';

    protected $fillable = ['id_lugar', 'name_lugar', 'type_lugar', 'id_lugar_fk'];
}
