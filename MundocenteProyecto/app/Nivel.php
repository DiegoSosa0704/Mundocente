<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
     protected $table = 'nivels';

    protected $fillable = ['id_level', 'value_level', 'id_index_fk'];
}
