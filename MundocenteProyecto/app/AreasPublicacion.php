<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class AreasPublicacion extends Model
{
    protected $table = 'areas_publicacions';

    protected $fillable = ['id_areas_publication', 'id_publication_fk', 'id_theme_fk'];
}
