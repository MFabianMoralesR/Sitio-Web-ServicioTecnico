<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="estilos.css" rel="stylesheet" type="text/css">
<title></title>
<link rel="stylesheet" type="text/css" href="../../css/estilo.css"/>
</head>
<body>
<?php
include "conexion.php";
	//Variables que vienen del formulario de actualización
	$idnotas = $_POST[ 'idnotas' ];
	
	
	
	$sql = "DELETE FROM notas WHERE idnotas='$idnotas';";
	
	$registros = mysqli_query($conexion,$sql );
	if( !$registros ){
		echo "Error al eliminar los datos del alumno";
		exit();
	} else {
		echo "
		<div id='textsesion' align='center'>
			REGISTRO CORRECTAMENTE ELIMINADO
		</div>";
        header("location: Tecnico2.php");
	}
	echo "
	<center>
		<a href='consultaalumnos.php' class='boton'>Consultar Alumnos &rarr;</a>
		</center>";
?>
</body>
</html>