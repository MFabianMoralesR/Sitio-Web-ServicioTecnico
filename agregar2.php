<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Untitled Document</title>

</head>
<body>
<?php

session_start();
$id_notas=$_POST['id_notas'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];
$equipo=$_POST['equipo'];
$descripcion=$_POST['descripcion'];
$fecha=$_POST['fecha'];
$status=$_POST['estatus'];

include("conexion.php");

$sql= " INSERT INTO notas (idnotas,nombre,apellido,telefono,equipo,descripcion,fecha,estatus) VALUES ('$id_notas','$nombre','$apellido','$telefono','$equipo','$descripcion','$fecha','$status')";

if(mysqli_query( $conexion,$sql))
 {
    echo "New record created successfully" ;
    header("location: Tecnico2.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}
mysqli_close($conexion);
?>

