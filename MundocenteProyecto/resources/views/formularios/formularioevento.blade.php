@extends('main.main')

@section('content')



<div class="pusher" style="background-color: #EEEEEE;">
    <div class="ui container center aligned">
        <h1 class="ui center aligned header">Publicar Evento</h1>
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
                  <div class="two fields">
                    <div class="required field">
                        <label>País</label>
                        <select class="ui search dropdown" name="country" placeholder="seleccione país de la convocatoria" id="selectCountry">
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
                <div class="required field">
                    
                    <div class="two fields">
                            <div class="required field">
                                <label>Desde</label>
                                <div class="ui calendar" id="rangestart">
                                    <div class="ui input icon">
                                        <i class="calendar icon"></i>
                                        {!!Form::text('dateStart', '{{date("Y/m/d")}}', ['type' => 'text', 'placeholder' => 'Ingrese fecha de inicio', 'id'=>'dateStartid'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class=" field">
                                <label>Hora de inicio</label>
                                <div class="ui calendar" id="timeStart">
                                    <div class="ui input left icon">
                                        <i class="time icon"></i>
                                        <input type="text" placeholder="Hora de inicio">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="required field">
                    
                    <div class="two fields">
                    <div class="required field">
                                <label>Hasta</label>
                                <div class="ui calendar" id="rangeend">
                                    <div class="ui input icon">
                                        <i class="calendar icon"></i>
                                        {!!Form::text('dateFinish', null, ['type' => 'text', 'placeholder' => 'Ingrese fecha de fin', 'id'=>'dateFinishid'])!!}
                                    </div>
                                </div>
                            </div>
                       <div class=" field">
                                <label>Hora de finalización</label>
                                <div class="ui calendar" id="timeFinish">
                                    <div class="ui input left icon">
                                        <i class="time icon"></i>
                                        <input type="text" placeholder="Ingrese hora de fin">
                                    </div>
                                </div>
                            </div>
                            

                        
                    </div>
                </div>



















                <h4 class="ui dividing header">Áreas de conocimiento</h4>
                <div class="three fields" id="contentSelectArea">
                    <div class="required field">
                        <label>Gran área</label>

                        <select class="ui fluid search dropdown granarea" name="large_area" id="select_gran_area_formacion">
                            <option value="">Gran Área</option>
                            @foreach($gran_areas as $gran_area)
                                <option value="{{$gran_area->id_tema}}"> {{$gran_area->name_theme}}</option>
                            @endforeach
                        </select>
                        
                       
                    </div>
                    <div class="field">
                        <label>Área</label>
                        {!!Form::select('area',['ninguna seleccionada'], null, ['class'=>'ui search dropdown', 'placeholder'=>'Seleccione Área', 'id'=>'select_area_formacion'])!!}
                      
                    </div>
                    <div class="field">
                        <label>Disciplina</label>
                        {!!Form::select('discipline',['ninguna seleccionada'], null, ['class'=>'ui fluid search dropdown multiple', 'placeholder'=>'Seleccione Disciplina', 'id'=>'select_disciplina_formacion'])!!}
                     
                    </div>
                </div>
                <div class="ui checkbox" id="check_area_all">
                              <input type="checkbox" id="valueCheckallArea"  value="1">
                              <label>Todas las áreas</label>
                </div>





















                <h4 class="ui dividing header">Detalles</h4>
                <div class="required field">
                    <label>Nombre</label>
                    <input name="name" type="text">
                </div>
                <div class="field">
                    <label>Imagen o logo del evento</label>
                    <img class="ui middle aligned medium rounded image" src="images/public-image.png">
                    <span>
                        <label for="file" class="ui blue button button_load">
                            Cargar
                            <input type="file" id="file" style="display:none">
                        </label>
                    </span>
                </div>
                <div class="field">
                    <label>Descripción</label>
                    <textarea name="description" rows="3"></textarea>
                </div>
                <div class="ui info compact small message">
                    <p>Debe ingresar al menos uno de los campos correspondientes a contacto.</p>
                </div>
                <div class="two fields">
                    <div class="required field">
                        <label>Enlace</label>
                        <input name="link" type="url" placeholder="URL">
                    </div>
                    <div class="required field">
                        <label>Datos de contacto </label>
                        <input name="contact_data" type="text" placeholder="Nombre, e-mail y/o teléfono">
                    </div>
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
        if(allFields.link == false && allFields.contact_data == false){
            $('.ui.form')
                .form({
                    on: 'blur',
                    fields: {
                        sector: {
                            identifier: 'sector',
                            rules: [
                                {
                                    type: 'checked',
                                    prompt: 'Porfavor seleccione un valor en Sector educativo'
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
                        from: {
                            identifier: 'from',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Porfavor seleccione una fecha en Desde'
                                }
                            ]
                        },
                        until: {
                            identifier: 'until',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Porfavor seleccione una fecha en Hasta'
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
                                    prompt: 'Porfavor introduzca un valor en Nombre'
                                },
                                {
                                    type: 'maxLength[150]',
                                    prompt: 'El nombre no puede ser mayor a 150 caracteres'
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
        }else {
            $('.ui.form')
                .form({
                    on: 'blur',
                    fields: {
                        sector: {
                            identifier: 'sector',
                            rules: [
                                {
                                    type: 'checked',
                                    prompt: 'Porfavor seleccione un valor en Sector educativo'
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
                        from: {
                            identifier: 'from',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Porfavor seleccione una fecha en Desde'
                                }
                            ]
                        },
                        until: {
                            identifier: 'until',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Porfavor seleccione una fecha en Hasta'
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
                                    prompt: 'Porfavor introduzca un valor en Nombre'
                                },
                                {
                                    type: 'maxLength[150]',
                                    prompt: 'El nombre no puede ser mayor a 150 caracteres'
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
                        }
                    }
                })
            ;
        }
    }




      $('#optionMainAnnouncement').removeClass('active');
        $('#optionMainPaper').removeClass('active');
        $('#optionMainEvent').addClass('active');
        $('#optionMainRequest').removeClass('active');



    $('#check_area_all').click(function() {
        var checkAl = $('#valueCheckallArea').val();
         if(checkAl=='2'){
            $('#contentSelectArea').removeClass('disabled');
            $('#valueCheckallArea').val('1');
         }else{
            $('#contentSelectArea').addClass('disabled');
            $('#valueCheckallArea').val('2');
         }
    });
      

     $('#timeStart').calendar({
        type: 'time'
    });

      $('#timeFinish').calendar({
        type: 'time'
    });

        
    var today = new Date();
      $('#rangestart').calendar({
        type: 'date',
        endCalendar: $('#rangeend'),
        minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate())
    });
    $('#rangeend').calendar({
        type: 'date',
        startCalendar: $('#rangestart'),
        minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate())
    });
    $('#time_from').calendar({
        type: 'time'
    });
    $('#time_until').calendar({
        type: 'time'
    });
    $('.ui.checkbox')
        .checkbox()
    ;
    $('.ui.sidebar')
        .sidebar('attach events', '.menu.fixed .launch.item')
    ;
</script>

@stop