@extends('main.main')

@section('content')



<!--Contenido-->
<div class="pusher" style="background-color: #EEEEEE;">
    <div class="ui container center aligned">
        <h1 class="ui center aligned header">Publicar Solicitud</h1>
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
        <div class="ui piled very padded left aligned segment">
            <form class="ui form" id="form">
                <h4 class="ui dividing header">Información general</h4>
                <div class="field">
                    <div class="ui inverted large horizontal label color_1">Institución:
                        <div class="detail">Nombre del Instituto</div>
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <div class="required grouped fields">
                            <label>Tipo de invitación</label>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="request">
                                    <label>Formar parte de un proyecto</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="request">
                                    <label>Ser evaluador de un proyecto</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="required grouped fields">
                            <label>Sector educativo</label>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="sector">
                                    <label>Universitario</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="sector">
                                    <label>Preescolar, básica y media</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                <h4 class="ui dividing header">Detalles</h4>
                <div class="required field">
                    <label>Título</label>
                    <div class="ui info compact small message">
                        <ul class="list">
                            <li><b>Ejemplor 1: </b> Investigador Junior, Matemático, para participar en proyecto de Colciencias.</li>
                            <li><b>Ejemplor 2: </b> Par evaluador de artículo resultado de investigación (Ing. Electrónica).</li>
                        </ul>
                    </div>
                    <input name="title" type="text">
                </div>
                <div class="field">
                    <label>Descripción</label>
                    <textarea name="description" rows="3"></textarea>
                </div>
                <div class="required field">
                    <label>Datos de contacto </label>
                    <input name="contact_data" type="text" placeholder="Nombre, e-mail y/o teléfono">
                </div>
                <div class="ui right aligned stackable grid">
                    <div class="sixteen wide column">
                        <button type="submit" form="form" onclick="validateFormAnnouncement()"
                                class="ui submit inverted button button_submit">
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

    function validateFormAnnouncement() {
        var $form = $('.ui.form'),
            allFields = $form.form('get values')
            ;
        $('.ui.form')
            .form({
                on: 'blur',
                fields: {
                    sector: {
                        identifier  : 'sector',
                        rules: [
                            {
                                type   : 'checked',
                                prompt : 'Porfavor seleccione un valor en Sector'
                            }
                        ]
                    },
                    request: {
                        identifier  : 'request',
                        rules: [
                            {
                                type   : 'checked',
                                prompt : 'Porfavor seleccione un tipo de Solicitud'
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
                    title: {
                        identifier: 'title',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Porfavor introduzca un valor en Título'
                            },
                            {
                                type: 'maxLength[150]',
                                prompt: 'El título no puede ser mayor a 150 caracteres'
                            }
                        ]
                    },
                    description: {
                        identifier: 'description',
                        rules: [
                            {
                                type: 'maxLength[500]',
                                prompt: 'La descripción no puede ser mayor a 500 caracteres'
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
    }

    var today = new Date();
    $('#from').calendar({
        type: 'date',
        minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate())
    });
    $('#until').calendar({
        type: 'date',
        minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate())
    });
    $('#time_from').calendar({
        type: 'time'
    });
    $('#time_until').calendar({
        type: 'time'
    });
    $('.ui.radio.checkbox')
        .checkbox()
    ;
    $('.ui.sidebar')
        .sidebar('attach events', '.menu.fixed .launch.item')
    ;
    $('.dropdown')
        .dropdown({
            transition: 'scale'
        })
    ;
</script>


@stop