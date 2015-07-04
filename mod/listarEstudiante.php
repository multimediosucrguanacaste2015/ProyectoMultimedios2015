<?php
$link = mysql_connect('localhost','root','')
    or die ('no se pudo conectar' . mysql_error());
mysql_select_db('multimediosdb2')
    or die('no se pudo conectar con la base de datos');
$conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());
            $consultaEstudiante = "SELECT * From multimediosdb2.Estudiantes";
            $resultadoEstudiante = mysqli_query($conn, $consultaEstudiante) or die('Error en la consulta' . mysql_error());
?>
 <table class="table table-hover">
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
                </thead>
    <?php
    if(mysqli_num_rows ($resultadoEstudiante) > 0){
        while ($columna = mysqli_fetch_row($resultadoEstudiante)){ ?>

                <tbody>
                    <tr>
                        <td><?php echo"$columna[0]"?></td>
                        <td><?php echo"$columna[1]"?></td>
                        <td><?php echo"$columna[2]"?></td>
                        <td><?php echo"$columna[3]"?></td>
                        <td><?php echo"$columna[4]"?></td>
                        <td><?php echo"$columna[5]"?></td>
                        <td><?php echo"$columna[6]"?></td>
                        <td><?php echo"$columna[7]"?></td>
                        <td><?php echo"$columna[8]"?></td>
                        <td>

            <a href="#" class="btn btn-info"><span class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#padre<?php echo"$columna[0]"?>"></span></a>
                        <div class="container-fluid">
                         <div class= "modal fade " id="padre<?php echo"$columna[0]";?>" tabindex= "-1" role= "dialog" aria-labelledby= "myModalLabel" aria-hidden= "true">
                                <div class= "modal-dialog" role= "document ">
                                    <div class= "modal-content">
                                        <div class= "modal-header">
                                            <h4 class= "modal-title">Agregar Padre</h4>
                                        </div>
                                        <div class= "modal-body">
                                            <form class= "agregar-padre<?php echo $columna[0] ?>">
                                            <!--<form method="post" action="mod/agregarPadre.php">-->
                                               <input type="text" name="idEstudiante" id="idEstudiante" value="<?php echo"$columna[0]"?>">
                                                <div class= "form-group">
                                                    <div class= "input-group">
                                                        <label for= "nombre" class= "input-group-addon">Nombre</label>
                                                        <input type= "text" class= "form-control" name= "nombre" id= "nombre">
                                                    </div>
                                                </div>
                                                <div class= "form-group">
                                                    <div class= "input-group">
                                                        <label for= "apellido1 " class= "input-group-addon">Apellido 1</label>
                                                        <input type= "text" class= "form-control" name= "apellido1" id= "apellido1">
                                                    </div>
                                                </div>
                                                <div class= "form-group">
                                                    <div class= "input-group ">
                                                        <label for= "apellido2" class= "input-group-addon">Apellido 2</label>
                                                        <input type= "text" class= "form-control" name= "apellido2" id= "apellido2">
                                                    </div>
                                                </div>
                                                <div class= "form-group">
                                                    <div class= "input-group">
                                                        <label for= "cedula" class= "input-group-addon">Cedula</label>
                                                        <input type= "text" class= "form-control" name= "cedula" id= "cedula">
                                                    </div>
                                                </div>
                                                <div class= "form-group">
                                                    <div class= "input-group">
                                                        <label for= "descripcion" class= "input-group-addon">Descripcion</label>
                                                        <input type= "text" class= "form-control " name= "descripcion" id= "descripcion">
                                                    </div>
                                                </div><div class= "form-group">
                                                    <div class= "input-group">
                                                        <label for= "ocupacion" class= "input-group-addon">Ocupacion</label>
                                                        <input type= "text" class= "form-control" name= "ocupacion" id= "ocupacion">
                                                    </div>
                                                </div>
                                                <div class=  "form-group ">
                                                    <div class=  "input-group ">
                                                        <label class= "input-group-addon ">Sexo</label>
                                                        <select class=  "form-control " name="sexo">
                                                            <option value="M">M</option>
                                                            <option value="F">F</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class= "form-group">
                                                    <div class= "input-group">
                                                        <label for= "telefono" class= "input-group-addon">Telefono</label>
                                                        <input type= "text " class= "form-control" name= "telefono" id= "telefono">
                                                    </div>
                                                </div>

                                                <div class= "form-group">
                                                    <textarea class= "form-control " name= "direccion"  cols= "10" rows= "5">150 mts este del Banco Nacional de Costa Rica.</textarea>

                                                </div>
                                                <button class=  "btn btn-info"  onclick="agregarPadre('<?php echo $columna[0];?>')" data-dismiss= "modal">Enviar</button>
                                            </form>


                                        </div>

                                    </div>
                                </div>

                            </div>
     </div>
                            </td>
                    </tr>
     </tbody>

<script>
     function agregarPadre(str){
            var id = str;
            alert(id);
               $.ajax({
                    type: "POST",
                    url: "mod/agregarPadre.php",
                    data: $('form.agregar-padre'+id).serialize(),
                    success: function(){
                        alert("Exitoso");
                    } ,
                    error: function () {
                        alert("failure");
                    }
                });
        }
     </script>
<?php
        }

    }
?>
</table>
<?php
?>
