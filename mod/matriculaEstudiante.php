<?php
$carnetEstudiante = $_POST["carnet"];
$idNivel = $_POST["nivel"];

$conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());
            $consultaEstudiante = "SELECT Id From multimediosdb2.Estudiantes WHERE Carnet='$carnetEstudiante'";
            $resultadoEstudiante = mysqli_query($conn, $consultaEstudiante) or die('Error en la consulta' . mysql_error());

    $columna = mysqli_fetch_row($resultadoEstudiante);

    $consultaNivelEstudiante ="INSERT INTO multimediosdb2.Estudiantes_Matriculados (Estudiantes_Id, Secciones_Id)
    VALUES('$columna[0]', '$idNivel')";
    mysqli_query($conn, $consultaNivelEstudiante) or die('Error en la consulta'. mysql_error());
?>
