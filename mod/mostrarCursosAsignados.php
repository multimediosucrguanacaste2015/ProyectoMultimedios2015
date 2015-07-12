<?php
    $cedula = $_POST["cedula"];
    $conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());
        $consultaProfesor = "SELECT Id FROM Profesores WHERE Cedula = '$cedula';";
        $resultadoProfesor = mysqli_query($conn, $consultaProfesor) or die('Error en la consulta' . mysql_error());
        $idProfesor = mysqli_fetch_row($resultadoProfesor);

 // Consulta de la tabla de notas para profesor según número de Cedula..
$consultaNota = "SELECT Profesores.Nombre, Profesores.Apellido1, Profesores.Apellido2, Cursos.Nombre
FROM Curso_Nivel_Profesor
JOIN Profesores on Curso_Nivel_Profesor.Profesores_Id = Profesores.Id
JOIN Cursos On Curso_Nivel_Profesor.Cursos_Id = Cursos.Id
WHERE Profesores_Id = '$idProfesor[0]'";
            $resultadoNota = mysqli_query($conn, $consultaNota) or die('Error en la consulta' .mysql_error());

   echo" <table class=\"table table-hover\">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>P Apellido</th>
                        <th>S Apellido</th>
                        <th>Curso</th>
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
                </tbody>";


                }
                }
           echo"</table>";



?>
