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
                    <div class="ui  large horizontal label ">Institución con la que realizará la convocatoria:
                        <select name="country" class="ui search dropdown" id="selectMVinculation">
                        <option value="">Seleccione Institución</option>
                            @foreach($institucionesVinvulado as $inst_vin)
                                <option value="{{$inst_vin->id_institution}}"> {{$inst_vin->name_institution}}</option>
                            @endforeach
                        </select>
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
                        <select class="ui fluid search dropdown" name="large_area" id="select_gran_area_formacion">
                            <option value="">Gran Área</option>
                            @foreach($gran_areas as $gran_area)
                                <option value="{{$gran_area->id_tema}}"> {{$gran_area->name_theme}}</option>
                            @endforeach
                        </select>
                        <div class="ui horizontal divider">
                            <a type="submit" class="ui label button color_1" id="addGranAreaFormation">Agregar Gran
                                Área</a>
                        </div>
                        <div class="ui raised segment">
                            <label><b>Seleccionados</b></label>
                            <div class="ui divided list selected_list">


                                <div class="item">
                                    <div class="right floated content">
                                        <a class="ui label button color_3">Eliminar</a>
                                    </div>
                                    <div class="content">
                                        nombre área
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Área</label>
                        {!!Form::select('area',['ninguna seleccionada'], null, ['class'=>'ui search dropdown', 'placeholder'=>'Seleccione Área', 'id'=>'select_area_formacion'])!!}
                        <div class="ui horizontal divider">
                            <a type="submit" class="ui label button color_1" id="addAreaFormation">Agregar Área</a>
                        </div>
                        <div class="ui raised segment">
                            <label><b>Seleccionados</b></label>
                            <div class="ui divided list selected_list">
                                <div class="item">
                                    <div class="right floated content">
                                        <a class="ui label button color_3">Eliminar</a>
                                    </div>
                                    <div class="content">
                                        nombre área
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Disciplina</label>
                        {!!Form::select('discipline',['ninguna seleccionada'], null, ['class'=>'ui search dropdown', 'placeholder'=>'Seleccione Disciplina', 'id'=>'select_disciplina_formacion'])!!}
                        <div class="ui horizontal divider">
                            <a type="submit" class="ui label button color_1" id="addDisciplineAreaFormation">Agregar
                                Disciplina</a>
                        </div>
                        <div class="ui raised segment">
                            <label><b>Seleccionados</b></label>
                            <div class="ui divided list selected_list">
                                <div class="item">
                                    <div class="right floated content">
                                        <a class="ui label button color_3">Eliminar</a>
                                    </div>
                                    <div class="content">
                                        nombre área
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <div class="two fields">
                    <div class="required field">
                        <label>Desde</label>
                        <div class="ui calendar" id="from">
                            <div class="ui input left icon">
                                <i class="calendar icon"></i>
                                <input name="from" type="text" placeholder="Desde">
                            </div>
                        </div>
                    </div>
                    <div class="required field">
                        <label>Hasta</label>
                        <div class="ui calendar" id="until">
                            <div class="ui input left icon">
                                <i class="calendar icon"></i>
                                <input name="until" type="text" placeholder="Hasta">
                            </div>
                        </div>
                    </div>
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
                    from: {
                        identifier: 'from',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Porfavor seleccione un valor en Desde'
                            }
                        ]
                    },
                    until: {
                        identifier: 'until',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Porfavor seleccione un valor en Hasta'
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
</script>


@stop