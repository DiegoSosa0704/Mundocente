<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Guardado extends Model
{
    protected $table = 'interesados';

    protected $fillable = ['id_guardado', 'id_user_fk', 'id_publication_fk'];
}
