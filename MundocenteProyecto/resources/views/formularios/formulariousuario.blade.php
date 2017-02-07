@extends('main.main')

@section('content')
    <!--Contenido-->
    <div class="pusher" style="background-color: #EEEEEE;">
        <div class="ui container center aligned">
            <h1 class="ui center aligned header">Mi Perfil</h1>
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
            <!--Contenido Segment -->
            



<div class="ui piled very padded left aligned segment">
                
                {!!Form::open(['url'=>'editaperfil', 'method'=> 'POST', 'class'=>'ui form', 'id'=>'form'])!!}
                

                    <h4 class="ui dividing header">Datos personales</h4>
                    <div class="equal width fields">
                        <div class="field">
                            <label>Foto de perfil</label>

                            <span>
                                <label for="file" class="ui inverted button button_load">
                                    <input type="file" id="file" style="display:none">
                                    <img class="ui middle aligned small circular image"
                                         src="{!!Auth::user()->photo_url!!}">
                                    Cargar Foto
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="equal width fields">
                        <div class="required field">
                            <label>Nombre Completo</label>
                            {!!Form::text('name', Auth::user()->name, ['type' => 'text', 'placeholder' => 'Ingrese nombres y apellidos'])!!}
                        </div>
                    </div>
                    
                     
 
                    <br>
                 
                    <div class="required field">
                        <label>Currículo</label>
                        <div class="ui info compact small message">
                            <p>Debe ingresar al menos uno de los dos campos correspondientes a currículo.</p>
                        </div>
                        <div class="two fields">
                            <div class="required field">
                                
                                {!!Form::text('link_curriculum', Auth::user()->curriculo_url, ['type' => 'url', 'placeholder' => 'Enlace a currículo en la web'])!!}
                            </div>
                            <div class="required field">
                                <div class="ui action input">
                                     {!!Form::text('load_curriculum', null, ['type' => 'text', 'id'=>'_attachmentName', 'placeholder' => 'Archivo currículo'])!!}

                                    <label for="attachmentName" class="ui icon button btn-file">
                                        Cargar
                                        <input type="file" id="attachmentName" name="attachmentName"
                                               style="display: none">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="required grouped fields" >
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
                                <input type="checkbox" name="notification" tabindex="0" checked="checked" class="hidden" value="true">
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
                                <input type="checkbox" name="notification" tabindex="0" class="hidden" value="false">
                            </div>
                            <label>
                                Si
                            </label>
                        </div>
                        @endif
                    </div>
                    @if(Auth::user()->recibe_not=='si')
                    <?php $id_notification_exist = 0; ?>
                    <div class="ui notification_type raised segment" id="notification_type" >
                        <div class="required grouped fields">
                            <label>Notificaciones de: </label>

                            @foreach($recibonotifide as $recibe_noti)

                            @foreach($milista_notificacion_recibe as $misnoti)
                                @if($recibe_noti->id_type_publications==$misnoti->id_type_notifications_fk)
                                <p style="display: none;">{{$id_notification_exist=$misnoti->id_type_notifications_fk}}</p>
                                <div class="field">
                                    <div class="ui checkbox checked">
                                        <input type="checkbox" checked="" name="notification_type[]" value="{{$recibe_noti->id_type_publications}}">
                                        <label>{{$recibe_noti->name_theme_notifications}}</label>
                                    </div>
                                </div>
                                @else
                                
                                  

                                @endif
                            @endforeach

                              @if($id_notification_exist!=$recibe_noti->id_type_publications)
                                     <div class="field">
                                                <div class="ui checkbox">
                                                    <input type="checkbox" name="notification_type[]" value="{{$recibe_noti->id_type_publications}}">
                                                    <label>{{$recibe_noti->name_theme_notifications}}</label>
                                                </div>
                                            </div>
                                    @endif
                           

                            @endforeach

                         
                        </div>
                    </div>
                    @else
                    <div class="ui notification_type raised segment" id="notification_type" style="display: none;">
                        <div class="required grouped fields">
                            <label>Notificaciones de: </label>
                            
                           @foreach($recibonotifide as $recibe_noti)

                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="notification_type[]" value="{{$recibe_noti->id_type_publications}}">
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
















