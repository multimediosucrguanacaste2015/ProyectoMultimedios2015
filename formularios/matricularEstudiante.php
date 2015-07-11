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
      <form class="matricula">
         <h4>Inserte el carnet del estudiante para proceder con la matricula</h4>
          <div class="form-group">
              <div class="input-group">
                <label for="carnet" class="input-group-addon">Carnet</label>
                <input type="text" name="carnet" id="carnet" class="form-control">
              </div>
          </div>
          <div class="form-group">
              <div class="input-group">

                <label for="nivel" class="input-group-addon">Nivel</label>
                 <?php
                    $conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());
                    $consulta = "SELECT * FROM Niveles;";
                    $resultado =   mysqli_query($conn, $consulta) or die("error". mysql_error());
                ?>
                <select name="nivel" id="niveles" class="form-control">
                    <?php while ($columnaNivel = mysqli_fetch_row($resultado)){
                        echo"<option value=\"$columnaNivel[0]\">$columnaNivel[1]</option>";
                    }
                    ?>
                </select><?php
                ?>
          </div>
          </div>
      </form>
      <button class="btn btn-info" id="boton" onclick="matricular()">Enviar</button>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        function matricular(){
            $("#boton").click(function(event){
                event.preventDefault();
            });
            $.ajax({
                type:"post",
                // La url varia dependiendo desde donde se ejecute el formulario, en esta caso se prevee su funcionamiento desde el dashboard
                url: "mod/matriculaEstudiante.php",
                data: {carnet:$("#carnet").val(), nivel:$("#niveles").val()},
                success: function(){
                    alert("Estudiante matriculado");
                },
                error:function(){
                    console.log("data"+data);
                }
            });
        }
        </script>
</body>
</html>
