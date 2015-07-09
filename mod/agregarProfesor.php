<?php
    // Estudiante
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $cedula = $_POST["cedula"];




$link = mysql_connect('localhost','root','')
    or die ('no se pudo conectar' . mysql_error());
mysql_select_db('multimediosdb2')
    or die('no se pudo conectar con la base de datos');
// Inserción de datos en la tabla estudiante
    $consulta = "INSERT INTO multimediosdb2.Profesores (Cedula, Nombre, Apellido1, Apellido2)
    VALUES ('$cedula', '$nombre', '$apellido1','$apellido2');";
    $resultado = mysql_query($consulta) or die('Error en la consulta' . mysql_error());

?>