<div class="ui piled very padded left aligned segment">
<div class="ui form">

   <input type="hidden" name="_token", value="{{ csrf_token() }}" id="token">
                    <h4 class="ui dividing header">Vinculación laboral</h4>
                    <div class="required field">
                        
                        <div class="two fields">
                        <div class="required field">
                            <label>País en donde se encuentra la universidad</label>

                            <select class="ui search dropdown" name="country" placeholder="seleccione país de la institución" id="selectCountry">
                                <option value="">Seleccione país</option>
                                @foreach($lugares as $lugar)
                                
                                    <option value="{{$lugar->id_lugar}}"> {{$lugar->name_lugar}}</option>
                                @endforeach
                            </select>


                        </div>
                        <div class="required field" id="cityChange">
                            <label>Ciudad</label>
                           

                             <select class="ui search dropdown" name="city" placeholder="Seleccione Ciudad" id="selectCity">
                                
                                <option value="">Seleccione ciudad</option>
                                    
                                
                            </select>
                           
                        </div>
                    </div>
                        <div class="ui info compact small message">
                            <p>Si su institución no se encuentra en la lista, podrá suministrarla en el campo
                                "Otra". </p>
                        </div>
                        
                        <div class="two fields" id="institutionChange">
                            <div class="required field">
                                <label>Institución</label>


                            <select class="ui search dropdown" name="institution" placeholder="Seleccione Institución" id="selectInstitution">
                                
                                <option value="" >Seleccione institución</option>
                                    
                            </select>

                            </div>
                            <div class="field">
                                <label>Otra</label>
                                <div class="ui action input">
                                    <input placeholder="Nombre" id="otherInstitute" type="text" value="">
                                    <div class="ui button" id="addInstituteNew">Nuevo</div>
                                </div>
                            </div>

                        </div>
                         <div class="right floated content">
                                                <a class="ui label button green" id="agregaInstituto">Agregar Institución</a>
                        </div>

                             <div class="ui raised segment">
                                    <label><b>Estoy viculado en:</b></label>
                                    <div class="ui divided list selected_list" id="listadeinstitutosvinculados">
                                        
                                        
                                        @foreach($institucionesVinvulado as $institu)
                                        <div class="item" id="institutionList{{$institu->id_institution}}">
                                                <div class="right floated content">
                                                     <a class="ui label button color_3" onclick="delete_institution_vinul({{$institu->id_institution}})">Eliminar</a>
                                                </div>
                                            <div class="content">
                                                {{$institu->name_institution}} - ({{$institu->state_institution}})
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


                        <div class="ui red message" style="display: none;" id="messageSaveVinculationerror">
                                <i class="close icon" id="cierramensajedeinstitutoserror"></i>
                                <div class="header">
                                    No se ha seleccionado la Institución correctamente
                                </div>
                                <ul class="list">
                                
                                
                                </ul>
                        </div>

</div>
</div>
























