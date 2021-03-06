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


                        <a href="#" class="btn btn-info"><span class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#agregarNivelModal"> Agregar</span></a>
                        <button href="#" class="btn btn-info" onclick="cargarTabla()" id="btn-refrescar"><span class="glyphicon glyphicon-refresh"> Refrescar</span>
                        </button>
                        <div class="container-fluid">
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
                                                        <input type="text" class="form-control" name="telefono" id="telefono">
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
                                                <button class="btn btn-info" onclick="refrescarDatos()" type="submit" id="submit" data-dismiss="modal">Enviar</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="tabla">

                        </div>


            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
       /* $(function() {
            $("button#submit").click(function() {

            });
        });*/
            /*Refrescar el contenido de la tabla*/
        $(document).ready(function() {

            $("button#btn-refrescar").click(function() {

                /*$.ajax({ //create an ajax request to load_page.php
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

                });*/
            });
        });
        function refrescarDatos(){
           $.ajax({
                    type: "POST",
                    url: "./mod/agregarEstudiante.php",
                    data: $('form.agregar-estudiante').serialize(),
                    success: function despues(){
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
        },
                    error: function () {
                        alert("failure");
                    }
                });

        }
        function cargarTabla(){
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
        }

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
