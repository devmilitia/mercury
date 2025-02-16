<?php
//session_start();
error_reporting(0);
ini_set('display_errors', 0);

if(!session_id()) session_start();
if(!session_id()) die("Fallo iniciando sesion");
if( !isset($_SESSION["admin"]) ){
	//die("Variables de sesion invalidas.");
	header('Location: login_v8/index.php');
}

if( trim($_SESSION["admin"])=="" ){
	//die("Variables de sesion invalidas.");
	header('Location: login_v8/index.php');
}
?>
<?php
include_once("../../mysqli.inc.php");

$conexion=mysqli_connect($cfg_servidor,$cfg_usuario,$cfg_password,$cfg_basephp);

$datos =array(
    'nombre' => "imagen",
	'url' => $_POST["url"]
	);
	
$sql =sprintf(
    'INSERT INTO nube (%s) VALUES (\'%s\')',
    implode(',',array_keys($datos)),
    implode('\',\'',array_values($datos))
);

mysqli_set_charset($conexion,"utf8");

if (mysqli_query($conexion,$sql)) {	
	//$datos["id"]=$conexion->insert_id;
	//$datos["mensaje"]="datos guardados con exito.";
	//$datos["estado"] =true;
	//mysqli_query($conexion,$sql2);
	echo "<h1>Datos Guardados con exito</h1>"; 
	//echo json_encode($datos);
}
else{  
	echo "<h1>Error al guardar los datos.</h1>";  
    //echo mysqli_error($conexion);	
	//$datos["estado"] =false;
    exit();
	}
$conexion->close();
?>