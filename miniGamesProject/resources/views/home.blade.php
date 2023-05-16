@vite(['resources/css/app.css', 'resources/js/app.js'])
{{session(['nickname' => Auth::user()->nick_name]);}}
{{session(['idUser' => Auth::user()->id]);}}
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
</head>

<div id="header">
  <script>
     var pagina = 'Menu de Juegos';
     localStorage.setItem("usuario", '{{ session('nickname') }}');
     localStorage.setItem("id_usuario", '{{ session('idUser') }}');
  </script>

<header-component></header-component>

</div>
<div id="home-page">
  @foreach ($games as $game)
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
    width:100%;
    height:100%;
    background-color:rgba(255, 255, 255, 0.6);
    border-radius:20px;
    color: black;
    text-align:center;
    display:none;
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
    background-size:cover;
    background-position:center;
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
  });
</script>


