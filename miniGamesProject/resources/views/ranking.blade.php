@extends('base')
@section('title', 'Ranking')

@section('content')

@if(Auth::user()->status != 0)
@php
  $route = route('ranking', ['game' => session('game_id')]);
@endphp
<div id="ranking-page">
  <h1 class="ml-2 text-2xl  md:text-3xl lg:text-4xl font-bold">¡Las 10 mejores partidas en <?php echo session('game_name') ?>!</h1>
  <div id="ranking">
    <div id="nombres">
      <h2 class="ml-2 text-2xl font-bold border-b">Usuarios</h2>
    </div>
    <div id="puntuaciones">
      <h2 class="ml-2 text-2xl font-bold border-b">Puntuaciones</h2>
    </div>
  </div>
</div>
@else
<div id="bannedUser">
<h1>Usuario Baneado</h1>
<p>Tu usuario esta baneado, si quieres contactar con nosotros envia un correo a <strong>adminietigmaes@gmail.com</strong></p>
</div>
@endif
</body>

<style>
  body{
    background-color: #6CC4F5;
  }
  html{
    background-color: #6CC4F5;
  }
  #ranking-page{
    display:grid;
    grid-template-columns: 1fr;
    grid-template-rows:75px auto;
    background-color: #6CC4F5;
    justify-items:center;
  }

  #ranking{
    justify-items:center;
    display:grid;
    grid-template-columns: 1fr 20px 1fr;
    min-height: 450px;
    width:50%;
    background-color:rgba(0,0,0,0.35);
    text-align:center;
    border:15px ridge black;
    border-radius:15px;
    padding:20px;
  }
  #nombres{
    grid-column:1;
  }
  #ranking-page h1{
    font-size:3rem;
    margin-top: 20px;
  }
  #nombres h2{
    font-size:2rem;
    padding:20px;
  }
  #nombres p{
    font-size:1.8rem;
  }
  #puntuaciones{
    grid-column:3;
  }
  #puntuaciones h2{
    font-size:2rem;
    padding:20px;
  }
  #puntuaciones p{
    font-size:1.8rem;
  }


 
</style>
<script>
  $(document).ready(function (){
    $("#titulo").text("RANKING")

    // hacer una petición AJAX a la ruta para obtener los datos del ranking
    $.get("{{$route}}", function(data) {
      // data será un arreglo JSON con los datos del ranking
      data.forEach(function(match) {
        // para cada partido, crear un div con los datos que deseas mostrar
        $($('#nombres').append($('<p>').text(match.user_name)));
        $($('#puntuaciones').append($('<p>').text(match.points)));
      });
    });
  })
</script>
@endsection