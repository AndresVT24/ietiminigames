<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
		@vite(['resources/css/app.css', 'resources/js/app.js'])
		<link href='https://fonts.googleapis.com/css?family=Caesar+Dressing' rel='stylesheet' type='text/css'>
		<title>@yield('title')</title>
	</head>
	<body style="background-color: #22d3ee ; background-size: cover; background-position: center;">
		<header class="bg-blue-500 text-white py-4" style="background-color: #1C8E8A;" id="header">
			<header-component></header-component>
		</header>
		<!-- Aquí puedes incluir la navegación, encabezado, pie de página, etc. -->
		
		<!-- Contenido dinámico de la página -->
		@yield('content')
		<footer id="footer">
			<footer-component></footer-component>
		</footer>
		
		<!-- Aquí puedes incluir tus scripts JavaScript -->
		<script>
			$(document).ready(function (){
				var nickName= "{{ Auth::user() -> nick_name }}"
				var rol= "{{ Auth::user() -> rol }}"
				$("#nickUser").text(nickName)

				if (rol == 1 ||rol == 2){
					$(".imgUser").attr("src", "/img/avatarPre.webp")
				}
				else{
					$(".imgUser").attr("src", "/img/avatar.avif")
				}
			})
		</script>
		<style>
			#bannedUser{
				width: 100% !important;
				background-color: rgba(0, 0, 0, 0.6) !important;
				height: 70vh !important;
				display: flex !important;
				justify-content: center !important;
				align-items: center !important;
				flex-direction:column
			}

			#bannedUser h1{
				font-size: revert;
    			font-weight: 700;
			}
		</style>
	</body>
</html>