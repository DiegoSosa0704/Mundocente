@extends('main.main')

@section('content')



    <!--Contenido-->
    <div class="pusher" style="background-color: #EEEEEE;">
        <div class="ui container center aligned">
            <h1 class="ui center aligned header">Busqueda Avanzada</h1>
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
                <div class="ui padded grid">
                    <div class="three wide column" style="padding-right: 0;">
                        <img class="ui image" src="images/icono.png" style="width: 110px; padding: 0">
                    </div>
                    <div class="ui thirteen wide column form" style="padding-left: 0;">
                        <div class="field">
                            <label>Busqueda Rapida: </label>
                            <div class="ui action input" style="">
                                <input type="text" placeholder="Palabras clave...">
                                <select class="ui selection dropdown">
                                    <option selected="" value="all">Todo</option>
                                    <option value="articles">Revistas</option>
                                    <option value="products">Convocatorias</option>
                                    <option value="products">Eventos</option>
                                    <option value="products">Solicitudes</option>
                                </select>
                                <div type="submit" class="ui button">Buscar</div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui toggle checkbox">
                                <input type="checkbox" onclick="showAdvancedSearch()">
                                <label>Busqueda avanzada</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="revistasfiltro" class="ui raised segment" style="display: none;">
                    <div class="ui internally celled left aligned stackable equal width grid">
                        <div class="row">
                            <div class="column">
                                <button type="button" name="button" class="ui fluid button"></button>
                            </div>
                            <div class="column">
                                <button type="button" name="button" class="ui fluid button"></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <button type="button" name="button" class="ui fluid button"></button>
                            </div>
                            <div class="column">
                                <button type="button" name="button" class="ui fluid button"></button>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="column">
                                <button type="button" name="button" class="ui fluid button"></button>
                            </div>
                            <div class="column">
                                <button type="button" name="button" class="ui fluid button"></button>
                            </div>
                        </div>
                        <div class="row very relaxed">
                            <div class="column">
                                <button type="button" name="button" class="ui fluid button"></button>
                            </div>
                            <div class="column">
                                <button type="button" name="button" class="ui fluid button"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function showAdvancedSearch(){
                $('#revistasfiltro').transition('fade');
            }
            $('.ui.sidebar')
                .sidebar('attach events', '.menu.fixed .launch.item')
            ;
            $('.combo.dropdown')
                .dropdown({
                    action: 'combo'
                })
            ;
        </script>

@stop