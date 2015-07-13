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
        <form action="mod/listarEst.php" method="post">
           <div class="form-group">
               <div class="input-group">
                   <label for="carnet" class="input-group-addon">Carnet</label>
                   <input type="text" class="form-control" name="carnet" id="carnet"></div>
           </div>
              <div class="form-group">
               <div class="input-group">
                   <label for="fecha" class="input-group-addon">Fecha</label>
                   <input type="date" class="form-control" name="fecha" id="fecha"></div>
           </div>
           <div class="form-group">
               <div class="input-group">
                      <label for="tipo" class="input-group-addon">Tipo</label>
                      <select name="tipo" id="tipo" class="form-control">
                           <option value="A">Ausencia</option>
                           <option value="T">Tardía</option>
                           <option value="E">Escapada</option>
                   </select></div>
           </div>
            <div class="form-group">
              <div class="input-group">

                <label for="nivel" class="input-group-addon">Cursos</label>
                 <?php
                    $conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());
                    $consulta = "SELECT * FROM Cursos;";
                    $resultado =   mysqli_query($conn, $consulta) or die("error". mysql_error());
                ?>
                <select name="cursos" id="cursos" class="form-control">
                    <?php while ($columnaNivel = mysqli_fetch_row($resultado)){
                        echo"<option value=\"$columnaNivel[0]\">$columnaNivel[2]</option>";
                    }
                    ?>
                </select><?php
                ?>
          </div>
          </div>
          <a href="#" class="btn btn-default" onclick="listarEstudiantes()">Enviar</a>
          <button class="btn btn-default" type="submit">Submit</button>
        </form>
        <div class="tabla-datos">

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        function listarEstudiantes(){
            $.ajax({
                type:"post",
                url:"mod/listarEst.php",
                data:{carnet:$("#carnet").val(), cursos:$("#cursos").val(), fecha:$("#fecha").val(), tipo:$("#tipo").val()},
                success: function(resp){
                    $("#tabla-datos").html(resp);
                }
            });
        }
    </script>
</body>
</html>
