<?php
$carnet  = $_POST["carnet"];
$idCurso = $_POST["cursos"];
$fecha = $_POST["fecha"];
$tipo = $_POST["tipo"];

$conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());
$consultaIdEstMat = "SELECT Estudiantes_Matriculados.Id
FROM Estudiantes_Matriculados
JOIN Estudiantes ON Estudiantes_Matriculados.Estudiantes_Id = Estudiantes.Id
WHERE Estudiantes.Carnet = '$carnet';";
$resultadoIdEstMat = mysqli_query($conn, $consultaIdEstMat);
$idEstMat = mysqli_fetch_row($resultadoIdEstMat);

$consultaCurId = "SELECT Curso_Nivel_Profesor.Id
FROM Curso_Nivel_Profesor
JOIN Cursos ON Curso_Nivel_Profesor.Cursos_Id = Cursos.Id
WHERE Cursos.Id = '$idCurso'";
$resultadoCurId = mysqli_query($conn, $consultaCurId);
$idCurId = mysqli_fetch_row($resultadoCurId);

// consulta inserción y query.

?>
