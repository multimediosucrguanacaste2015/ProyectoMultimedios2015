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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        $(function () {
        $("button#submit").click(function () {
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
