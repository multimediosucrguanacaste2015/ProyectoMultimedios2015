<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Formulario nivel</title>
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
                        <h4 class="panel-title">
                           Datos Año académico
                       </h4>
                    </div>
                    <div class="panel-body">
                        <form action="./mod/agregarCurso.php" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="nivel" class="input-group-addon">Nivel</label>
                                    <select name="nivel" id="" class="form-control">
                                        <option value="Setimo">Sétimo</option>
                                        <option value="Octavo">Octavo</option>
                                        <option value="Noveno">Noveno</option>
                                        <option value="Decimo">Décimo</option>
                                        <option value="Undecimo">Undécimo</option>
                                    </select>
                                </div>
                            </div>
                               <div class="form-group">
                                <div class="input-group">
                                    <label for="curso" class="input-group-addon">Curso</label>
                                    <input type="text" name="nombreCurso" class="form-control" placeholder="ej:Matemática">
                                </div>
                            </div><div class="form-group">
                                <div class="input-group">
                                    <label for="curso" class="input-group-addon">Sigla</label>
                                    <input type="text" name="sigla" class="form-control" placeholder="ej:IF2100">
                                </div>
                            </div>
                            <button class="btn btn-default" type="submit">Enviar</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>
