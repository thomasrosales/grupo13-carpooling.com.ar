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
	
	
	$sql = "SELECT * FROM usuarios WHERE email = '$_SESSION[email]'";
	
	$result = $conn->query($sql);
	$rows = $result->fetchAll();
	
	foreach ($rows as $row) {
	$ruta = $row['foto'];
	$nom = $row['nombre'];
	$ape = $row['apellido'];
	$email = $row['email'];
	$repu = $row['repu'];
	$id = $row['idu'];
	}
	
?>
	<p><div>
		<img src="img/<?php echo $ruta; ?>" alt="" width="200" height="200"/>
	</div></p>
	
	<form action="mod.php" method="post">
	<p><h3>Nombre : <input type="text" name="nombre" id="nombre" value="<?php echo $nom?>"/></h4></p>
	<p><h3>Apellido : <input type="text" name="apellido" id="apellido" value="<?php echo $ape;?>"/></h4></p>
	<input type="hidden" name="idu" id="idu" value=" <?php echo $id; ?>"/>
	<input type="submit" value="Modificar datos"/>
	</form>
	
	
	

</div>
	</div>
	
	<div id="copyright" class="container">
	<p>&copy; Carpooling. All rights reserved. |  Design by Grupo 13.</p>
	<p><a href="contacto.php">Contacto</a> |  <a href="help.php">Ayuda</a></p>
	</div>
	
 </body>
</html>
