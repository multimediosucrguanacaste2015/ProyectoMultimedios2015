<?php
    if(isset($_SESSION['usuario'])){
        echo "<script>location.href ='dashboard.php' </script>";
    }
    else{
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema control notas</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/login.css">

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

            <div class="col-md-1 col-md-offset-3"></div>
            <div class="col-md-4">

                <div class="panel panel-info">
                   <div class="panel-heading"><h4>Inicie sesión</h4></div>
                    <div class="panel-body">
                        <form action="return false" method="post" onsubmit="return false">

                            <div class="form-group">
                                <div id="resultado"></div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                                </div>
                            </div>

                            <button class="btn btn-me btn-block" onclick="validar(document.getElementById('usuario').value, document.getElementById('password').value)" >Acceder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function validar(usuario, password){
            $.ajax({
                url: "mod/login.php",
                type:"POST",
                data:"usuario="+usuario+"&password="+password,
                success: function(resp){
                    $('#resultado').html(resp)
                }
            });
        }
    </script>
</body>

</html>
<?php
}
?>
