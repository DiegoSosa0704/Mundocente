<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $table = 'denuncias';

    protected $fillable = ['id_denuncia', 'id_user_fk', 'id_publication_fk'];
}
