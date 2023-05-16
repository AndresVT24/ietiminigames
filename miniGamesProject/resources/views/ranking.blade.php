@vite(['resources/css/app.css', 'resources/js/app.js'])
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
</head>
<body>
@php
  $route = route('ranking', ['game' => session('game_id')]);
@endphp
<div id="header">
  <script>
     var pagina = "Ranking "+"<?php echo session('game_name') ?>";
  </script>

  <header-component></header-component>
</div>
<div id="ranking-page">
  <h1>Las 10 mejores partidas en <?php echo session('game_name') ?>!</h1>
  <div id="ranking">
    <div id="nombres">
      <h2>Usuarios</h2>
    </div>
    <div id="puntuaciones">
      <h2>Puntuaciones</h2>
    </div>
  </div>
</div>
<div id="footer">
<footer-component></footer-component>

</div>
</body>

<style>
  #ranking-page{
    display:grid;
    grid-template-columns: 1fr;
    grid-gap: 20px;
    grid-template-rows:75px 500px;
    padding: 70px;
    background-color: #6CC4F5;
    height: 650px;
    justify-items:center;
    margin-top:-80px;
  }

  #ranking{
    justify-items:center;
    display:grid;
    grid-template-columns: 1fr 20px 1fr;
    height:450px;
    width:50%;
    background-color:rgba(0,0,0,0.35);
    text-align:center;
    border:15px ridge black;
    border-radius:15px;
  }
  #nombres{
    grid-column:1;
  }
  #ranking-page h1{
    font-size:3rem;
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
  // hacer una petición AJAX a la ruta para obtener los datos del ranking
  $.get("{{$route}}", function(data) {
    // data será un arreglo JSON con los datos del ranking
    data.forEach(function(match) {
      // para cada partido, crear un div con los datos que deseas mostrar
      $($('#nombres').append($('<p>').text(match.user_name)));
      $($('#puntuaciones').append($('<p>').text(match.points)));
    });
  });
</script>


