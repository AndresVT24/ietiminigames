@extends('base')
@section('title', 'Perfil')

@section('content')
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

<style>
  #home-page{
    display:grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-gap: 50px;
    grid-template-rows:250px 250px;
    padding: 70px;
    background-color: #6CC4F5;
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
  #minigame1{
    background-image: url('/img/memoryGame.jpg');
    background-size:cover;
    background-position:center;
  }
</style>
<script>
  $(document).ready(function() {
    $("#titulo").text("MENU PRINCIPAL")

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
@endsection