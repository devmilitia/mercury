<?php
session_start();

if(!session_id()) session_start();
if(!session_id()) die("Fallo iniciando sesion");
if( !isset($_SESSION["admin"]) ){
	die("Variables de sesion invalidas.");
}

if( trim($_SESSION["admin"])=="" ){
	die("Variables de sesion invalidas.");
}
?>
<?php
require_once('../mysqli.inc.php');

$conexion = mysqli_connect($cfg_servidor,$cfg_usuario,$cfg_password,$cfg_basephp);
mysqli_set_charset($conexion,"utf8");

$id = $_POST['id_editor'];
$valor = base64_encode($_POST['campa']);
$valor2 = base64_encode($_POST['email']);

$sql = "UPDATE editores SET contenido_grapesjs='".$valor."', contenido_html='".$valor2."' WHERE id=".$id;

if (mysqli_query($conexion,$sql)) {	
	$datos["id"]=$conexion->insert_id;
	echo "<h1>Datos Guardados con exito.</h1>";
}
else{  
	echo "<h1>Error al guardar los datos.</h1>".mysqli_error($conexion);   
    exit();
	}
$conexion->close();
?>