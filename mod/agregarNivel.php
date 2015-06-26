<?php
    $descripcion = $_POST["descripcion"];


$link = mysql_connect('localhost','root','')
    or die ('no se pudo conectar' . mysql_error());
mysql_select_db('proyectomultimedios')
    or die('no se pudo conectar con la base de datos');

$agregarNivel = "INSERT INTO multimediosdb2.Niveles (Descripcion)
VALUES ('$descripcion')";
mysql_query($agregarNivel);
mysql_query($agregarNivel) or die("Error insertanto nivel " . mysql_error());
?>
