<?php
    $seccion = $_POST["niveles"];
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

    $cabeceraT = array("Carnet", "Nombre", "Primer Apellido", "Segundo Apellido");

    $mipdf = new MiPDF();
    $mipdf -> addPage();

    for ($i = 0; $i < count( $cabeceraT ); $i++)
    {
        $mipdf -> SetFont ( 'Courier', 'B', 12);
        $mipdf ->SetTextColor ( 255, 255, 255 );
        $mipdf -> Cell ( 48, 10, $cabeceraT[ $i ], 1, 0, 'C', true );

    }// fin del for

    $mipdf -> Ln(10);



    //echo $Seccion;

    $consulta = "SELECT Estudiantes.Carnet, Estudiantes.Nombre, Estudiantes.Apellido1,                                       Estudiantes.Apellido2
                FROM Estudiantes_Matriculados
                JOIN Secciones ON Estudiantes_Matriculados.Secciones_Id = Secciones.Id
                JOIN Estudiantes ON Estudiantes_Matriculados.Estudiantes_Id = Estudiantes.Id
                WHERE Secciones.Seccion_Numero = '$seccion'";


    $query = mysqli_query($conn, $consulta);
    $mipdf ->SetTextColor ( 0, 0, 0 );
    if (mysqli_num_rows($query) > 0)
    {
        while ($datos = mysqli_fetch_row($query))
        {

            $Carnet = $datos[0];
            $Nombre = $datos[1];
            $Apellido1 = $datos[2];
            $Apellido2 = $datos[3];

            $mipdf -> Cell( 48, 10, $Carnet, 1, 0, 'C');
            $mipdf -> Cell( 48, 10, $Nombre, 1, 0, 'C');
            $mipdf -> Cell( 48, 10, $Apellido1, 1, 0, 'C');
            $mipdf -> Cell( 48, 10, $Apellido2, 1, 0, 'C');

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
