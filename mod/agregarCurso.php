<?php
$sigla = $_POST["sigla"];
$nombreCurso = $_POST["nombreCurso"];

$link = mysql_connect('localhost','root','')
    or die ('no se pudo conectar' . mysql_error());
mysql_select_db('multimediosdb2')
    or die('no se pudo conectar con la base de datos');
// Inserción de datos en la tabla estudiante
    $consulta = "INSERT INTO Cursos (Sigla, Nombre)
values ('$sigla', '$nombreCurso');";
    $resultado = mysql_query($consulta) or die('Error en la consulta' . mysql_error());



?>
