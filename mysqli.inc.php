<?php
//MOSTRAR ERRORES
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
//MOSTRAR ERRORES

//NO MOSTRAR ERRORES
error_reporting(0);
ini_set('display_errors', 0);
//NO MOSTRAR ERRORES

// Para funciones propias
$cfg_servidor="localhost";
$cfg_usuario="ventason_mercury_demo";
$cfg_password="12345678";
$cfg_basephp="ventason_mercury_demo";

$conexion = new mysqli($cfg_servidor,$cfg_usuario,$cfg_password,$cfg_basephp);

if ( $conexion->connect_error ) 
{ 
    die('Error de Conexion'. $conexion->connect_error);
}
else
{
    //echo 'Conexion OK';
}
// Para funciones propias

// DATAGRIDS

//configuraciones para cada cliente
$config["script_url"] = "https://www.ventason.com/mercury/datagrid/";
//$config["script_url"] = "http://localhost/mercury/datagrid/";
$config["downloadURL"] = $config["script_url"] . "script/downloads/";
$config["database"] = "ventason_mercury_demo";
$config["username"] = "ventason_mercury_demo";
$config["password"] = "12345678";
$config["lang"] = "es";
$config["viewbtn"] = false;
$config["csvBtn"] = false;
$config["printBtn"] = false;
$config["excelBtn"] = false;
$config["pdfBtn"] = false;
$config["clonebtn"] = true;
//$pdocrud->setSettings("clonebtn", true);
$config["required"]= false;
$config["deleteMultipleBtn"]= false;
$config["checkboxCol"] = false;
//$config["characterset"] = "utf8";
//$config["inlineEditbtn"] = true;

// DATAGRIDS     

//SELECTS CON BUSQUEDA
// Declaramos las credenciales de conexion
$server = "localhost";
$username = "ventason_mercury_demo";
$password = "12345678";
$dbname = "ventason_mercury_demo";

// Creamos la conexion MySQL
try{
	//Creamos la variable de conexión $b
   $db = new PDO("mysql:host=$server;dbname=$dbname","$username","$password");
   $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
   die('Error: No se puede conectar a MySQL');
}
//SELECTS CON BUSQUEDA

// Para Listas PHPMYADMIN
$cfg_usuario_listas="ventason_mercury_demo";
$cfg_password_listas="12345678";
// Para Listas PHPMYADMIN
?>