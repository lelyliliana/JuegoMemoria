<!DOCTYPE html>
<html>
<head>
	<title> Memoria </title>
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<script type="text/javascript" src="script.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body onload="inicializarComponentes()">

<header>
	<h1>MEMORIA</h1>
	<p>Ranking</p>
</header>
<div id="opciones">
	<ul>
		<a href="index.php"><li>inicio</li></a>
		<li class="actual">mundial</li>
		<a href="rankingLocal.php"><li>local</li></a>
	</ul>
</div>

<table id="puntuaciones">
	<th>Nombre</th>
	<th>Intentos</th>
	<th>Dificultad</th>
	<?php
		$nombreArchivo = "ranking.txt";
		$puntuaciones = [];
		try {
			$archivo = fopen($nombreArchivo, "r");
			while (!feof($archivo)){
				$linea = fgets($archivo);
				$linea = explode(" | ", $linea);
				array_push($puntuaciones, $linea);
			}
			array_pop($puntuaciones);
			fclose($archivo);
		}
		catch (Exception $e){
			alert("Ha surgido un error al cargar el ranking.");
		}

		for ($i=0; $i < sizeof($puntuaciones); $i++) { 
			$puntuacion[$i] = $puntuaciones[$i][1];
		}

		// Ordenar los datos con volumen descendiente, edicion ascendiente
		// Agregar $datos como el último parámetro, para ordenar por la llave común
		array_multisort($puntuacion, SORT_ASC, $puntuaciones);

		for ($i=0; $i < sizeof($puntuaciones); $i++) {
			echo "<tr class='seleccionable'>";
			echo "<td>".$puntuaciones[$i][0]."</td>";
			echo "<td>".$puntuaciones[$i][1]."</td>";
			echo "<td>".$puntuaciones[$i][2]."</td>";
			echo "</tr>";
		}
	?>
</table>
</body>
</html>
