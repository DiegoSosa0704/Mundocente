@extends('main.main-admin')
@section('content_admin')



@if(Auth::user()->rol=='admin')

<div class="ui">
<br>
<br>
<br>
    <h1 class="ui header center aligned">Administración De Publicaciones</h1>
    <div class="ui stackable equal width padded grid container">
       <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
        <div class="row">
            

            
            <div class="right floated column">
                <a class="ui right floated  labeled icon button-publication blue button" target="_black" href="publicar-convocatoria" >
                    <i class="add icon"></i> Nueva convocatoria
                </a>
            </div>

            <div class="right floated column">
                <a class="ui right floated  labeled icon button-publication red button" target="_black" href="publicar-evento" >
                    <i class="add icon"></i> Nuevo evento
                </a>
            </div>

            <div class="right floated column">
                <a class="ui right floated  labeled icon button-publication green button" target="_black" href="publicar-revista" >
                    <i class="add icon"></i> Nueva Revista
                </a>
            </div>
            
             <div class="right floated column">
                <a class="ui right floated  labeled icon button-publication orange button" target="_black" href="publicar-solicitud" >
                    <i class="add icon"></i> Nueva solicitud
                </a>
            </div>

            
        </div>

        <div class="column">
        <div class="left floated column">
            {!!Form::open(['url'=>'publicaciones-administrador-filtro' , 'method'=>'POST'])!!}
            
             <div class="ui action input">
                    <input type="text" name="palabra" placeholder="Ingrese título...">
                    <button class="ui color_2 button" type="submit">Buscar</button>
                </div>
            {!!Form::close()!!}
               
            </div>
            <br>
            
            <div class="ui tab active" data-tab="publication" >
                <table class="ui sortable celled unstackable table">
                    <thead class="full-width">
                    <tr class="center aligned">
                        <th>Tipo</th>
                        <th>Nombre publicador</th>
                        <th>E-Mail Publicador</th>
                        <th>Título</th>
                        <th>Sector</th>
                        <th>Institución</th>
                        <th>Publicación</th>
                        <th>Usuario</th>
                        <th>Editar</th>
                    </tr>
                    <tr class="center aligned">
                    </tr>
                    </thead>


                    <tbody>
                    
                    @foreach($publication_recomendation as $publicacion)
                        <tr class="center aligned">
                            <td>{{$publicacion->name_theme_notifications}}</td>
                            <td>{{$publicacion->name}}</td>
                            <td>{{$publicacion->email}}</td>
                            <td>{{$publicacion->title_publication}}</td>
                            <td>{{$publicacion->sector_publication}}</td>
                            <td>{{$publicacion->name_institution}}</td>
                            <td class="collapsing">
                                  @if($publicacion->state_publication=='activo')
                                <button class="ui right floated small  labeled icon green button" id="id_button_publication_publication{{$publicacion->id_publication}}" onclick="publisdsjhjshdjshds({{$publicacion->id_publication}})">
                                <i class="write icon"></i> <p id="id_active_edit_mensagge_publica_publica{{$publicacion->id_publication}}">Activo</p>
                                </button>
                                @else
                                <button class="ui right floated small  labeled icon red button" id="id_button_publication_publication{{$publicacion->id_publication}}" onclick="publjsdjshdjshd({{$publicacion->id_publication}})">
                                <i class="write icon"></i> <p id="id_active_edit_mensagge_publica_publica{{$publicacion->id_publication}}">Inactivo</p>
                                </button>
                                @endif
                            </td>
                             <td class="collapsing">
                                
                                @if($publicacion->state_user=='activo')
                                <button class="ui right floated small  labeled icon green button" id="id_button_publication{{$publicacion->id_publication}}" onclick="usersoeppsoasiistteyrss({{$publicacion->id_user_fk}}, {{$publicacion->id_publication}})">
                                <i class="user icon"></i> <p id="id_active_edit_mensagge_publica{{$publicacion->id_publication}}">Activo</p>
                                </button>
                                @else
                                <button class="ui right floated small  labeled icon red button" id="id_button_publication{{$publicacion->id_publication}}" onclick="usersoeppsoasi({{$publicacion->id_user_fk}}, {{$publicacion->id_publication}})">
                                <i class="user icon"></i> <p id="id_active_edit_mensagge_publica{{$publicacion->id_publication}}">Inactivo</p>
                                </button>
                                @endif
                                    
                                
                            </td>
                            <td class="collapsing">
                                 @if($publicacion->id_type_publication==1)
{!!Form::open(['url'=>'editar-convocatoria' , 'method'=>'POST'])!!}
<input type="hidden" name="id_convocatoria_edit" value="{{$publicacion->id_publication}}">
<button target="_black" type="submit" class="ui basic button" style="float: right;">Editar <i class="edit icon"> </i> </button>
{!!Form::close()!!}
@elseif($publicacion->id_type_publication==2)
{!!Form::open(['url'=>'editar-revista' , 'method'=>'POST'])!!}
<input type="hidden" name="id_revista_edit" value="{{$publicacion->id_publication}}">
<button target="_black" type="submit" class="ui basic button" style="float: right;">Editar <i class="edit icon"> </i> </button>
{!!Form::close()!!}
@elseif($publicacion->id_type_publication==3)
{!!Form::open(['url'=>'editar-evento' , 'method'=>'POST'])!!}
<input type="hidden" name="id_event_edit" value="{{$publicacion->id_publication}}">
<button target="_black" type="submit" class="ui basic button" style="float: right;">Editar <i class="edit icon"> </i> </button>
{!!Form::close()!!}
@else
{!!Form::open(['url'=>'editar-solicitud' , 'method'=>'POST'])!!}
<input type="hidden" name="id_request_edit" value="{{$publicacion->id_publication}}">
<button target="_black" type="submit" class="ui basic button" style="float: right;">Editar <i class="edit icon"> </i> </button>
{!!Form::close()!!}
@endif
                            </td>
                        </tr>
                    @endforeach               
                    </tbody>
                </table>
            </div>



        </div>
    </div>
    <div>{!!$publication_recomendation->render()!!}</div>
    <br>
    <br>
    <br>
    <br>
</div>

{{--Publicaciones--}}




@else

<div class="ui segment" style="margin-top: 100px;margin-bottom: 500px;">
    <h1 style="color: #B6B5B5;">No tiene permisos de administrador</h1>
</div>

@endif



<script type="text/javascript">
    $('#admin_publicacions_menu').addClass('active');
</script>

@stop