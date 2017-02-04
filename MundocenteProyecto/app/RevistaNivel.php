<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class RevistaNivel extends Model
{
      protected $table = 'revista_nivels';

    protected $fillable = ['id_revist_level', 'id_publication', 'id_level_fk'];
}
