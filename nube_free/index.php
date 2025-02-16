<?php
session_start();

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
<html>
<head>
<style>
img {
    width: 100%;
    height: auto;
}
</style>
</head>
<body>
<object data="api_imgur" type="text/html" style="width:100%;height:40px;"></object>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<?php
require_once '../datagrid/script/pdocrud.php';
//Conexión a la base de datos y configuraciones
include_once('../mysqli.inc.php');
 
date_default_timezone_set('America/Bogota');

$config["addbtn"] = true;
$config["editbtn"] = true;
$config["viewbtn"] = true;

$pdocrud = new PDOCrud();

$pdocrud->tableHeading("Nube Free Imgur API");
$pdocrud->crudTableCol(array("id","nombre","url"));
$pdocrud->setPortfolioColumn(4);// set no. of columns in one row. Possible values are 1,2,3,4,6
$pdocrud->recordsPerPage(8);
$pdocrud->tableColFormatting("url", "image" , array("width" =>"200px","height"=>'200px'));

echo $pdocrud->dbTable("nube")->render();
?>