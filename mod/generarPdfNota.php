<?php
    $carnet = $_POST["carnet"];
    ob_end_clean();
    include "../FPDF/fpdf.php";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "multimediosdb2";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn)
    {
        die("fallo conexión: " . mysqli_connect_error());
    }// fin del if

    class MiPDF extends FPDF
    {
        public function Header()
        {
            $this -> SetFont( 'Arial', 'B', 15);
            $this -> Cell( 40, 10 , "Lista Seccion: " , 0 , 0 , 'C' );
			$this -> Ln( 20 );
        }// fin de la funcion Header

    }// fin de la clase FPDF

    $cabeceraT = array("Nombre", "P Apellido", "S Apellido", "Curso", "Cotidinano", "Parcial1", "Parcial 2", "Final");

    $mipdf = new MiPDF();
    $mipdf -> addPage();

    for ($i = 0; $i < count( $cabeceraT ); $i++)
    {
        $mipdf -> SetFont ( 'Courier', 'B', 12);
        $mipdf ->SetTextColor ( 255, 255, 255 );
        $mipdf -> Cell ( 25, 10, $cabeceraT[ $i ], 1, 0, 'C', true );

    }// fin del for

    $mipdf -> Ln(10);



    //echo $carnet;
    $consultaEstudiante = "SELECT Id FROM Estudiantes WHERE Carnet = '$carnet';";
        $resultadoEstudiante = mysqli_query($conn, $consultaEstudiante) or die('Error en la consulta' . mysql_error());
        $idEstudiante = mysqli_fetch_row($resultadoEstudiante);

    $consulta = "SELECT Estudiantes.Nombre, Estudiantes.Apellido1, Estudiantes.Apellido2,
Cursos.Nombre, Notas.Cotidiano, Notas.Parcial1, Notas.Parcial2, Notas.Final
FROM Notas JOIN
Estudiantes_Matriculados ON Notas.Estudiantes_Matriculados_Id = Estudiantes_Matriculados.Id
JOIN Curso_Nivel_Profesor ON Notas.Curso_Nivel_Id = Curso_Nivel_Profesor.Id
JOIN Estudiantes ON Estudiantes_Matriculados.Estudiantes_Id = Estudiantes.Id
JOIN Cursos ON Curso_Nivel_Profesor.Cursos_Id = Cursos.Id
WHERE Estudiantes_Matriculados_Id = '1'";


    $query = mysqli_query($conn, $consulta);
    $mipdf ->SetTextColor ( 0, 0, 0 );
    if (mysqli_num_rows($query) > 0)
    {
        while ($datos = mysqli_fetch_row($query))
        {

            $Nombre = $datos[0];
            $Apellido1 = $datos[1];
            $Apellido2 = $datos[2];
            $Curso = $datos[3];
            $Cotidiano = $datos[4];
            $Parcial1 = $datos[5];
            $Parcial2 = $datos[6];
            $Final = $datos[7];

            $mipdf -> Cell( 24, 10, $Nombre, 1, 0, 'C');
            $mipdf -> Cell( 24, 10, $Apellido1, 1, 0, 'C');
            $mipdf -> Cell( 24, 10, $Apellido2, 1, 0, 'C');
            $mipdf -> Cell( 30, 10, $Curso, 1, 0, 'C');
            $mipdf -> Cell( 24, 10, $Cotidiano, 1, 0, 'C');
            $mipdf -> Cell( 24, 10, $Parcial1, 1, 0, 'C');
            $mipdf -> Cell( 24, 10, $Parcial2, 1, 0, 'C');
            $mipdf -> Cell( 24, 10, $Final, 1, 0, 'C');

            $mipdf -> Ln( 10 );
        }// fin del while
    }// fin del if

    /*while ($datos = mysql_fetch_array($query))
    {
        echo $datos['Carnet'];

        $Carnet = $datos['Carnet'];
        $Nombre = $datos['Nombre'];
        $Apellido1 = $datos['Apellido1'];
        $Apellido2 = $datos['Apellido2'];

        $mipdf -> Cell( 100, 10, $Carnet, 1, 0, 'C', true);
        $mipdf -> Cell( 100, 10, $Nombre, 1, 0, 'C', true);
        $mipdf -> Cell( 100, 10, $Apellido1, 1, 0, 'C', true);
        $mipdf -> Cell( 100, 10, $Apellido2, 1, 0, 'C', true);
    }// fin del while */


    $mipdf -> Output();
?>
