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
    <div class="container">

        <div class="row">
            <div class="col-md-1 col-md-offset-1"></div>
            <div class="col-md-6">
                <form action="inserta.php" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <label for="Nombre" class="input-group-addon">Nombre</label>
                            <input type="text" class="form-control" id="Nombre" name="nombre" placeholder="Víctor">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label for="Apellido" class="input-group-addon">Primer Apellido</label>
                            <input type="text" class="form-control" id="Apellido1" name="Apellido1" placeholder="Centeno">
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label for="Apellido2" class="input-group-addon">Segundo Apellido</label>
                            <input type="text" class="form-control" id="Apellido2" name="Apellido2" placeholder="Gómez">
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label for="fechaNacimiento" class="input-group-addon">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento">
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label for="carnet" class="input-group-addon">Carnet</label>
                            <input type="text" class="form-control" id="carnet" name="carnet" placeholder="A9999">
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label for="telefono" class="input-group-addon">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="555 555 55">
                        </div>

                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked> Masculino
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked> Femenino
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="dirección"></label>
                        <textarea class="form-control" name="dirección" id="" cols="30" rows="3">150 mts oeste de pinturas protecto</textarea>
                    </div>

                    <button class="btn btn-default" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
