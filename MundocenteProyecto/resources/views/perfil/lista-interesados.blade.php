@extends('main.main')

@section('content')

<br>
<br>
<br>
<br>

 <!--Contenido-->
    <div class="pusher pusher-start" style="background-color: #EEEEEE;">
        <div class="ui container start-container">


        <h2>Interesados en mis publicaciones</h2>

				<div class="ui list">

				@foreach($lista_interesados as $usersInterest)
					  <div class="item">
					    <a href="{{$usersInterest->last_name}}"><img class="ui avatar image" src="{{$usersInterest->photo_url}}"></a>
					    <div class="content">
					         <a class="header" type="submit" href="{{$usersInterest->last_name}}" >A {{$usersInterest->name}}</a>
					      <div class="description">Le interesó la publicación: <a><b>{{$usersInterest->title_publication}}</b></a></div>
					    </div>
					  </div>
					  <br>
				@endforeach

				</div>


				 {!! $lista_interesados->render() !!}
        </div>



<br>
<br>
<br>
<br>
<br>
        <div class="ui container start-container">


        <h2>Mis publicaciones denunciadas</h2>

				<div class="ui list">

				@foreach($lista_denuncias as $usersInterest)
					  <div class="item">
					   <a href="{{$usersInterest->last_name}}"> <img class="ui avatar image" src="{{$usersInterest->photo_url}}"></a>
					    <div class="content">
					      <a class="header"  href="{{$usersInterest->last_name}}">{{$usersInterest->name}}</a>
					      <div class="description">Ha denunciado la publicación: <a><b>{{$usersInterest->title_publication}}</b></a></div>
					    </div>
					  </div>
				@endforeach

				</div>


				 {!! $lista_denuncias->render() !!}
        </div>


    </div>



@stop