<?php
    // Estudiante
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $fechaNaciminento = $_POST["fechaNacimiento"];
    $carnet = $_POST["carnet"];
    $telefono = $_POST["telefono"];
    $sexo = $_POST["sexo"];
    $direccion = $_POST["direccion"];
    // Padre
    $nombrePadre = $_POST["nombrePadre"];
    $apellido1Padre = $_POST["apellido1Padre"];
    $apellido2Padre = $_POST["apellido2Padre"];
    $cedula = $_POST["cedula"];
    $sexoPadre = $_POST["sexo"];
    $parentesco = $_POST["parentesco"];


$link = mysql_connect('localhost','root','')
    or die ('no se pudo conectar' . mysql_error());
mysql_select_db('proyectomultimedios')
    or die('no se pudo conectar con la base de datos');
// Inserción de datos en la tabla estudiante
    $consulta = "INSERT INTO proyectomultimedios.estudiante (carnet, nombre, apellido,apellido2, fecha_nacimiento, telefono, sexo, direccion)
    VALUES ('$carnet', '$nombre', '$apellido1','$apellido2', '$fechaNaciminento', '$telefono', '$sexo', '$direccion');";
    $resultado = mysql_query($consulta) or die('Error en la consulta' . mysql_error());
// Inserción de datos en la tabla padre
    $consulta2 = "INSERT INTO proyectomultimedios.padre (cedula, nombre, apellido, apellido2, sexo, parentesco)
    VALUES ('$cedula', '$nombrePadre', '$apellido1Padre', '$apellido2Padre', '$sexoPadre', '$parentesco');";
        $resultado2 = mysql_query($consulta2) or die('Error en la seguda consulta'. mysql_error());
// Obtención de idEstudiante
    $consulta3 = "SELECT idEstudiante from proyectomultimedios.estudiante
        WHERE carnet='$carnet'";
    $resultado3 = mysql_query($consulta3) or die('Error en tercera consulta'. mysql_error());
    $idEstudiante = mysql_fetch_row($resultado3);

// Obtención de idPadre
 $consulta4 = "SELECT idPadre from proyectomultimedios.padre
        WHERE cedula='$cedula'";
    $resultado4 = mysql_query($consulta4) or die('Error en tercera consulta'. mysql_error());
    $idPadre = mysql_fetch_row($resultado4);

// Inserción de idPadre en la tabla de estudiante, con el fin de relacionarlas.
$consulta5 = "UPDATE proyectomultimedios.estudiante SET padre='$idPadre[0]'
        WHERE idEstudiante='$idEstudiante[0]';";
    $resultadoActualizarEstudiante = mysql_query($consulta5) or die('Error en consulta 5'. mysql_error());
/*header("location:../dashboard.php");*/
echo "nombre= $nombre <br> nombre padre=$nombrePadre";
?>
