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
            <div class="grouped fields">
                <label>Sector educativo</label>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="sector" tabindex="0" class="hidden">
                        <label>Universitario</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="sector" tabindex="0" class="hidden">
                        <label>Preescolar, básica y media</label>
                    </div>
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label>País</label>
                    <select class="ui fluid search dropdown" name="large_area" id="selectCountry">
                        <option value="">Ciudad</option>
                        <option value="large_area-1">Gran Área 1</option>
                        <option value="large_area-2">Gran Área 2</option>
                    </select>
                </div>
                <div class="field" id="cityChange">
                    <label>Ciudad</label>
                    <select class="ui fluid search dropdown" name="large_area" id="selectCity">
                        <option value="">Ciudad</option>
                        <option value="large_area-1">Gran Área 1</option>
                        <option value="large_area-2">Gran Área 2</option>
                    </select>
                </div>
            </div>
            <div class="field">
                <label>Intitución</label>
                <div class="ui info compact small message">
                    <p>Si su institución no se encuentra en la lista, podrá suministrarla en el campo "Otra". </p>
                </div>
                <div class="two fields" id="institutionChange">
                    <div class="field">
                        <select class="ui search dropdown">
                            <option value="">Institución</option>
                            <option value="AL">Alabama</option>
                        </select>
                        <div class="ui horizontal divider">
                            <a class="ui label button color_1" id="agregaInstituto">Agregar Institución</a>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui action input">
                            <input placeholder="Nombre Instituto" id="otherInstitute" type="text" value="">
                            <div class="ui label button color_2" id="addInstituteNew">Nuevo</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui raised segment">
                <label><b>Viculado con:</b></label>
                <div class="ui divided list selected_list" id="listadeinstitutosvinculados"></div>
            </div>
        </div>
        <div class="actions">
            <div class="ui approve button color_3">Siguiente</div>
        </div>
    </div>
    <div class="ui third coupled modal">
        <h2 class="ui center aligned header">Áreas de interés</h2>
        <div class="content ui form">
            <div class="ui info message">
                <div class="header">
                    Al seleccionar sus áreas de interés podrá obtener información sobre estas con mayor facilidad.
                </div>
            </div>
            <div class="field">
                <div class="three fields">
                    <div class="required field">
                        <label>Gran área</label>
                        <select class="ui fluid search dropdown" name="large_area">
                            <option value="">Gran Área</option>
                            <option value="large_area-1">Gran Área 1</option>
                            <option value="large_area-2">Gran Área 2</option>
                        </select>
                        <div class="ui horizontal divider">
                            <a type="submit" class="ui label button color_1" id="addDisciplineAreaInterest">Agregar Gran
                                Área</a>
                        </div>
                        <div class="ui raised segment">
                            <label><b>Seleccionados</b></label>
                            <div class="ui divided list selected_list" id="list_discipline_area_Interest"></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Área</label>
                        <select class="ui fluid search dropdown" id="select_area_interes" name="area">
                            <option selected="selected" value="">Seleccione Área</option>
                            <option value="0">ninguna seleccionada</option>
                        </select>
                        <div class="ui horizontal divider">
                            <a type="submit" class="ui label button color_1" id="addAreaInterest">Agregar Área</a>
                        </div>
                        <div class="ui raised segment">
                            <label><b>Seleccionados</b></label>
                            <div class="ui divided list selected_list" id="list_area_Interest"></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Disciplina</label>
                        <div class="ui search dropdown selection">
                            <select id="select_disciplina_interes" name="discipline">
                                <option selected="selected" value="">Seleccione Disciplina</option>
                                <option value="0">ninguna seleccionada</option>
                            </select>
                            <i class="dropdown icon"></i>
                            <input class="search" autocomplete="off" tabindex="0">
                            <div class="default text">Seleccione Disciplina</div>
                            <div class="menu" tabindex="-1">
                                <div class="item" data-value="0">ninguna seleccionada</div>
                            </div>
                        </div>
                        <div class="ui horizontal divider">
                            <a type="submit" class="ui label button color_1" id="addAreaInterestDiscipline">Agregar
                                Disciplina</a>
                        </div>
                        <div class="ui raised segment">
                            <label><b>Seleccionados</b></label>
                            <div class="ui divided list selected_list" id="list_area_Interest_discipline"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="actions">
            <a class="ui approve button color_3" href="publications">Siguiente</a>
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
    </script>
@stop