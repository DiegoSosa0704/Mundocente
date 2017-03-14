@extends('main.main-admin')
@section('content_admin')



@if(Auth::user()->rol=='admin')

<div class="ui container admin-container">
    <h1 class="ui header center aligned">Administración De Índices De Revistas</h1>
    <div class="ui stackable equal width padded grid container">
        <div class="row">
        <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
            {{--<div class="left floated column">
                <div class="ui action input">
                    <input type="text" placeholder="Índice...">
                    <button class="ui color_2 button">Buscar</button>
                </div>
            </div>--}}
            {{--
            <div class="right floated column">
                <div class="ui right floated  labeled icon button-indice color_1 button">
                    <i class="add icon"></i> Nuevo Índice
                </div>
            </div>--}}
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

                     @foreach($niveles as $index_g)
                    <tr class="center aligned" id="id_level_aadmin_edit{{$index_g->id_level}}">
                        <td>
                            <select class="ui dropdown" id="indice_admin_edit{{$index_g->id_level}}">
                            @foreach($index as $ind)
                                @if($index_g->id_index==$ind->id_index)
                                    <option value="{{$ind->id_index}}" selected="true">{{$ind->name_index}}</option>
                                @else
                                    <option value="{{$ind->id_index}}">{{$ind->name_index}}</option>
                                @endif
                            @endforeach
                                
                            </select>
                        </td>
                        <td>
                   <div class="ui message error" style="display: none;" id="id_messagge_edit_index{{$index_g->id_level}}">
                        <ul class="list">
                            <li id="id_messagge_error_p_edit_index{{$index_g->id_level}}"></li>
                        </ul>
                    </div>
                        <input type="text" id="value_level_index_paper_admin{{$index_g->id_level}}" value="{{$index_g->value_level}}" style="border: none;">
                        </td>
                        <td class="collapsing">
                            <button class="ui right floated small  labeled icon color_3  color_3 button" onclick="edit_index_paper_admin({{$index_g->id_level}})">
                                <i class="edit icon"></i> Guardar
                            </button>
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


@else

<div class="ui segment" style="margin-top: 100px;margin-bottom: 500px;">
    <h1 style="color: #B6B5B5;">No tiene permisos de administrador</h1>
</div>

@endif



<script type="text/javascript">
    $('#admin_index_paper_menu').addClass('active');
</script>

@stop