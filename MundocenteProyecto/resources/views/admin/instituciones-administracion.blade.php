@extends('main.main-admin')
@section('content_admin')



@if(Auth::user()->rol=='admin')


<div class="ui container admin-container">
    <h1 class="ui header center aligned">Administración De Instituciones</h1>
    <div class="ui stackable equal width padded grid container">
        <div class="row">
             {!!Form::open(['url'=>'institucion-administrador-filtro' , 'method'=>'POST'])!!}
            
             <div class="ui action input">
                    <input type="text" name="palabra" placeholder="Ingrese nombre de institución...">
                    <button class="ui color_2 button" type="submit">Buscar</button>
                </div>
            {!!Form::close()!!}
            <div class="right floated column">
                <div class="ui right floated  labeled icon button-institution color_1 button">
                    <i class="add icon"></i> Nueva Institución
                </div>
            </div>
        </div>
        <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
        <div class="column">
            <table class="ui sortable celled unstackable table">
                <thead class="full-width">
                <tr class="center aligned">
                    <th>Nombre</th>
                    <th>Sector</th>
                    <th>Teléfono</th>
                    <th>Ciudad</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody id="tbody_new_istitution_admin">
                    
                </tbody>
                <tbody>

                @foreach($instituciones as $institution)
                    <tr class="center aligned" id="item_tr_edit_institu_admin{{$institution->id_institution}}">
                        
                        <td>
                           <div class="ui message error" style="display: none;" id="id_messagge_edit_institution{{$institution->id_institution}}">
                                <ul class="list">
                                    <li id="id_messagge_error_p_edit_istitution{{$institution->id_institution}}"></li>
                                </ul>
                            </div>
                        <input type="text" class="ui input" value="{{$institution->name_institution}}" placeholder="Nombre de la institución" id="name_institution_admin_edit{{$institution->id_institution}}" style="border: none;">
                        </td>
                        <td>
                        <select  class="ui dropdown" id="selec_edit_admin_sector{{$institution->id_institution}}">
                            @if($institution->setor_institution=='universitario')
                            <option selected="true" value="universitario">Universitario</option>
                            <option value="preescolar">Preescolar, Básica y Media</option>
                            @else
                                <option value="universitario">Universitario</option>
                            <option value="preescolar" selected="true" >Preescolar, Básica y Media</option>
                            @endif
                        </select>
                        </td>

                         <td>
                        <input type="text" class="ui input" value="{{$institution->telephone_institution}}" placeholder="Teléfono" id="name_telephone_amin_edit{{$institution->id_institution}}" style="border: none;">
                        
                        <td>
                        <select class="ui" id="value_city_institution_select_edit_admin{{$institution->id_institution}}">
                        @foreach($ciudades as $ciudad)

                            @if($institution->id_lugar_fk!=$ciudad->id_lugar)
                                <option value="{{$ciudad->id_lugar}}">{{$ciudad->name_lugar}}</option>
                            @else
                                <option value="{{$ciudad->id_lugar}}" selected="true">{{$ciudad->name_lugar}}</option>
                            @endif
                        @endforeach
                        </select>
                        </td>                      

                        <td>
                        <select class="ui dropdown" id="inactive_institution_admin{{$institution->id_institution}}">
                            @if($institution->state_institution=='activo')
                            <option selected="true" value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                            <option value="nuevo">Nuevo</option>
                            @elseif($institution->state_institution=='inactivo')
                            <option value="activo">Activo</option>
                            <option selected="true" value="inactivo">Inactivo</option>
                            <option value="nuevo">Nuevo</option>
                            @else
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                            <option selected="true" value="nuevo">Nuevo</option>
                            @endif
                        </select>
                        </td>

                        <td class="collapsing">
                            <button class="ui right floated small  labeled icon color_3 color_3 button" onclick="editInstitutionAdmin({{$institution->id_institution}})">
                                <i class="edit icon"></i> Guardar
                            </button>
                        </td>
                    </tr>
                @endforeach

                </tbody>


            </table>
            <tfoot class="full-width">
            <div>{!!$instituciones->render()!!}</div>
            </tfoot>
        </div>
    </div>
</div>

{{--Instituciones--}}
@include('modals.modalAddInstitution')


@else

<div class="ui segment" style="margin-top: 100px;margin-bottom: 500px;">
    <h1 style="color: #B6B5B5;">No tiene permisos de administrador</h1>
</div>

@endif



<script type="text/javascript">
    $('#admin_institutions_menu').addClass('active');
</script>



@stop