<?php
/*Lógica del login: conexión con la base de datos y despliegue exitoso*/
$nombreUsuario =  $_POST["usuario"];
$passwordUsuario = $_POST["password"];

$link = mysql_connect('localhost','root','')
    or die ('no se pudo conectar' . mysql_error());
mysql_select_db('multimediosdb2')
    or die('no se pudo conectar con la base de datos');

$consulta = "SELECT UserId, Contrasena, Tipo from multimediosdb2.Usuarios
                    WHERE UserId='$nombreUsuario' and Contrasena='$passwordUsuario'";
$resultado = mysql_query($consulta) or die('Error en la consulta' . mysql_error());

$row = mysql_fetch_array($resultado);
// Guarda el tipo de usuario que va a ingresar al sistema.
if($row[2] == "P"){
    session_start();
    $_SESSION["tipo"] = "Profesor";
}
else{
    session_start();
    $_SESSION["tipo"] = "Administrativo";
}


if($row[0]!='' && $row[1] !=''){
    /* header('Location:../dashboard.php');*/
    echo "<script>location.href =\"./dashboard.php\" </script>";
}
else
    echo '<span class="glyphicon glyphicon-alert alert alert-danger"><a href="#" class="close" data-dismiss="alert">  &times;</a>
            Usuario o Clave incorrecta
    </span>';
?>
