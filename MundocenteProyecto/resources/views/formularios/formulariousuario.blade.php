@extends('main.main')

@section('content')

    {!!Html::style('css/darkroom.css')!!}
    {!!Html::script('js/fabric.js')!!}
    {!!Html::script('js/darkroom.js')!!}

    <style>
        .ui.modal {
            position: relative;
            top: 35%;
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
            min-height: 100px;
        }


        .ui.action.input .ui.dropdown:first-child {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .ui.action.input .ui.dropdown:last-child {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .padre {
            background: yellow;
            height: 150px;
            /*IMPORTANTE*/
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hijo {
            background: red;
            width: 120px;
        }
    </style>

    <!--Contenido-->
    <div class="pusher">
        <div class="segment-title">
            <div class="ui container">
                <h1 class="ui header" style="color: #A54686;">Configuración de cuenta</h1>
            </div>
        </div>
        <div class="line"></div>
        <!--Contenido Segment -->
        <div class="ui container">
            <div class="ui piled padded segment styled fluid accordion">
                {{--Datos personales--}}
                <div class="title active">
                    <i class="dropdown icon"></i>
                    Datos personales
                </div>
                <div class="content active">
                    <div class="equal width fields">
                        <div class="field">
                            <label>Foto de perfil</label>
                            <div class="ui small circular image">
                                <div class="ui dimmer">
                                    <div class="content">
                                        <div class="center">
                                                <span>
                                                    <label for="file-input" class="ui blue button">
                                                        <input type="file" name="file-input" accept="image/*"
                                                               id="file-input" style="display:none">
                                                        Cargar Foto
                                                    </label>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <img src="{!!Auth::user()->photo_url!!}" id="newimageperfil">

                            </div>
                        </div>
                    </div>
                    {!!Form::open(['url'=>'editaperfil', 'method'=> 'POST', 'class'=>'ui form', 'id'=>'form'])!!}
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
                        <div class="notification_type" id="notification_type"
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
                    <input type="hidden" name="newimageinputperfil" id="hiddenewphoto"
                           value="{!!Auth::user()->photo_url!!}">
                    <div class="ui right aligned stackable grid">
                        <div class="sixteen wide column">
                            <button form="form"
                                    class="ui submit button color_1">
                                Aceptar
                            </button>
                        </div>
                    </div>
                    <div class="ui error message"></div>
                    {!!Form::close()!!}
                </div>


                {{--Vinculación laboral--}}
                <div class="title">
                    <i class="dropdown icon"></i>
                    Vinculación laboral
                </div>
                <div class="content">
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
                            <div class="two fields" id="institutionChange">
                                <div class="twelve nine wide field">
                                    <label>Institución</label>
                                    <select class="ui fluid search dropdown" name="institution"
                                            placeholder="Seleccione Institución" id="selectInstitution">
                                        <option value="">Seleccione institución</option>
                                    </select>
                                    <div class="ui horizontal divider">
                                        <div class="ui right float color_1 label button" id="agregaInstituto" style="color: #EEEEEE;">Agregar Institución</div>
                                    </div>
                                </div>
                                <div class="four wide field" style="margin: auto">
                                    <a href="#" id="id_add_new_institute" style="text-decoration: underline;">Agregar otra Institución...</a>
                                    {{--<label>Otra</label>
                                    <div class="ui action input">
                                        <input placeholder="Nombre" id="otherInstitute" type="text" value="">
                                        <div class="ui color_1 button" id="addInstituteNew">Nueva Institución</div>
                                    </div>--}}
                                </div>
                            </div>
                            <div class="ui raised card">
                                <div class="content">
                                    <div class="header">
                                        <div>Viculado a:</div>
                                    </div>
                                    <div class="description">
                                        <div class="ui divided list " id="listadeinstitutosvinculados">
                                            @foreach($institucionesVinvulado as $institu)
                                                <div class="item" id="institutionList{{$institu->id_institution}}">
                                                    <div class="right floated content">
                                                        <div class="ui label button color_3"
                                                           onclick="delete_institution_vinul({{$institu->id_institution}})" style="color: #EEEEEE"><i class="trash icon"></i>Eliminar</div>
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

                @inject('call_methods_theme','Mundocente\Http\Controllers\HomeController')
                {{--Áreas de formación--}}
                <div class="title">
                    <i class="dropdown icon"></i>
                    Áreas de formación
                </div>
                <div class="content">
                    <div class="transition hidden">
                        <div class="ui form">
                            <div class="field">
                                <select class="ui fluid search dropdown" id="select_areas_general_search_formation">
                                    <option value="">Ingrese sus áreas de formación</option>
                                    @foreach($areas_all as $gran_area)
                                        <option value="{{$gran_area->id_tema}}">{{$gran_area->name_theme}}</option>
                                        @foreach($call_methods_theme->call_areas($gran_area->id_tema) as $area)
                                            <option value="{{$area->id_tema}}"> {{$gran_area->name_theme}}
                                                - {{$area->name_theme}}</option>
                                            @foreach($call_methods_theme->call_disciplines($area->id_tema) as $disci)
                                                <option value="{{$disci->id_tema}}">{{$gran_area->name_theme}}
                                                    - {{$area->name_theme}} - {{$disci->name_theme}}</option>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="field">
                                <label>Seleccionados</label>
                                <table class="ui celled table" id="table_areas_formation">
                                    <thead>
                                    <tr>
                                        <th>Gran Área</th>
                                        <th>Área</th>
                                        <th>Disciplina</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody id="add_temas_formation">
                                    @foreach($listaAreaFormation as $disciplina_formacion)
                                        @if($disciplina_formacion->type_theme=='disciplina')
                                            <tr id="table_tr_new_area_formation{{$disciplina_formacion->id_tema_disciplina}}">
                                                <td> {{$disciplina_formacion->name_tema_gran}} </td>
                                                <td>{{$disciplina_formacion->name_tema_area}} </td>
                                                <td> {{$disciplina_formacion->name_tema_disciplina}} </td>
                                                <td><div class='ui label button color_3'
                                                       onclick='deleteDisciplineAreaTraining({{$disciplina_formacion->id_tema_disciplina}})' style="color: #EEEEEE"><i class="trash icon"></i>Eliminar</div>
                                                </td>
                                            </tr>
                                        @elseif($disciplina_formacion->type_theme=='area')
                                            <tr id="table_tr_new_area_formation{{$disciplina_formacion->id_tema_area}}">
                                                <td> {{$disciplina_formacion->name_tema_gran}} </td>
                                                <td>{{$disciplina_formacion->name_tema_area}} </td>
                                                <td> -</td>
                                                <td><div class='ui label button color_3'
                                                       onclick='deleteDisciplineAreaTraining({{$disciplina_formacion->id_tema_area}})' style="color: #EEEEEE"><i class="trash icon"></i>Eliminar</div>
                                                </td>
                                            </tr>
                                        @else
                                            <tr id="table_tr_new_area_formation{{$disciplina_formacion->id_tema_gran}}">
                                                <td> {{$disciplina_formacion->name_tema_gran}} </td>
                                                <td> -</td>
                                                <td> -</td>
                                                <td><div class='ui label button color_3'
                                                       onclick='deleteDisciplineAreaTraining({{$disciplina_formacion->id_tema_gran}})' style="color: #EEEEEE"><i class="trash icon"></i>Eliminar</div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>

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
                        <div class="ui form">
                            <div class="field">


                                <select class="ui fluid search dropdown " id="select_areas_general_search_interest">

                                    @foreach($areas_all as $gran_area)

                                        <option value="{{$gran_area->id_tema}}">{{$gran_area->name_theme}}</option>
                                        @foreach($call_methods_theme->call_areas($gran_area->id_tema) as $area)
                                            <option value="{{$area->id_tema}}"> {{$gran_area->name_theme}}
                                                - {{$area->name_theme}}</option>
                                            @foreach($call_methods_theme->call_disciplines($area->id_tema) as $disci)
                                                <option value="{{$disci->id_tema}}">{{$gran_area->name_theme}}
                                                    - {{$area->name_theme}} - {{$disci->name_theme}}</option>
                                            @endforeach
                                        @endforeach

                                    @endforeach
                                </select>

                                <br>
                                <label><b>Seleccionados</b></label>
                                <table class="ui celled table" id="table_areas_interest">
                                    <thead>
                                    <tr>
                                        <th>Gran Área</th>
                                        <th>Área</th>
                                        <th>Disciplina</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody id="add_temas_formation">
                                    @foreach($listaAreaInterest as $disciplina_interest)
                                        @if($disciplina_interest->type_theme=='disciplina')
                                            <tr id="table_tr_new_area_interest{{$disciplina_interest->id_tema_disciplina}}">
                                                <td> {{$disciplina_interest->name_tema_gran}} </td>
                                                <td>{{$disciplina_interest->name_tema_area}} </td>
                                                <td> {{$disciplina_interest->name_tema_disciplina}} </td>
                                                <td><a class='ui label button color_3'
                                                       onclick='deleteDisciplineAreaInterest({{$disciplina_interest->id_tema_disciplina}})' style="color: #EEEEEE"><i class="trash icon"></i>Eliminar</a>
                                                </td>
                                            </tr>
                                        @elseif($disciplina_interest->type_theme=='area')
                                            <tr id="table_tr_new_area_interest{{$disciplina_interest->id_tema_area}}">
                                                <td> {{$disciplina_interest->name_tema_gran}} </td>
                                                <td>{{$disciplina_interest->name_tema_area}} </td>
                                                <td> -</td>
                                                <td><a class='ui label button color_3'
                                                       onclick='deleteDisciplineAreaInterest({{$disciplina_interest->id_tema_area}})' style="color: #EEEEEE"><i class="trash icon"></i>Eliminar</a>
                                                </td>
                                            </tr>
                                        @else
                                            <tr id="table_tr_new_area_interest{{$disciplina_interest->id_tema_gran}}">
                                                <td> {{$disciplina_interest->name_tema_gran}} </td>
                                                <td> -</td>
                                                <td> -</td>
                                                <td><a class='ui label button color_3'
                                                       onclick='deleteDisciplineAreaInterest({{$disciplina_interest->id_tema_gran}})' style="color: #EEEEEE"><i class="trash icon"></i>Eliminar</a>
                                                </td>
                                            </tr>
                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
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
                                        <div form="form" class="ui submit button color_1"
                                           id="buttonChangePassword">
                                            Guardar contraseña
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="ui error message" id="messageErrorChangePassword"
                                     style="display: none;">

                                    <div class="header">
                                        <p id="errorsChangePasswordp">Errores</p>
                                    </div>
                                    <ul class="list">


                                    </ul>
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
                                    <div form="form" class="ui submit  button color_1"
                                       id="changeAccountActive">
                                        Aceptar
                                    </div>
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

    @include('modals.modalAddOtherInstitution')

    <script type="text/javascript">

        $('#id_add_new_institute').on('click', function () {
            $('.ui.modal.add_new_institute')
                .modal('show')
            ;
        });


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
                        callback: function () {
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
                                success: function (info) {

                                    $('#hiddenewphoto').val(info);


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