<?php
$link = mysql_connect('localhost','root','')
    or die ('no se pudo conectar' . mysql_error());
mysql_select_db('multimediosdb2')
    or die('no se pudo conectar con la base de datos');
$conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());
            $consultaEstudiante = "SELECT * From multimediosdb2.Profesores";
            $resultadoEstudiante = mysqli_query($conn, $consultaEstudiante) or die('Error en la consulta' . mysql_error());
?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>P Apellido</th>
                <th>S Apellido</th>
                <th>Curso</th>

            </tr>
        </thead>
        <?php
    if(mysqli_num_rows ($resultadoEstudiante) > 0){
        while ($columna = mysqli_fetch_row($resultadoEstudiante)){ ?>

            <tbody>
                <tr>
                    <td>
                        <?php echo"$columna[0]"?>
                    </td>
                    <td>
                        <?php echo"$columna[1]"?>
                    </td>
                    <td>
                        <?php echo"$columna[2]"?>
                    </td>
                    <td>
                        <?php echo"$columna[3]"?>
                    </td>
                       <td>
                        <?php echo"$columna[4]"?>
                    </td>
                  <td>


                        <a href="#" class="btn btn-info"><span class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#modalCurso<?php echo $columna[0]?>"></span></a>
                        <div class="container-fluid">
                            <div class="modal fade " id="modalCurso<?php echo $columna[0] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Asignar cursos-niveles</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="mod/asignarNivelCurso.php" method="post">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="idProfesor" class="input-group-addon">Profesor</label>
                                                        <input type="text" class="form-control" name="idProfesor" id="idProfesor" value="<?php echo $columna[0];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group ">
                                                        <label for="nivel" class="input-group-addon">Nivel</label>
                                                                             <?php

$conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());
                                                        $consulta = "SELECT * FROM Niveles;";
                                                                $resultado =   mysqli_query($conn, $consulta) or die("error". mysql_error());
                                                                ?>

                                                        <select name="nivel" id="niveles" class="form-control">
                                                           <?php while ($columnaNivel = mysqli_fetch_row($resultado)){
                                                            echo"<option value=\"$columnaNivel[0]\">$columnaNivel[1]</option>";
                                                            }?>
                                                        </select><?php

                                                            ?>
                                                    </div>
                                                </div>
                                                   <!--Cursos-->
                                                   <div class="form-group">
                                                    <div class="input-group ">
                                                        <label for="cursos" class="input-group-addon">Cursos</label>
                                                                             <?php

$conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());
                                                        $consulta = "SELECT * FROM Cursos;";
                                                                $resultado =   mysqli_query($conn, $consulta) or die("error". mysql_error());
                                                                ?>

                                                        <select name="cursos" id ="cursos" class="form-control">
                                                           <?php while ($columnaCurso = mysqli_fetch_row($resultado)){
                                                            echo"<option value=\"$columnaCurso[0]\">$columnaCurso[1]</option>";
                                                            }?>
                                                        </select><?php

                                                            ?>
                                                    </div>
                                                </div>
                                                <!--<div class="form-group">
                                                    <div class="input-group">
                                                        <label for="cedula" class="input-group-addon">Cédula</label>
                                                        <input type="text" class="form-control" name="cedula" id="cedula">
                                                    </div>
                                                </div>
-->
<!--    <button class="btn btn-info" type="submit">Enviar</button>-->
    <button class="btn btn-info" type="submit">Enviar</button>

                                            </form>


                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>


            <?php
        }

    }
?>
    </table>
    <?php
?>
