<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Starter Template for Bootstrap 3.3.5</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">
    <style>body{padding-top:50px;}.starter-template{padding:40px 15px;text-align:center;}</style>

    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container-fluid">
        <form action="">
            <div class="form-group">
                <div class="input-group">
                    <label for="" class="input-group-addon">Cédula</label>
                    <input type="text" class="form-control" id="cedula" required></div>
            </div>
            <a href="#" class="btn btn-default" onclick="mostrarCursosAsignados()">Consultar</a>
        </form>
        <div id="tabla-datos">

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        function mostrarCursosAsignados(){
            $.ajax({
                type: "post",
                url: "mod/mostrarCursosAsignados.php",
                data:{cedula:$("#cedula").val()},
                success: function (resp){
                    $("#tabla-datos").html(resp); // cargamos los datos obtendios en la consulta en el Div.
                }
            });
        }
    </script>
</body>
</html>
