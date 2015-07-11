<!DOCTYPE html>
<html lang="en">
<?php
    session_start();

        $sesion = $_SESSION["tipo"];
    echo"$sesion";

    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema control notas</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/menu.js"></script>


    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
            padding-top: 50px;

        }

        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <ul class="nav nav-pills navbar nav-stacked span3">
                    <li id="accordion">
                        <a data-toggle="collapse" data-parent="#accordion" href="#section1"><span class="glyphicon glyphicon-user"></span>  Estudiantes</a>
                    </li>
                    <div id="section1" class="collapse collapse-in">
                        <ul class="nav nav-pills nav-stacked span3">
                            <li class="submenu"><a id="agregarEstudiante" href="#"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
                            </li>
                            <li><a href="">Modificar</a>
                            </li>
                            <li><a href="">Borrar</a>
                            </li>
                        </ul>
                    </div>
                    <!--                      Sección profesores-->
                    <li id="accordion2">
                        <a data-toggle="collapse" data-parent="#accordion2" href="#section2"><span class="glyphicon glyphicon-education"></span>  Profesores</a>
                    </li>
                    <div id="section2" class="collapse collapse-in">
                        <ul class="nav nav-pills nav-stacked span3">
                            <li><a href="#" id="agregarProfesor">Agregar</a>
                            </li>
                            <li><a href="">Modificar</a>
                            </li>
                            <li><a href="">Borrar</a>
                            </li>
                        </ul>
                    </div>
                    <!--                        Sección Niveles-->
                    <li id="accordion3">
                        <a data-toggle="collapse" data-parent="#accordion3" href="#section3"><span class="glyphicon glyphicon-book"></span>  Nivel</a>
                    </li>
                    <div id="section3" class="collapse collapse">
                        <ul class="nav nav-pills nav-stacked span3">
                            <li><a id="agregarGrado" href="#">Agregar nivel</a>
                            </li>
                            <!--<li><a href="">Seccion</a>
                            </li>-->
                            <li><a href="#" id="agregarCurso">Agregar Curso</a>
                            </li>
                            <li><a href="#" id="agregarSeccion">Agregar Sección</a>
                            </li>
                            <!--<li><a href="">Notas</a>
                            </li>-->
                        </ul>
                    </div>
                    <!--     Sección Matricula y notas-->
                    <li id="accordion4">
                        <a data-toggle="collapse" data-parent="#accordion4" href="#section4"><span class="glyphicon glyphicon-list-alt"></span>  Matricula</a>
                    </li>
                    <div id="section4" class="collapse collapse-in">
                        <ul class="nav nav-pills nav-stacked span3">
                            <li><a href="#" id="matricular">Matricular Estudiante</a>
                            </li>
                            <li><a href="#">Modificar</a>
                            </li>
                            <li><a href="#">Borrar</a>
                            </li>
                        </ul>
                    </div>
                    <!--     Sección Reportes-->
                    <li id="accordion5">
                        <a data-toggle="collapse" data-parent="#accordion5" href="#section5"><span class="glyphicon glyphicon-file"></span>  Reportes</a>
                    </li>
                    <div id="section5" class="collapse collapse-in">
                        <ul class="nav nav-pills nav-stacked span3">
                            <li><a href="">Agregar</a>
                            </li>
                            <li><a href="">Modificar</a>
                            </li>
                            <li><a href="">Borrar</a>
                            </li>
                        </ul>
                    </div>

                </ul>


            </div>
            <div class="col-md-10">
                <div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Panel Principal</div>
                        <div id="contenido" class="panel-body">
                            <div class="texto">
                                <img class="img-responsive" src="img/checking1.svg" alt="">
                                <h1>Bienvenido al sistema de control de estudiantes</h1>
                                <p> El sistema le permitirá gestionar los estudiantes, sus cursos y notas asociadas, así como también los profesores asignados a cada curso y los respectivos niveles en los cuales se imparten.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#agregarEstudiante").click(function (event) {
                $("#contenido").load('formularios/agregarEstudiante.php');
            });
            $("#agregarGrado").click(function (event) {
                $("#contenido").load('formularios/agregarNivel.php');
            });
            $("#agregarCurso").click(function (event) {
                $("#contenido").load('formularios/agregarCurso.php');
            });
            $("#agregarProfesor").click(function (event) {
                $("#contenido").load('formularios/agregarProfesor.php');
            });
            $("#matricular").click(function (event) {
                $("#contenido").load('formularios/matricularEstudiante.php');
            });
            $("#agregarSeccion").click(function (event) {
                $("#contenido").load('formularios/agregarSeccion.php');
            });



        });

    </script>
</body>

</html>
