@extends('main.main')

@section('content')


    @inject('call_methods','Mundocente\Http\Controllers\ResultController')

    <style>
        body {
            background-color: #EEEEEE;
        }

        .pusher {
            margin-top: 5em;
        }
    </style>

    <!--Contenido-->
    <div class="pusher pusher-start" style="background-color: #EEEEEE;">
        <div class="ui container">
            <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
            <div class="ui grid stackable equal width">
                <div class="column">
                    <div class="ui raised card" style="height: 100%">
                        <div class="header" style="padding: 10px 10px">
                            <h2>Interesados en publicaciones</h2>
                        </div>
                        <div class="content">
                            @foreach($lista_interesados as $usersInterest)
                                <div class="ui feed">
                                    <div class="event">
                                        <div class="label">
                                            <a href="{{$usersInterest->last_name}}">
                                                <img src="{{$usersInterest->photo_url}}">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div class="summary">
                                                <a href="{{$usersInterest->last_name}}"
                                                   class="user">{{$usersInterest->name}}</a>
                                                está interesado en tu publicación:
                                                <a onclick="showDetailsPublication({{$usersInterest->id_publication}})">{{$usersInterest->title_publication}}</a>
                                                <div class="date">
                                                    {{$usersInterest->created_at}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="title_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->title_publication}}">
                                <input type="hidden" id="sector_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->sector_publication}}">
                                <input type="hidden"
                                       id="name_institution_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->name_institution}}">
                                <input type="hidden"
                                       id="description_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->description_publication}}">
                                <input type="hidden" id="name_city_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->name_lugar}}">
                                <input type="hidden" id="contact_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->contact_pubication}}">
                                <input type="hidden" id="link_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->url_publication}}">
                                <input type="hidden" id="date_start_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->date_start}}">
                                <input type="hidden" id="date_end_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->date_end}}">
                                <input type="hidden" id="photo_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->url_photo_publication}}">
                                <input type="hidden"
                                       id="calculatequantityFavorite{{$usersInterest->id_publication}}"
                                       value="{{$call_methods->returnPublicationFavorite($usersInterest->id_publication)}}">
                                <input type="hidden" id="calculatequantitySave{{$usersInterest->id_publication}}"
                                       value="{{$call_methods->returnPublicationSave($usersInterest->id_publication)}}">
                                <input type="hidden"
                                       id="calculatequantityReport{{$usersInterest->id_publication}}"
                                       value="{{$call_methods->returnPublicationReport($usersInterest->id_publication)}}">
                            @endforeach
                            {!! $lista_interesados->render() !!}

                            {{--<div class="ui list">
                                @foreach($lista_interesados as $usersInterest)
                                    <div class="item">
                                        <a href="{{$usersInterest->last_name}}"><img class="ui avatar image"
                                                                                     src="{{$usersInterest->photo_url}}"></a>
                                        <div class="content">
                                            <a class="header" type="submit"
                                               href="{{$usersInterest->last_name}}">A {{$usersInterest->name}}</a>
                                            <div class="description">Le interesó la publicación: <a
                                                        onclick="showDetailsPublication({{$usersInterest->id_publication}})"><b>{{$usersInterest->title_publication}}</b></a>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <input type="hidden" id="title_publication{{$usersInterest->id_publication}}"
                                           value="{{$usersInterest->title_publication}}">
                                    <input type="hidden" id="sector_publication{{$usersInterest->id_publication}}"
                                           value="{{$usersInterest->sector_publication}}">
                                    <input type="hidden"
                                           id="name_institution_publication{{$usersInterest->id_publication}}"
                                           value="{{$usersInterest->name_institution}}">
                                    <input type="hidden"
                                           id="description_publication{{$usersInterest->id_publication}}"
                                           value="{{$usersInterest->description_publication}}">
                                    <input type="hidden" id="name_city_publication{{$usersInterest->id_publication}}"
                                           value="{{$usersInterest->name_lugar}}">
                                    <input type="hidden" id="contact_publication{{$usersInterest->id_publication}}"
                                           value="{{$usersInterest->contact_pubication}}">
                                    <input type="hidden" id="link_publication{{$usersInterest->id_publication}}"
                                           value="{{$usersInterest->url_publication}}">
                                    <input type="hidden" id="date_start_publication{{$usersInterest->id_publication}}"
                                           value="{{$usersInterest->date_start}}">
                                    <input type="hidden" id="date_end_publication{{$usersInterest->id_publication}}"
                                           value="{{$usersInterest->date_end}}">
                                    <input type="hidden" id="photo_publication{{$usersInterest->id_publication}}"
                                           value="{{$usersInterest->url_photo_publication}}">
                                    <input type="hidden"
                                           id="calculatequantityFavorite{{$usersInterest->id_publication}}"
                                           value="{{$call_methods->returnPublicationFavorite($usersInterest->id_publication)}}">
                                    <input type="hidden" id="calculatequantitySave{{$usersInterest->id_publication}}"
                                           value="{{$call_methods->returnPublicationSave($usersInterest->id_publication)}}">
                                    <input type="hidden"
                                           id="calculatequantityReport{{$usersInterest->id_publication}}"
                                           value="{{$call_methods->returnPublicationReport($usersInterest->id_publication)}}">

                                @endforeach
                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui raised card" style="height: 100%">
                        <div class="header" style="padding: 10px 10px">
                            <h2>Publicaciones denunciadas</h2>
                        </div>
                        <div class="content">
                            @foreach($lista_denuncias as $usersInterest)
                                <div class="ui feed">
                                    <div class="event">
                                        <div class="label">
                                            <a href="{{$usersInterest->last_name}}">
                                                <img src="{{$usersInterest->photo_url}}">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div class="summary">
                                                <a href="{{$usersInterest->last_name}}" class="user">
                                                    {{$usersInterest->name}}
                                                </a> ha denunciado tu publicación:
                                                <a onclick="showDetailsPublication({{$usersInterest->id_publication}})">{{$usersInterest->title_publication}}</a>
                                                <div class="date">
                                                    {{$usersInterest->created_at}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="title_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->title_publication}}">
                                <input type="hidden" id="sector_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->sector_publication}}">
                                <input type="hidden"
                                       id="name_institution_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->name_institution}}">
                                <input type="hidden"
                                       id="description_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->description_publication}}">
                                <input type="hidden" id="name_city_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->name_lugar}}">
                                <input type="hidden" id="contact_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->contact_pubication}}">
                                <input type="hidden" id="link_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->url_publication}}">
                                <input type="hidden" id="date_start_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->date_start}}">
                                <input type="hidden" id="date_end_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->date_end}}">
                                <input type="hidden" id="photo_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->url_photo_publication}}">
                                <input type="hidden"
                                       id="calculatequantityFavorite{{$usersInterest->id_publication}}"
                                       value="{{$call_methods->returnPublicationFavorite($usersInterest->id_publication)}}">
                                <input type="hidden" id="calculatequantitySave{{$usersInterest->id_publication}}"
                                       value="{{$call_methods->returnPublicationSave($usersInterest->id_publication)}}">
                                <input type="hidden"
                                       id="calculatequantityReport{{$usersInterest->id_publication}}"
                                       value="{{$call_methods->returnPublicationReport($usersInterest->id_publication)}}">
                            @endforeach
                            {!! $lista_denuncias->render() !!}

                            {{--<div class="ui list">
                            @foreach($lista_denuncias as $usersInterest)
                                <div class="item">
                                    <a href="{{$usersInterest->last_name}}"> <img class="ui avatar image"
                                                                                  src="{{$usersInterest->photo_url}}"></a>
                                    <div class="content">
                                        <a class="header" href="{{$usersInterest->last_name}}">{{$usersInterest->name}}</a>
                                        <div class="description">Ha denunciado la publicación: <a
                                                    onclick="showDetailsPublication({{$usersInterest->id_publication}})"><b>{{$usersInterest->title_publication}}</b></a>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" id="title_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->title_publication}}">
                                <input type="hidden" id="sector_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->sector_publication}}">
                                <input type="hidden"
                                       id="name_institution_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->name_institution}}">
                                <input type="hidden"
                                       id="description_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->description_publication}}">
                                <input type="hidden" id="name_city_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->name_lugar}}">
                                <input type="hidden" id="contact_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->contact_pubication}}">
                                <input type="hidden" id="link_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->url_publication}}">
                                <input type="hidden" id="date_start_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->date_start}}">
                                <input type="hidden" id="date_end_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->date_end}}">
                                <input type="hidden" id="photo_publication{{$usersInterest->id_publication}}"
                                       value="{{$usersInterest->url_photo_publication}}">
                                <input type="hidden"
                                       id="calculatequantityFavorite{{$usersInterest->id_publication}}"
                                       value="{{$call_methods->returnPublicationFavorite($usersInterest->id_publication)}}">
                                <input type="hidden" id="calculatequantitySave{{$usersInterest->id_publication}}"
                                       value="{{$call_methods->returnPublicationSave($usersInterest->id_publication)}}">
                                <input type="hidden"
                                       id="calculatequantityReport{{$usersInterest->id_publication}}"
                                       value="{{$call_methods->returnPublicationReport($usersInterest->id_publication)}}">
                            @endforeach

                        </div>--}}
                        </div>

                    </div>
                </div>
            </div>


        </div>


        @include('details.detalles')


    </div>



@stop