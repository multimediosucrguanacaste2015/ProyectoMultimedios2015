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
        <form class="addNota">
         <h4>Ingrese los valores para insertar la nota del estudiante</h4>
          <div class="form-group">
              <div class="input-group">
                  <label for="carnet" class="input-group-addon">Carnet</label>
                  <input type="text" class="form-control" name="carnet" id="carnet">
              </div>
          </div>
            <div class="form-group">
                <div class="input-group">
                    <label for="nivel" class="input-group-addon">Curso</label>
                 <?php
                    $conn = mysqli_connect('localhost', 'root', '','multimediosdb2') or die (mysql_error ());
                    $consulta = "SELECT * FROM Cursos;";
                    $resultado =   mysqli_query($conn, $consulta) or die("error". mysql_error());
                ?>
                <select name="cursos" id="cursos" class="form-control">
                    <?php while ($columnaCursos = mysqli_fetch_row($resultado)){
                        echo"<option value=\"$columnaCursos[0]\">$columnaCursos[2]</option>";
                    }
                    ?>
                </select><?php
                ?>
           </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                <label for="" class="input-group-addon">Cotidiano</label>
                <input id="cotidiano" type="text" name="cotidiano" class="form-control"></div>
            </div>
               <div class="form-group">
                <div class="input-group">
                <label for="" class="input-group-addon">Parcial 1</label>
                <input id="parcial1" type="text" name="parcial1" class="form-control"></div>
            </div>
               <div class="form-group">
                <div class="input-group">
                <label for="" class="input-group-addon">Parcial 2</label>
                <input id="parcial2" type="text" name="parcial2" class="form-control"></div>
            </div>
               <div class="form-group">
                <div class="input-group">
                <label for="" class="input-group-addon">Final</label>
                <input id="final" type="text" name="final" class="form-control"></div>
            </div>
            <a href="#" class="btn btn-default" onclick="agregarNota()">Enviar</a>
      <!-- <button class="btn btn-default" type="submit">Enviar</button>-->
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        function agregarNota(){
            $.ajax({
                type:"post",
                url:"mod/agregarNota.php",
                data:{carnet:$("#carnet").val(), cursos:$("#cursos").val(), cotidiano:$("#cotidiano").val(), parcial1:$("#parcial1").val(), parcial2:$("#parcial2").val(), final:$("#final").val()},
                success: function (){
                    alert("Nota Agregada con Exito!!");
            }
            });
        }
    </script>
</body>
</html>
