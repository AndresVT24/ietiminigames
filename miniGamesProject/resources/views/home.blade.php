@extends('base')
@section('title', 'Perfil')

@section('content')
{{session(['nickname' => Auth::user()->nick_name]);}}
{{session(['rol' => Auth::user()->rol]);}}
{{session(['idUser' => Auth::user()->id]);}}
@if(Auth::user()->status != 0)
<div id="partidas-restantes">
    <h3></h3>
</div>
<div id="home-page">
  @foreach ($games as $game)
    @if ($game->status == 1)
    <div class="minigame" id="minigame{{ $game->id }}">
      <a href="{{ route('game', ['game' => $game->id]) }}">
        <div class="descriptionGame"  id="desc{{ $game->id }}">
          <div>
            <h1>{{ $game->name }}</h1>
            <p>{{ $game->description }}</p>
          </div>
        </div>
      </a>
    </div>
    @else
    <div class="minigame" id="minigame{{ $game->id }}">
      <a>
        <div class="descriptionGame infoDescription"  id="desc{{ $game->id }}">
          <div>
            <h1>Juego en mantenimiento</h1>
            <p>Este juego esta actualmente fuera de servicio ya que esta en mantenimiento, prueba en otro momento.</p>
          </div>
        </div>
      </a>
    </div>
    @endif
  @endforeach
</div>
@else
<div id="bannedUser">
  <h1>Usuario Baneado</h1>
  <p>Tu usuario está baneado, si quieres contactar con nosotros envía un correo a <strong>adminietigmaes@gmail.com</strong></p>
</div>
@endif
<style>

  body{
    background-color: #6CC4F5;
  }
  
  #home-page{
    display:grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-gap: 50px;
    grid-template-rows: 250px 250px;
    padding: 0 70px;
    margin-top:20px
  }
  .minigame{
    border:2px solid black;
    border-radius:20px;
    grid-row:1;
  }
  .descriptionGame{
    font-size:calc(0.5rem + 0.7vw);
    font-weight:bolder;
    width:100%;
    height:100%;
    background-color:rgba(255, 255, 255, 0.9);
    border-radius:20px;
    color: black;
    text-align:center;
    display:none;
  }
  .infoDescription{
    background-color:rgba(0, 170, 255, 0.9);
  }
  .descriptionGame p{
    padding:20px;
  }
  #partidas-restantes{
    display: flex;
    justify-content: center;
    background-color: white;
    margin: 20px 40%;
    border-radius: 10px 0;
  }
  #partidas-restantes h3{
    font-size: calc(0.8rem + 0.7vw);
  }
  .descriptionGame div{
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-content:center;
    height:100%;
  }
  a{
    text-decoration:none;
  }
  #minigame1{
    background-image: url('/img/memoryGame.jpg');
    background-size: contain; /* Ajusta la imagen para que cubra todo el contenedor */
    background-position: center; /* Centra la imagen en el contenedor */
    background-repeat: no-repeat; /* Evita que la imagen se repita */
    background-color:antiquewhite;
  }
  #minigame2 {
  background-image: url('/img/mindBreakerGame.jpg');
  background-size: contain; /* Ajusta la imagen para que cubra todo el contenedor */
  background-position: center; /* Centra la imagen en el contenedor */
  background-repeat: no-repeat; /* Evita que la imagen se repita */
  background-color:antiquewhite;

}
</style>
<script>
  $(document).ready(function() {
    $("#titulo").text("MENÚ PRINCIPAL")

    $(".minigame").hover(
      function() {
        $(this).find(".descriptionGame").slideDown("slow");
      },
      function() {
        $(this).find(".descriptionGame").slideUp("slow");
      }
    );

    // hacer una petición AJAX a la ruta para obtener los datos del ranking
    $.get("/countTodayMatches", function(data) {
      // data será un arreglo JSON con los datos del ranking
      if(data == -1){
        $('#partidas-restantes').css('display','none')
      }else{
        $('#partidas-restantes h3').text('Partidas Jugadas: '+data+'/5')

        if(data >= 5){
          $('.minigame a').click(function(event){
          event.preventDefault();
        })
          $('.descriptionGame').css('backgroundColor','rgba(255, 0, 0, 0.9)')
          $('.descriptionGame div h1').text('No Disp.');
          $('.descriptionGame div p').text('Vaya... Parece ser que has llegado al límite de partidas diario, si quieres seguir jugando conviértete en VIP por tan solo 2€ y juega todas las partidas que quieras.');
        }
      }
      
    });
  });
</script>
@endsection