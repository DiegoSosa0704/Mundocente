<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Indice extends Model
{
    protected $table = 'indices';

    protected $fillable = ['id_index', 'name_index'];
}
