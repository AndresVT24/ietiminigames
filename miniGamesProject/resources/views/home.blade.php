@vite(['resources/css/app.css', 'resources/js/app.js'])
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
</head>

<div id="header">
  <script>
     var pagina = 'Menu de Juegos';
  </script>

<header-component></header-component>

</div>
<div id="home-page">
  <div class="minigame" id="minigame1">
    <a href="{{ route('game', ['game' => 'Memory']) }}"><div id="desc1" class="descriptionGame">
      <h1>Memory</h1>
      <p>Para jugar a este juego: Lorem ipsum aporic</p>
    </div></a>
  </div>
  <div class="minigame" id="minigame2">
    <a href=""><div id="desc1" class="descriptionGame">
    <p>Para jugar a este juego: Lorem ipsum aporic</p>
    </div></a>
  </div>
  <div class="minigame" id="minigame3">
    <a href=""><div id="desc1" class="descriptionGame">
    <p>Para jugar a este juego: Lorem ipsum aporic</p>
    </div></a>
  </div>

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
    display:grid;
    width:100%;
    height:100%;
    background-color:rgba(255, 255, 255, 0.6);
    border-radius:20px;
    color: black;
    text-align:center;
    align-items:center;
    justify-items:center;
    display:none;
  }
  a{
    text-decoration:none;
  }
</style>
<script>
  $(document).ready(function() {
  $("#minigame1").hover(
    function() {
      $("#desc1").slideDown("slow");
    },
    function() {
      $("#desc1").slideUp("slow");
    }
  );
});
</script>


