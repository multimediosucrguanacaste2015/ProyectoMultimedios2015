<?php
    $carnet = $_POST["carnet"];
    $conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());
        $consultaEstudiante = "SELECT Id FROM Estudiantes WHERE Carnet = '$carnet';";
        $resultadoEstudiante = mysqli_query($conn, $consultaEstudiante) or die('Error en la consulta' . mysql_error());
        $idEstudiante = mysqli_fetch_row($resultadoEstudiante);

 // Consulta de la tabla de notas para estudiante según número de Carnet...
$consultaNota = "SELECT Estudiantes.Nombre, Estudiantes.Apellido1, Estudiantes.Apellido2,
Cursos.Nombre, Notas.Cotidiano, Notas.Parcial1, Notas.Parcial2, Notas.Final
FROM Notas JOIN
Estudiantes_Matriculados ON Notas.Estudiantes_Matriculados_Id = Estudiantes_Matriculados.Id
JOIN Curso_Nivel_Profesor ON Notas.Curso_Nivel_Id = Curso_Nivel_Profesor.Id
JOIN Estudiantes ON Estudiantes_Matriculados.Estudiantes_Id = Estudiantes.Id
JOIN Cursos ON Curso_Nivel_Profesor.Cursos_Id = Cursos.Id
WHERE Estudiantes_Matriculados_Id = '$idEstudiante[0]'";
            $resultadoNota = mysqli_query($conn, $consultaNota) or die('Error en la consulta' .mysql_error());

   echo" <table class=\"table table-hover\">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>P Apellido</th>
                        <th>S Apellido</th>
                        <th>Curso</th>
                        <th>Cotidiano</th>
                        <th>Parcial1</th>
                        <th>Parcial2</th>
                        <th>Final</th>
                    </tr>
                </thead>
                ";

                if(mysqli_num_rows($resultadoNota)> 0){
                    while($columna = mysqli_fetch_row($resultadoNota)){

                echo" <tbody>
                    <td>$columna[0]</td>
                    <td>$columna[1]</td>
                    <td>$columna[2]</td>
                    <td>$columna[3]</td>
                    <td>$columna[4]</td>
                    <td>$columna[5]</td>
                    <td>$columna[6]</td>
                    <td>$columna[7]</td>
                </tbody>";


                }
                }
           echo"</table>";



?>
