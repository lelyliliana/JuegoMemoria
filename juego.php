<!DOCTYPE html>
<html>
<head>
	<title> Memoria </title>
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<script type="text/javascript" src="script.js"></script>
	<!--<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">-->
</head>
<body onload="inicializarComponentes()">

<?php
	session_start();
	$dificultad = $_POST["Dificultad"];
	$nombre = $_POST["Nombre"];
	if (!isset($_SESSION['barajar']) || $_SESSION['barajar'] == true || $_SESSION['nuevoUsuario'] == true) {
		$_SESSION['nuevoUsuario'] = false;
		$_SESSION['arrayCartas'] = [];
		$_SESSION['numeroCartas'] = pow($dificultad,2);
		for ($i=0; $i < $_SESSION['numeroCartas']/2; $i++) {
			// Se crean cartas duplicadas (parejas)
			array_push($_SESSION['arrayCartas'],"carta".$i);
			array_push($_SESSION['arrayCartas'],"carta".$i);
		}
		shuffle($_SESSION['arrayCartas']);
		// Se mezclan las cartas
	}
	$_SESSION['barajar'] = false;
	
?>

<header>
	<h1>MEMORIA</h1>
	<p>Parejas restantes: <span><?php echo pow($dificultad,2)/2 ?></span></p>
	<p>Intentos: <span>0</span></p>
	<p>Tiempo: <span>0</span></p>
	<p>Ayudas restantes: <span>3</span></p>
</header>
<div id="opciones">
	<ul>
		<li onclick="reiniciarPartida()">reiniciar</li>
		<li onclick="ayudaVisual()">ayuda</li>
		<a href="ranking.php"><li>ver ránking</li></a>
	</ul>
</div>

<div id="dialogoverlay"></div> 
<section>
	<table id="tabla">
	<?php
		for ($i=0; $i < $_SESSION['numeroCartas']; $i = $i+$dificultad) {
			// Número de filas que tendrá el tablero
			echo "<tr>";
			for ($y=0; $y < $dificultad; $y++) {
				// Número de cartas por cada fila
				// Se crean los divs con sus respectivos ID y sus backgrounds
				$num = $i + $y;
				echo "
				<td>
					<div id='".$_SESSION['arrayCartas'][$num]."' class='carta' onclick='girarCarta(event)'>
						<div class='flipper'>
							<div class='cara'></div>
							<div style='background-image: url(img/".$_SESSION['arrayCartas'][$num].".png)' class='dorso'></div>
						</div>
					</div>
				</td>";
			}	
			echo "</tr>";
		}
	?>
	</table>

	<!-- Componentes invisibles para realizar el Pop-up de WIN -->
	<div id="dialogbox">
		<div>
			<div id="dialogboxhead">¡EXCELENTE!</div>
			<div id="dialogboxbody"></div> 
			<div id="dialogboxfoot" onclick="guardarRanking('<?php echo $nombre ?>', '<?php echo $dificultad ?>')">ACEPTAR</div>
		</div>
	</div>

</section>

</body>
</html>
