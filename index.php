<!DOCTYPE html>
<html>
<head>
	<title> Memoria </title>
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<script src="script.js" type="text/javascript"></script>
</head>
<body>

	<?php
		session_start();
		$_SESSION['nuevoUsuario'] = true;
		if (!isset($_SESSION['puntuacionesLocales'])) {
			$_SESSION['puntuacionesLocales'] = [];
		}
	?>

	<h1 id="tituloPortada">MEMORIA</h1>

	<form action="juego.php" id="formulario" method="POST">

		<div id="inputs">
			<output id="outputNombre">Nombre</output>
			<input id="inputNombre" type="text" name="Nombre"/>
			<output>Selecciona la dificultad del juego</output>
			<select name="Dificultad">
				<option value="2">2x2</option>
				<option value="4">4x4</option>
				<option value="6">6x6</option>
				<option value="8">8x8</option>
			</select>
		</div>
		<input onclick="comprobacionNombre()" id="botonAceptar" value="EMPIEZA" name="Empieza"/>
	</form>

</body>
</html>
