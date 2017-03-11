<div class="ui long modal">
  <i class="close icon"></i>
  <div class="header">
    Búsqueda Avanzada
  </div>
  <div class="image content">
        
     
      






<?php
$gran_areas = DB::table('temas')->where('type_theme', 'gran_area')->where('id_tema', '!=','1')->get();
$countrys = DB::table('lugars')->where('type_lugar', 'country')->get();
?>
<div class="ui">


    <div id="filter_announcement" class="ui segment" style="display: none;">
        <div class="ui blue top left attached label">Filtro de Convocatorias</div>


        {!!Form::open(['url'=>'resultados-convocatorias', 'method'=> 'POST', 'class'=>'ui small form', 'style'=>'width: 200%'])!!}
        <div class="field">
            <input type="hidden" name="type_filter_search_annoucement" value="1">
            <div class="required field">
                <label>Gran área</label>
                <select name="large_area_filter_annoucement" id="change_filter_gran_area_annoucement"
                        class="ui search dropdown">
                    <option value="">Seleccione Gran área</option>
                    @foreach($gran_areas as $gran_area)
                        @if($gran_area->id_tema!=1)
                         
                            
                            
                                <option value="{{$gran_area->id_tema}}">{{$gran_area->name_theme}}</option>    
                            
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="field" id="change_filter_annoucement">
                <label>Área</label>
                <select name="area_filter_annoucement" class="ui search dropdown" id="chanfe_filter_annoucemnt_area">
                    <option value="">Seleccione Área</option>
                </select>
            </div>
            <div class="field" id="div_change_disscipline_annoucement">
                <label>Disciplina</label>
                <select name="discipline_filter_annoucement_name" class="ui search dropdown"
                        id="discipline_filter_annoucement">
                    <option value="">Seleccione Disciplina</option>

                </select>
            </div>
        </div>
        <h5 class="ui horizontal divider header">
            Lugar de la convocatoria
        </h5>
        <div class="field">
            <label>País</label>
            <select name="country_filter_country_annoucement" class="ui search dropdown"
                    id="select_country_filter_annoucement">
                <option value="">País</option>
                @foreach($countrys as $country)
                    <option value="{{$country->id_lugar}}">{{$country->name_lugar}}</option>
                @endforeach
            </select>
        </div>
        <div class="field" id="cityChange_div_annoucement">
            <label>Ciudad</label>
            <select name="city_filter_city_annoucement" class="ui search dropdown" id="selectCity_filter_annoucement">
                <option value="">Ciudad</option>
            </select>
        </div>
        <div class="field" id="div_institution_change_filter_annoucement">
            <label>Institución</label>
            <select name="institution_filter_isntitution_annoucement" class="ui search dropdown"
                    id="selectInstitution_filter_annoucement">
                <option value="">Ciudad</option>
            </select>
        </div>
        <button class="ui button" style="background-color: #AD5691;color: #fff;float: right;margin-top: 30px;">
            <i class="search icon"></i>
            Buscar
        </button>


        {!!Form::close()!!}

    </div>


    <div id="filter_paper" class="ui segment">
        <div class="ui green top left attached label">Filtro de Revistas</div>
        {!!Form::open(['url'=>'resultados-revistas', 'method'=> 'POST', 'class'=>'ui small form', 'style'=>'width: 200%'])!!}
        <div class="field">
            <input type="hidden" name="type_filter_search_paper" value="2">
            <div class="field">
                <label>Gran área</label>
                <select name="large_area_filter_paper" class="ui search dropdown" id="change_filter_gran_area_paper">
                    <option value="">Seleccione Gran área</option>
                    @foreach($gran_areas as $gran_area)
                        @if($gran_area->id_tema!=1)
                         
                            
                            
                                <option value="{{$gran_area->id_tema}}">{{$gran_area->name_theme}}</option>    
                            
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="field" id="change_filter_paper_div">
                <label>Área</label>
                <select name="area_paper_filter" class="ui search dropdown" id="chanfe_filter_paper_area">
                    <option value="">Seleccione Área</option>
                </select>
            </div>
            <div class="field" id="div_change_disscipline_paper">
                <label>Disciplina</label>
                <select name="discipline_paper_filter" class="ui search dropdown" id="discipline_filter_paper">
                    <option value="">Seleccione Disciplina</option>
                </select>
            </div>
        </div>
        <h5 class="ui horizontal divider header">
            Lugar de la institución
        </h5>
        <div class="field">
            <label>País</label>
            <select name="country_filter_country_paper" class="ui search dropdown" id="select_country_filter_paper">
                <option value="">País</option>
                @foreach($countrys as $country)
                    <option value="{{$country->id_lugar}}">{{$country->name_lugar}}</option>
                @endforeach
            </select>
        </div>
        <div class="field" id="cityChange_div_paper">
            <label>Ciudad</label>
            <select name="city_filter_city_paper" class="ui search dropdown" id="selectCity_filter_paper">
                <option value="">Ciudad</option>
            </select>
        </div>
        <div class="field" id="div_institution_change_filter_paper">
            <label>Institución</label>
            <select name="institution_filter_isntitution_paper" class="ui search dropdown"
                    id="selectInstitution_filter_paper">
                <option value="">Ciudad</option>
            </select>
        </div>
        <div class="grouped fields">
            <label>Indexada</label>
            <div class="field">
                <div class="ui radio checkbox checked">
                    <input type="radio" name="indexed" checked="checked" value="all">
                    <label>Todo</label>
                </div>
            </div>
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio" name="indexed" value="si">
                    <label>Si</label>
                </div>
            </div>
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio" name="indexed" value="no">
                    <label>No</label>
                </div>
            </div>

        </div>
        <button class="ui button" style="background-color: #AD5691;color: #fff;float: right;margin-top: 30px;">
            <i class="search icon"></i>
            Buscar
        </button>
        {!!Form::close()!!}
    </div>


    <div id="filter_event" class="ui segment" style="display: none;">
        <div class="ui red top left attached label">Filtro de Eventos</div>
        {!!Form::open(['url'=>'resultados-eventos', 'method'=> 'POST', 'class'=>'ui small form', 'style'=>'width: 200%'])!!}
        <div class="field">
            <input type="hidden" name="type_filter_search_event" value="3">
            <div class="field">
                <label>Seleccione Gran área</label>
                <select name="large_area_event_filter" class="ui search dropdown" id="change_filter_gran_area_event">
                    <option value="">Gran área</option>
                   @foreach($gran_areas as $gran_area)
                        @if($gran_area->id_tema!=1)
                         
                            
                            
                                <option value="{{$gran_area->id_tema}}">{{$gran_area->name_theme}}</option>    
                            
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="field" id="change_filter_event_div">
                <label>Seleccione Área</label>
                <select name="area_event_filter" class="ui search dropdown" id="chanfe_filter_event_area">
                    <option value="">Área</option>
                </select>
            </div>
            <div class="field" id="div_change_disscipline_event">
                <label>Seleccione Disciplina</label>
                <select name="discipline_event_filter" class="ui search dropdown" id="discipline_filter_event">
                    <option value="">Disciplina</option>
                </select>
            </div>
        </div>
        <h5 class="ui horizontal divider header">
            Lugar del evento
        </h5>
        <div class="field">
            <label>País</label>
            <select name="country_filter_country_event" class="ui search dropdown" id="select_country_filter_event">
                <option value="">País</option>
                @foreach($countrys as $country)
                    <option value="{{$country->id_lugar}}">{{$country->name_lugar}}</option>
                @endforeach
            </select>
        </div>
        <div class="field" id="cityChange_div_event">
            <label>Ciudad</label>
            <select name="city_filter_city_event" class="ui search dropdown" id="selectCity_filter_event">
                <option value="">Ciudad</option>
            </select>
        </div>
        <div class="field" id="div_institution_change_filter_event">
            <label>Institución</label>
            <select name="institution_filter_isntitution_event" class="ui search dropdown"
                    id="selectInstitution_filter_event">
                <option value="">Ciudad</option>
            </select>
        </div>
        <button class="ui button" style="background-color: #AD5691;color: #fff;float: right;margin-top: 30px;">
            <i class="search icon"></i>
            Buscar
        </button>
        {!!Form::close()!!}
    </div>


    <div id="filter_request_investigator" class="ui segment" style="display: none;">
        <div class="ui orange top left attached label">Filtro de Solicitud a investigadores</div>
        {!!Form::open(['url'=>'solicitud-proyectos', 'method'=> 'POST', 'class'=>'ui small form', 'style'=>'width: 200%'])!!}
        <div class="field">
            <input type="hidden" name="type_filter_search_inve" value="4">
            <div class="field">
                <label>Gran área</label>
                <select name="large_area_request_inve_filter" class="ui search dropdown"
                        id="change_filter_gran_area_inve">
                    <option value="">Seleccione Gran área</option>
                   @foreach($gran_areas as $gran_area)
                        @if($gran_area->id_tema!=1)
                         
                            
                            
                                <option value="{{$gran_area->id_tema}}">{{$gran_area->name_theme}}</option>    
                            
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="field" id="change_filter_inve_div">
                <label>Área</label>
                <select name="area_request_inve_filter" class="ui search dropdown" id="chanfe_filter_inve_area">
                    <option value="">Seleccione Área</option>
                </select>
            </div>
            <div class="field" id="div_change_disscipline_inve">
                <label>Disciplina</label>
                <select name="discipline_request_inve_filter" class="ui search dropdown" id="discipline_filter_inve">
                    <option value="">Seleccione Disciplina</option>
                </select>
            </div>
        </div>
        <h5 class="ui horizontal divider header">
            Lugar de la institución
        </h5>
        <div class="field">
            <label>País</label>
            <select name="country_filter_country_inve" class="ui search dropdown" id="select_country_filter_inve">
                <option value="">País</option>
                @foreach($countrys as $country)
                    <option value="{{$country->id_lugar}}">{{$country->name_lugar}}</option>
                @endforeach
            </select>
        </div>
        <div class="field" id="cityChange_div_inve">
            <label>Ciudad</label>
            <select name="city_filter_city_inve" class="ui search dropdown" id="selectCity_filter_inve">
                <option value="">Ciudad</option>
            </select>
        </div>
        <div class="field" id="div_institution_change_filter_inve">
            <label>Institución</label>
            <select name="institution_filter_isntitution_inve" class="ui search dropdown"
                    id="selectInstitution_filter_inve">
                <option value="">Ciudad</option>
            </select>
        </div>
        <button class="ui button" style="background-color: #AD5691;color: #fff;float: right;margin-top: 30px;">
            <i class="search icon"></i>
            Buscar
        </button>
        {!!Form::close()!!}
    </div>


    <div id="filter_request_evaluator" class="ui segment" style="display: none;">
        <div class="ui orange top left attached label">Filtro de Solicitud a evaluadores</div>
        {!!Form::open(['url'=>'solicitud-evaluadores', 'method'=> 'POST', 'class'=>'ui small form', 'style'=>'width: 200%'])!!}
        <div class="field">
            <input type="hidden" name="type_filter_search_eva" value="5">
            <div class="field">
                <label>Gran área</label>
                <select name="large_area_request_eva_filter" class="ui search dropdown"
                        id="change_filter_gran_area_eva">
                    <option value="">Seleccione Gran área</option>
                   @foreach($gran_areas as $gran_area)
                        @if($gran_area->id_tema!=1)
                         
                            
                            
                                <option value="{{$gran_area->id_tema}}">{{$gran_area->name_theme}}</option>    
                            
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="field" id="change_filter_eva_div">
                <label>Área</label>
                <select name="area_request_eva_filter" class="ui search dropdown" id="chanfe_filter_eva_area">
                    <option value="">Seleccione Área</option>
                </select>
            </div>
            <div class="field" id="div_change_disscipline_eva">
                <label>Disciplina</label>
                <select name="discipline_request_eva_filter" class="ui search dropdown" id="discipline_filter_eva">
                    <option value="">Seleccione Disciplina</option>
                </select>
            </div>
        </div>
        <h5 class="ui horizontal divider header">
            Lugar de la institución
        </h5>
        <div class="field">
            <label>País</label>
            <select name="country_filter_country_eva" class="ui search dropdown" id="select_country_filter_eva">
                <option value="">País</option>
                @foreach($countrys as $country)
                    <option value="{{$country->id_lugar}}">{{$country->name_lugar}}</option>
                @endforeach
            </select>
        </div>
        <div class="field" id="cityChange_div_eva">
            <label>Ciudad</label>
            <select name="city_filter_city_eva" class="ui search dropdown" id="selectCity_filter_eva">
                <option value="">Ciudad</option>
            </select>
        </div>
        <div class="field" id="div_institution_change_filter_eva">
            <label>Institución</label>
            <select name="institution_filter_isntitution_eva" class="ui search dropdown"
                    id="selectInstitution_filter_eva">
                <option value="">Ciudad</option>
            </select>
        </div>
        <button class="ui button" style="background-color: #AD5691;color: #fff;float: right;margin-top: 30px;">
            <i class="search icon"></i>
            Buscar
        </button>
        {!!Form::close()!!}
    </div>


</div>







  </div>
  
</div>




