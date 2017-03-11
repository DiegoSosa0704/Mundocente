@extends('main.main-admin')

<?php
$niveles = DB::table('nivels')
        ->join('indices','nivels.id_index_fk','=','indices.id_index')
        ->paginate(20);
?>

<div class="ui container admin-container">
    <h1 class="ui header center aligned">Administración De Índices De Revistas</h1>
    <div class="ui stackable equal width padded grid container">
        <div class="row">
            <div class="left floated column">
                <div class="ui action input">
                    <input type="text" placeholder="Índice...">
                    <button class="ui color_2 button">Buscar</button>
                </div>
            </div>
            <div class="right floated column">
                <div class="ui right floated  labeled icon button-indice color_1 button">
                    <i class="add icon"></i> Nuevo Índice
                </div>
            </div>
        </div>
        <div class="column">
            <table class="ui sortable celled unstackable table">
                <thead class="full-width">
                <tr class="center aligned">
                    <th>Índice</th>
                    <th>Niveles</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>

                @foreach($niveles as $index)
                    <tr class="center aligned">
                        <td>{{$index->name_index}}</td>
                        <td>{{$index->value_level}}</td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon button-edit-indice color_3  color_3 button">
                                <i class="edit icon"></i> Editar
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <tfoot class="full-width">
            <div>{!!$niveles->render()!!}</div>
            </tfoot>
        </div>
    </div>
</div>

{{--Índices--}}
@include('modals.modalAddIndice')
@include('modals.modalEditIndice')