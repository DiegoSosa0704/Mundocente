@extends('main.main')

@section('content')



<div class="pusher" style="background-color: #EEEEEE;">
    <div class="ui center aligned container">
        <h1 class="ui header">Publicar Revista Científica</h1>
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
        <div class="ui piled left aligned very padded segment">
            <form class="ui form" id="form">
                <h4 class="ui dividing header">Información general</h4>
                <div class="field">
                    <div class="ui large inverted horizontal label color_1">Institución:
                        <div class="detail">Nombre del Instituto</div>
                    </div>
                </div>
                <div class="field">
                    <div class="ui inverted large horizontal label color_2">País:
                        <div class="detail">Nisi viverra.</div>
                    </div>
                </div>
                <div class="field">
                    <div class="ui inverted large horizontal label color_3">Ciudad:
                        <div class="detail">Lorem sit .</div>
                    </div>
                </div>
                <div class="required field">
                    <label>Título</label>
                    <input name="titleMaxLength" type="text">
                </div>
                <label style="font-size:.92307692em;"><b>¿La revista se encuentra indexada?</b></label>
                <div class="inline field">
                    <label>
                        No
                    </label>
                    <div class="ui toggle checkbox" onclick="showAdvancedSearch()">
                        <input type="checkbox" name="indexed_paper" tabindex="0" class="hidden">
                    </div>
                    <label>
                        Si
                    </label>
                </div>
                <!--Datos de indexación-->
                <div id="indexing-data" class="ui segment" style="display: none;">
                    <h4 class="ui dividing header" style="padding-top: 10px">Datos de indexación</h4>
                    <div class="required field">
                        <label>Índice Uno</label>
                        <div class="two fields">
                            <div class="field">
                                <select name="name" class="ui fluid dropdown">
                                    <option value="">Nombre</option>
                                    <option value="name-1">Nombre-1</option>
                                    <option value="name-2">Nombre-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <select name="level" class="ui fluid dropdown">
                                    <option value="">Nivel</option>
                                    <option value="lvl-1">Nivel-1</option>
                                    <option value="lvl-2">Nivel-2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Índice Dos</label>
                        <div class="two fields">
                            <div class="field">
                                <select name="name_2" class="ui fluid dropdown">
                                    <option value="">Nombre</option>
                                    <option value="name-1">Nombre-1</option>
                                    <option value="name-1">Nombre-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <select name="level_2" class="ui fluid dropdown">
                                    <option value="">Nivel</option>
                                    <option value="lvl-1">Nivel-1</option>
                                    <option value="lvl-2">Nivel-2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Índice Tres</label>
                        <div class="two fields">
                            <div class="field">
                                <select name="name_3" class="ui fluid dropdown">
                                    <option value="">Nombre</option>
                                    <option value="name-1">Nombre-1</option>
                                    <option value="name-1">Nombre-1</option>
                                </select>
                            </div>
                            <div class="field">
                                <select name="level_3" class="ui fluid dropdown">
                                    <option value="">Nivel</option>
                                    <option value="lvl-1">Nivel-1</option>
                                    <option value="lvl-2">Nivel-2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Areas de conocimiento-->
                <h4 class="ui dividing header">Áreas de conocimiento</h4>
                <div class="three fields">
                    <div class="required field">
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
                        </select>
                    </div>
                </div>
                <!--Info final-->
                <h4 class="ui dividing header">Información de contacto</h4>
                <div class="field">
                    <label>Imagen o logo de la revista</label>
                    <img class="ui middle aligned medium rounded image" src="images/public-image.png">
                    <span>
                        <label for="file" class="ui blue button button_load">
                            Cargar
                            <input type="file" id="file" style="display:none">
                        </label>
                    </span>
                </div>
                <div class="ui info compact small message">
                    <p>Debe ingresar al menos uno de los siguientes campos.</p>
                </div>
                <div class="two fields">
                    <div class="required field">
                        <label>Enlace</label>
                        <input name="link" type="text" placeholder="URL">
                    </div>
                    <div class="required field">
                        <label>Datos de contacto </label>
                        <input name="contact_data" type="text" placeholder="Nombre, e-mail y/o teléfono">
                    </div>
                </div>
                <div class="ui right aligned stackable grid">
                    <div class="sixteen wide column">
                        <button type="submit" form="form" onclick="validateForm()" class="ui inverted submit button button_submit">
                            Publicar
                        </button>
                    </div>
                </div>
                <div class="ui error message"></div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validateForm() {
        var $form = $('.ui.form'),
            allFields = $form.form('get values')
            ;
        if (allFields.indexed_paper == false) {
            if (allFields.contact_data == false && allFields.link == false) {
                $('.ui.form')
                    .form({
                        on: 'blur',
                        fields: {
                            titleMaxLength: {
                                identifier: 'titleMaxLength',
                                rules: [
                                    {
                                        type: 'maxLength[150]',
                                        prompt: 'El título no puede ser mayor a 150 caracteres'
                                    },
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un valor en Titulo'
                                    }
                                ]
                            },
                            large_area: {
                                identifier: 'large_area',
                                rules: [
                                    {
                                        type   : 'minCount[1]',
                                        prompt : 'Porfavor seleccione al menos un valor en Gran Área'
                                    }
                                ]
                            },
                            link: {
                                identifier: 'link',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un valor en Enlace'
                                    }
                                ]
                            },
                            contact_data: {
                                identifier: 'contact_data',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un valor en Datos de contacto'
                                    }
                                ]
                            }
                        }
                    })
                ;
            } else {
                $('.ui.form')
                    .form({
                        on: 'blur',
                        fields: {
                            titleMaxLength: {
                                identifier: 'titleMaxLength',
                                rules: [
                                    {
                                        type: 'maxLength[150]',
                                        prompt: 'El título no puede ser mayor a 150 caracteres'
                                    }, {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un valor en Titulo'
                                    }
                                ]
                            },
                            large_area: {
                                identifier: 'large_area',
                                rules: [
                                    {
                                        type   : 'minCount[1]',
                                        prompt : 'Porfavor seleccione al menos un valor en Gran Área'
                                    }
                                ]
                            }
                        }
                    })
                ;
            }
        } else {
            if (allFields.contact_data == false && allFields.link == false) {
                $('.ui.form')
                    .form({
                        on: 'blur',
                        fields: {
                            titleMaxLength: {
                                identifier: 'titleMaxLength',
                                rules: [
                                    {
                                        type: 'maxLength[150]',
                                        prompt: 'El título no puede ser mayor a 150 caracteres'
                                    }, {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un valor en Titulo'
                                    }
                                ]
                            },
                            large_area: {
                                identifier: 'large_area',
                                rules: [
                                    {
                                        type   : 'minCount[1]',
                                        prompt : 'Porfavor seleccione al menos un valor en Gran Área'
                                    }
                                ]
                            },
                            link: {
                                identifier: 'link',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un valor en Enlace'
                                    }
                                ]
                            },
                            contact_data: {
                                identifier: 'contact_data',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un valor en Datos de contacto'
                                    }
                                ]
                            },
                            name: {
                                identifier: 'name',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor seleccione un valor en Nombre'
                                    }
                                ]
                            }
                        }
                    })
                ;
            } else {
                $('.ui.form')
                    .form({
                        on: 'blur',
                        fields: {
                            titleMaxLength: {
                                identifier: 'titleMaxLength',
                                rules: [
                                    {
                                        type: 'maxLength[150]',
                                        prompt: 'El título no puede ser mayor a 150 caracteres'
                                    }, {
                                        type: 'empty',
                                        prompt: 'Porfavor introduzca un valor en Titulo'
                                    }
                                ]
                            },
                            large_area: {
                                identifier: 'large_area',
                                rules: [
                                    {
                                        type   : 'minCount[1]',
                                        prompt : 'Porfavor seleccione al menos un valor en Gran Área'
                                    }
                                ]
                            },
                            name: {
                                identifier: 'name',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Porfavor seleccione un valor en Nombre'
                                    }
                                ]
                            }
                        }
                    })
                ;
            }
        }

    }

    function showAdvancedSearch() {
        $('#indexing-data').toggle("slow");
    }

    $('.ui.checkbox')
        .checkbox()
    ;
    $('.ui.sidebar')
        .sidebar('attach events', '.menu.fixed .launch.item')
    ;
</script>

@stop