<div class="ui piled very padded left aligned segment">
<div class="ui form">

 <h4 class="ui dividing header">Áreas de formación</h4>
                    <div class="field">
                        
                        <div class="ui three fields segment">
                            <div class="required field">
                                <label>Gran área</label>

                                  <select class="ui fluid search dropdown" name="large_area" id="select_gran_area_formacion">
                                    @foreach($gran_areas as $gran_area)
                                    <option value="">Gran Área</option>
                                        <option value="{{$gran_area->id_tema}}"> {{$gran_area->name_theme}}</option>
                                    @endforeach
                                </select>
                               

                                <div class="ui raised segment">
                                    <label><b>Seleccionados</b></label>
                                    <div class="ui divided list selected_list">
                                        
                                        
                                        @foreach($gran_areas_de_formacion as $gran_area_f)
                                        <div class="item">
                                                <div class="right floated content">
                                                    <div class="ui label button color_3">Eliminar</div>
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
                                 
                                <div class="ui raised segment">
                                    <label><b>Seleccionados</b></label>
                                    <div class="ui divided list selected_list">
                                        
                                        
                                        @foreach($areas_de_formacion as $area_f)
                                        <div class="item">
                                                <div class="right floated content">
                                                    <div class="ui label button color_3">Eliminar</div>
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
                                 <div class="right floated content">
                                                <div class="ui label button green">Agregar</div>
                                </div>
                                <div class="ui raised segment">
                                    <label><b>Seleccionados</b></label>
                                    <div class="ui divided list selected_list">
                                        

                                         @foreach($disciplina_de_formacion as $disciplina_formacion)
                                        <div class="item">
                                                <div class="right floated content">
                                                    <div class="ui label button color_3">Eliminar</div>
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
                   <h4 class="ui dividing header">Áreas de interés</h4>
                    <div class="field">
                        
                        <div class="ui three fields segment">
                            <div class="required field">
                                <label>Gran área</label>

                                  <select class="ui fluid search dropdown" name="large_area" id="select_gran_area_interes">
                                    @foreach($gran_areas as $gran_area)
                                    <option value="">Gran Área</option>
                                        <option value="{{$gran_area->id_tema}}"> {{$gran_area->name_theme}}</option>
                                    @endforeach
                                </select>
                                

                                <div class="ui raised segment">
                                    <label><b>Seleccionados</b></label>
                                    <div class="ui divided list selected_list">
                                        
                                        
                                        
                                        
                                         @foreach($gran_areas_de_interes as $gran_area_i)
                                        <div class="item">
                                                <div class="right floated content">
                                                    <div class="ui label button color_3">Eliminar</div>
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
                                
                                <div class="ui raised segment">
                                    <label><b>Seleccionados</b></label>
                                    <div class="ui divided list selected_list">
                                        
                                        
                                        @foreach($areas_de_interes as $gran_area_i)
                                        <div class="item">
                                                <div class="right floated content">
                                                    <div class="ui label button color_3">Eliminar</div>
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
                                <div class="right floated content">
                                                <div class="ui label button green">Agregar</div>
                                </div>
                                <div class="ui raised segment">
                                    <label><b>Seleccionados</b></label>
                                    <div class="ui divided list selected_list">
                                        

                                          @foreach($disciplina_de_interes as $gran_area_i)
                                        <div class="item">
                                                <div class="right floated content">
                                                    <div class="ui label button color_3">Eliminar</div>
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












<div class="ui piled very padded left aligned segment">
    <div class="ui form">

                   <div class="equal width fields">

                        <div class="required field">
                            <label>Correo electrónico</label>
                            <input type="text" name="email" value="{!!Auth::user()->email!!}" disabled="true">
                        </div>
                        <div class="required field">
                            <label>Contraseña</label>
                            <input type="password" name="password">
                        </div>
                        <div class="required field">
                            <label>Repetir contraseña</label>
                            <input type="password" name="repeat_password">
                        </div>
                    </div>



                      <div class="grouped fields">
                        <label>Cuenta</label>
                        <div class="field">
                            <div class="ui radio checkbox">
                            @if(Auth::user()->state_user=='activo')
                            <input type="radio" name="activacion_cuenta" checked="checked" value="1">
                            @else
                            <input type="radio" name="activacion_cuenta" value="1">
                            @endif
                                
                                <label>Activa</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui radio checkbox">
                            @if(Auth::user()->state_user=='inactivo')
                            <input type="radio" name="activacion_cuenta" checked="checked" value="2">
                            @else
                            <input type="radio" name="activacion_cuenta" value="2">
                            @endif
                                <label>Inactiva</label>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label>Términos y condiciones</label>
                        <a class="ui compact blue label">Leer términos y condiciones</a>
                    </div>

    </div>
