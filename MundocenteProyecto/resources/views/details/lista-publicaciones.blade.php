<input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
@inject('call_methods','Mundocente\Http\Controllers\ResultController')

<div class="ui eleven wide column">

    <div class="ui cards">

        @foreach($listPublications as $publication)
            <div class="ui violet raised card">
                <div class="content">


                    <div class="header ">

                        <!--  Si la publicación es mía sale Editar-->
                        @if(Auth::user()->id==$publication->id_user_fk)



                            @if($publication->id_type_publication==1)
                                {!!Form::open(['url'=>'editar-convocatoria' , 'method'=>'POST'])!!}
                                <input type="hidden" name="id_convocatoria_edit"
                                       value="{{$publication->id_publication}}">
                                <button type="submit" class="ui basic button" style="float: right;">Editar <i
                                            class="edit icon"> </i></button>
                                {!!Form::close()!!}
                            @elseif($publication->id_type_publication==2)
                                {!!Form::open(['url'=>'editar-revista' , 'method'=>'POST'])!!}
                                <input type="hidden" name="id_revista_edit" value="{{$publication->id_publication}}">
                                <button type="submit" class="ui basic button" style="float: right;">Editar <i
                                            class="edit icon"> </i></button>
                                {!!Form::close()!!}
                            @elseif($publication->id_type_publication==3)
                                {!!Form::open(['url'=>'editar-evento' , 'method'=>'POST'])!!}
                                <input type="hidden" name="id_event_edit" value="{{$publication->id_publication}}">
                                <button type="submit" class="ui basic button" style="float: right;">Editar <i
                                            class="edit icon"> </i></button>
                                {!!Form::close()!!}
                            @else
                                {!!Form::open(['url'=>'editar-solicitud' , 'method'=>'POST'])!!}
                                <input type="hidden" name="id_request_edit" value="{{$publication->id_publication}}">
                                <button type="submit" class="ui basic button" style="float: right;">Editar <i
                                            class="edit icon"> </i></button>
                            {!!Form::close()!!}
                        @endif


                    @endif

                    <!--  Si la publicación es mía sale Editar   Fin -->

                        <a onclick="showDetailsPublication({{$publication->id_publication}})"
                           class="ui header"><b>{{$publication->title_publication}}</b></a>


                    </div>

                    @if($call_methods->returnIndexPublicationPaper($publication->id_publication) > 0 && $publication->id_type_publication == 2)
                        <input type="hidden" id="id_type_publication{{$publication->id_publication}}"
                               value="1">
                        <p>(Indexada)</p>
                    @elseif($call_methods->returnIndexPublicationPaper($publication->id_publication) == 0 && $publication->id_type_publication == 2)
                        <input type="hidden" id="id_type_publication{{$publication->id_publication}}"
                               value="0">
                        <p>(No indexada)</p>
                    @endif

                </div>

                @if($publication->url_photo_publication != '')
                    <div class="ui large centered image landscape">
                        <img src="{{$publication->url_photo_publication}}">
                    </div>
                @endif
                <div class="content content-description">

                    <div class="description left floated">
                        <span class="ui header"><b>Institución: </b></span>
                        <a class="ui large label color_1">{{$publication->name_institution}}</a>
                    </div>
                    @if($publication->id_type_publication!=2)
                        <div class="right floated" style="color:#B2AAAA;">
                            <span><b>Desde: </b> {{$publication->date_start}}</span>
                            <br>
                            <span><b>Hasta: </b> {{$publication->date_end}}</span>
                        </div>
                    @endif

                </div>
                <div class="extra content">
                    <div class="right floated">

                        @if($publication->id_type_publication==1)
                            <a class="ui blue right ribbon label"
                               onclick="showDetailsPublication({{$publication->id_publication}})"><i
                                        class="linkify icon"></i> Convocatoria</a>
                        @elseif($publication->id_type_publication==2)
                            <a class="ui green right ribbon label"
                               onclick="showDetailsPublication({{$publication->id_publication}})"> <i
                                        class="linkify icon"></i>Revista</a>
                        @elseif($publication->id_type_publication==3)
                            <a class="ui red right ribbon label"
                               onclick="showDetailsPublication({{$publication->id_publication}})"><i
                                        class="linkify icon"></i> Evento</a>
                        @else
                            <a class="ui orange right ribbon label"
                               onclick="showDetailsPublication({{$publication->id_publication}})"><i
                                        class="linkify icon"></i> Solicitud</a>
                        @endif
                    </div>

                    <span>

                                    @if($call_methods->verifyFavorite($publication->id_publication)==1)
                            <a onclick="addFavoritePublication({{$publication->id_publication}})"
                               style="color: #D6DB47;" title="Eliminar de mis favoritos"
                               id="favorite_button{{$publication->id_publication}}">
                                        <i class="star icon"></i>
                                {{$call_methods->returnPublicationFavorite($publication->id_publication) }} Favorito
                                    </a>
                        @else
                            <a onclick="addFavoritePublication({{$publication->id_publication}})"
                               id="favorite_button{{$publication->id_publication}}">
                                        <i class="star icon"></i>
                                {{$call_methods->returnPublicationFavorite($publication->id_publication) }} Favorito
                                    </a>
                        @endif

                        <br>

                        @if($publication->id_type_publication!=2)


                            @if($call_methods->verifyInterest($publication->id_publication)==1)
                                <a style="color: #DD0D29;" title="Ya no me interesa"
                                   onclick="addInterestPublication({{$publication->id_publication}})"
                                   id="interest_button{{$publication->id_publication}}">
                                        <i class="like icon"></i>
                                    {{$call_methods->returnPublicationSave($publication->id_publication)}} Me interesa
                                    </a>
                            @else
                                <a title="Me interesa"
                                   onclick="addInterestPublication({{$publication->id_publication}})"
                                   id="interest_button{{$publication->id_publication}}">
                                        <i class="like icon"></i>
                                    {{$call_methods->returnPublicationSave($publication->id_publication)}} Me interesa
                                    </a>
                            @endif

                        @endif
                                    
                                </span>

                    <input type="hidden" id="title_publication{{$publication->id_publication}}"
                           value="{{$publication->title_publication}}">
                    <input type="hidden" id="sector_publication{{$publication->id_publication}}"
                           value="{{$publication->sector_publication}}">
                    <input type="hidden"
                           id="name_institution_publication{{$publication->id_publication}}"
                           value="{{$publication->name_institution}}">
                    <input type="hidden"
                           id="description_publication{{$publication->id_publication}}"
                           value="{{$publication->description_publication}}">
                    <input type="hidden" id="name_city_publication{{$publication->id_publication}}"
                           value="{{$publication->name_lugar}}">
                    <input type="hidden" id="contact_publication{{$publication->id_publication}}"
                           value="{{$publication->contact_pubication}}">
                    <input type="hidden" id="link_publication{{$publication->id_publication}}"
                           value="{{$publication->url_publication}}">
                    <input type="hidden" id="date_start_publication{{$publication->id_publication}}"
                           value="{{$publication->date_start}}">
                    <input type="hidden" id="date_end_publication{{$publication->id_publication}}"
                           value="{{$publication->date_end}}">
                    <input type="hidden" id="photo_publication{{$publication->id_publication}}"
                           value="{{$publication->url_photo_publication}}">
                    <input type="hidden"
                           id="calculatequantityFavorite{{$publication->id_publication}}"
                           value="{{$call_methods->returnPublicationFavorite($publication->id_publication)}}">
                    <input type="hidden" id="calculatequantitySave{{$publication->id_publication}}"
                           value="{{$call_methods->returnPublicationSave($publication->id_publication)}}">
                    <input type="hidden"
                           id="calculatequantityReport{{$publication->id_publication}}"
                           value="{{$call_methods->returnPublicationReport($publication->id_publication)}}">
                </div>
            </div>

        @endforeach


        <br>
        <br>


        @if(count($listPublications)==0)
            <h2 style="color: #B6B5B5;">No se encontraron resultados</h2>
        @endif
    </div>

