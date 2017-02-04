<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $table = 'temas';

    protected $fillable = ['id_tema', 'name_theme', 'type_theme', 'id_tema_area', 'id_tema_disciplina'];
}
