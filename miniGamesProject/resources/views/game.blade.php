@vite(['resources/css/app.css', 'resources/js/app.js'])
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
</head>
<body>
@php
  $countMatches = route('ranking');
@endphp
<div id="header">
  <script>
     var pagina = "<?php echo session('game_name') ?>";
  </script>

<header-component></header-component>

</div>
<div id="game-page">
 <div id="game-screen">
    <?php
        if(session('game_name') == "Memory"){
            ?>
            <div id="game">
            <memory-component></memory-component>
            </div>
        <?php
        }else if(session('game_name') == "MindBreaker"){
          ?>
            <div id="game2">
              <mind-breaker-component></mind-breaker-component>
            </div>
          <?php
        }
    ?>
 </div>
 <div id="losed-game">
    <div id="finish-screen">
        <p id="puntuacion-final">Puntuacion final: </p>
        <p id="partidas-restantes"></p>
        <a id="boton-siguiente-pagina" onclick="goToRanking()">Mostrar rankings</a>
        <a id="boton-menu-inicial" href="/home">Menú inicial</a>
        <a id="boton-volvera-jugar" href="">Volver a Jugar</a>
    </div>
  </div>
</div>

<div id="footer">
<footer-component></footer-component>

</div>
</body>

<style>
  #finish-screen{
    background-color: #ffffffb3;
    width: 45%;
    height: 30vh;
    margin: 30vh auto;
    border: 5px solid black;
    border-radius: 20px;
    display: grid;
    grid-template-rows: 30% 15% 25% 30%;
    grid-template-columns: 1fr 1fr 1fr;
    column-gap:40px;
    padding:40px;
  }

  #finish-screen a{
    text-align: center;
    width: 80%;
    height: min-content;
    font-size: 19px;
    padding: 10px;
    margin: 0 auto;
    background-color: #1b7d8b;
    border-radius: 10px;
    grid-row: 4;
    border: 2px solid black;
    cursor: pointer;
    margin:auto 0;
    text-decoration:none;
    color: black;
  }

  #finish-screen a:hover{
    background-color: #175e68;
  }
  #boton-volvera-jugar{
    grid-column: 2;
  }

  #boton-siguiente-pagina{
      grid-column: 3;
  }
  #puntuacion-final{
    grid-row:2;
    grid-column:1/4;
    text-align: center;
    font-weight:bolder;
    margin:auto 0;
    font-size:30px;
  }

  #partidas-restantes{
    font-weight:bolder;
    font-size:20px;
    grid-column:1/4;
  }

  #container-footer{
    z-index: -1;
  }
  #game-page{
    display:grid;
    grid-template-columns: 80px 1fr 80px;
    grid-template-rows: 80px auto 80px;
    background-color: #6CC4F5;
    min-height: 730px;
    margin-top: -80px;
  }
  #game-screen{
    grid-row:2;
    grid-column:2;
    border:15px ridge black;
    border-radius:15px;
    height:95%;
    width:75%;
    align-self:center;
    justify-self:center;
  }
  #losed-game{
    background-color: rgba(0,0,0,0.9);
    position: absolute;
    top: 0;
    left: 0;
    width:100%;
    height:100vh;
    box-sizing:border-box;
    display: none;
  }
  #game{
     height: 100%;
    }
</style>
<script>
  function goToRanking(){
    window.location.href = '/ranking/'+pagina;
  }
  window.csrfToken = "{{ csrf_token() }}";
  function lose_game() {
    $('#losed-game').css({
      display: "block"
    });
  }
  
  $(document).ready(function() {
    
  $("#minigame1").hover(
    function() {
      $("#desc1").slideDown("slow");
    },
    function() {
      $("#desc1").slideUp("slow");
    }
  );
  // hacer una petición AJAX a la ruta para obtener los datos del ranking
  $.get("/countTodayMatches", function(data) {
    // data será un arreglo JSON con los datos del ranking
    if(data == -1){
      $('#partidas-restantes').css('display','none')
    }else{
      let partidasActuales = data+1
      if(partidasActuales == 5){
        $('#partidas-restantes').text('Partidas Jugadas: '+partidasActuales+'/5')
        $('#boton-volvera-jugar').css('display','none')
      }else if(partidasActuales > 5){
        window.location.href = "/home";
      }
      $('#partidas-restantes').text('Partidas Jugadas: '+partidasActuales+'/5')
    }
    
  });
});

</script>


