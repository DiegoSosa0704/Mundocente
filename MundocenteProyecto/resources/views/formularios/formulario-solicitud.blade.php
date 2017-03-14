@extends('main.main')

@section('content')
@if(Auth::user()->state_user=='activo')



    <!--Contenido-->
    <div class="pusher">
        <div class="segment-title">
            <div class="ui container">
                <h1 class="ui header" id="title_modal_announcement" style="color: #A54686;">
                    Publicar Solicitud </h1>
            </div>
        </div>
        <div class="line"></div>
        <div class="ui container center aligned">
            <div class="ui piled padded left aligned segment">
                <div class="ui form" id="form">
                    <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
                    <h4 class="ui dividing header">Información general</h4>


                    <div class="field">
                        <div class="ui  large horizontal label color_1">Institución que publica la solicitud:
                            <select name="country" class="ui search dropdown" id="selectMVinculation">
                                <option value="">Seleccione Institución</option>
                                

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
                                            
                                                <option value="{{$inst_vin->id_institution}}" selected="true"> {{$inst_vin->name_institution}}</option>
                                            

                                    @endif
                                @endforeach
                                    @else
                                     @foreach($institucionesVinvulado as $inst_vin)
                                    @if($inst_vin->state_institution=='nuevo')
                                        <option value="{{$inst_vin->id_institution}}"> {{$inst_vin->name_institution}} -
                                            (Institución no verificada)
                                        </option>
                                    @else
                                        <option value="{{$inst_vin->id_institution}}"> {{$inst_vin->name_institution}}</option>
                                    @endif
                                @endforeach
                                    @endif
                              
                            </select>
                        </div>
                        <a href="#" id="id_add_new_institute" style="text-decoration: underline">Aregar Institución...</a>
                    </div>


                    <div class="two fields" style="display: none;">
                        <div class="required field">
                            <select class="ui search dropdown" name="country" disabled="true"
                                    placeholder="seleccione país de la convocatoria" id="selectCountry">
                                <option value="">Seleccione país</option>
                                @foreach($lugares as $lugar)

                                    <option value="{{$lugar->id_lugar}}"> {{$lugar->name_lugar}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="required field" id="cityChange">
                            <select class="ui search dropdown" name="city" disabled="true"
                                    placeholder="Seleccione Ciudad" id="selectCity">
                                <option value="">Seleccione ciudad</option>
                            </select>
                        </div>
                    </div>


                    <div class="two fields">
                        <div class="field">
                            <div class="required grouped fields">
                                <label>Tipo de invitación</label>
                                <div class="field">
                                    <div class="ui radio checkbox checked">
                                        <input type="radio" name="request" id="radiooptionrequestproyect"
                                               checked="true">
                                        <label>Formar parte de un proyecto</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="request" id="radiooptionrequestevaluator">
                                        <label>Ser evaluador de un proyecto</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class=" grouped fields">
                                <label>Sector educativo</label>
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="sector" id="sectorUniversityCheck"
                                               value="universitario">
                                        <label>Universitario</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="sector" id="sectorBasicCheck" value="preescolar">
                                        <label>Preescolar, básica y media</label>
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
                        {!!Form::text('title', null, ['type' => 'text', 'placeholder' => 'Ejemplo: Docente de tiempo completo área matemáticas.', 'id'=>'titleid'])!!}
                    </div>
                    <div class="field">
                        <label>Descripción</label>

                        {!!Form::textarea('description', null, ['type' => 'text', 'rows' => '5', 'id'=>'descriptionid'])!!}
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


                    <div class="two fields">

                        <div class="required field">
                            <label>Datos de contacto </label>

                            {!!Form::text('contact_data', null, ['type' => 'text', 'placeholder' => 'Nombre, e-mail y/o teléfono', 'id'=>'cantactsid'])!!}
                        </div>
                    </div>

                     <div class="ui message error" style="display: none;" id="messageErrorpublication">

                        <ul class="list">
                            <li id="idpmessageerrorpublications"></li>

                        </ul>
                    </div>
                    <div class="ui right aligned stackable grid">
                        <div class="sixteen wide column">
                            <a form="form" id="addRequestbutton"
                               class="ui submit inverted button button_submit">
                                Publicar
                            </a>
                        </div>
                    </div>
                    <br>

                   


                    <div class="ui error message"></div>
                </div>
            </div>
        </div>
    </div>


@include('modals.modal_institute_vinculate')

    <script type="text/javascript">


        $('#optionMainAnnouncement').removeClass('active');
        $('#optionMainPaper').removeClass('active');
        $('#optionMainEvent').removeClass('active');
        $('#optionMainRequest').addClass('active');

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