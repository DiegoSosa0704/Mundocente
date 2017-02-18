@extends('main.main')

@section('content')


	
	<br>
	

    <!--Contenido-->
    <div class="pusher pusher-start" style="background-color: #EEEEEE;">
        <div class="ui container start-container">
            <div class="ui stackable grid">



            @include('details.lista-publicaciones')






            <div class="ui five wide column">
            <div class="ui card">
			  <div class="content">
			    <div class="header">{{Auth::user()->name}}</div>
			    

			    <div class="meta">
			      <span>{{Auth::user()->email}}</span>
			      
			    </div>
			    <br>
			    <span>Link de mi Currículo</span>
			    <a href="{{Auth::user()->curriculo_url}}">{{Auth::user()->curriculo_url}}</a>
			    <br>
			    <br>
			    <span>Nivel de formación</span>
			    <div class="meta">
			      <span>{{Auth::user()->nivel_formacion}}</span>
			      
			    </div>

			    <br>
			    

                                    
                                        <label><b>Estoy viculado en:</b></label>
                                        <div class="ui divided list " id="listadeinstitutosvinculados">
                                            @foreach($institucionesVinvulado as $institu)
                                                <div class="item" id="institutionList{{$institu->id_institution}}">
                                                    <div class="right floated content">
                                                        <a class="ui label button color_3"
                                                           onclick="delete_institution_vinul({{$institu->id_institution}})">Eliminar
                                                            <i class="trash icon"></i></a>
                                                    </div>
                                                    <div class="content">
                                                        {{$institu->name_institution}} -
                                                        ({{$institu->state_institution}})
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    
                 <br>
                 <br>
			    <a href="editando-perfil">Editar perfil</a>
			  </div>
			</div>
            </div>

            </div>

  	{!! $listPublications->render() !!}



        </div>
        
		<br>
        <br>
        <br>
        <br>
		  

    </div>



@include('details.detalles')


    <script type="text/javascript">
        $('.ui.sidebar')
            .sidebar('attach events', '.menu.fixed .launch.item')
        ;
        $('.ui.checkbox')
            .checkbox()
        ;
        $('#optionMainHome').addClass('active');
    </script>





@stop
