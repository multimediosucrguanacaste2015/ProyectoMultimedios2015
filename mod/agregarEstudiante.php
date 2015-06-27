<?php
    // Estudiante
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $fechaNaciminento = $_POST["fechaNacimiento"];
    $carnet = $_POST["carnet"];
    $telefono = $_POST["telefono"];
    $sexo = $_POST["sexo"];
    $direccion = $_POST["direccion"];



$link = mysql_connect('localhost','root','')
    or die ('no se pudo conectar' . mysql_error());
mysql_select_db('multimediosdb2')
    or die('no se pudo conectar con la base de datos');
// Inserción de datos en la tabla estudiante
    $consulta = "INSERT INTO multimediosdb2.Estudiantes (Carnet, Nombre, Apellido1, Apellido2, FechaNacimiento, Sexo, Telefono, Direccion)
    VALUES ('$carnet', '$nombre', '$apellido1','$apellido2', '$fechaNaciminento', '$sexo', '$telefono', '$direccion');";
    $resultado = mysql_query($consulta) or die('Error en la consulta' . mysql_error());

?>
