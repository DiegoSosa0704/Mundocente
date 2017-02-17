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




                