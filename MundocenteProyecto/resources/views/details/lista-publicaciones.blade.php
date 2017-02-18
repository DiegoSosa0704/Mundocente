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
                                                <a class="left item" >{{$theme->name_theme}}</a>
                                            @endforeach
                                            <a class="left item" >Denunciar</a>
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
                                        <a  class="ui large label color_1">{{$publication->name_institution}}</a>
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

                                    @if($call_methods->verifyFavorite($publication->id_publication)==1)
                                    <a onclick="addFavoritePublication({{$publication->id_publication}})" style="color: #D6DB47;" title="Eliminar de mis favoritos" id="favorite_button{{$publication->id_publication}}">
                                        <i class="star icon"></i>
                                        {{$call_methods->returnPublicationFavorite($publication->id_publication) }}  Favorito
                                    </a>
                                    @else
                                      <a onclick="addFavoritePublication({{$publication->id_publication}})" id="favorite_button{{$publication->id_publication}}">
                                        <i class="star icon"></i>
                                        {{$call_methods->returnPublicationFavorite($publication->id_publication) }}  Favorito
                                    </a>
                                    @endif
                                    
                                    <br>

                                    @if($publication->id_type_publication!=2)
                                   

                                    @if($call_methods->verifyInterest($publication->id_publication)==1)
                                    <a style="color: #DD0D29;" title="Ya no me interesa" onclick="addInterestPublication({{$publication->id_publication}})" id="interest_button{{$publication->id_publication}}">
                                        <i class="like icon"></i>
                                        {{$call_methods->returnPublicationSave($publication->id_publication)}} Me interesa
                                    </a>
                                    @else
                                       <a title="Me interesa" onclick="addInterestPublication({{$publication->id_publication}})" id="interest_button{{$publication->id_publication}}">
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
                    </div>

                </div>




                