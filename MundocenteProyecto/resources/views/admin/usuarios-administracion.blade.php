@extends('main.main-admin')
@section('content_admin')

    @if(Auth::user()->rol=='admin')


        <div class="ui container admin-container">
            <h1 class="ui header center aligned">Administración De Usuarios</h1>
            <div class="ui stackable equal width padded grid container">
                <div class="row">
                    <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
                    {!!Form::open(['url'=>'usuarios-administrador-filtro' , 'method'=>'POST'])!!}

                    <div class="ui action input">
                        <input type="text" name="palabra" placeholder="Ingrese nombre o correo...">
                        <button class="ui color_2 button" type="submit">Buscar</button>
                    </div>
                    {!!Form::close()!!}
                </div>
                <div class="column">
                    <table class="ui sortable celled unstackable table">
                        <thead class="full-width">
                        <tr class="center aligned">

                            <th>Nombre</th>
                            <th>Nombre Usuairio</th>
                            <th>E-mail</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="center aligned" id="tr_edit_toggle_user_admin{{$user->id}}">
                                <td>
                                    <div class="ui message error" style="display: none;"
                                         id="id_messagge_edit_user_name_admin{{$user->id}}">
                                        <ul class="list">
                                            <li id="id_messagge_error_p_edit_user_admin_name{{$user->id}}"></li>
                                        </ul>
                                    </div>
                                    <input type="text" id="id_name_user_admin_edit{{$user->id}}" value="{{$user->name}}"
                                           style="border: none;">
                                </td>
                                <td>
                                    <input type="text" id="id_username_admin_edit{{$user->id}}"
                                           value="{{$user->last_name}}" style="border: none;" disabled="true">
                                </td>
                                <td>
                                    <div class="ui message error" style="display: none;"
                                         id="id_messagge_edit_user_email_admin{{$user->id}}">
                                        <ul class="list">
                                            <li id="id_messagge_error_p_edit_user_admin_email{{$user->id}}"></li>
                                        </ul>
                                    </div>
                                    <input type="text" id="id_email_admin_edit{{$user->id}}" value="{{$user->email}}"
                                           style="border: none;">
                                </td>
                                <td>
                                    <select class="ui dropdown" id="select_admin_edit_user_rol{{$user->id}}">
                                        @if($user->rol=='admin')
                                            <option value="admin" selected="true">Administrador</option>
                                            <option value="seeker">Publicador</option>
                                        @else
                                            <option value="admin">Administrador</option>
                                            <option value="seeker" selected="true">Publicador</option>
                                        @endif
                                    </select>
                                </td>
                                <td>
                                    <select class="ui dropdown" id="select_admin_edit_active{{$user->id}}">
                                        @if($user->state_user=='activo')
                                            <option value="activo" selected="true">Activo</option>
                                            <option value="inactivo">Inactivo</option>
                                        @else
                                            <option value="activo">Activo</option>
                                            <option value="inactivo" selected="true">Inactivo</option>
                                        @endif
                                    </select>
                                <td class="collapsing">
                                    <button class="ui right floated small  labeled icon button-edit-user color_3  color_3 button" onclick="ediituuuriuakkjkjsa({{$user->id}})"><i class="edit icon"></i> Editar</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div>{!!$users->render()!!}</div>
            <br>
            <br>
        </div>
    @else
        <div class="ui segment" style="margin-top: 100px;margin-bottom: 500px;">
            <h1 style="color: #B6B5B5;">No tiene permisos de administrador</h1>
        </div>

    @endif
    <script type="text/javascript">
        $('#admin_users_menu').addClass('active');
    </script>
@stop