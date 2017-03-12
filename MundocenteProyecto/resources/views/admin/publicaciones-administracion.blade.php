@extends('main.main-admin')
@section('content_admin')


@if(Auth::user()->rol=='admin')

<div class="ui container admin-container">
    <h1 class="ui header center aligned">Administración De Publicaciones</h1>
    <div class="ui stackable equal width padded grid container">
        <div class="column">
            <h3 class="ui dividing header">Gestión de Publicaciones</h3>
        </div>
        <div class="row">
            <div class="left floated column">
                <div class="ui action input">
                    <input type="text" placeholder="Publicación...">
                    <button class="ui color_2 button">Buscar</button>
                </div>
            </div>
            <div class="right floated column">
                <div class="ui right floated  labeled icon button-publication color_1 button">
                    <i class="add icon"></i> Nueva Publicación
                </div>
            </div>
        </div>
        <div class="column">
            <div class="ui pointing secondary menu">
                <a class="item active" data-tab="publication">Publicaciones</a>
                <a class="item" data-tab="denounced-publication">Publicaciones Denunciadas</a>
                <a class="item" data-tab="disable-publication">Publicaciones Inhabilitadas</a>
            </div>
            <div class="ui tab active" data-tab="publication" >
                <table class="ui sortable celled unstackable table">
                    <thead class="full-width">
                    <tr class="center aligned">
                        <th>Id</th>
                        <th>Tipo</th>
                        <th>Nombre Publicador</th>
                        <th>E-Mail Publicador</th>
                        <th>Título</th>
                        <th>Sector</th>
                        <th>Institución</th>
                        <th>Estado Publicación</th>
                        <th>Editar</th>
                    </tr>
                    <tr class="center aligned">
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="center aligned">
                        <td>2</td>
                        <td>Revista</td>
                        <td>Diego</td>
                        <td>Diego</td>
                        <td>Las Cebollas Crecen </td>
                        <td>a</td>
                        <td>UPTC</td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon  color_3 color_3 button">
                                <i class="edit icon"></i> Inhabilitar
                            </div>
                        </td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon button-edit-publication color_3 color_3 button">
                                <i class="edit icon"></i> Editar
                            </div>
                        </td>
                    </tr>
                    <tr class="center aligned">
                        <td>3</td>
                        <td>aRevista</td>
                        <td>Luis</td>
                        <td>Luis</td>
                        <td>aLas Cebollas Crecen  </td>
                        <td>b</td>
                        <td>UPTC</td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon  color_3 color_3 button">
                                <i class="edit icon"></i> Inhabilitar
                            </div>
                        </td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon button-edit-publication color_3 color_3 button">
                                <i class="edit icon"></i> Editar
                            </div>
                        </td>
                    </tr>
                    <tr class="center aligned">
                        <td>4</td>
                        <td>Revista</td>
                        <td>Marta</td>
                        <td>Marta</td>
                        <td>Las Cebollas Crecen </td>
                        <td>c</td>
                        <td>aUPTC</td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon  color_3 color_3 button">
                                <i class="edit icon"></i> Inhabilitar
                            </div>
                        </td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon button-edit-publication color_3 color_3 button">
                                <i class="edit icon"></i> Editar
                            </div>
                        </td>
                    </tr>
                    <tr class="center aligned">
                        <td>5</td>
                        <td>Revista</td>
                        <td>Zapato</td>
                        <td>Zapato</td>
                        <td>Las Cebollas Crecen </td>
                        <td>d</td>
                        <td>UPTC</td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon  color_3 color_3 button">
                                <i class="edit icon"></i> Inhabilitar
                            </div>
                        </td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon button-edit-publication color_3 color_3 button">
                                <i class="edit icon"></i> Editar
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot class="full-width">
                    <tr>
                        <th colspan="3"></th>
                        <th colspan="3">
                            <div class="ui right floated pagination menu">
                                <a class="icon item">
                                    <i class="left chevron icon"></i>
                                </a>
                                <a class="item">1</a>
                                <a class="item">2</a>
                                <a class="item">3</a>
                                <a class="item">4</a>
                                <a class="icon item">
                                    <i class="right chevron icon"></i>
                                </a>
                            </div>
                        </th>
                        <th colspan="5"></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="ui tab" data-tab="denounced-publication" >
                <table class="ui sortable celled unstackable table">
                    <thead class="full-width">
                    <tr class="center aligned">
                        <th>Id</th>
                        <th>Tipo</th>
                        <th>Nombre Publicador</th>
                        <th>E-Mail Publicador</th>
                        <th>Título</th>
                        <th>Sector</th>
                        <th>Institución</th>
                        <th>Estado Publicación</th>
                        <th>Editar</th>
                    </tr>
                    <tr class="center aligned">
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="center aligned">
                        <td>2</td>
                        <td>Revista</td>
                        <td>Diego</td>
                        <td>Diego</td>
                        <td>Las Cebollas Crecen </td>
                        <td>a</td>
                        <td>UPTC</td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon  color_3 color_3 button">
                                <i class="edit icon"></i> Inhabilitar
                            </div>
                        </td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon button-edit-publication color_3 color_3 button">
                                <i class="edit icon"></i> Editar
                            </div>
                        </td>
                    </tr>
                    <tr class="center aligned">
                        <td>3</td>
                        <td>aRevista</td>
                        <td>Luis</td>
                        <td>Luis</td>
                        <td>aLas Cebollas Crecen  </td>
                        <td>b</td>
                        <td>UPTC</td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon  color_3 color_3 button">
                                <i class="edit icon"></i> Inhabilitar
                            </div>
                        </td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon button-edit-publication color_3 color_3 button">
                                <i class="edit icon"></i> Editar
                            </div>
                        </td>
                    </tr>
                    <tr class="center aligned">
                        <td>4</td>
                        <td>Revista</td>
                        <td>Marta</td>
                        <td>Marta</td>
                        <td>Las Cebollas Crecen </td>
                        <td>c</td>
                        <td>aUPTC</td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon  color_3 color_3 button">
                                <i class="edit icon"></i> Inhabilitar
                            </div>
                        </td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon button-edit-publication color_3 color_3 button">
                                <i class="edit icon"></i> Editar
                            </div>
                        </td>
                    </tr>
                    <tr class="center aligned">
                        <td>5</td>
                        <td>Revista</td>
                        <td>Zapato</td>
                        <td>Zapato</td>
                        <td>Las Cebollas Crecen </td>
                        <td>d</td>
                        <td>UPTC</td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon  color_3 color_3 button">
                                <i class="edit icon"></i> Inhabilitar
                            </div>
                        </td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon button-edit-publication color_3 color_3 button">
                                <i class="edit icon"></i> Editar
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot class="full-width">
                    <tr>
                        <th colspan="3"></th>
                        <th colspan="3">
                            <div class="ui right floated pagination menu">
                                <a class="icon item">
                                    <i class="left chevron icon"></i>
                                </a>
                                <a class="item">1</a>
                                <a class="item">2</a>
                                <a class="item">3</a>
                                <a class="item">4</a>
                                <a class="icon item">
                                    <i class="right chevron icon"></i>
                                </a>
                            </div>
                        </th>
                        <th colspan="5"></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="ui tab" data-tab="disable-publication" >
                <table class="ui sortable celled unstackable table">
                    <thead class="full-width">
                    <tr class="center aligned">
                        <th>Id</th>
                        <th>Tipo</th>
                        <th>Nombre Publicador</th>
                        <th>E-Mail Publicador</th>
                        <th>Título</th>
                        <th>Sector</th>
                        <th>Institución</th>
                        <th>Estado Publicación</th>
                        <th>Editar</th>
                    </tr>
                    <tr class="center aligned">
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="center aligned">
                        <td>2</td>
                        <td>Revista</td>
                        <td>Diego</td>
                        <td>Diego</td>
                        <td>Las Cebollas Crecen </td>
                        <td>a</td>
                        <td>UPTC</td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon  color_3 color_3 button">
                                <i class="edit icon"></i> Habilitar
                            </div>
                        </td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon button-edit-publication color_3 color_3 button">
                                <i class="edit icon"></i> Editar
                            </div>
                        </td>
                    </tr>
                    <tr class="center aligned">
                        <td>3</td>
                        <td>aRevista</td>
                        <td>Luis</td>
                        <td>Luis</td>
                        <td>aLas Cebollas Crecen  </td>
                        <td>b</td>
                        <td>UPTC</td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon  color_3 color_3 button">
                                <i class="edit icon"></i> Habilitar
                            </div>
                        </td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon button-edit-publication color_3 color_3 button">
                                <i class="edit icon"></i> Editar
                            </div>
                        </td>
                    </tr>
                    <tr class="center aligned">
                        <td>4</td>
                        <td>Revista</td>
                        <td>Marta</td>
                        <td>Marta</td>
                        <td>Las Cebollas Crecen </td>
                        <td>c</td>
                        <td>aUPTC</td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon  color_3 color_3 button">
                                <i class="edit icon"></i> Habilitar
                            </div>
                        </td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon button-edit-publication color_3 color_3 button">
                                <i class="edit icon"></i> Editar
                            </div>
                        </td>
                    </tr>
                    <tr class="center aligned">
                        <td>5</td>
                        <td>Revista</td>
                        <td>Zapato</td>
                        <td>Zapato</td>
                        <td>Las Cebollas Crecen </td>
                        <td>d</td>
                        <td>UPTC</td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon  color_3 color_3 button">
                                <i class="edit icon"></i> Habilitar
                            </div>
                        </td>
                        <td class="collapsing">
                            <div class="ui right floated small  labeled icon button-edit-publication color_3 color_3 button">
                                <i class="edit icon"></i> Editar
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot class="full-width">
                    <tr>
                        <th colspan="3"></th>
                        <th colspan="3">
                            <div class="ui right floated pagination menu">
                                <a class="icon item">
                                    <i class="left chevron icon"></i>
                                </a>
                                <a class="item">1</a>
                                <a class="item">2</a>
                                <a class="item">3</a>
                                <a class="item">4</a>
                                <a class="icon item">
                                    <i class="right chevron icon"></i>
                                </a>
                            </div>
                        </th>
                        <th colspan="5"></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

{{--Publicaciones--}}
@include('modals.modalAddPublication')
@include('modals.modalEditPublication')


@else

<div class="ui segment" style="margin-top: 100px;margin-bottom: 500px;">
    <h1 style="color: #B6B5B5;">No tiene permisos de administrador</h1>
</div>

@endif



<script type="text/javascript">
    $('#admin_publicacions_menu').addClass('active');
</script>

@stop