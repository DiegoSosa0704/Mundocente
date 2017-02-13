<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    protected $table = 'favoritos';

    protected $fillable = ['id_favorito', 'id_user_fk', 'id_publication_fk'];
}
