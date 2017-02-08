@extends('main.main')

@section('content')

    <style>
        .thumb {
            height: 300px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
        }
    </style>

   

    <div class="ui first coupled modal">
    <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
        <div class="header">Vinculación laboral</div>
        <div class="content ui form">
            {{--<div class="ui info message">
                <i class="close icon"></i>
                <div class="header">
                    Al suministrar los datos que se le pedirán continuación, usted podrá disfrutar de todos los servicios que ofrece Mundocente. Tales como:
                </div>
                <ul class="list">
                    <li>Realizar publicaciones de Revistas, Convocatorias... etc</li>
                    <li>Obtener resultados en búsquedas de acuerdo con sus intereses.</li>
                </ul>
            </div>--}}
            <div class="two fields">
                <div class="required field">
                    <label>País en donde se encuentra la universidad</label>
                    <div class="ui search dropdown selection">
                        <select name="country" placeholder="seleccione país de la institución" id="selectCountry">
                            <option value="">Seleccione país</option>
                            <option value="1"> Colombia</option>
                            <option value="5"> Argentina</option>
                        </select>
                        <i class="dropdown icon"></i>
                        <input class="search" autocomplete="off" tabindex="0">
                        <div class="default text">Seleccione país</div>
                        <div class="menu" tabindex="-1">
                            <div class="item" data-value="1"> Colombia</div>
                            <div class="item" data-value="5"> Argentina</div>
                        </div>
                    </div>
                </div>
                <div class="required field" id="cityChange">
                    <label>Ciudad</label>
                    <div class="ui search dropdown selection">
                        <select name="city" placeholder="Seleccione Ciudad" id="selectCity">
                            <option value="">Seleccione ciudad</option>
                        </select>
                        <i class="dropdown icon"></i>
                        <input class="search" autocomplete="off" tabindex="0">
                        <div class="default text">Seleccione ciudad</div>
                        <div class="menu" tabindex="-1"></div>
                    </div>
                </div>
            </div>
            <div class="required field">
                <label>Intitución en que labora</label>
                <div class="ui info compact small message" style="margin-top: 0; margin-bottom: 5px;">
                    <p>Si su institución no se encuentra en la lista, podrá suministrarla en el campo "Otra". </p>
                </div>
            </div>
            <div class="two fields" id="institutionChange">
                <div class="required field">
                    <label>Institución</label>
                    <div class="ui search dropdown selection">
                        <select name="institution" placeholder="Seleccione Institución" id="selectInstitution">
                            <option value="">Seleccione institución</option>
                        </select>
                        <i class="dropdown icon"></i>
                        <input class="search" autocomplete="off" tabindex="0">
                        <div class="default text">Seleccione institución</div>
                        <div class="menu transition hidden" tabindex="-1">
                            <div class="message">No results found.</div>
                        </div>
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
            <div class="right floated content">
                <a class="ui label button green" id="agregaInstituto">Agregar Institución</a>
            </div>
            <div class="ui raised segment">
                <label><b>Estoy viculado en:</b></label>
                <div class="ui divided list selected_list" id="listadeinstitutosvinculados">
                </div>
            </div>
        </div>
        <div class="actions">
            <div class="ui approve button">Siguiente</div>
        </div>
    </div>

    <div class="ui second coupled modal">
        <div class="header">Datos personales</div>
        <div class="content">
            <h3 class="ui center aligned header">Añade una foto de perfil</h3>
            <div class="ui center aligned grid form">
                <div class="field">
                    <div class="ui medium circular image_dimmer image">
                        <div class="ui dimmer">
                            <div class="content">
                                <div class="center">
                                    <label for="file" class="ui button button_load">
                                        <input type="file" id="file" style="display:none">
                                        Cargar Foto
                                    </label>
                                </div>
                            </div>
                        </div>
                        <img src="images/user.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="actions">
            <div class="ui approve button">Siguiente</div>
        </div>
    </div>

    <div class="ui third coupled modal">
        <div class="header">Áreas de interes</div>
        <div class="content ui form">
            <div class="field">
                <div class="three fields">
                    <div class="required field">
                        <label>Gran área</label>
                        <div class="ui fluid search dropdown selection">
                            <select name="large_area" id="select_gran_area_interes">
                                <option value="">Gran Área</option>
                                <option value="1"> Ciencias Naturales</option>
                                <option value="">Gran Área</option>
                                <option value="2"> Ciencias Naturales</option>
                                <option value="">Gran Área</option>
                                <option value="3"> Ingeniería y Tecnología</option>
                                <option value="">Gran Área</option>
                                <option value="4"> Ciencias Médicas y de la Salud</option>
                                <option value="">Gran Área</option>
                                <option value="5"> Ciencias Agrícolas</option>
                                <option value="">Gran Área</option>
                                <option value="6"> Ciencias Sociales</option>
                                <option value="">Gran Área</option>
                                <option value="7"> Humanidades</option>
                            </select>
                            <i class="dropdown icon"></i>
                            <input class="search" autocomplete="off" tabindex="0">
                            <div class="default text">Gran Área</div>
                            <div class="menu" tabindex="-1">
                                <div class="item" data-value="1"> Ciencias Naturales</div>
                                <div class="item" data-value="2"> Ciencias Naturales</div>
                                <div class="item" data-value="3"> Ingeniería y Tecnología</div>
                                <div class="item" data-value="4"> Ciencias Médicas y de la Salud</div>
                                <div class="item" data-value="5"> Ciencias Agrícolas</div>
                                <div class="item" data-value="6"> Ciencias Sociales</div>
                                <div class="item" data-value="7"> Humanidades</div>
                            </div>
                        </div>
                        <div class="ui horizontal divider">
                            <a type="submit" class="ui label button color_1" id="addDisciplineAreaInterest">+</a>
                        </div>
                        <div class="ui raised segment">
                            <label><b>Seleccionados</b></label>
                            <div class="ui divided list selected_list" id="list_discipline_area_Interest"></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Área</label>
                        <div class="ui search dropdown selection">
                            <select id="select_area_interes" name="area">
                                <option selected="selected" value="">Seleccione Área</option>
                                <option value="0">ninguna seleccionada</option>
                            </select>
                            <i class="dropdown icon"></i>
                            <input class="search" autocomplete="off" tabindex="0">
                            <div class="default text">Seleccione Área</div>
                            <div class="menu" tabindex="-1">
                                <div class="item" data-value="0">ninguna seleccionada</div>
                            </div>
                        </div>
                        <a type="submit" class="ui green button right" id="addAreaInterest">+</a>
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
                        <a type="submit" class="ui green button right" id="addAreaInterestDiscipline">+</a>
                        <div class="ui raised segment">
                            <label><b>Seleccionados</b></label>
                            <div class="ui divided list selected_list" id="list_area_Interest_discipline"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="actions">
            <a class="ui approve button" href="publications">Siguiente</a>
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
        // attach events to buttons
        $('.third.modal')
            .modal('setting', 'closable', false)
            .modal('attach events', '.second.modal .approve.button')
        ;
        // attach events to buttons
        $('.second.modal')
            .modal('setting', 'closable', false)
            .modal('attach events', '.first.modal .approve.button')
        ;
        // show first now
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