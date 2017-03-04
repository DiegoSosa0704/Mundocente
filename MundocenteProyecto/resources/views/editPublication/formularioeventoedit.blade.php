@extends('main.main')

@section('content')



    <div class="pusher">
        <div class="segment-title">
            <div class="ui center aligned container">
                <h1 class="ui header" id="title_modal_announcement" style="color: #A54686;">
                    Editar Evento</h1>
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
            @foreach($publication_unique as $publication_uni)
                <div class="ui form" id="form">
                    <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
                    <h4 class="ui dividing header">Información general</h4>
                    <div class="field">
                        <div class="ui  large horizontal label">Institución que publica el evento:
                            <select name="country" class="ui search dropdown" id="selectMVinculation">
                                <option value="{{$publication_uni->id_institution}}" selected="true">{{$publication_uni->name_institution}}</option>
                                @foreach($institucionesVinvulado as $inst_vin)
                                    <option value="{{$inst_vin->id_institution}}"> {{$inst_vin->name_institution}}</option>
                                @endforeach
                            </select>
                        </div>
                        <a href="#" id="id_add_new_institute" style="text-decoration: underline">Aregar Instituto...</a>
                    </div>



              












                    <div id="details_edit_institution_selected" >
                        <div class="field">
                        <div class="grouped fields">
                            <label>Sector educativo</label>
                            <div class="field">
                              
                                   @if($publication_uni->sector_publication=='universitario')
                                     <div class="ui checkbox checked">
                                        <input type="checkbox" name="sector" id="sectorUniversityCheck"
                                               value="universitario" checked="true">
                                        <label>Universitario</label>
                                    </div>
                                @else
                                 <div class="ui checkbox">
                                        <input type="checkbox" name="sector" id="sectorUniversityCheck"
                                               value="universitario">
                                        <label>Universitario</label>
                                    </div>
                                @endif


                            </div>
                            <div class="field">
                                @if($publication_uni->sector_publication=='preescolar')
                                     <div class="ui checkbox checked">
                                        <input type="checkbox" name="sector" id="sectorBasicCheck" value="preescolar" checked="true">
                                        <label>Preescolar, básica y media</label>
                                    </div>
                                @else
                                     <div class="ui checkbox">
                                        <input type="checkbox" name="sector" id="sectorBasicCheck" value="preescolar">
                                        <label>Preescolar, básica y media</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

