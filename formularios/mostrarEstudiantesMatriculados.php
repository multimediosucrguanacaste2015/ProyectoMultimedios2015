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
      <form action="mod/generarPdfLista.php" method="post">
           <div class="form-group">
          <h4>Listar los estudiantes matriculados por sección</h4>
           <div class="input-group">
                <label for="nivel" class="input-group-addon">Sección</label>
                 <?php
                    $conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());
                    $consulta = "SELECT * FROM Secciones;";
                    $resultado =   mysqli_query($conn, $consulta) or die("error". mysql_error());
                ?>
                <select name="niveles" id="niveles" class="form-control">
                    <?php while ($columnaNivel = mysqli_fetch_row($resultado)){
                        echo"<option value=\"$columnaNivel[1]\">$columnaNivel[1]</option>";
                    }
                    ?>
                </select><?php
                ?>
           </div>
       </div>
       <!--<button class="btn btn-default" onclick="consultarMatricula()">Enviar</button>-->
       <a href="#" onclick="consultarMatricula()" class="btn btn-default">Consultar</a>

       <button class="btn btn-warning" type="submit">Generar Pdf</button>
      </form>

    <div id="tabla-datos">

    </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        // Aqui colocaremos la función de paso y retorno.
        function consultarMatricula(){
            $.ajax({
                type:"post",
                url:"mod/mostrarMatricula.php",
                data:{niveles:$("#niveles").val()},
                success: function (resp){
                    $("#tabla-datos").html(resp);
                }
            });
        }
        /*function generarPdf(){
            $.ajax({
                type:"post",
                url:"mod/generarPdfLista.php",
                data:{niveles:$("#niveles").val()},
                success: function (resp){
                    alert("Generando");
                }
            });
        }*/
    </script>
</body>
</html>
