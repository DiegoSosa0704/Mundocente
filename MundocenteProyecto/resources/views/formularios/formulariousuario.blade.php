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
                <form class="ui form" id="form">
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
                            <input name="name" type="text" placeholder="Nombres" value="{!!Auth::user()->name!!}">
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="required field">
                            <label>País</label>

                            {!!Form::select('country',$lugares, null, ['class'=>'ui search dropdown', 'id'=>'selectCountry', 'placeholder'=>'seleccione país'])!!}


                        </div>
                        <div class="required field">
                            <label>Ciudad</label>
                            {!!Form::select('city',['ninguna'], null, ['class'=>'ui search dropdown', 'id'=>'selectCity', 'placeholder'=>'Seleccione Ciudad'])!!}
                           
                        </div>
                    </div>
                    <h4 class="ui dividing header">Vinculación laboral y estudios</h4>
                    <div class="required field">
                        <label>Intitución en que labora</label>
                        <div class="ui info compact small message">
                            <p>Si su institución no se encuentra en la lista, podrá suministrarla en el campo
                                "Otra". </p>
                        </div>
                        <div class="two fields">
                            <div class="field">
                                <label>Institución</label>
                                <select class="ui fluid search dropdown email" multiple="" name="institution">
                                    <option value="">Nombre</option>
                                    <option value="test">test</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Otro</label>
                                <div class="ui action input">
                                    <input placeholder="Nombre" name="other" type="text">
                                    <div class="ui button" onclick="addEmail()">Nuevo</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="required field">
                        <label>Currículo</label>
                        <div class="ui info compact small message">
                            <p>Debe ingresar al menos uno de los dos campos correspondientes a currículo.</p>
                        </div>
                        <div class="two fields">
                            <div class="required field">
                                <input name="link_curriculum" placeholder="Enlace a currículo en la web" type="url">
                            </div>
                            <div class="required field">
                                <div class="ui action input">
                                    <input type="text" name="load_curriculum" id="_attachmentName"
                                           placeholder="Archivo currículo">
                                    <label for="attachmentName" class="ui icon button btn-file">
                                        Cargar
                                        <input type="file" id="attachmentName" name="attachmentName"
                                               style="display: none">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="required grouped fields">
                        <label>Máximo nivel de formación (titulado)</label>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="level_training">
                                <label>Universitario</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="level_training">
                                <label>Especializacíon</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="level_training">
                                <label>Maestría</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="level_training">
                                <label>Doctorado</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="level_training">
                                <label>Post-doctorado</label>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Áreas de formación</label>
                        <div class="ui three fields segment">
                            <div class="required field">
                                <label>Gran área</label>
                                <select name="large_area" class="ui multiple dropdown">
                                    <option value="">Gran área</option>
                                    <option value="name-1">Gran área-1</option>
                                    <option value="name-2">Gran área-2</option>
                                </select>
                                <div class="ui raised segment">
                                    <label><b>Seleccionados</b></label>
                                    <div class="ui divided list selected_list">
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Gran área
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Gran área
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Gran área
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Gran área
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Gran área
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Gran área
                                            </div>
                                        </div><div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Gran área
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Gran área
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Área</label>
                                <select name="area" class="ui multiple dropdown">
                                    <option value="">Área</option>
                                    <option value="lvl-1">Área-1</option>
                                    <option value="lvl-2">Área-2</option>
                                </select>
                                <div class="ui raised segment">
                                    <label><b>Seleccionados</b></label>
                                    <div class="ui divided list selected_list">
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Área
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Área
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Área
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Disciplina</label>
                                <select name="discipline" class="ui multiple dropdown">
                                    <option value="">Disciplina</option>
                                    <option value="discipline-1">Disciplina-1</option>
                                    <option value="discipline-2">Disciplina-2</option>
                                </select>
                                <div class="ui raised segment">
                                    <label><b>Seleccionados</b></label>
                                    <div class="ui divided list selected_list">
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Disciplina
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="ui dividing header">Cuenta</h4>
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
                    <div class="field">
                        <label>Áreas de interés</label>
                        <div class="ui three divided fields segment">
                            <div class="required field">
                                <label>Gran área</label>
                                <select name="large_area" class="ui multiple dropdown">
                                    <option value="">Gran área</option>
                                    <option value="name-1">Gran área-1</option>
                                    <option value="name-2">Gran área-2</option>
                                </select>
                                <div class="ui raised segment">
                                    <label><b>Seleccionados</b></label>
                                    <div class="ui divided list selected_list">
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Gran área
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Gran área
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Gran área
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Gran área
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Gran área
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Gran área
                                            </div>
                                        </div><div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Gran área
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Gran área
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="required field">
                                <label>Área</label>
                                <select name="area" class="ui multiple dropdown">
                                    <option value="">Área</option>
                                    <option value="lvl-1">Área-1</option>
                                    <option value="lvl-2">Área-2</option>
                                </select>
                                <div class="ui raised segment">
                                    <label><b>Seleccionados</b></label>
                                    <div class="ui divided list selected_list">
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Área
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Área
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Área
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="required field">
                                <label>Disciplina</label>
                                <select name="discipline" class="ui multiple dropdown">
                                    <option value="">Disciplina</option>
                                    <option value="discipline-1">Disciplina-1</option>
                                    <option value="discipline-2">Disciplina-2</option>
                                </select>
                                <div class="ui raised segment">
                                    <label><b>Seleccionados</b></label>
                                    <div class="ui divided list selected_list">
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Disciplina
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="right floated content">
                                                <div class="ui label button color_3">Eliminar</div>
                                            </div>
                                            <div class="content">
                                                Disciplina
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="required field">
                        <label>¿Desea recibir notificaciones de las diferentes publicaciones?</label>
                        <div class="inline field">
                            <label>
                                No
                            </label>
                            <div class="ui toggle checkbox" onclick="showNotificationType()">
                                <input type="checkbox" name="notification" tabindex="0" class="hidden">
                            </div>
                            <label>
                                Si
                            </label>
                        </div>
                    </div>
                    <div class="ui notification_type raised segment" id="notification_type" style="display: none;">
                        <div class="required grouped fields">
                            <label>Notificaciones de: </label>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="notification_type" value="1">
                                    <label>Convocatorias docentes</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="notification_type" value="2">
                                    <label>Revistas científicas</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="notification_type" value="3">
                                    <label>Eventos académicos</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="notification_type" value="4">
                                    <label>Invitaciones a proyectos</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="notification_type" value="5">
                                    <label>Invitaciones a ser evaluador de proyectos</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grouped fields">
                        <label>Activación de cuenta</label>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="notification_type" value="1">
                                <label>Activar mi cuenta</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="notification_type" value="2">
                                <label>Inactivar mi cuenta</label>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Términos y condiciones</label>
                        <a class="ui compact blue label">Leer términos y condiciones</a>
                    </div>
                    <div class="ui right aligned stackable grid">
                        <div class="sixteen wide column">
                            <div form="form" onclick="validateFormAccount()"
                                 class="ui submit inverted button button_submit">
                                Guardar
                            </div>
                        </div>
                    </div>
                    <div class="ui error message"></div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function addEmail() {
            var institution = $('.ui.form').form('get value', 'other');
            var institutions = $('.ui.form .field .dropdown.email').dropdown('get value');
            institutions.push(institution);

            $('.ui.form .field .dropdown.email select').append('<option value="' + institution + '" selected="">' + institution + '</option>');
            $('.ui.form .field .dropdown.email .menu').append('<div class="item" data-value="' + institution + '">' + institution + '</div>');

            $('.ui.form .field .dropdown.email').dropdown('set value', institutions);
            $('.ui.form .field .dropdown.email').dropdown('set selected', institution);
            $('.ui.form .field .dropdown.email').dropdown();

            $('.ui.form .field.dropdown.email').dropdown();
        }

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
                            large_area: {
                                identifier: 'large_area',
                                rules: [
                                    {
                                        type: 'minCount[1]',
                                        prompt: 'Porfavor seleccione al menos un valor en Gran Área'
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
                            country: {
                                identifier: 'country',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor seleccione un valor en País'
                                    }
                                ]
                            },
                            city: {
                                identifier: 'city',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor seleccione un valor en Ciudad'
                                    }
                                ]
                            },
                            institution: {
                                identifier: 'institution',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor seleccione un valor en Institución'
                                    }
                                ]
                            },
                            large_area: {
                                identifier: 'large_area',
                                rules: [
                                    {
                                        type: 'minCount[1]',
                                        prompt: 'Porfavor seleccione al menos un valor en Gran Área'
                                    }
                                ]
                            },
                            area: {
                                identifier: 'area',
                                rules: [
                                    {
                                        type: 'minCount[1]',
                                        prompt: 'Porfavor seleccione al menos un valor en Área'
                                    }
                                ]
                            },
                            discipline: {
                                identifier: 'discipline',
                                rules: [
                                    {
                                        type: 'minCount[1]',
                                        prompt: 'Porfavor seleccione al menos un valor en Disciplina'
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
                            country: {
                                identifier: 'country',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor seleccione un valor en País'
                                    }
                                ]
                            },
                            city: {
                                identifier: 'city',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor seleccione un valor en Ciudad'
                                    }
                                ]
                            },
                            institution: {
                                identifier: 'institution',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor seleccione un valor en Institución'
                                    }
                                ]
                            },
                            large_area: {
                                identifier: 'large_area',
                                rules: [
                                    {
                                        type: 'minCount[1]',
                                        prompt: 'Porfavor seleccione al menos un valor en Gran Área'
                                    }
                                ]
                            },
                            area: {
                                identifier: 'area',
                                rules: [
                                    {
                                        type: 'minCount[1]',
                                        prompt: 'Porfavor seleccione al menos un valor en Área'
                                    }
                                ]
                            },
                            discipline: {
                                identifier: 'discipline',
                                rules: [
                                    {
                                        type: 'minCount[1]',
                                        prompt: 'Porfavor seleccione al menos un valor en Disciplina'
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
            $('#notification_type').toggle("slow");
        }

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