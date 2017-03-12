@extends('main.main')

@section('content')

    <style>
        .thumb {
            height: 300px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
        }
    </style>

    <div class="ui first coupled small modal">
        <h2 class="ui center aligned header">Mejore su experiencia en Mundocente</h2>
        <div class="content ui form">
            <div class="ui info message" style="font-size: 1.15em;">
                <div class="header">
                    Al ingresar los datos que se pedirán continuación, usted podrá disfrutar de mejor manera los
                    servicios que ofrece Mundocente. <br> <br> Tales como:
                </div>
                <ul class="list">
                    <li>Realizar publicaciones de Revistas, Convocatorias, Eventos y diferentes tipos de Solicitudes tomando como referencia sus vinculaciones laborales.</li>
                    <li>Obtener resultados de acuerdo con sus intereses.</li>
                </ul>
            </div>
        </div>
        <div class="actions">
            <div class="ui approve button color_3">Siguiente</div>
        </div>
    </div>











    <div class="ui second coupled modal">
        <h2 class="ui center aligned header">Vinculación laboral</h2>
        <div class="content ui form">
            
            <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
                                <div class="required field">
                                    <div class="two fields">
                                        <div class="required field">
                                            <label>País en donde se encuentra la universidad</label>

                                            <select class="ui search dropdown" name="country"
                                                    placeholder="seleccione país de la institución" id="selectCountry">
                                                <option value="">Seleccione país</option>
                                                @foreach($lugares as $lugar)

                                                    <option value="{{$lugar->id_lugar}}"> {{$lugar->name_lugar}}</option>
                                                @endforeach
                                            </select>


                                        </div>
                                        <div class="required field" id="cityChange">
                                            <label>Ciudad</label>


                                            <select class="ui search dropdown" name="city"
                                                    placeholder="Seleccione Ciudad"
                                                    id="selectCity">

                                                <option value="">Seleccione ciudad</option>


                                            </select>

                                        </div>
                                    </div>
                                  
                                    <div class="two fields" id="institutionChange">
                                        <div class="required field">
                                            <label>Institución</label>


                                            <select class="ui search dropdown" name="institution"
                                                    placeholder="Seleccione Institución" id="selectInstitution">

                                                <option value="">Seleccione institución</option>

                                            </select>
                                            <div class="ui horizontal divider">
                                                <a class="ui label button color_1" id="agregaInstituto">Agregar
                                                    Institución</a>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label>Otra</label>
                                            <div class="ui action input">
                                                <input placeholder="Nombre" id="otherInstitute" type="text" value="">
                                                <div class="ui button" id="addInstituteNew">Nuevo</div>
                                            </div>
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
                                <div class="ui error message" style="display: none;" id="messageNewInstitutioneror">
                                    
                                    <div class="header">
                                        <p id="exitNewUniversity">Debe indicar la ciudad de la nueva institución</p>
                                    </div>
                                    <ul class="list">
                                    </ul>
                                </div>
                                <div class="ui error message" style="display: none;" id="messageSaveVinculationerror">
                                    <i class="close icon" id="cierramensajedeinstitutoserror"></i>
                                    <div class="header">
                                        No se ha seleccionado la Institución correctamente
                                    </div>
                                    <ul class="list">
                                    </ul>
                                </div>
        </div>
        <div class="actions">
            <div class="ui approve button color_3">Siguiente</div>
        </div>
    </div>




















@inject('call_methods_theme','Mundocente\Http\Controllers\HomeController')


    <div class="ui third coupled modal">
        <h2 class="ui center aligned header">Áreas de interés</h2>
        <div class="content ui form">
            <div class="field">
                                  <select class="ui fluid search dropdown" id="select_areas_general_search_interest">
                                                <option value="">Ingrese sus áreas de interés</option>
                                                @foreach($areas_all as $gran_area)
                                                    <option value="{{$gran_area->id_tema}}">{{$gran_area->name_theme}}</option>
                                                    @foreach($call_methods_theme->call_areas($gran_area->id_tema) as $area)
                                                        <option value="{{$area->id_tema}}"> {{$gran_area->name_theme}}
                                                            - {{$area->name_theme}}</option>
                                                        @foreach($call_methods_theme->call_disciplines($area->id_tema) as $disci)
                                                            <option value="{{$disci->id_tema}}">{{$gran_area->name_theme}}
                                                                - {{$area->name_theme}} - {{$disci->name_theme}}</option>
                                                        @endforeach
                                                    @endforeach

                                                @endforeach
                                            </select>
                                            <br>
                                       <label><b>Seleccionados</b></label>
                                    <table class="ui celled table" id="table_areas_interest">
                                          <thead>
                                            <tr><th>Gran Área</th>
                                            <th>Área</th>
                                            <th>Disciplina</th>
                                            <th>Acción</th>
                                          </tr></thead>
                                          <tbody id="add_temas_formation">
                                             
                                                  
                                          </tbody>
                                        </table>
                                </div>
        </div>
        <div class="actions">
            <a class="ui approve button color_3" href="publicaciones">Siguiente</a>
        </div>
    </div>













    <script type="text/javascript">
        $('.ui.image_dimmer.image').dimmer({
            on: 'hover'
        });
        $('.coupled.modal')
            .modal({
                allowMultiple: false
            })
        ;
        $('.third.modal')
            .modal('setting', 'closable', false)
            .modal('attach events', '.second.modal .approve.button')
        ;
        $('.second.modal')
            .modal('setting', 'closable', false)
            .modal('attach events', '.first.modal .approve.button')
        ;
        $('.first.modal')
            .modal('setting', 'closable', false)
            .modal('show')
        ;
        $('.ui.sidebar')
            .sidebar('attach events', '.menu.fixed .launch.item')
        ;
        $('.ui.checkbox')
            .checkbox()
        ;
        $('.message .close')
          .on('click', function() {
            $(this)
              .closest('.message')
              .transition('fade')
            ;
          })
        ;
    </script>
@stop