<?php
    $carnet = $_POST["carnet"];
    $cursos = $_POST["cursos"];
    $cotidiano = $_POST["cotidiano"];
    $parcial1 = $_POST["parcial1"];
    $parcial2 = $_POST["parcial2"];
    $final = $_POST["final"];

        $conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());
        $consultaEstudiante = "SELECT Id FROM Estudiantes WHERE Carnet = '$carnet';";
        $resultadoEstudiante = mysqli_query($conn, $consultaEstudiante) or die('Error en la consulta' . mysql_error());
        $idEstudiante = mysqli_fetch_row($resultadoEstudiante);


        $consultaEstudianteMatriculado ="SELECT Id FROM Estudiantes_Matriculados WHERE Estudiantes_Id='$idEstudiante[0]';";
        $resultadoEstudianteMatriculado = mysqli_query($conn, $consultaEstudianteMatriculado);
        $idEstudianteMatriculado = mysqli_fetch_row($resultadoEstudianteMatriculado);


        $consultaCursoNivel = "SELECT Id FROM Curso_Nivel_Profesor WHERE Cursos_Id = '$cursos'";
        $resultadoCursoNivel = mysqli_query($conn, $consultaCursoNivel);
        $idCursoNivel = mysqli_fetch_row($resultadoCursoNivel);

        $insertarNota = "INSERT INTO Notas(Cotidiano, Parcial1, Parcial2, Final, Curso_Nivel_Id, Estudiantes_Matriculados_Id)
        VALUES('$cotidiano', '$parcial1', '$parcial2', '$final', '$idCursoNivel[0]', '$idEstudianteMatriculado[0]')";
        mysqli_query($conn, $insertarNota);
?>
