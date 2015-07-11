<?php
    $Seccion = $_POST["niveles"];

$conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());
            $consultaEstudianteMatriculado = "SELECT Estudiantes.Carnet, Estudiantes.Nombre, Estudiantes.Apellido1,  Estudiantes.Apellido2,Secciones.Seccion_Numero
FROM Estudiantes_Matriculados
JOIN Secciones ON Estudiantes_Matriculados.Secciones_Id = Secciones.Id
JOIN Estudiantes ON Estudiantes_Matriculados.Estudiantes_Id = Estudiantes.Id
Where  Secciones.Seccion_Numero ='7-1'";
            $resultadoEstudiante = mysqli_query($conn, $consultaEstudianteMatriculado) or die('Error en la consulta' . mysql_error());
            ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Carnet</th>
                        <th>Nombre</th>
                        <th>P Apellido</th>
                        <th>S Apellido</th>
                        <th>Sección</th>
                    </tr>
                </thead>
                <?php
                if(mysqli_num_rows($resultadoEstudiante)> 0){
                    while($columna = mysqli_fetch_row($resultadoEstudiante)){

                ?>
                <tbody>
                    <td><?php echo $columna[0]?></td>
                    <td><?php echo $columna[1]?></td>
                    <td><?php echo $columna[2]?></td>
                    <td><?php echo $columna[3]?></td>
                    <td><?php echo $columna[4]?></td>
                </tbody>
                <?php
                }
                }?>
            </table>
            <?php
?>
