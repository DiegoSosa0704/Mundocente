@extends('main.main')

@section('content')

    <!--Contenido-->
    <div class="pusher" style="background-color: #EEEEEE;">
        <div class="ui container start-container">
            <div class="ui stackable grid">
                <div class="ui five wide form column">
                    <div id="all" class="ui raised padded fixed sticky sticky-filter-all segment"
                         style="min-width: 21% !important; max-width: 21% !important; min-height: 10% !important;overflow: scroll; margin-top: 0;">
                        <div class="ui top left attached label" style="font-size: 1em">Filtrado</div>
                        <div class="ui info message">
                            <div class="header">
                                Al seleccionar "Todo" en el menú de búsqueda, podrá buscar todos los tipos de
                                publicación introduciendo palabras clave y oprimiendo el botón Buscar.
                            </div>
                        </div>
                    </div>
                    <div id="announcement" class="ui raised padded fixed sticky sticky-filter segment"
                         style="display: none;">
                        <div class="ui top left attached label">Filtros de convocatoria</div>
                        <div class="ui small form">
                            <h5 class="ui horizontal divider header">
                                Áreas de conocimiento
                            </h5>
                            <div class="field">
                                <div class="field">
                                    <label>Gran área</label>
                                    <select name="large_area" class="ui multiple dropdown">
                                        <option value="">Gran área</option>
                                        <option value="name-1">Gran área-1</option>
                                        <option value="name-2">Gran área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Área</label>
                                    <select name="area" class="ui multiple dropdown">
                                        <option value="">Área</option>
                                        <option value="lvl-1">Área-1</option>
                                        <option value="lvl-2">Área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Disciplina</label>
                                    <select name="discipline" class="ui multiple dropdown">
                                        <option value="">Disciplina</option>
                                        <option value="discipline-1">Disciplina-1</option>
                                        <option value="discipline-2">Disciplina-2</option>
                                        <option value="discipline-3">Disciplina-2</option>
                                        <option value="discipline-4">Disciplina-2</option>
                                        <option value="discipline-5">Disciplina-2</option>
                                        <option value="discipline-6">Disciplina-2</option>
                                        <option value="discipline-7">Disciplina-2</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="ui horizontal divider header">
                                Lugar de la convocatoria
                            </h5>
                            <div class="field">
                                <label>País</label>
                                <select name="country" class="ui dropdown">
                                    <option value="">País</option>
                                    <option value="country-1">País-1</option>
                                    <option value="country-2">País-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Ciudad</label>
                                <select name="city" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="city-1">Ciudad-1</option>
                                    <option value="city-2">Ciudad-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Institución</label>
                                <select name="institution" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="institution-1">Ciudad-1</option>
                                    <option value="institution-2">Ciudad-2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="paper" class="ui padded fixed sticky sticky-filter segment"
                         style="display: none;">
                        <div class="ui top left attached label">Filtros de revistas</div>
                        <div class="ui small form">
                            <h5 class="ui horizontal divider header">
                                Áreas de conocimiento
                            </h5>
                            <div class="field">
                                <div class="field">
                                    <label>Gran área</label>
                                    <select name="large_area" class="ui multiple dropdown">
                                        <option value="">Gran área</option>
                                        <option value="name-1">Gran área-1</option>
                                        <option value="name-2">Gran área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Área</label>
                                    <select name="area" class="ui multiple dropdown">
                                        <option value="">Área</option>
                                        <option value="lvl-1">Área-1</option>
                                        <option value="lvl-2">Área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Disciplina</label>
                                    <select name="discipline" class="ui multiple dropdown">
                                        <option value="">Disciplina</option>
                                        <option value="discipline-1">Disciplina-1</option>
                                        <option value="discipline-2">Disciplina-2</option>
                                        <option value="discipline-3">Disciplina-2</option>
                                        <option value="discipline-4">Disciplina-2</option>
                                        <option value="discipline-5">Disciplina-2</option>
                                        <option value="discipline-6">Disciplina-2</option>
                                        <option value="discipline-7">Disciplina-2</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="ui horizontal divider header">
                                Lugar de la institución
                            </h5>
                            <div class="field">
                                <label>País</label>
                                <select name="country" class="ui dropdown">
                                    <option value="">País</option>
                                    <option value="country-1">País-1</option>
                                    <option value="country-2">País-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Ciudad</label>
                                <select name="city" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="city-1">Ciudad-1</option>
                                    <option value="city-2">Ciudad-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Institución</label>
                                <select name="institution" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="institution-1">Ciudad-1</option>
                                    <option value="institution-2">Ciudad-2</option>
                                </select>
                            </div>
                            <div class="grouped fields">
                                <label>Indexada</label>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="indexed">
                                        <label>Si</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="indexed">
                                        <label>No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="event" class="ui padded fixed sticky sticky-filter segment"
                         style="display: none;">
                        <div class="ui top left attached label">Filtros de eventos</div>
                        <div class="ui small form">
                            <h5 class="ui horizontal divider header">
                                Áreas de conocimiento
                            </h5>
                            <div class="field">
                                <div class="field">
                                    <label>Gran área</label>
                                    <select name="large_area" class="ui multiple dropdown">
                                        <option value="">Gran área</option>
                                        <option value="name-1">Gran área-1</option>
                                        <option value="name-2">Gran área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Área</label>
                                    <select name="area" class="ui multiple dropdown">
                                        <option value="">Área</option>
                                        <option value="lvl-1">Área-1</option>
                                        <option value="lvl-2">Área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Disciplina</label>
                                    <select name="discipline" class="ui multiple dropdown">
                                        <option value="">Disciplina</option>
                                        <option value="discipline-1">Disciplina-1</option>
                                        <option value="discipline-2">Disciplina-2</option>
                                        <option value="discipline-3">Disciplina-2</option>
                                        <option value="discipline-4">Disciplina-2</option>
                                        <option value="discipline-5">Disciplina-2</option>
                                        <option value="discipline-6">Disciplina-2</option>
                                        <option value="discipline-7">Disciplina-2</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="ui horizontal divider header">
                                Lugar del evento
                            </h5>
                            <div class="field">
                                <label>País</label>
                                <select name="country" class="ui dropdown">
                                    <option value="">País</option>
                                    <option value="country-1">País-1</option>
                                    <option value="country-2">País-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Ciudad</label>
                                <select name="city" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="city-1">Ciudad-1</option>
                                    <option value="city-2">Ciudad-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Institución</label>
                                <select name="institution" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="institution-1">Ciudad-1</option>
                                    <option value="institution-2">Ciudad-2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="request_investigator" class="ui padded fixed sticky sticky-filter segment"
                         style="display: none;">
                        <div class="ui top left attached label">Filtros de solicitud a
                            investigadores
                        </div>
                        <div class="ui small form">
                            <h5 class="ui horizontal divider header">
                                Áreas de conocimiento
                            </h5>
                            <div class="field">
                                <div class="field">
                                    <label>Gran área</label>
                                    <select name="large_area" class="ui multiple dropdown">
                                        <option value="">Gran área</option>
                                        <option value="name-1">Gran área-1</option>
                                        <option value="name-2">Gran área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Área</label>
                                    <select name="area" class="ui multiple dropdown">
                                        <option value="">Área</option>
                                        <option value="lvl-1">Área-1</option>
                                        <option value="lvl-2">Área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Disciplina</label>
                                    <select name="discipline" class="ui multiple dropdown">
                                        <option value="">Disciplina</option>
                                        <option value="discipline-1">Disciplina-1</option>
                                        <option value="discipline-2">Disciplina-2</option>
                                        <option value="discipline-3">Disciplina-2</option>
                                        <option value="discipline-4">Disciplina-2</option>
                                        <option value="discipline-5">Disciplina-2</option>
                                        <option value="discipline-6">Disciplina-2</option>
                                        <option value="discipline-7">Disciplina-2</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="ui horizontal divider header">
                                Lugar de la institución
                            </h5>
                            <div class="field">
                                <label>País</label>
                                <select name="country" class="ui dropdown">
                                    <option value="">País</option>
                                    <option value="country-1">País-1</option>
                                    <option value="country-2">País-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Ciudad</label>
                                <select name="city" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="city-1">Ciudad-1</option>
                                    <option value="city-2">Ciudad-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Institución</label>
                                <select name="institution" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="institution-1">Ciudad-1</option>
                                    <option value="institution-2">Ciudad-2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="request_evaluator" class="ui padded fixed sticky sticky-filter segment"
                         style="display: none;">
                        <div class="ui top left attached label">Filtros de solicitud a
                            evaluadores
                        </div>
                        <div class="ui small form">
                            <h5 class="ui horizontal divider header">
                                Áreas de conocimiento
                            </h5>
                            <div class="field">
                                <div class="field">
                                    <label>Gran área</label>
                                    <select name="large_area" class="ui multiple dropdown">
                                        <option value="">Gran área</option>
                                        <option value="name-1">Gran área-1</option>
                                        <option value="name-2">Gran área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Área</label>
                                    <select name="area" class="ui multiple dropdown">
                                        <option value="">Área</option>
                                        <option value="lvl-1">Área-1</option>
                                        <option value="lvl-2">Área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Disciplina</label>
                                    <select name="discipline" class="ui multiple dropdown">
                                        <option value="">Disciplina</option>
                                        <option value="discipline-1">Disciplina-1</option>
                                        <option value="discipline-2">Disciplina-2</option>
                                        <option value="discipline-3">Disciplina-2</option>
                                        <option value="discipline-4">Disciplina-2</option>
                                        <option value="discipline-5">Disciplina-2</option>
                                        <option value="discipline-6">Disciplina-2</option>
                                        <option value="discipline-7">Disciplina-2</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="ui horizontal divider header">
                                Lugar de la institución
                            </h5>
                            <div class="field">
                                <label>País</label>
                                <select name="country" class="ui dropdown">
                                    <option value="">País</option>
                                    <option value="country-1">País-1</option>
                                    <option value="country-2">País-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Ciudad</label>
                                <select name="city" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="city-1">Ciudad-1</option>
                                    <option value="city-2">Ciudad-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Institución</label>
                                <select name="institution" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="institution-1">Ciudad-1</option>
                                    <option value="institution-2">Ciudad-2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                @inject('call_methods','Mundocente\Http\Controllers\ResultController')


                <div class="ui eleven wide column">

                    <div class="ui cards">
                        <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
                        @foreach($listPublications as $publication)
                            <div class="ui violet raised card">
                                <div class="content">
                                    <div class="ui right floated simple dropdown item">
                                        <i class="dropdown icon"></i>
                                        <div class="menu">
                                            <a class="item disabled">Áreas</a>
                                            @foreach($call_methods->returnAreasPublication($publication->id_publication) as $theme)
                                                <a class="left item" href="#">{{$theme->name_theme}}</a>
                                            @endforeach
                                            <a class="left item" href="#">Denunciar</a>
                                        </div>
                                    </div>
                                    <div class="header">
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
                                        <a href="#" class="ui large label color_1">{{$publication->name_institution}}</a>
                                    </div>
                                    <div class="right floated" style="color:#B2AAAA;">
                                        <span><b>Desde: </b> {{$publication->date_start}}</span>
                                        <br>
                                        <span><b>Hasta: </b> {{$publication->date_end}}</span>
                                    </div>
                                </div>
                                <div class="extra content">
                                    <div class="right floated">
                                        <div onclick="showDetailsPublication({{$publication->id_publication}})"
                                             class="ui labeled icon tiny button color_2">
                                            <i class="linkify icon"></i>
                                            Ver detalles
                                        </div>
                                    </div>
                                    <span>
                                    <a href="#">
                                        <i class="star icon"></i>
                                        Guardar
                                    </a>
                                    <br>
                                    <a href="#">
                                        <i class="like icon"></i>
                                        Me intereza
                                    </a>
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

                        {{--   <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
                           @foreach($listPublications as $publication)
                               <div id="result-announcement" class="ui raised card segment" style="width: 100%;">
                               --}}{{--Titulo--}}{{--
                                   <div class="content">
                                       <div class="ui right floated simple dropdown item">

                                           <i class="dropdown icon"></i>
                                           <div class="menu">
                                               <a class="item disabled">Áreas</a>

                                               @foreach($call_methods->returnAreasPublication($publication->id_publication) as $theme)
                                                   <a class="left item" href="#">{{$theme->name_theme}}</a>
                                               @endforeach
                                               <a class="left item" href="#">Denunciar</a>
                                           </div>
                                       </div>

                                       <a onclick="showDetailsPublication({{$publication->id_publication}})">
                                           <h5>{{$publication->title_publication}}</h5></a>
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
                                   <div class="ui items content">
                                       <div class="item">

                                           --}}{{--Institución--}}{{--
                                           <div class="content">
                                               <a class="ui blue right ribbon label"
                                                  style="left: 106%;">{{$publication->name_theme_notifications}}</a>
                                               <p></p>
                                               <div class="ui label">
                                                   <i class="student icon"></i>
                                                   <a class="detail">{{$publication->name_institution}}</a>
                                               </div>
                                               <br>
                                               <p style="color:#484040;margin-top: 5px;">{{$publication->description_publication}}</p>

                                               <div class="right floated wide column" style="color:#B2AAAA;">
                                                   <span><b>Desde: </b> {{$publication->date_start}}</span>
                                                   <br>
                                                   <span><b>Hasta: </b> {{$publication->date_end}}</span>
                                               </div>

                                           </div>
                                       </div>
                                       @if($publication->url_photo_publication != '')
                                           <div class="ui medium image">
                                               <img src="{{$publication->url_photo_publication}}">
                                           </div>
                                       @endif
                                   </div>
                                   --}}{{--Footer--}}{{--
                                   <div class="extra content">
                                       <div class="ui stackable grid">

                                           <div class="eleven wide column">
                                        <span class=" floated like">
                                         <i class="like icon"></i>
                                           Me interesa
                                       </span>
                                               <br>
                                               <span class="floated star">
                                         <i class="star icon"></i>
                                           Guardar en Favoritos
                                       </span>
                                           </div>
                                           <div class="rigth five wide column">
                                               <a class="ui teal right floated labeled icon button"
                                                  onclick="showDetailsPublication({{$publication->id_publication}})">
                                                   Ver detalles
                                                   <i class="linkify icon"></i>
                                               </a>
                                           </div>


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
                               </div>
                           @endforeach--}}

                        <br>
                        <br>
                    </div>

                </div>

            </div>
        </div>
    </div>


    @include('details.detalles')


    <script type="text/javascript">
        $('.ui.sidebar')
            .sidebar('attach events', '.menu.fixed .launch.item')
        ;
        $('.ui.checkbox')
            .checkbox()
        ;
        $('#optionMainHome').addClass('active');
    </script>
@stop