</div>


<?php
$recomendaciones = DB::table('recomendaciones')
    ->join('temas', 'recomendaciones.id_theme_fk', '=', 'temas.id_tema')
    ->where('id_user_fk', Auth::user()->id)
    ->take(5)
    ->distinct()
    ->orderBy('recomendaciones.value_recomendation', 'desc')
    ->get();

$publicacionesFechaPasada = DB::table('publicacions')->get();

foreach ($publicacionesFechaPasada as $pub) {
if ($pub->id_type_publication!=2) {
        if (Date("Y-m-d") > $pub->date_end) {
        DB::table('revista_nivels')->where('id_publications_fk', $pub->id_publication)->delete();
        DB::table('interesados')->where('id_publication_fk', $pub->id_publication)->delete();
        DB::table('favoritos')->where('id_publication_fk', $pub->id_publication)->delete();
        DB::table('denuncias')->where('id_publication_fk', $pub->id_publication)->delete();
        DB::table('areas_publicacions')->where('id_publication_fk', $pub->id_publication)->delete();
        DB::table('publicacions')->where('id_publication', $pub->id_publication)->delete();
    }
}


}



?>

<div class="ui five wide column">
    <div class="ui raised card">
        <div class="content">
            <div class="header">Temas sugeridos</div>
        </div>
        <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="tokenrecomen">
        <div class="content">
            <div class="ui middle aligned divided list">
                @foreach($recomendaciones as $recomen)
                    <div class="item" id="item_recomendation_themes{{$recomen->id_theme_fk}}">
                        <div class="right floated content">
                            <div class="ui small circular icon button" style="background: #AD5691;color: #fff;"
                                 onclick="addThemeFavorite({{$recomen->id_theme_fk}})">
                                <i class="icon add"></i>
                            </div>
                        </div>
                        <div class="content">
                            {{$recomen->name_theme}}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


</div>



















