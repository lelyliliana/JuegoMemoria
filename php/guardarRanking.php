<?php
	// RANKING MUNDIAL
	$nombreArchivo = "../ranking.txt";
	$nombre = $_GET['nombre'];
	$dificultad = $_GET['dificultad'];
	$intentos = $_GET['intentos'];
	try {
		$archivo = fopen($nombreArchivo, "a");
		fwrite($archivo, "$nombre | $intentos | $dificultad\n");
		fclose($archivo);
	}
	catch (Exception $e){
		alert("Ha surgido un error al guardar tus datos.");
	}

	// RANKING LOCAL
	session_start();
	if (is_null($_SESSION['puntuacionesLocales'])) {
		$_SESSION['puntuacionesLocales'] = [];
	}
	$puntuacion = array(
		0 => $nombre,
		1 => $intentos,
		2 => $dificultad);
	array_push($_SESSION['puntuacionesLocales'], $puntuacion);
?>