@extends('main.main')

@section('content')
@if(Auth::user()->state_user=='activo')


    <div class="pusher">
        <div class="segment-title">
            <div class="ui container">
                <h1 class="ui header" id="title_modal_announcement" style="color: #A54686;">
                    Editar Revista Científica</h1>
            </div>
        </div>
        <div class="line"></div>

@inject('call_methods_theme','Mundocente\Http\Controllers\HomeController')  

        <div class="ui center aligned container">
            <div class="ui padded raised left aligned segment">
            @foreach($publication_unique as $publication_uni)
                <div class="ui form" id="form">


                    <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
                    <h4 class="ui dividing header" style="margin-top: 0">Información general</h4>
                    <div class="field">
                        <div class="ui large horizontal label">Institución que publica la revista:
                            <select name="country" class="ui search dropdown" id="selectMVinculation">
                                
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

                    

                    <div class="field">
                    <div class="ui inverted large horizontal label color_2">
                            <div class="detail" id="name_country_title">País: 
                                @foreach($call_methods_theme->getCountryPublicationLugar($publication_uni->id_lugar_fk) as $pais_edit)
                                        {{$pais_edit->name_lugar}}
                                @endforeach
                            </div>
                        </div>
                         <div class="ui inverted large horizontal label color_3">
                            <div class="detail" id="name_city_title">Ciudad: {{$publication_uni->name_lugar}}</div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui inverted large horizontal label color_2">
                            <div class="detail" id="name_institute_title_select">Institución: {{$publication_uni->name_institution}}</div>
                        </div>
                    </div>







                  


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


                    <div class="required field">
                        <label>Título</label>
                        {!!Form::text('title', $publication_uni->title_publication, ['type' => 'text', 'placeholder' => 'Ejemplo: Docente de tiempo completo área matemáticas.', 'id'=>'titleid'])!!}
                    </div>


                    <label><b>¿La revista se encuentra indexada?</b></label>
                    

@if($call_methods_theme->returnIndexPublicationPaper($publication_uni->id_publication) > 0)
<div class="inline field">
    <input type="hidden" id="id_type_publication{{$publication_uni->id_publication}}" value="1">
     <label>
        No
    </label>
    <div class="ui toggle checkbox checked" onclick="showAdvancedSearch()">
        <input type="checkbox" name="indexed_paper" checked="true" tabindex="0" class="hidden"
               id="checkpaperindex">
    </div>
    <label>
        Si
    </label>
<p>(indexada)</p>
    </div>

                    <!--Datos de indexación-->
                    <div id="indexing-data" class="ui " style="display: block;">
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
                                                    @if($call_methods_theme->getIndexPaper($publication_uni->id_publication, $clasification->id_level)==1)
                                                    <option value="{{$clasification->id_level}}" selected="true">{{$clasification->value_level}}</option>
                                                    @else
                                                    <option value="{{$clasification->id_level}}">{{$clasification->value_level}}</option>
                                                    @endif


                                                    
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>
@elseif($call_methods_theme->returnIndexPublicationPaper($publication_uni->id_publication) == 0)
<div class="inline field">
         <input type="hidden" id="id_type_publication{{$publication_uni->id_publication}}" value="1">
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
    <p>(No indexada)</p>
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
@endif
                       
               
                    <input type="hidden" name="quantityindexlevel" id="idquantitypaperindex" value="{{$quantityIndex}}">

                    <input type="hidden" id="id_publication_edit" value="{{$publication_uni->id_publication}}">
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
                    <!--Info final-->


                    <div class="field">
                        <br>
                        <br>
                        <label>Imagen o portada de la revista</label>
                        <br>
                      
                    @if($publication_uni->url_photo_publication != NULL)
                          <div class="field">
                        <label>Imagen o logo del evento</label>
                        <img class="ui middle aligned medium rounded image" src="{{$publication_uni->url_photo_publication}}"
                             id="imageNewShow">
                        <span>
                    <input type="hidden" name="imaTemp" id="imageAuxTemp" value="{{$publication_uni->url_photo_publication}}">
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
                    </div>


                    <h4 class="ui dividing header">Información de contacto</h4>

                    <div class="ui info compact small message">
                        <p>Debe ingresar al menos uno de los siguientes campos.</p>
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
                    <div class="ui message error" style="display: none;" id="messageErrorpublication">

                        <ul class="list">
                            <li id="idpmessageerrorpublications"></li>

                        </ul>
                    </div>
                    
                    <div class="ui right aligned stackable grid">
                        <div class="sixteen wide column">
                            <a type="submit" form="form" class="ui inverted submit button button_submit"
                               id="editbuttonaddpaper">
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
                </div>
                @endforeach
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
@else
<h2 style="color: #B6B5B5;font-size: 50px;padding-top: 20px;padding-left: 300px;">Usuario inactivo</h2>
@endif
@stop