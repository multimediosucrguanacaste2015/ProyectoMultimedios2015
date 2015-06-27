<?php
$link = mysql_connect('localhost','root','')
    or die ('no se pudo conectar' . mysql_error());
mysql_select_db('multimediosdb2')
    or die('no se pudo conectar con la base de datos');
$conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());

            $consultaEstudiante = "SELECT * From multimediosdb2.Estudiantes";
            $resultadoEstudiante = mysqli_query($conn, $consultaEstudiante) or die('Error en la consulta' . mysql_error());
 echo"<table class=\"table table-hover\">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Carnet</th>
                            <th>Nombre</th>
                            <th>P Apellido</th>
                            <th>S Apellido</th>
                            <th>F.Nacimiento</th>
                            <th>Sexo</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                        </tr>
                </thead> ";
    if(mysqli_num_rows ($resultadoNivel) > 0){
        while ($columna = mysqli_fetch_row($resultadoNivel)){


            echo"
                <tbody>
                    <tr>
                        <td>$columna[0]</td>
                        <td>$columna[1]</td>
                        <td>$columna[2]</td>
                        <td>$columna[3]</td>
                        <td>$columna[4]</td>
                        <td>$columna[5]</td>
                        <td>$columna[6]</td>
                        <td>$columna[7]</td>
                        <td>$columna[8]</td>
                    </tr>
                </tbody>" ;


        }

    }
  echo"</table>";

?>
