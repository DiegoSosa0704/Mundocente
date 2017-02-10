<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class RevistaNivel extends Model
{
      protected $table = 'revista_nivels';

    protected $fillable = ['id_revist_level', 'id_publications_fk', 'id_level_fk'];
}
