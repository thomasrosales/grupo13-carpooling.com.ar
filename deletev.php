<?php
session_start();
if(!isset($_SESSION['email'])){
header("location: login.php");
}
 ?>
<html>
 <head>
 <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
 <link href="fonts/default.css" rel="stylesheet" type="text/css" media="all" />
 <title>Carpooling</title>
 <script type="text/javascript" src="functions/search.js"></script>
 </head>
 <body>
	<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="index.php">Carpooling</a></h1>
			<div id="menu">
				<ul>
					<li><a href="main.php" >Inicio</a></li>
					<li><a href="create.php" >Crear viaje</a></li>
					<li><a href="postulate.php" >Postularse</a></li>
					<li><a href="search.php" >Buscador</a></li>
					<li><a href="profile.php" >Mi perfil</a></li>
					<li><a href="bye.php" >Cerrar sesion</a></li>
				</ul>
			</div>
		</div>
	</div>
	</div>
	<div class="wrapper">
	<div id="three-column" class="container">
	<?php
	require_once 'conexionobject.php';
	$result;
	$conn = dbConnect();
	
	$sql = "SELECT * FROM vehiculos WHERE id = '$_POST[delv]'";
	
	$result = $conn->query($sql);
	$rows = $result->fetchAll();
	
	foreach ($rows as $row) {
		$viajes = $row['viajes'];
	}
	if ($viajes == 0) {
		$sql = "DELETE FROM vehiculos WHERE id = '$_POST[delv]'";
		$result = $conn->query($sql);
		?> <p><h1>Auto eliminado correctamente!</p></h1>
		<p><h2><a href="autos.php?">Listado de autos</p></h2>
		<?php
	}
	else{ ?>
		<p><h1>No se puede eliminar el vehiculo ya que tiene viajes activos</p></h1>
		<p><h2><a href="autos.php?">Listado de autos</p></h2>
		<?php
	}
	?>
		
	
	
	
		
		
		
	</div>
	</div>
	
	<div id="copyright" class="container">
	<p>&copy; Carpooling. All rights reserved. |  Design by Grupo 13.</p>
	<p><a href="contacto.php">Contacto</a> |  <a href="help.php">Ayuda</a></p>
	</div>
	
	
 </body>
</html>