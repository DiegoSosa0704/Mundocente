<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicacions';

    protected $fillable = ['id_publication', 'title_publication', 'description_publication', 'sector_publication', 'url_publication', 'url_photo_publication', 'date_start', 'date_end', 'count_view', 'contact_pubication', 'state_publication', 'hour_start', 'hour_end', 'type_solicitud', 'id_type_publication','id_user_fk', 'id_lugar_fk'];
}
