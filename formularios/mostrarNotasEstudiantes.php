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
       <form action="mod/generarPdfNota.php" method="post">
           <div class="form-group">
               <div class="input-group">
                   <label for="" class="input-group-addon">Carnet</label>
                   <input type="text" class="form-control" id="carnet" name="carnet" required></div>
           </div>
           <a href="#" class="btn btn-default" onclick="consultarNota()">Consultar</a>
           <button class="btn btn-warning" type="submit">Generar PDF</button>
       </form>
       <div id="tabla-datos">

       </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        function consultarNota(){
            $.ajax({
                type: "post",
                url: "mod/consultarNota.php",
                data:{carnet:$("#carnet").val()},
                success: function (resp){
                    $("#tabla-datos").html(resp);
                }
            });
        }
    </script>
</body>
</html>
