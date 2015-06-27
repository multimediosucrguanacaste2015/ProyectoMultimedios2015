<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema control notas</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        body {
            padding-top: 50px;
        }

        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>

    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1 col-md-offset-1"></div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Datos estudiante</h4>
                    </div>
                    <div class="panel-body">
                        <a href="#" class="btn btn-info"><span class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#agregarNivelModal"> Agregar</span></a>
                        <button href="#" class="btn btn-info" id="btn-refrescar"><span class="glyphicon glyphicon-refresh"> Refrescar</span>
                        </button>
                        <div class="container">
                            <div class="modal fade" id="agregarNivelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Agregar Estudiante</h4>
                                        </div>
                                        <div class="modal-body">

                                            <form class="agregar-estudiante">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="descripcion" class="input-group-addon">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" id="nombre">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="descripcion" class="input-group-addon">Apellido 1</label>
                                                        <input type="text" class="form-control" name="apellido1" id="apellido1">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="descripcion" class="input-group-addon">Apellido 2</label>
                                                        <input type="text" class="form-control" name="apellido2" id="apellido2">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="descripcion" class="input-group-addon">Carnet</label>
                                                        <input type="text" class="form-control" name="carnet" id="carnet">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="descripcion" class="input-group-addon">Nacimiento</label>
                                                        <input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="descripcion" class="input-group-addon">Telefono</label>
                                                        <input type="text" class="form-control" name="carnet" id="carnet">
                                                    </div>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" class="radio" name="sexo" id="sexo" value="Masculino" checked> Masculino
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" class="radio" name="sexo" id="sexo" value="Femenino" unchecked> Femenino
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" name="direccion" id="" cols="10" rows="5">150 mts este del Banco Nacional de Costa Rica.</textarea>

                                                </div>
                                                <button class="btn btn-info" type="submit" id="submit" data-dismiss="modal">Enviar</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tabla">
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Carnet</th>
                                    <th>Nombre</th>
                                    <th>P. Apellido</th>
                                    <th>S. Apellido</th>
                                    <th>F. Nacimiento</th>
                                    <th>Sexo</th>
                                    <th>Telefono</th>
                                    <th>Dirección</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   /* $link = mysql_connect('localhost','root','') or die ('no se pudo conectar' . mysql_error());*/
                                    $conn = mysqli_connect("localhost", "root", "","multimediosdb2") or die (mysql_error ());
                                   /* mysql_select_db('multimediosdb2') or die('no se pudo conectar con la base de datos');*/

                                    // seleccionar tabla nivel y mostrarla
                                    $consultaEstudiante = "SELECT Id, Carnet, Nombre, Apellido1, Apellido2, FechaNacimiento, Sexo, Telefono, Direccion From multimediosdb2.Estudiantes";
                                    $resultadoEstudiante = mysqli_query($conn, $consultaEstudiante) or die('Error en la consulta' . mysql_error());
                                    if (mysqli_num_rows($resultadoEstudiante) > 0){
                                        while ($columna = mysqli_fetch_row($resultadoEstudiante)){
                                         echo"
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
                                         </tr>";

                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $("button#submit").click(function() {
                $.ajax({
                    type: "POST",
                    url: "./mod/agregarEstudiante.php",
                    data: $('form.agregar-nivel').serialize(),
                    /*success: function (msg) {
                        $("#thanks").html(msg)
                        $("#agregarNivelModal").modal('hide');
                    },
                    error: function () {
                        alert("failure");
                    }*/
                });
            });
        });
            /*Refrescar el contenido de la tabla*/
        $(document).ready(function() {

            $("button#btn-refrescar").click(function() {

                $.ajax({ //create an ajax request to load_page.php
                    type: "GET",
                    url: "./mod/listarEstudiante.php",
                    dataType: "html", //expect html to be returned
                    success: function(response) {
                        $("#tabla").html(response);
                        //alert(response);
                    },
                    error: function() {
                        alert("error!!");
                    }

                });
            });
        });
    </script>
    <!--  <script>
        $(document).ready(function () {
            $('#form-agregar-estudiante').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '../mod/agregarEstudiante.php',
                    data: $(this).serializeArray(),
                    dataType: "html",
                    success: function () {}
                });
            });
        });
    </script>-->
</body>

</html>
