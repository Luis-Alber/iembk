<?php
    include ("../class/conexion.php"); 
    include ("../inc/header.php"); 
    $codigo = $_POST['codigo']; 
    mysql_select_db($db,$this->conexion) or die ("Error en la conexion de base de datos");
    $registros = mysql_query("SELECT * FROM datos WHERE mantenimiento = '$id'");
    while ($registro = mysql_fetch_array($registros)){
        echo $registro['id']." ".$registro['nombre']." ".$registro['marca']." ".$registro['modelo']." ".$registro['ubicacion']." ".$registro['fecha']; 
    }
?>
 