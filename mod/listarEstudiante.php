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
    if(mysqli_num_rows ($resultadoEstudiante) > 0){
        while ($columna = mysqli_fetch_row($resultadoEstudiante)){
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
                        <td>
                        <a href=\"#\" class=\"btn btn-info\"><span class=\"glyphicon glyphicon-plus\"  data-toggle=\"modal\" data-target=\"#padre\"></span></a></td>
                         <div class=\"modal fade\" id=\"padre\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                                <div class=\"modal-dialog\" role=\"document\">
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <h4 class=\"modal-title\">Agregar Padre</h4>
                                        </div>
                                        <div class=\"modal-body\">
                                            <form class=\"agregar-padre\">
                                                <div class=\"form-group\">
                                                    <div class=\"input-group\">
                                                        <label for=\"descripcion\" class=\"input-group-addon\">Nombre</label>
                                                        <input type=\"text\" class=\"form-control\" name=\"nombre\" id=\"nombre\" value=\"$columna[1]\">
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <div class=\"input-group\">
                                                        <label for=\"descripcion\" class=\"input-group-addon\">Apellido 1</label>
                                                        <input type=\"text\" class=\"form-control\" name=\"apellido1\" id=\"apellido1\">
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <div class=\"input-group\">
                                                        <label for=\"descripcion\" class=\"input-group-addon\">Apellido 2</label>
                                                        <input type=\"text\" class=\"form-control\" name=\"apellido2\" id=\"apellido2\">
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <div class=\"input-group\">
                                                        <label for=\"descripcion\" class=\"input-group-addon\">Cedula</label>
                                                        <input type=\"text\" class=\"form-control\" name=\"cedula\" id=\"cedula\">
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <div class=\"input-group\">
                                                        <label for=\"descripcion\" class=\"input-group-addon\">Descripcion</label>
                                                        <input type=\"text\" class=\"form-control\" name=\"descripcion\" id=\"fechaNacimiento\">
                                                    </div>
                                                </div><div class=\"form-group\">
                                                    <div class=\"input-group\">
                                                        <label for=\"ocupacion\" class=\"input-group-addon\">Ocupacion</label>
                                                        <input type=\"text\" class=\"form-control\" name=\"ocupacion\" id=\"fechaNacimiento\">
                                                    </div>
                                                </div>
                                                <div class= \"form-group\">
                                                    <div class= \"input-group\">
                                                        <label class=\"input-group-addon\">Sexo</label>
                                                        <select class= \"form-control\">
                                                            <option>M</option>
                                                            <option>F</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class=\"form-group\">
                                                    <div class=\"input-group\">
                                                        <label for=\"descripcion\" class=\"input-group-addon\">Telefono</label>
                                                        <input type=\"text\" class=\"form-control\" name=\"carnet\" id=\"carnet\">
                                                    </div>
                                                </div>

                                                <div class=\"form-group\">
                                                    <textarea class=\"form-control\" name=\"direccion\"  cols=\"10\" rows=\"5\">150 mts este del Banco Nacional de Costa Rica.</textarea>

                                                </div>
                                                <button class= \"btn btn-info\" onclick=\"agregarPadre()\" type=\"submit\" id=\"submit\" data-dismiss=\"modal\">Enviar</button>
                                            </form>


                                        </div>

                                    </div>
                                </div>

                            </div>

                    </tr>
                </tbody>" ;


        }

    }
  echo"</table>";

?>
