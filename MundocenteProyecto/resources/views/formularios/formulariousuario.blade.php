@extends('main.main')

@section('content')

    {!!Html::style('css/darkroom.css')!!}
    {!!Html::script('js/fabric.js')!!}
    {!!Html::script('js/darkroom.js')!!}

    <style>
        .ui.modal {
            position: relative;
            top:35%;
        }
        .image-container {
            display: inline-block;
            max-width: 100%;
            background: white;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #e2e2e2;
            border-bottom: 1px solid #ccc;
            border-right: 1px solid #ccc;
        }
        .image-container.target {
            margin-top: 40px;
        }
        .image-container img {
            max-width: 300px;
            max-height: 300px;
            min-width: 100px;
            min-height:100px;
        }
    </style>

    <!--Contenido-->
    <div class="pusher" style="background-color: #EEEEEE;">
        <div class="ui container center aligned">
            <h1 class="ui header">Configuración de cuenta</h1>
            <div>
                <div class="line"></div>
                <div data-width="79" data-height="27"
                     style="display: inline-block; vertical-align: middle; line-height: 0; width: 79px; height: 27px;">
                    <svg height="27" width="79">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 78.2 26.4">
                            <path fill="none" stroke="#A54686" stroke-width="2" d="
                            M57.3,13.1c-3.2,10.4,10.4,16.1,16.8,8.7c7.1-8.2,0.6-17.8-7-20.1c-19.6-5.2-31.9,18-49,23.1C9.3,27.5-1.7,20.4,1.6,9.8
                            c3.8-12.4,23.3-9,19.3,4"></path>
                        </svg>
                    </svg>
                </div>
                <div class="line"></div>
            </div>
        </div>
        <!--Contenido Segment -->
        <div class="ui container">
            <div class="ui piled padded segment styled fluid accordion">
                {{--Datos personales--}}
                <div class="title">
                    <i class="dropdown icon"></i>
                    Datos personales
                </div>
                <div class="content">
                    <div class="transition hidden">
                        <div class="ui padded left aligned segment">
                            {!!Form::open(['url'=>'editaperfil', 'method'=> 'POST', 'class'=>'ui form', 'id'=>'form'])!!}
                            <div class="equal width fields">
                                <div class="field">
                                    <label>Foto de perfil</label>
                                    <div class="ui small circular image">
                                        <div class="ui dimmer">
                                            <div class="content">
                                                <div class="center">
                                                    <span>
                                                        <label for="file-input" class="ui blue button">
                                                            <input type="file" name="file-input" accept="image/*" id="file-input" style="display:none">
                                                            Cargar Foto
                                                        </label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{!!Auth::user()->photo_url!!}" id="newimageperfil" >
                                        <input type="hidden" name="newimageinputperfil" id="hiddenewphoto" value="images/user.png">
                                    </div>
                                    {{--<span>
                                    <img class="ui middle aligned small circular image"
                                         src="{!!Auth::user()->photo_url!!}">
                                <label for="file" class="ui inverted button button_load">
                                    <input type="file" id="file" style="display:none">
                                    Cargar Foto
                                </label>
                            </span>--}}
                                </div>
                            </div>
                            <br>


                            <div class="ui green message" style="display: none;" id="messageChangePhotoPerfil">
                                    
                                    <div class="header">
                                        <p>Se guardó la foto correctamente</p>
                                    </div>
                            </div>
                            <br>


                            <div class="equal width fields">
                                <div class="required field">
                                    <label>Nombre Completo</label>
                                    {!!Form::text('name', Auth::user()->name, ['type' => 'text', 'placeholder' => 'Ingrese nombres y apellidos'])!!}
                                </div>
                            </div>
                            <div class="required field">
                                <label>Currículo</label>
                                <div class="equal width fields">
                                    <div class="required field">

                                        {!!Form::text('link_curriculum', Auth::user()->curriculo_url, ['type' => 'url', 'placeholder' => 'Enlace a currículo en la web'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class="required grouped fields">
                                <label>Máximo nivel de formación (titulado)</label>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        @if(Auth::user()->nivel_formacion=='post_doctorado')
                                            {!!Form::radio('level_training', 'post_doctorado', true)!!}
                                        @else
                                            {!!Form::radio('level_training', 'post_doctorado', false)!!}
                                        @endif

                                        <label>Post-doctorado</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        @if(Auth::user()->nivel_formacion=='doctorado')
                                            {!!Form::radio('level_training', 'doctorado', true)!!}
                                        @else
                                            {!!Form::radio('level_training', 'doctorado', false)!!}
                                        @endif
                                        <label>Doctorado</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        @if(Auth::user()->nivel_formacion=='maestria')
                                            {!!Form::radio('level_training', 'maestria', true)!!}
                                        @else
                                            {!!Form::radio('level_training', 'maestria', false)!!}
                                        @endif
                                        <label>Maestría</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        @if(Auth::user()->nivel_formacion=='especializacion')
                                            {!!Form::radio('level_training', 'especializacion', true)!!}
                                        @else
                                            {!!Form::radio('level_training', 'especializacion', false)!!}
                                        @endif
                                        <label>Especializacíon</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        @if(Auth::user()->nivel_formacion=='universitario')
                                            {!!Form::radio('level_training', 'universitario', true)!!}
                                        @else
                                            {!!Form::radio('level_training', 'universitario', false)!!}
                                        @endif
                                        <label>Universitario</label>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="field">
                                <label>¿Desea recibir notificaciones de las diferentes publicaciones?</label>
                                @if(Auth::user()->recibe_not=='si')
                                    <div class="inline field">
                                        <label>
                                            No
                                        </label>
                                        <div class="ui toggle checkbox" onclick="showNotificationType()">
                                            <input type="checkbox" name="notification" tabindex="0" checked="checked"
                                                   class="hidden"
                                                   value="true">
                                        </div>
                                        <label>
                                            Si
                                        </label>
                                    </div>
                                @else
                                    <div class="inline field">
                                        <label>
                                            No
                                        </label>
                                        <div class="ui toggle checkbox" onclick="showNotificationType()">
                                            <input type="checkbox" name="notification" tabindex="0" class="hidden"
                                                   value="false">
                                        </div>
                                        <label>
                                            Si
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @if(Auth::user()->recibe_not=='si')
                                <?php $id_notification_exist = 0; ?>
                                <div class="ui notification_type raised segment" id="notification_type">
                                    <div class="required grouped fields">
                                        <label>Notificaciones de: </label>

                                        @foreach($recibonotifide as $recibe_noti)

                                            @foreach($milista_notificacion_recibe as $misnoti)
                                                @if($recibe_noti->id_type_publications==$misnoti->id_type_notifications_fk)
                                                    <p style="display: none;">{{$id_notification_exist=$misnoti->id_type_notifications_fk}}</p>
                                                    <div class="field">
                                                        <div class="ui checkbox checked">
                                                            <input type="checkbox" checked="" name="notification_type[]"
                                                                   value="{{$recibe_noti->id_type_publications}}">
                                                            <label>{{$recibe_noti->name_theme_notifications}}</label>
                                                        </div>
                                                    </div>
                                                @else



                                                @endif
                                            @endforeach

                                            @if($id_notification_exist!=$recibe_noti->id_type_publications)
                                                <div class="field">
                                                    <div class="ui checkbox">
                                                        <input type="checkbox" name="notification_type[]"
                                                               value="{{$recibe_noti->id_type_publications}}">
                                                        <label>{{$recibe_noti->name_theme_notifications}}</label>
                                                    </div>
                                                </div>
                                            @endif


                                        @endforeach


                                    </div>
                                </div>
                            @else
                                <div class="ui notification_type raised segment" id="notification_type"
                                     style="display: none;">
                                    <div class="required grouped fields">
                                        <label>Notificaciones de: </label>

                                        @foreach($recibonotifide as $recibe_noti)

                                            <div class="field">
                                                <div class="ui checkbox">
                                                    <input type="checkbox" name="notification_type[]"
                                                           value="{{$recibe_noti->id_type_publications}}">
                                                    <label>{{$recibe_noti->name_theme_notifications}}</label>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                            @endif


                            <div class="ui right aligned stackable grid">
                                <div class="sixteen wide column">
                                    <div form="form" onclick="validateFormAccount()"
                                         class="ui submit inverted button button_submit">
                                        Aceptar
                                    </div>
                                </div>
                            </div>
                            <div class="ui error message"></div>

                            {!!Form::close()!!}


                        </div>
                    </div>
                </div>





























                {{--Vinculación laboral--}}
                <div class="title">
                    <i class="dropdown icon"></i>
                    Vinculación laboral
                </div>
                <div class="content">
                    <div class="transition hidden">
                        <div class="ui padded segment">
                            <div class="ui form">
                                <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
                                <div class="required field">
                                    <div class="two fields">
                                        <div class="required field">
                                            <label>País en donde se encuentra la universidad</label>

                                            <select class="ui search dropdown" name="country"
                                                    placeholder="seleccione país de la institución" id="selectCountry">
                                                <option value="">Seleccione país</option>
                                                @foreach($lugares as $lugar)

                                                    <option value="{{$lugar->id_lugar}}"> {{$lugar->name_lugar}}</option>
                                                @endforeach
                                            </select>


                                        </div>
                                        <div class="required field" id="cityChange">
                                            <label>Ciudad</label>


                                            <select class="ui search dropdown" name="city"
                                                    placeholder="Seleccione Ciudad"
                                                    id="selectCity">

                                                <option value="">Seleccione ciudad</option>


                                            </select>

                                        </div>
                                    </div>
                                    <div class="ui info compact small message">
                                        <p>Si su institución no se encuentra en la lista, podrá suministrarla en el
                                            campo
                                            "Otra". </p>
                                    </div>

                                    <div class="two fields" id="institutionChange">
                                        <div class="required field">
                                            <label>Institución</label>


                                            <select class="ui search dropdown" name="institution"
                                                    placeholder="Seleccione Institución" id="selectInstitution">

                                                <option value="">Seleccione institución</option>

                                            </select>
                                            <div class="ui horizontal divider">
                                                <a class="ui label button color_1" id="agregaInstituto">Agregar
                                                    Institución</a>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label>Otra</label>
                                            <div class="ui action input">
                                                <input placeholder="Nombre" id="otherInstitute" type="text" value="">
                                                <div class="ui button" id="addInstituteNew">Nuevo</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ui raised segment">
                                        <label><b>Estoy viculado en:</b></label>
                                        <div class="ui divided list selected_list" id="listadeinstitutosvinculados">
                                            @foreach($institucionesVinvulado as $institu)
                                                <div class="item" id="institutionList{{$institu->id_institution}}">
                                                    <div class="right floated content">
                                                        <a class="ui label button color_3"
                                                           onclick="delete_institution_vinul({{$institu->id_institution}})">Eliminar
                                                            <i class="trash icon"></i></a>
                                                    </div>
                                                    <div class="content">
                                                        {{$institu->name_institution}} -
                                                        ({{$institu->state_institution}})
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="ui info green message" style="display: none;" id="messageSaveVinculation">
                                    <i class="close icon" id="cierramensajedeinstitutos"></i>
                                    <div class="header">
                                        Guardó institución con éxito
                                    </div>
                                    <ul class="list">
                                        <li id="idlisaveinstitute"></li>

                                    </ul>
                                </div>
                                <div class="ui error message" style="display: none;" id="messageNewInstitutioneror">
                                    
                                    <div class="header">
                                        <p id="exitNewUniversity">Debe indicar la ciudad de la nueva institución</p>
                                    </div>
                                    <ul class="list">
                                    </ul>
                                </div>
                                <div class="ui error message" style="display: none;" id="messageSaveVinculationerror">
                                    <i class="close icon" id="cierramensajedeinstitutoserror"></i>
                                    <div class="header">
                                        No se ha seleccionado la Institución correctamente
                                    </div>
                                    <ul class="list">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



















                {{--Áreas de formación--}}
                <div class="title">
                    <i class="dropdown icon"></i>
                    Áreas de formación
                </div>
                <div class="content">
                    <div class="transition hidden">
                        <div class="ui padded segment">
                            <div class="ui form">
                                <div class="field">
                                    <div class="ui three fields">
                                        <div class="required field">
                                            <label>Gran área</label>
                                            <select class="ui fluid search dropdown" name="large_area"
                                                    id="select_gran_area_formacion">
                                                <option value="">Gran Área</option>
                                                @foreach($gran_areas as $gran_area)
                                                    <option value="{{$gran_area->id_tema}}"> {{$gran_area->name_theme}}</option>
                                                @endforeach
                                            </select>
                                            <div class="ui horizontal divider">
                                                <a type="submit" class="ui label button color_1"
                                                   id="addGranAreaFormation">Agregar Gran Área</a>
                                            </div>
                                            <div class="ui raised segment">
                                                <label><b>Seleccionados</b></label>
                                                <div class="ui divided list selected_list"
                                                     id="list_large_area_training">
                                                    @foreach($gran_areas_de_formacion as $gran_area_f)
                                                        <div class="item"
                                                             id="listLargeAreTrainingItem{{$gran_area_f->id_areas_formacion}}">
                                                            <div class="right floated content">
                                                                <a class="ui label button color_3"
                                                                   onclick="deleteLargeAreaTraining({{$gran_area_f->id_areas_formacion}})">Eliminar </a>
                                                            </div>
                                                            <div class="content">
                                                                {{$gran_area_f->name_theme}}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label>Área</label>
                                            {!!Form::select('area',['ninguna seleccionada'], null, ['class'=>'ui search dropdown', 'placeholder'=>'Seleccione Área', 'id'=>'select_area_formacion'])!!}
                                            <div class="ui horizontal divider">
                                                <a type="submit" class="ui label button color_1" id="addAreaFormation">Agregar
                                                    Área</a>
                                            </div>
                                            <div class="ui raised segment">
                                                <label><b>Seleccionados</b></label>
                                                <div class="ui divided list selected_list" id="list_area_training">
                                                    @foreach($areas_de_formacion as $area_f)
                                                        <div class="item"
                                                             id="listAreTrainingItem{{$area_f->id_areas_formacion}}">
                                                            <div class="right floated content">
                                                                <a class="ui label button color_3"
                                                                   onclick="deleteAreaTraining({{$area_f->id_areas_formacion}})">Eliminar </a>
                                                            </div>
                                                            <div class="content">
                                                                {{$area_f->name_theme}}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label>Disciplina</label>
                                            {!!Form::select('discipline',['ninguna seleccionada'], null, ['class'=>'ui search dropdown', 'placeholder'=>'Seleccione Disciplina', 'id'=>'select_disciplina_formacion'])!!}
                                            <div class="ui horizontal divider">
                                                <a type="submit" class="ui label button color_1"
                                                   id="addDisciplineAreaFormation">Agregar Disciplina</a>
                                            </div>
                                            <div class="ui raised segment">
                                                <label><b>Seleccionados</b></label>
                                                <div class="ui divided list selected_list"
                                                     id="list_discipline_area_training">
                                                    @foreach($disciplina_de_formacion as $disciplina_formacion)
                                                        <div class="item"
                                                             id="listDisciplineAreTrainingItem{{$disciplina_formacion->id_areas_formacion}}">
                                                            <div class="right floated content">
                                                                <div class="ui label button color_3"
                                                                     onclick="deleteDisciplineAreaTraining({{$disciplina_formacion->id_areas_formacion}})">
                                                                    Eliminar
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                {{$disciplina_formacion->name_theme}}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




















                {{--Áreas de interés--}}
                <div class="title">
                    <i class="dropdown icon"></i>
                    Áreas de interés
                </div>
                <div class="content">
                    <div class="transition hidden">
                        <div class="ui padded segment">
                            <div class="ui form">
                                <div class="field">
                                    <div class="three fields">
                                        <div class="required field">
                                            <label>Gran área</label>
                                            <select class="ui fluid search dropdown" name="large_area"
                                                    id="select_gran_area_interes">
                                                @foreach($gran_areas as $gran_area)
                                                    <option value="">Gran Área</option>
                                                    <option value="{{$gran_area->id_tema}}"> {{$gran_area->name_theme}}</option>
                                                @endforeach
                                            </select>
                                            <div class="ui horizontal divider">
                                                <a type="submit" class="ui label button color_1"
                                                   id="addDisciplineAreaInterest">Agregar Gran Área</a>
                                            </div>
                                            <div class="ui raised segment">
                                                <label><b>Seleccionados</b></label>
                                                <div class="ui divided list selected_list"
                                                     id="list_discipline_area_Interest">
                                                    @foreach($gran_areas_de_interes as $gran_area_i)
                                                        <div class="item"
                                                             id="listDisciplineAreInterestItem{{$gran_area_i->id_areas_interes}}">
                                                            <div class="right floated content">
                                                                <div class="ui label button color_3"
                                                                     onclick="deleteDisciplineAreaInterest({{$gran_area_i->id_areas_interes}})">
                                                                    Eliminar
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                {{$gran_area_i->name_theme}}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label>Área</label>
                                            {!!Form::select('area',['ninguna seleccionada'], null, ['class'=>'ui search dropdown', 'placeholder'=>'Seleccione Área', 'id'=>'select_area_interes'])!!}
                                            <div class="ui horizontal divider">
                                                <a type="submit" class="ui label button color_1" id="addAreaInterest">Agregar
                                                    Área</a>
                                            </div>
                                            <div class="ui raised segment">
                                                <label><b>Seleccionados</b></label>
                                                <div class="ui divided list selected_list" id="list_area_Interest">
                                                    @foreach($areas_de_interes as $gran_area_i)
                                                        <div class="item"
                                                             id="listAreInterestItem{{$gran_area_i->id_areas_interes}}">
                                                            <div class="right floated content">
                                                                <div class="ui label button color_3"
                                                                     onclick="deleteAreaInterest({{$gran_area_i->id_areas_interes}})">
                                                                    Eliminar
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                {{$gran_area_i->name_theme}}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label>Disciplina</label>
                                            {!!Form::select('discipline',['ninguna seleccionada'], null, ['class'=>'ui search dropdown', 'placeholder'=>'Seleccione Disciplina', 'id'=>'select_disciplina_interes'])!!}
                                            <div class="ui horizontal divider">
                                                <a type="submit" class="ui label button color_1"
                                                   id="addAreaInterestDiscipline">Agregar Disciplina</a>
                                            </div>
                                            <div class="ui raised segment">
                                                <label><b>Seleccionados</b></label>
                                                <div class="ui divided list selected_list"
                                                     id="list_area_Interest_discipline">
                                                    @foreach($disciplina_de_interes as $gran_area_i)
                                                        <div class="item"
                                                             id="listAreInterestItemDiscipline{{$gran_area_i->id_areas_interes}}">
                                                            <div class="right floated content">
                                                                <div class="ui label button color_3"
                                                                     onclick="deleteAreaInterestDiscipline({{$gran_area_i->id_areas_interes}})">
                                                                    Eliminar
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                {{$gran_area_i->name_theme}}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



















                {{--Configuración general de cuenta--}}
                <div class="title">
                    <i class="dropdown icon"></i>
                    Cambiar contraseña
                </div>
                <div class="content">
                    <div class="transition hidden">
                        @if(Auth::user()->password != 'NULL')
                            <div class="ui padded segment">
                                <div class="ui form">

                                    <div class="equal width fields">

                                        <div class="required field">
                                            <label>Correo electrónico</label>
                                            <input type="text" name="email" value="{!!Auth::user()->email!!}"
                                                   disabled="true">
                                        </div>
                                        <div class="required field " id="passwordChangeNow">
                                            <label>Contraseña Actual</label>
                                            {!!Form::password('passwordNow', null, ['type' => 'password', 'id'=>'id_password_now'])!!}
                                        </div>
                                    </div>

                                    <div class="equal width fields">
                                        <div class="required field" id="passwordChangeNew">
                                            <label>Nueva Contraseña</label>
                                            {!!Form::password('passwordNew', null, ['type' => 'password'])!!}
                                        </div>
                                        <div class="required field" id="repeat_password_change">
                                            <label>Repetir contraseña</label>
                                            {!!Form::password('passwordNewRepeat', null, ['type' => 'password'])!!}
                                        </div>

                                    </div>

                                    <div class="ui right aligned stackable grid">
                                        <div class="sixteen wide column">
                                            <a form="form" class="ui submit inverted button button_submit"
                                               id="buttonChangePassword">
                                                Guardar contraseña
                                            </a>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="ui error message" id="messageErrorChangePassword" style="display: none;">

                                        <div class="header">
                                            <p id="errorsChangePasswordp">Errores</p>
                                        </div>
                                        <ul class="list">


                                        </ul>
                                    </div>


                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{--Activar e inactivar cuenta--}}
                <div class="title">
                    <i class="dropdown icon"></i>
                    Activar e inactivar cuenta
                </div>
                <div class="content">
                    <div class="transition hidden">
                        <div class="ui padded segment">
                            <div class="ui form">

                                <div class="grouped fields">
                                    <label>Cuenta</label>
                                    <div class="field">
                                        <div class="ui radio checkbox">
                                            @if(Auth::user()->state_user=='activo')
                                                <input type="radio" id="activacion_cuenta" name="accountActivate"
                                                       checked="checked"
                                                       value="1">
                                            @else
                                                <input type="radio" id="activacion_cuenta" name="accountActivate"
                                                       value="1">
                                            @endif

                                            <label>Activa</label>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="ui radio checkbox">
                                            @if(Auth::user()->state_user=='inactivo')
                                                <input type="radio" id="inactivacion_cuenta" name="accountActivate"
                                                       checked="checked" value="2">
                                            @else
                                                <input type="radio" id="inactivacion_cuenta" name="accountActivate"
                                                       value="2">
                                            @endif
                                            <label>Inactiva</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="field">
                                    <label>Términos y condiciones</label>
                                    <a class="ui compact blue label">Leer términos y condiciones</a>
                                </div>


                                <div class="ui right aligned stackable grid">
                                    <div class="sixteen wide column">
                                        <a form="form" class="ui submit inverted button button_submit"
                                           id="changeAccountActive">
                                            Aceptar
                                        </a>
                                    </div>
                                </div>


                                <div class="ui info green message" style="display: none;" id="messageActivateAccount">

                                    <div class="header">

                                    </div>
                                    <ul class="list">
                                        <li id="idmensaje_p_activteAccount"></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>




  


    <div class="ui small modal">
        <h2 class="ui center aligned header">Cambia tu foto de perfil</h2>
        <div class="content">
            <div class="ui equals center aligned width grid">
                <div class="column">
                    <figure class="image-container target">
                        <img src="" alt="DomoKun" id="blah">
                    </figure>
                </div>
            </div>
        </div>
        <div class="actions">
            
            <div class="ui cancel button color_2">Salir</div>
        </div>
    </div>

    <script type="text/javascript">
      
        $('#buttonChangePhoto').on('click', function () {
            $('.ui.modal').modal('show');
        });
        function showNotificationType() {
            if ($('#notification_type').is(":visible")) {
                $('#notification_type').toggle("fast");
                $('#recibe_not').val(false);
            } else {
                $('#notification_type').toggle("show");
                $('#recibe_not').val(true)
            }
        }
        $('.message .close')
            .on('click', function () {
                if ($('#messageSaveVinculation').is(":visible")) {
                    $('#messageSaveVinculation').toggle("fast");
                }
            })
        ;
        $('.message .close')
            .on('click', function () {
                if ($('#messageSaveVinculationerror').is(":visible")) {
                    $('#messageSaveVinculationerror').toggle("fast");
                }
            })
        ;
        $('.image')
            .dimmer({
                on: 'hover'
            })
        ;
        $('.ui.radio.checkbox')
            .checkbox()
        ;
        $('.ui.checkbox')
            .checkbox()
        ;
        $('.ui.sidebar')
            .sidebar('attach events', '.menu.fixed .launch.item')
        ;
        $('.ui.accordion')
            .accordion()
        ;
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                    console.log();
                    editPhoto(e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file-input").change(function () {
            $('.ui.modal').modal('show');
            readURL(this);
        });
        function editPhoto() {
            var dkrm = new Darkroom('#blah', {
                // Size options
                minWidth: 100,
                minHeight: 100,
                maxWidth: 400,
                maxHeight: 400,
                ratio: 4 / 4,
                backgroundColor: '#1E555C',
                // Plugins options
                plugins: {
                    crop: {
                        quickCropKey: 67, //key "c"
                        /*minHeight: 50,
                         minWidth: 50,
                         ratio: 4 / 3*/
                    },
                    save: {
                        callback: function() {
                            this.darkroom.selfDestroy(); // Cleanup
                            var newImage = dkrm.canvas.toDataURL();
                            fileStorageLocation = newImage;
                            //Imagen base 64
                            $('#newimageperfil').attr('src', newImage);
                            
                            
                            var routeimage = "chage-photo-perfil";
                            var token = $("#token").val();
                            
                            $.ajax({
                                url: routeimage,
                                headers: {'X-CSRF-TOKEN': token},
                                type: "POST",
                                data: {newImage: newImage},
                                success: function(info){
                                    
                                    $('#hiddenewphoto').val(info);
                                    $('#messageChangePhotoPerfil').css('display', 'block');

                                }
                            });
                        }
                    }
                },
                // Post initialize script
                initialize: function () {
                    var cropPlugin = this.plugins['crop'];
                    //cropPlugin.selectZone(170, 25, 300, 300);
                    cropPlugin.requireFocus();
                }
            });
        }
    </script>
@stop