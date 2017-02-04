<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Vinculacion extends Model
{
    protected $table = 'vinculacions';

    protected $fillable = ['id_vinculacion', 'id_user_fk', 'id_institution_fk'];
}
