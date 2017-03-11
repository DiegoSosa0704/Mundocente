@extends('main.main-admin')

<div class="ui container admin-container">
    <h1 class="ui header center aligned">Administración De Usuarios</h1>
    <div class="ui stackable equal width padded grid container">
        <div class="row">
            <div class="left floated column">
                <div class="ui action input">
                    <input type="text" placeholder="Usuario...">
                    <button class="ui color_2 button">Buscar</button>
                </div>
            </div>
            <div class="right floated column">
                <div class="ui right floated  labeled icon button-user color_1 button">
                    <i class="add icon"></i> Nuevo Usuario
                </div>
            </div>
        </div>
        <div class="column">
            <table class="ui sortable celled unstackable table">
                <thead class="full-width">
                <tr class="center aligned">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody>
                <tr class="center aligned">
                    <td>John Lilki</td>
                    <td>September 14, 2013</td>
                    <td>jhlilk22@yahoo.com</td>
                    <td>No</td>
                    <td>No</td>
                    <td class="collapsing">
                        <div class="ui right floated small  labeled icon button-edit-user color_3  color_3 button">
                            <i class="edit icon"></i> Editar
                        </div>
                    </td>
                </tr>
                <tr class="center aligned">
                    <td>John Lilki</td>
                    <td>September 14, 2013</td>
                    <td>jhlilk22@yahoo.com</td>
                    <td>No</td>
                    <td>No</td>
                    <td class="collapsing">
                        <div class="ui right floated small  labeled icon button-edit-user color_3  color_3 button">
                            <i class="edit icon"></i> Editar
                        </div>
                    </td>
                </tr>
                <tr class="center aligned">
                    <td>John Lilki</td>
                    <td>September 14, 2013</td>
                    <td>jhlilk22@yahoo.com</td>
                    <td>No</td>
                    <td>No</td>
                    <td class="collapsing">
                        <div class="ui right floated small  labeled icon button-edit-user color_3  color_3 button">
                            <i class="edit icon"></i> Editar
                        </div>
                    </td>
                </tr>
                <tr class="center aligned">
                    <td>John Lilki</td>
                    <td>September 14, 2013</td>
                    <td>jhlilk22@yahoo.com</td>
                    <td>No</td>
                    <td>No</td>
                    <td class="collapsing">
                        <div class="ui right floated small  labeled icon button-edit-user color_3  color_3 button">
                            <i class="edit icon"></i> Editar
                        </div>
                    </td>
                </tr>
                <tr class="center aligned">
                    <td>John Lilki</td>
                    <td>September 14, 2013</td>
                    <td>jhlilk22@yahoo.com</td>
                    <td>No</td>
                    <td>No</td>
                    <td class="collapsing">
                        <div class="ui right floated small  labeled icon button-edit-user color_3  color_3 button">
                            <i class="edit icon"></i> Editar
                        </div>
                    </td>
                </tr>
                </tbody>
                <tfoot class="full-width">
                <tr>
                    <th colspan="5">
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
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

{{--User--}}
@include('modals.modalAddUser')
@include('modals.modalEditUser')