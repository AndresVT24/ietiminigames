@vite(['resources/css/app.css', 'resources/js/app.js'])
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
</head>

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
        }
    ?>
 </div>

</div>
<div id="footer">
<footer-component></footer-component>

</div>

<style>

  #game-page{
    display:grid;
    grid-template-columns: 80px 1fr 80px;
    grid-template-rows: 80px auto 80px;
    background-color: #6CC4F5;
    min-height: 720px;
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
  #game{
     height: 100%;
    }
</style>
<script>
  window.csrfToken = "{{ csrf_token() }}";
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


