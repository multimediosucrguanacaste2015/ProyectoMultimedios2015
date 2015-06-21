<?php
    $nivel = $_POST["nivel"];
    $seccion = $_POST["seccion"];
    $curso = $_POST["curso"];

$link = mysql_connect('localhost','root','')
    or die ('no se pudo conectar' . mysql_error());
mysql_select_db('proyectomultimedios')
    or die('no se pudo conectar con la base de datos');
$consulta0 = "SELECT * FROM proyectomultimedios.grado";
    $resultado0 = mysql_query($consulta0) or die('Error con la consulta 0'. mysql_error());
    $arreglo = mysql_fetch_array($resultado0);
    if(count($arreglo)<5){
       // Inserción de datos en la tabla grado
        $consulta = "INSERT INTO proyectomultimedios.grado(nombre)
        VALUES('$nivel')";
        $resultado = mysql_query($consulta) or die('Error en la consulta' . mysql_error());

    }
// Inserción de datos en tabla sección
    $consulta2 = "INSERT INTO proyectomultimedios.seccion(nombre)
    VALUES('$seccion')";
    $resultado2 = mysql_query($consulta2) or die('Error en la consulta' . mysql_error());
/*// Consulta que devuelve el idGrado, recien insertado
$consulta = "SELECT idGrado from proyectomultimedios.grado
    WHERE ";
    $resultado = mysql_query($consulta) or die('Error en la consulta' . mysql_error());*/
?>