</div>







            
        </div>
    </div>

    <script type="text/javascript">
       

        function validateFormAccount() {
            var $form = $('.ui.form'),
                allFields = $form.form('get values'),
                notifications = $form.form('get value', 'notification_type')
                ;

            if (allFields.link_curriculum == false && allFields.load_curriculum == false) {
                $('.ui.form')
                    .form({
                        on: 'blur',
                        fields: {
                            name: {
                                identifier: 'name',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un valor en Nombres'
                                    }
                                ]
                            },
                            link_curriculum: {
                                identifier: 'link_curriculum',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un Enlace en Currículo'
                                    }
                                ]
                            },
                            load_curriculum: {
                                identifier: 'load_curriculum',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un Archivo en Currículo'
                                    }
                                ]
                            },
                            level_training: {
                                identifier: 'level_training',
                                rules: [
                                    {
                                        type: 'checked',
                                        prompt: 'Porfavor seleccione un valor en Nivel de formación'
                                    }
                                ]
                            },
                            email: {
                                identifier: 'email',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un valor en Correo electrónico'
                                    },
                                    {
                                        type: 'email',
                                        prompt: 'Porfavor introduzca un valor valido en Correo electrónico'
                                    }
                                ]
                            },
                        }
                    })
                ;
            } else {
                $('.ui.form')
                    .form({
                        on: 'blur',
                        fields: {
                            name: {
                                identifier: 'name',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un valor en Nombres'
                                    }
                                ]
                            },
                            last_name: {
                                identifier: 'last_name',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un valor en Apellidos'
                                    }
                                ]
                            },
                            title_college: {
                                identifier: 'title_college',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un valor en Estudios'
                                    }
                                ]
                            },
                            level_training: {
                                identifier: 'level_training',
                                rules: [
                                    {
                                        type: 'checked',
                                        prompt: 'Porfavor seleccione un valor en Nivel de formación'
                                    }
                                ]
                            },
                            email: {
                                identifier: 'email',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un valor en Correo electrónico'
                                    },
                                    {
                                        type: 'email',
                                        prompt: 'Porfavor introduzca un valor valido en Correo electrónico'
                                    }
                                ]
                            },
                            password: {
                                identifier: 'password',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un valor en Contraseña'
                                    }
                                ]
                            },
                            repeat_password: {
                                identifier: 'repeat_password',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un valor en Repetir contraseña'
                                    }
                                ]
                            },
                        }
                    })
                ;
            }

            /*console.log(notifications);
             var cont = 0;
             for (a in notifications){
             if(notifications[a] == false){
             cont++;
             }
             }
             if(cont == 5){
             console.log("Seleccione uno");
             }else{
             console.log("Esta bien"  + cont);
             }*/

        }

        function showNotificationType() {

            if($('#notification_type').is(":visible")){
                $('#notification_type').toggle("fast");
                $('#recibe_not').val(false);
            }else{
                $('#notification_type').toggle("show");
                $('#recibe_not').val(true)
            }
            
        }

        $('.message .close')
          .on('click', function() {
             if($('#messageSaveVinculation').is(":visible")){
                $('#messageSaveVinculation').toggle("fast");
            }
            
          })
        ;

          $('.message .close')
          .on('click', function() {
            if($('#messageSaveVinculationerror').is(":visible")){
                $('#messageSaveVinculationerror').toggle("fast");
            }
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

        /*INPUT FILE */
        var fileExtentionRange = '.zip .rar .tar .pdf .doc .docx .xls .xlsx .ppt .pptx';
        var MAX_SIZE = 30; // MB

        $(document).on('change', '.btn-file :file', function () {
            var input = $(this);

            if (navigator.appVersion.indexOf("MSIE") != -1) { // IE
                var label = input.val();

                input.trigger('fileselect', [1, label, 0]);
            } else {
                var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                var numFiles = input.get(0).files ? input.get(0).files.length : 1;
                var size = input.get(0).files[0].size;

                input.trigger('fileselect', [numFiles, label, size]);
            }
        });

        $('.btn-file :file').on('fileselect', function (event, numFiles, label, size) {
            $('#attachmentName').attr('name', 'attachmentName'); // allow upload.

            var postfix = label.substr(label.lastIndexOf('.'));
            if (fileExtentionRange.indexOf(postfix.toLowerCase()) > -1) {
                if (size > 1024 * 1024 * MAX_SIZE) {
                    alert('max size：<strong>' + MAX_SIZE + '</strong> MB.');

                    $('#attachmentName').removeAttr('name'); // cancel upload file.
                } else {
                    $('#_attachmentName').val(label);
                }
            } else {
                alert('El archivo debe ser tipo: ' + fileExtentionRange);

                $('#attachmentName').removeAttr('name'); // cancel upload file.
            }
        });
    </script>
@stop