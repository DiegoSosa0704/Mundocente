@extends('main.main')

@section('content')



    <div class="pusher">
        <div class="segment-title">
            <div class="ui center aligned container">
                <h1 class="ui header" id="title_modal_announcement" style="color: #A54686;">
                    Publicar Revista Científica</h1>
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
        <div class="ui center aligned container">
            <div class="ui padded raised left aligned segment">
                <div class="ui form" id="form">


                    <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
                    <h4 class="ui dividing header" style="margin-top: 0">Información general</h4>
                    <div class="field">
                        <div class="ui large horizontal label">Institución que publica la revista:
                            <select name="country" class="ui search dropdown" id="selectMVinculation">
                                <option value="">Seleccione Institución</option>
                                @foreach($institucionesVinvulado as $inst_vin)
                                    <option value="{{$inst_vin->id_institution}}"> {{$inst_vin->name_institution}}</option>
                                @endforeach
                            </select>
                        </div>
                        <a href="#" id="id_add_new_institute" style="text-decoration: underline">Aregar Instituto...</a>
                    </div>

                    

                    <div class="field">
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


                    <div class="required field">
                        <label>Título</label>
                        {!!Form::text('title', null, ['type' => 'text', 'placeholder' => 'Ejemplo: Docente de tiempo completo área matemáticas.', 'id'=>'titleid'])!!}
                    </div>


                    <label><b>¿La revista se encuentra indexada?</b></label>
                    <div class="inline field">
                        <label>
                            No
                        </label>
                        <div class="ui toggle checkbox" onclick="showAdvancedSearch()">
                            <input type="checkbox" name="indexed_paper" tabindex="0" class="hidden"
                                   id="checkpaperindex">
                        </div>
                        <label>
                            Si
                        </label>
                    </div>
                    <!--Datos de indexación-->
                    <div id="indexing-data" class="ui " style="display: none;">
                        <h4 class="ui dividing header" style="padding-top: 10px">Datos de indexación</h4>
                        <div class=" field">

                            @foreach($indexpaper as $index)

                                <div class="two fields">
                                    <label style="padding-top: 12px;">{{$index->name_index}}</label>
                                    <div class="field">
                                        <select name="name" class="ui fluid dropdown"
                                                id="selectpaperindex{{$index->id_index}}">
                                            @foreach($clasificationpaper as $clasification)
                                                <option value="">Clasficación</option>
                                                @if($clasification->id_index_fk==$index->id_index)
                                                    <option value="{{$clasification->id_level}}">{{$clasification->value_level}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>


                    <input type="hidden" name="quantityindexlevel" id="idquantitypaperindex" value="{{$quantityIndex}}">


                    <!--Areas de conocimiento-->
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

                             <select class="ui fluid search dropdown multiple" multiple="true"
                                    id="select_disciplina_formacion" style="color: #000;">
                                <option value="">Seleccione área</option>
                                @foreach($gran_areas as $gran_area)
                                    <option value="{{$gran_area->id_tema}}"> {{$gran_area->name_theme}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                    <div class="ui checkbox" id="check_area_all">
                        <input type="checkbox" id="valueCheckallArea" value="1">
                        <label>Todas las áreas</label>
                    </div>
                    <!--Info final-->


                    <div class="field">
                        <br>
                        <br>
                        <label>Imagen o portada de la revista</label>
                        <br>
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


                    <h4 class="ui dividing header">Información de contacto</h4>

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
                            <a type="submit" form="form" class="ui inverted submit button button_submit"
                               id="buttonaddpaper">
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
    </div>












@include('modals.modal_institute_vinculate')







    <script type="text/javascript">
        function showAdvancedSearch() {
            $('#indexing-data').toggle("slow");
        }

            $('#id_add_new_institute').on('click', function () {
                $('.ui.addInstitute')
                    .modal()
                    .modal('show')
                ;
            });


        $('#optionMainAnnouncement').removeClass('active');
        $('#optionMainPaper').addClass('active');
        $('#optionMainEvent').removeClass('active');
        $('#optionMainRequest').removeClass('active');

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

        $('.ui.checkbox')
            .checkbox()
        ;
        $('.ui.sidebar')
            .sidebar('attach events', '.menu.fixed .launch.item')
        ;
    </script>

@stop