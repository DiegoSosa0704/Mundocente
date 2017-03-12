@extends('main.main-admin')
@section('content_admin')

<?php
$lugares = DB::table('lugars')
                ->orderBy('name_lugar', 'asc')
                ->paginate(20);

$paises = DB::table('lugars')->where('type_lugar', 'country')->get();

?>

@if(Auth::user()->rol=='admin')

<div class="ui container admin-container">
    <h1 class="ui header center aligned">Administración De Lugares</h1>
    <div class="ui stackable equal width padded grid container">
        <div class="row">
            <div class="left floated column">
                <div class="ui action input">
                    <input type="text" placeholder="Lugar...">
                    <button class="ui color_2 button">Buscar</button>
                </div>
            </div>
            <div class="right floated column" >
                <div class="ui right floated  labeled icon button-places color_1 button" >
                    <i class="add icon"></i> Nuevo Lugar
                </div>
            </div>
        </div>
        <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
        <div class="column">
            <table class="ui sortable celled unstackable table">
                <thead class="full-width">
                <tr class="center aligned">
                    <th>Lugar</th>
                    <th>Tipo</th>
                    <th></th>
                    
                    
                </tr>
                </thead>
                <tbody id="tabla_de_lugares_administrador1">

                </tbody>
                <tbody id="tabla_de_lugares_administrador">
                
                @foreach($lugares as $country)

                    <tr class="center aligned">
                        <td id="name_place_list_admin{{$country->id_lugar}}">{{$country->name_lugar}}</td>
                        @if($country->type_lugar=='country')
                            <td id="type_lugar_edit_modal{{$country->id_lugar}}">País</td>
                        @endif
                        @if($country->type_lugar=='city')
                            <td id="type_lugar_edit_modal{{$country->id_lugar}}">Ciudad</td>
                        @endif
                        <input type="hidden" id="name_lugar_edit_show_dmin{{$country->id_lugar}}" value="{{$country->name_lugar}}">
                        <input type="hidden" id="type_place_edit{{$country->id_lugar}}" value="{{$country->type_lugar}}">
                        <input type="hidden" id="id_lugar_fk_edit_amin{{$country->id_lugar}}" value="{{$country->id_lugar_fk}}">
                        <td class="collapsing">
                <button class="ui right floated small  labeled icon button-edit-places color_3  color_3 button" onclick="show_modal_edit_place_admin({{$country->id_lugar}})">
                    <i class="edit icon"></i> Editar
                </button>
                        </td>

                       

                    </tr>
                @endforeach


                </tbody>



            </table>
            <tfoot class="full-width">
            <div>{!!$lugares->render()!!}</div>
            </tfoot>
        </div>
    </div>
</div>

{{--Lugares--}}
@include('modals.modalAddPlaces')
@include('modals.modalEditPlaces')


@else

<div class="ui segment" style="margin-top: 100px;margin-bottom: 500px;">
    <h1 style="color: #B6B5B5;">No tiene permisos de administrador</h1>
</div>

@endif

<script type="text/javascript">
    $('#admin_lugres_menu').addClass('active');

    

</script>

@stop