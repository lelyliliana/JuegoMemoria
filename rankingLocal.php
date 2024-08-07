<!DOCTYPE html>
<html>
<head>
	<title> Memoria </title>
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<script type="text/javascript" src="script.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>

<header>
	<h1>MEMORIA</h1>
	<p>Ranking</p>
</header>
<div id="opciones">
	<ul>
		<a href="index.php"><li>inicio</li></a>
		<a href="ranking.php"><li>mundial</li></a>
		<li class="actual">local</li>
	</ul>
</div>

<table id="puntuaciones">
	<th>Nombre</th>
	<th>Intentos</th>
	<th>Dificultad</th>
	<?php
		session_start();
		if (sizeof($_SESSION['puntuacionesLocales'])==0) {
			echo "<tr class='seleccionable'>";
				echo "<td style='width: 28em;' colspan='3'>No se han encontrado puntuaciones</td>";
			echo "</tr>";
		}

		else {
			for ($i=0; $i < sizeof($_SESSION['puntuacionesLocales']); $i++) { 
				$puntuacion[$i] = $_SESSION['puntuacionesLocales'][$i][1];
			}
			array_multisort($puntuacion, SORT_ASC, $_SESSION['puntuacionesLocales']);
			for ($i=0; $i < sizeof($_SESSION['puntuacionesLocales']); $i++) {
				echo "<tr class='seleccionable'>";
					echo "<td>".$_SESSION['puntuacionesLocales'][$i][0]."</td>";
					echo "<td>".$_SESSION['puntuacionesLocales'][$i][1]."</td>";
					echo "<td>".$_SESSION['puntuacionesLocales'][$i][2]."</td>";
				echo "</tr>";
			}
		}
		
	?>
</table>
</body>
</html>
