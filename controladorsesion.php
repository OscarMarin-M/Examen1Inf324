  
<?php
session_start();
if (isset($_SESSION['usuario'])) {
	header('Location: verifica.php');
}

include "conexion.php";  
$nombre=$_GET["usuario"];
$contra=$_GET["clave"];

$mensaje='';
$archivo='';
if (!empty($nombre)&&!empty($contra)) {
	$sql="SELECT usuario,clave FROM usuario WHERE usuario like '$nombre' and clave like '$contra'";

	$result=mysqli_query($conn,$sql);
	$fila=mysqli_fetch_array($result);


	if(!empty($fila)&&$fila[0]==$nombre&&$fila[1]==$contra){

		$_SESSION['usuario']=$nombre;
		header('Location: verifica.php');
	}else{
		$mensaje.='<li>No se registro</li>';

	}
}else{
	$mensaje.='<li>No lleno todos los Datos</li>';}
	
	include "iniciasesion.php";
	?>