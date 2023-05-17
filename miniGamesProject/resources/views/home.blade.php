@vite(['resources/css/app.css', 'resources/js/app.js'])
{{session(['nickname' => Auth::user()->nick_name]);}}
{{session(['idUser' => Auth::user()->id]);}}
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
</head>

<div id="header">
  <script>
     var pagina = 'Menú de Juegos';
     localStorage.setItem("usuario", '{{ session('nickname') }}');
     localStorage.setItem("id_usuario", '{{ session('idUser') }}');
  </script>

<header-component></header-component>

</div>
<div id="home-page">
  <div id="partidas-restantes">
    <h3></h3>
  </div>
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
<div id="footer">
<footer-component></footer-component>

</div>

<style>
  #home-page{
    display:grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-gap: 50px;
    grid-template-rows:250px 250px;
    padding: 70px;
    background-color: #6CC4F5;
    height: 650px;
  }
  .minigame{
    border:2px solid black;
    border-radius:20px;
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
    position: fixed;
    top: 14%;
    left: 50%;
    transform: translate(-50%, -50%);
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
  #home-page{
    margin-top:-80px;
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
        $('.minigame a').click(function(event){
          event.preventDefault();
        })
        if(data >= 5){
          $('.descriptionGame').css('backgroundColor','rgba(255, 0, 0, 0.9)')
          $('.descriptionGame div h1').text('No Disp.');
          $('.descriptionGame div p').text('Vaya... Parece ser que has llegado al límite de partidas diario, si quieres seguir jugando conviértete en VIP por tan solo 2€ y juega todas las partidas que quieras.');
        }
      }
      
    });
  });
</script>


