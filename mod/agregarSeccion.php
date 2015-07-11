<?php
$idNivel = $_POST["niveles"];
$seccion = $_POST["seccion"];

$conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());
            $consultaInsertarSeccion = "INSERT INTO multimediosdb2.Secciones(Seccion_Numero, Niveles_Id)
            VALUES('$seccion', '$idNivel')";
            mysqli_query($conn, $consultaInsertarSeccion) or die('Error en la consulta' . mysql_error());
?>
