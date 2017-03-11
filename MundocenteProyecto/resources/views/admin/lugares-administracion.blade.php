@extends('main.main-admin')


<?php
$countrys = DB::table('lugars')->paginate(20);
?>

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
            <div class="right floated column">
                <div class="ui right floated  labeled icon button-places color_1 button">
                    <i class="add icon"></i> Nuevo Lugar
                </div>
            </div>
        </div>
        <div class="column">
            <table class="ui sortable celled unstackable table">
                <thead class="full-width">
                <tr class="center aligned">
                    <th>Lugar</th>
                    <th>Tipo</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>

                @foreach($countrys as $country)

                    <tr class="center aligned">
                        <td>{{$country->name_lugar}}</td>
                        @if($country->type_lugar=='country')
                            <td>País</td>
                        @endif
                        @if($country->type_lugar=='city')
                            <td>Ciudad</td>
                        @endif
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon button-edit-places color_3  color_3 button">
                                <i class="edit icon"></i> Editar
                            </div>
                        </td>
                    </tr>
                @endforeach


                </tbody>



            </table>
            <tfoot class="full-width">
            <div>{!!$countrys->render()!!}</div>
            </tfoot>
        </div>
    </div>
</div>

{{--Lugares--}}
@include('modals.modalAddPlaces')
@include('modals.modalEditPlaces')