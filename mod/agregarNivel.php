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
    // Los grados en un colegio son solamente 5.
    switch($nivel){
        case "Setimo":
            // Inserción de datos en tabla sección
        $consultaSeccion = "INSERT INTO proyectomultimedios.seccion(nombre, grado_idgrado)
        VALUES('$seccion', '1');";
        $resultadoSeccion = mysql_query($consultaSeccion) or die('Error en la consulta' . mysql_error());
            // Inserción de datos en tabla curso
        $consultaCurso = "INSERT INTO proyectomultimedios.curso(nombre_curso, grado_idgrado)
            VALUES('$curso', '1');";
        $resultadoCurso = mysql_query($consultaCurso) or die('Error en consulta curso'. mysql_error());
            break;
        case "Octavo":
          // Inserción de datos en tabla sección
        $consultaSeccion = "INSERT INTO proyectomultimedios.seccion(nombre, grado_idgrado)
        VALUES('$seccion', '2');";
        $resultadoSeccion = mysql_query($consultaSeccion) or die('Error en la consulta' . mysql_error());
            // Inserción de datos en tabla curso
        $consultaCurso = "INSERT INTO proyectomultimedios.curso(nombre_curso, grado_idgrado)
            VALUES('$curso', '2');";
        $resultadoCurso = mysql_query($consultaCurso) or die('Error en consulta curso'. mysql_error());
            break;
        case "Noveno":
          // Inserción de datos en tabla sección
        $consultaSeccion = "INSERT INTO proyectomultimedios.seccion(nombre, grado_idgrado)
        VALUES('$seccion', '3');";
        $resultadoSeccion = mysql_query($consultaSeccion) or die('Error en la consulta' . mysql_error());
            // Inserción de datos en tabla curso
        $consultaCurso = "INSERT INTO proyectomultimedios.curso(nombre_curso, grado_idgrado)
            VALUES('$curso', '3');";
        $resultadoCurso = mysql_query($consultaCurso) or die('Error en consulta curso'. mysql_error());
            break;
        case "Decimo":
          // Inserción de datos en tabla sección
        $consultaSeccion = "INSERT INTO proyectomultimedios.seccion(nombre, grado_idgrado)
        VALUES('$seccion', '4');";
        $resultadoSeccion = mysql_query($consultaSeccion) or die('Error en la consulta' . mysql_error());
            // Inserción de datos en tabla curso
        $consultaCurso = "INSERT INTO proyectomultimedios.curso(nombre_curso, grado_idgrado)
            VALUES('$curso', '4');";
        $resultadoCurso = mysql_query($consultaCurso) or die('Error en consulta curso'. mysql_error());
            break;
        case "Undecimo":
          // Inserción de datos en tabla sección
        $consultaSeccion = "INSERT INTO proyectomultimedios.seccion(nombre, grado_idgrado)
        VALUES('$seccion', '5');";
        $resultadoSeccion = mysql_query($consultaSeccion) or die('Error en la consulta' . mysql_error());
            // Inserción de datos en tabla curso
        $consultaCurso = "INSERT INTO proyectomultimedios.curso(nombre_curso, grado_idgrado)
            VALUES('$curso', '5');";
        $resultadoCurso = mysql_query($consultaCurso) or die('Error en consulta curso'. mysql_error());
            break;
    }


/*// Consulta que devuelve el idGrado, recien insertado
$consulta = "SELECT idGrado from proyectomultimedios.grado
    WHERE ";
    $resultado = mysql_query($consulta) or die('Error en la consulta' . mysql_error());*/
?>
