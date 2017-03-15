@extends('main.main')

@section('content')
@if(Auth::user()->state_user=='activo')


    <!--Contenido-->
    <div class="pusher">
        <div class="segment-title">
            <div class="ui container">
                <h1 class="ui header" id="title_modal_announcement" style="color: #A54686;">
                    Editar Solicitud </h1>
            </div>
        </div>
        <div class="line"></div>
        <div class="ui container center aligned">
            <div class="ui raised padded left aligned segment">
            <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
            @foreach($publication_unique as $publication_uni)
                <div class="ui form" id="form">
                    <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
                    <h4 class="ui dividing header">Información general</h4>


                    <div class="field">
                        <div class="ui  large horizontal label">Institución que publica la solicitud:
                            <select name="country" class="ui search dropdown" id="selectMVinculation">
                                <option value="{{$publication_uni->id_institution}}" selected="true">{{$publication_uni->name_institution}}</option>
                                
                                   @if(Auth::user()->rol=='admin')
                                                <?php
                                                    $listInstitu = DB::table('institucions')->get();
                                                ?>
                                    @foreach($listInstitu as $inst_vin)

                                        @if($inst_vin->state_institution=='nuevo')
                                            <option value="{{$inst_vin->id_institution}}"> {{$inst_vin->name_institution}} -
                                                (Institución no verificada)
                                            </option>
                                        @else
                                            @if($publication_uni->id_institution==$inst_vin->id_institution)
                                                <option value="{{$inst_vin->id_institution}}" selected="true"> {{$inst_vin->name_institution}}</option>
                                            @else
                                                <option value="{{$inst_vin->id_institution}}"> {{$inst_vin->name_institution}}</option>
                                        @endif

                                    @endif
                                @endforeach
                                    @else
                                    @foreach($institucionesVinvulado as $inst_vin)

                                        @if($inst_vin->state_institution=='nuevo')
                                            <option value="{{$inst_vin->id_institution}}"> {{$inst_vin->name_institution}} -
                                                (Institución no verificada)
                                            </option>
                                        @else
                                            @if($publication_uni->id_institution==$inst_vin->id_institution)
                                                <option value="{{$inst_vin->id_institution}}" selected="true"> {{$inst_vin->name_institution}}</option>
                                            @else
                                                <option value="{{$inst_vin->id_institution}}"> {{$inst_vin->name_institution}}</option>
                                            @endif

                                        @endif
                                    @endforeach
                                    @endif
                            </select>
                        </div>
                        <a href="#" id="id_add_new_institute" style="text-decoration: underline">Aregar Instituto...</a>
                    </div>

@inject('call_methods_theme','Mundocente\Http\Controllers\HomeController')


                    <div class="two fields" style="display: none;">
                        <div class="required field">
                            <select class="ui search dropdown" name="country" disabled="true"
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
                            <select class="ui search dropdown" name="city" disabled="true"
                                    placeholder="Seleccione Ciudad" id="selectCity">
                                 <option value="{{$publication_uni->id_lugar_fk}}" selected="true"  id="enwcityselectedselect">{{$publication_uni->name_lugar}}</option>
                            </select>
                        </div>
                    </div>


                    <div class="two fields">
                        <div class="field">
                            <div class="required grouped fields">
                                <label>Tipo de invitación</label>
                                <div class="field">

                                    @if($publication_uni->id_type_publication=='4')
                                    <div class="ui radio checkbox checked">
                                        <input type="radio" name="request" id="radiooptionrequestproyect"
                                               checked="true">
                                        <label>Formar parte de un proyecto</label>
                                    </div>
                                    @else
                                    <div class="ui radio checkbox ">
                                        <input type="radio" name="request" id="radiooptionrequestproyect">
                                        <label>Formar parte de un proyecto</label>
                                    </div>
                                    @endif
                                    
                                </div>
                                <div class="field">
                                @if($publication_uni->id_type_publication=='5')
                                <div class="ui radio checkbox checked">
                                        <input type="radio" name="request" id="radiooptionrequestevaluator" checked="true">
                                        <label>Ser evaluador de un proyecto</label>
                                    </div>
                                @else
                                <div class="ui radio checkbox">
                                        <input type="radio" name="request" id="radiooptionrequestevaluator">
                                        <label>Ser evaluador de un proyecto</label>
                                    </div>
                                @endif
                                    
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="id_publication_edit" value="{{$publication_uni->id_publication}}">
                        <div class="field">
                            <div class=" grouped fields">
                                <label>Sector educativo</label>
                                <div class="field">
                                @if($publication_uni->sector_publication=='universitario' || $publication_uni->sector_publication=='ambos')
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
                                @if($publication_uni->sector_publication=='preescolar' || $publication_uni->sector_publication=='ambos')
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
                    </div>










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
                        <label>Título</label>
                        {!!Form::text('title', $publication_uni->title_publication, ['type' => 'text', 'placeholder' => 'Ejemplo: Docente de tiempo completo área matemáticas.', 'id'=>'titleid'])!!}
                    </div>
                    <div class="field">
                        <label>Descripción</label>

                        {!!Form::textarea('description', $publication_uni->description_publication, ['type' => 'text', 'rows' => '5', 'id'=>'descriptionid'])!!}
                    </div>
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
                        <div class="required field">
                            <label>Hasta</label>
                            <div class="ui calendar" id="rangeend">
                                <div class="ui input icon">
                                    <i class="calendar icon"></i>
                                    {!!Form::text('dateFinish', $publication_uni->date_end, ['type' => 'text', 'placeholder' => 'Ingrese fecha de fin', 'id'=>'dateFinishid'])!!}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="two fields">

                        <div class="required field">
                            <label>Datos de contacto </label>

                            {!!Form::text('contact_data', $publication_uni->contact_pubication, ['type' => 'text', 'placeholder' => 'Nombre, e-mail y/o teléfono', 'id'=>'cantactsid'])!!}
                        </div>
                    </div>

                    <div class="ui message error" style="display: none;" id="messageErrorpublication">

                        <ul class="list">
                            <li id="idpmessageerrorpublications"></li>

                        </ul>
                    </div>
                    

                    <div class="ui right aligned stackable grid">
                        <div class="sixteen wide column">
                            <a form="form" id="editRequestbutton"
                               class="ui submit inverted button button_submit">
                                Editar
                            </a>
                        </div>
                    </div>
                    <br>

                    {!!Form::open(['url'=>'delete-pulication-all' , 'method'=>'POST'])!!}
                    <input type="hidden" name="id_p" value="{{$publication_uni->id_publication}}">
                    <input type="hidden" name="id_u" value="{{$publication_uni->id_user_fk}}">
                    <button class="ui red button" type="submit">Eliminar</button>
                    {!!Form::close()!!}
                    


                    <div class="ui error message"></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


@include('modals.modal_institute_vinculate')

    <script type="text/javascript">


         $('#id_add_new_institute').on('click', function () {
                $('.ui.addInstitute')
                    .modal()
                    .modal('show')
                ;
            });

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

        $('.ui.checkbox')
            .checkbox()
        ;

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

    </script>

@else
<h2 style="color: #B6B5B5;font-size: 50px;padding-top: 20px;padding-left: 300px;">Usuario inactivo</h2>
@endif
@stop