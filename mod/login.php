<?php
/*Lógica del login: conexión con la base de datos y despliegue exitoso*/
$nombreUsuario =  $_POST["usuario"];
$passwordUsuario = $_POST["password"];

$link = mysql_connect('localhost','root','')
    or die ('no se pudo conectar' . mysql_error());
mysql_select_db('proyectomultimedios')
    or die('no se pudo conectar con la base de datos');

    $consulta = "SELECT nombre_usuario, password_usuario from proyectomultimedios.usuario
                    WHERE nombre_usuario='$nombreUsuario' and password_usuario='$passwordUsuario'";
    $resultado = mysql_query($consulta) or die('Error en la consulta' . mysql_error());

$row = mysql_fetch_array($resultado);

if($row[0]!='' && $row[1] !=''){
 header('Location:../dashboard.php');
}
else
    echo"nombre de usuario o contraseña equivocados";

?>
