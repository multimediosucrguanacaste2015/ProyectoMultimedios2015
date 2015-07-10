<?php
    // Estudiante
  $idProfesor = $_POST["idProfesor"];
  $idNivel = $_POST["nivel"];
  $idCurso = $_POST["cursos"];



$link = mysql_connect('localhost','root','')
    or die ('no se pudo conectar' . mysql_error());
mysql_select_db('multimediosdb2')
    or die('no se pudo conectar con la base de datos');
// Inserción de datos en la tabla estudiante
    $consulta = "INSERT INTO multimediosdb2.Curso_Nivel_Profesor (Cursos_Id, Niveles_Id, Profesores_Id)
    VALUES ('$idCurso', '$idNivel', '$idProfesor');";
    $resultado = mysql_query($consulta) or die('Error en la consulta' . mysql_error());
    if($resultado){
        echo "Inserción exitosa redirigiendo al menú principal";
        header('Location:../dashboard.php');
    }
    /*header('Location:../dashboard.php');*/
?>
