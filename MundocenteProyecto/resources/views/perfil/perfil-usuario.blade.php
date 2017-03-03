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
              <p></p>
            @foreach($user_perfil as $user_peril)

              <img class="ui aligned centered small circular image" src="{{$user_peril->photo_url}}">
                                        <br>
                                         <br>
                                         <br>
			    <div class="header">{{$user_peril->name}}</div>
			    

			    <div class="meta">
			      <span>{{$user_peril->email}}</span>
			      
			    </div>
			    <br>
			    <span>Link de mi Currículo</span>
			    <a href="{{$user_peril->curriculo_url}}">{{$user_peril->curriculo_url}}</a>
			    <br>
			    <br>
			    <span>Nivel de formación</span>
			    <div class="meta">
			      <span>{{$user_peril->nivel_formacion}}</span>
			      
			    </div>
                @endforeach


			    <br>
			    

                                    
                                        <label><b>Estoy viculado en:</b></label>
                                        <div class="ui divided list " id="listadeinstitutosvinculados">
                                            @foreach($institucionesVinvulado as $institu)
                                                <div class="item" id="institutionList{{$institu->id_institution}}">
                                                    
                                                    <div class="content">
                                                        {{$institu->name_institution}} -
                                                        ({{$institu->state_institution}})
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    
                 <br>
                 <br>
			    
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
