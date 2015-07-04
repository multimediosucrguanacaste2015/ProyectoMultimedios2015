<?php
$idEstudiante = $_POST["idEstudiante"];
$nombrePadre = $_POST["nombre"];
$apellido1 = $_POST["apellido1"];
$apellido2 = $_POST["apellido2"];
$cedula = $_POST["cedula"];
$descripcion = $_POST["descripcion"];
$ocupacion = $_POST["ocupacion"];
$sexo = $_POST["sexo"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];


$link = mysql_connect('localhost','root','')
    or die ('no se pudo conectar' . mysql_error());
mysql_select_db('multimediosdb2')
    or die('no se pudo conectar con la base de datos');
$stringInsertaPadre = "INSERT INTO Padres (Descripcion, Cedula, Nombre, Apellido1, Apellido2, Direccion, Telefono, Ocupacion, Sexo, Estudiantes_Id)
VALUES ('$descripcion', '$cedula', '$nombrePadre', '$apellido1', '$apellido2', '$direccion', '$telefono','$ocupacion', '$sexo', '$idEstudiante');";
mysql_query($stringInsertaPadre) or die('error' . mysql_error());


?>
