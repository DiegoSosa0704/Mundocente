@extends('main.main-admin')
@section('content_admin')
<?php
$instituciones = DB::table('institucions')
        ->join('lugars', 'institucions.id_lugar_fk','=','lugars.id_lugar')
        ->orderBy('institucions.name_institution', 'asc')
        ->paginate(20);
?>


@if(Auth::user()->rol=='admin')


<div class="ui container admin-container">
    <h1 class="ui header center aligned">Administración De Instituciones</h1>
    <div class="ui stackable equal width padded grid container">
        <div class="row">
            <div class="left floated column">
                <div class="ui action input">
                    <input type="text" placeholder="Institución...">
                    <button class="ui color_2 button">Buscar</button>
                </div>
            </div>
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
                    <tr class="center aligned">
                        <td>{{$institution->name_institution}}</td>
                        @if($institution->setor_institution=='universitario')
                            <td>Universitario</td>
                        @else
                            <td>Preescolar, Básica y Media</td>
                        @endif
                        <td>{{$institution->telephone_institution}}</td>
                        <td>{{$institution->name_lugar}}</td>
                        <td>{{$institution->state_institution}}</td>
                        <td class="collapsing">
                            <button class="ui right floated small  labeled icon button-edit-institution color_3 color_3 button" disabled="true">
                                <i class="edit icon"></i> Editar
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
@include('modals.modalEditInstitution')

@else

<div class="ui segment" style="margin-top: 100px;margin-bottom: 500px;">
    <h1 style="color: #B6B5B5;">No tiene permisos de administrador</h1>
</div>

@endif



<script type="text/javascript">
    $('#admin_institutions_menu').addClass('active');
</script>



@stop