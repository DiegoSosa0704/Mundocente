@extends('main.main')

@section('content')


    <style>
        .overlay {
            background-color: #FFF;
            padding: 0em;
            box-shadow: 0px 0px 0px rgba(0, 0, 0, 0);
            transition: all 0.5s ease;
            width: 300px;
        }
        /* change style */
        .fixed.overlay {
            position: fixed;
            padding: 0.5em;
            box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.1);
            background-color: #E0E0E0;
        }

    </style>

    <!--Contenido-->
    <div class="pusher">
        <div class="segment-title">
            <div class="ui center aligned container">
                <h1 class="ui header" id="title_modal_announcement" style="color: #A54686;">
                    Publicar Convocatoria </h1>
                <br>
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
        </div>
        <div class="ui container center aligned">
            <div class="ui raised padded left aligned segment">
                <div class="ui form" id="form">
                    <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
                    <div class="overlay">
                        <h4 class="ui dividing header" style="">Información general</h4>
                    </div>
                   {{-- <div class="overlay">
                        <div class="ui secondary menu">
                            <a class="item">
                                <i class="sidebar icon"></i> Menu
                            </a>
                            <a class="item">Option 1</a>
                            <a class="item">Option 2</a>
                            <a class="item">Option 3</a>
                        </div>
                    </div>--}}

                    <div class="field">
                        <div class="ui  large horizontal label">Institución con la que realizará la
                            convocatoria:
                            <select name="institution" class="ui search dropdown" id="selectMVinculation">
                                <option value="">Seleccione Institución</option>
                                @foreach($institucionesVinvulado as $inst_vin)
                                    @if($inst_vin->state_institution=='nuevo')
                                        <option value="{{$inst_vin->id_institution}}"> {{$inst_vin->name_institution}} -
                                            (Institución no verificada)
                                        </option>
                                    @else
                                        <option value="{{$inst_vin->id_institution}}"> {{$inst_vin->name_institution}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <a href="#" id="id_add_new_institute" style="text-decoration: underline">Aregar Instituto...</a>
                    </div>









                    <div id="details_edit_institution_selected" style="display: none;">
                        <div class="field">
                        <div class="grouped fields">
                            <label>Sector educativo</label>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="radio" name="sector" id="sectorUniversityCheck"
                                           value="universitario">
                                    <label>Universitario</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="radio" name="sector" id="sectorBasicCheck" value="preescolar">
                                    <label>Preescolar, básica y media</label>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="two fields" id="changeInstitution_location">
                        <div class="required field">
                            <label >País</label>
                            <select class="ui search dropdown" name="country"
                                    placeholder="seleccione país de la convocatoria" id="selectCountry">
                                <option value="">Seleccione país</option>
                                @foreach($lugares as $lugar)

                                    <option value="{{$lugar->id_lugar}}"> {{$lugar->name_lugar}}</option>
                                @endforeach
                            </select>


                        </div>
                        <div class="required field" id="cityChange">
                            <label>Ciudad</label>
                            <select class="ui search dropdown" name="city" placeholder="Seleccione Ciudad"
                                    id="selectCity">
                                <option value="" id="enwcityselectedselect">Seleccione ciudad</option>
                            </select>
                        </div>
                    </div>



                    </div>
                        









                    <div id="details_institution_selected" style="display: none;">
                         <div class="field">
                            <label>La convocatoria se realiza en:</label>
                            <div class="ui inverted large horizontal label color_2">
                                    <div class="detail" id="name_country_title"></div>
                                </div>
                                 <div class="ui inverted large horizontal label color_3">
                                    <div class="detail" id="name_city_title"></div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui inverted large horizontal label color_2">
                                    <div class="detail" id="name_institute_title_select"></div>
                                </div>
                                <div class="ui inverted large horizontal label color_2">
                                    <div class="detail" id="name_sector_title_select"></div>
                                </div>
                            </div>
                            <a id="edit_lugar_and_city_instituion_selected" style="cursor: pointer;">Editar</a>
                    </div>
                    
                    


                   


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
                        <div class="required field">
                            <label>Hasta</label>
                            <div class="ui calendar" id="rangeend">
                                <div class="ui input icon">
                                    <i class="calendar icon"></i>
                                    {!!Form::text('dateFinish', null, ['type' => 'text', 'placeholder' => 'Ingrese fecha de fin', 'id'=>'dateFinishid'])!!}
                                </div>
                            </div>
                        </div>
                    </div>










@inject('call_methods_theme','Mundocente\Http\Controllers\HomeController')



                    <div class="overlay">
                        <h4 class="ui dividing header" style="color: #793362;">Áreas de conocimiento</h4>
                    </div>
                    <div class="field" id="contentSelectArea">
                      
                        <div class="required field">
                            <label>Área</label>

                             <label><b>Datos del área seleccionada</b></label>
                                    <table class="ui celled table" id="table_show_details_areas">
                                          <thead>
                                            <tr><th>Gran Área</th>
                                            <th>Área</th>
                                            <th>Disciplina</th>
                                            
                                          </tr></thead>
                                          <tbody id="show_details_area_select">
                                             
                                                    
                                          </tbody>
                                        </table>
                                 

<select class="ui fluid search dropdown multiple" multiple="true" id="select_disciplina_formacion">

@foreach($gran_areas as $gran_area)

<option value="{{$gran_area->id_tema}}" >{{$gran_area->name_theme}}</option>
    @foreach($call_methods_theme->call_areas($gran_area->id_tema) as $area)
    <option value="{{$area->id_tema}}" > {{$gran_area->name_theme}} - {{$area->name_theme}}</option>
         @foreach($call_methods_theme->call_disciplines($area->id_tema) as $disci)
        <option value="{{$disci->id_tema}}" >{{$gran_area->name_theme}} - {{$area->name_theme}} - {{$disci->name_theme}}</option>
        @endforeach
    @endforeach
    
@endforeach
</select>
                            
                        </div>

                    </div>
                    <div class="field">
                        <div class="ui checkbox" id="check_area_all">
                            <input type="checkbox" id="valueCheckallArea" value="1">
                            <label>Todas las áreas</label>
                        </div>
                    </div>















                    <div class="overlay">
                        <h4 class="ui dividing header" style="color: #793362">Detalles</h4>
                    </div>
                    <div class="required field">
                        <label>Título</label>
                        {!!Form::text('title', null, ['type' => 'text', 'placeholder' => 'Ejemplo: Docente de tiempo completo área matemáticas.', 'id'=>'titleid'])!!}
                    </div>
                    <div class="field">
                        <label>Descripción</label>

                        {!!Form::textarea('description', null, ['type' => 'text', 'rows' => '5', 'id'=>'descriptionid'])!!}
                    </div>
                    <div class="ui info compact small message">
                        <p>Debe ingresar al menos uno de los siguientes campos.</p>
                    </div>
                    <div class="two fields">
                        <div class="required field">
                            <label>Enlace</label>

                            {!!Form::text('link', null, ['type' => 'text', 'placeholder' => 'URL', 'id'=>'url_publication'])!!}
                        </div>
                        <div class="required field">
                            <label>Datos de contacto </label>

                            {!!Form::text('contact_data', null, ['type' => 'text', 'placeholder' => 'Nombre, e-mail y/o teléfono', 'id'=>'cantactsid'])!!}
                        </div>
                    </div>
                    <div class="ui right aligned stackable grid">
                        <div class="sixteen wide column">
                            <a form="form" id="addAnnouncement"
                               class="ui submit inverted button button_submit">
                                Publicar
                            </a>
                        </div>
                    </div>
                    <br>

                    <div class="ui message error" style="display: none;" id="messageErrorpublication">

                        <ul class="list">
                            <li id="idpmessageerrorpublications"></li>

                        </ul>
                    </div>


                </div>
            </div>
        </div>
        <br>
        <br>

        <br>
        <br>
    </div>


    @include('modals.modal_institute_vinculate')

    <script type="text/javascript">
          $('#id_add_new_institute').on('click', function () {
                $('.ui.addInstitute')
                    .modal()
                    .modal('show')
                ;
            });

        $('#optionMainAnnouncement').addClass('active');

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
        $('.ui.radio.checkbox')
            .checkbox()
        ;
        $('.ui.sidebar')
            .sidebar('attach events', '.menu.fixed .launch.item')
        ;

        $('.ui.checkbox')
            .checkbox()
        ;

        $('#check_area_all').click(function () {
            var checkAl = $('#valueCheckallArea').val();
            if (checkAl == '2') {
                $('#contentSelectArea').removeClass('disabled');
                $('#valueCheckallArea').val('1');
            }else {
                $('#contentSelectArea').addClass('disabled');
                $('#valueCheckallArea').val('2');
            }
        });


    </script>

@stop