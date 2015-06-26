<?php
// Listar la tabla niveles.

$link = mysql_connect('localhost','root','')
    or die ('no se pudo conectar' . mysql_error());
mysql_select_db('multimediosdb2')
    or die('no se pudo conectar con la base de datos');
$conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());

            $consultaNivel = "SELECT Id, Descripcion From multimediosdb2.Niveles";
            $resultadoNivel = mysqli_query($conn, $consultaNivel) or die('Error en la consulta' . mysql_error());
 echo"<table class=\"table table-hover\">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Descripcion</th>
                        </tr>
                </thead> ";
    if(mysqli_num_rows ($resultadoNivel) > 0){
        while ($columna = mysqli_fetch_row($resultadoNivel)){


            echo"
                <tbody>
                    <tr>
                        <td>$columna[0]</td>
                        <td>$columna[1]</td>
                    </tr>
                </tbody>" ;


        }

    }
  echo"</table>";


?>