@inject('call_methods_theme','Mundocente\Http\Controllers\HomeController')

                    <div class="two fields" id="changeInstitution_location">
                        <div class="required field">
                            <label >País</label>
                            <select class="ui search dropdown" name="country"
                                    placeholder="seleccione país de la convocatoria" id="selectCountry">
                                 @foreach($call_methods_theme->getCountryPublicationLugar($publication_uni->id_lugar_fk) as $pais_edit)
                                        <option value="{{$pais_edit->id_lugar}}" selected="true">{{$pais_edit->name_lugar}}</option>
                                @endforeach
                                @foreach($lugares as $lugar)

                                    <option value="{{$lugar->id_lugar}}"> {{$lugar->name_lugar}}</option>
                                @endforeach
                            </select>


                        </div>
                        <div class="required field" id="cityChange">
                            <label>Ciudad</label>
                            <select class="ui search dropdown" name="city" placeholder="Seleccione Ciudad"
                                    id="selectCity">
                                     <option value="{{$publication_uni->id_lugar_fk}}" selected="true"  id="enwcityselectedselect">{{$publication_uni->name_lugar}}</option>
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
                    
                    

                    


                    <div class="required field">

                        <div class="two fields">
                            <div class="required field">
                                <label>Desde</label>
                                <div class="ui calendar" id="rangestart">
                                    <div class="ui input icon">
                                        <i class="calendar icon"></i>
                                        {!!Form::text('dateStart', $publication_uni->date_start, ['type' => 'text', 'placeholder' => 'Ingrese fecha de inicio', 'id'=>'dateStartid'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class=" field">
                                <label>Hora de inicio</label>
                                <div class="ui calendar" id="timeStart">
                                    <div class="ui input left icon">
                                        <i class="time icon"></i>
                                        <input type="text" placeholder="Hora de inicio" id="inputvaluehourStart" value="{{$publication_uni->hour_start}}">
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
                                        {!!Form::text('dateFinish', $publication_uni->date_end, ['type' => 'text', 'placeholder' => 'Ingrese fecha de fin', 'id'=>'dateFinishid'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class=" field">
                                <label>Hora de finalización</label>
                                <div class="ui calendar" id="timeFinish">
                                    <div class="ui input left icon">
                                        <i class="time icon"></i>
                                        <input type="text" placeholder="Ingrese hora de fin" id="inputvaluehourFinish" value="{{$publication_uni->hour_end}}">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>



@inject('call_methods_theme','Mundocente\Http\Controllers\HomeController')


                    <h4 class="ui dividing header">Áreas de conocimiento</h4>
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

@foreach($listThemesPub as $theme_pub)
    <option value="{{$theme_pub->id_tema}}" selected="true"> {{$theme_pub->name_theme}} - {{$theme_pub->type_theme}}</option>
@endforeach

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
                    <div class="ui checkbox" id="check_area_all">
                        <input type="checkbox" id="valueCheckallArea" value="1">
                        <label>Todas las áreas</label>
                    </div>


                    <h4 class="ui dividing header">Detalles</h4>
                    <div class="required field">
                        <label>Nombre del evento</label>
                        {!!Form::text('title',  $publication_uni->title_publication, ['type' => 'text', 'placeholder' => 'Ejemplo: Docente de tiempo completo área matemáticas.', 'id'=>'titleid'])!!}
                    </div>


                    @if($publication_uni->url_photo_publication != NULL)
                          <div class="field">
                        <label>Imagen o logo del evento</label>
                        <img class="ui middle aligned medium rounded image" src="{{$publication_uni->url_photo_publication}}"
                             id="imageNewShow">
                        <span>
                    <input type="hidden" name="imaTemp" id="imageAuxTemp" value="">
                        <label for="file" class="ui blue button button_load">
                            Cargar
                            
                             <form method="post" id="formularioimage" enctype="multipart/form-data">
                                 <input type="file" name="file" id="file" accept="image/*" required
                                        style="display:none">
                                 
                            </form>
                        </label>
                    </span>
                    </div>
                    @else
                        <div class="field">
                        <label>Imagen o logo del evento</label>
                        <img class="ui middle aligned medium rounded image" src="images/public-image.png"
                             id="imageNewShow">
                        <span>
                    <input type="hidden" name="imaTemp" id="imageAuxTemp" value="">
                        <label for="file" class="ui blue button button_load">
                            Cargar
                            
                             <form method="post" id="formularioimage" enctype="multipart/form-data">
                                 <input type="file" name="file" id="file" accept="image/*" required
                                        style="display:none">
                                 
                            </form>
                        </label>
                    </span>
                    </div>
                    @endif

                  


                    <div class="field">
                        <label>Descripción</label>

                        {!!Form::textarea('description', $publication_uni->description_publication, ['type' => 'text', 'rows' => '5', 'id'=>'descriptionid'])!!}
                    </div>


                    <div class="ui info compact small message">
                        <p>Debe ingresar al menos uno de los campos correspondientes a contacto.</p>
                    </div>


                    <div class="two fields">
                        <div class="required field">
                            <label>Enlace</label>

                            {!!Form::text('link', $publication_uni->url_publication, ['type' => 'text', 'placeholder' => 'URL', 'id'=>'url_publication'])!!}
                        </div>
                        <div class="required field">
                            <label>Datos de contacto </label>

                            {!!Form::text('contact_data', $publication_uni->contact_pubication, ['type' => 'text', 'placeholder' => 'Nombre, e-mail y/o teléfono', 'id'=>'cantactsid'])!!}
                        </div>
                    </div>


                    <div class="ui right aligned stackable grid">
                        <div class="sixteen wide column">
                            <a type="submit" form="form" class="ui submit inverted button button_submit"
                               id="editpublicationeventbutton">
                                Editar
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
                @endforeach
            </div>
        </div>
    </div>




@include('modals.modal_institute_vinculate')


    <script type="text/javascript">



        $('#check_area_all').click(function () {
            var checkAl = $('#valueCheckallArea').val();
            if (checkAl == '2') {
                $('#contentSelectArea').removeClass('disabled');
                $('#valueCheckallArea').val('1');
            } else {
                $('#contentSelectArea').addClass('disabled');
                $('#valueCheckallArea').val('2');
            }
        });

        $('#id_add_new_institute').on('click', function () {
                $('.ui.addInstitute')
                    .modal()
                    .modal('show')
                ;
            });


        $('#timeStart').calendar({
            ampm: false,
            type: 'time'
        });

        $('#timeFinish').calendar({
            ampm: false,
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