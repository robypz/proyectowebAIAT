<?php
session_start(); 
if(!isset($_SESSION["user"])){
    header("Location: ../index.php");
    exit;
}
require("../models/TrabajoDeGradoModel.php");

$tdg = new TrabajoDeGrado();

$fichero = $_FILES["archivo"];

move_uploaded_file($fichero["tmp_name"], "../uploads/trabajosDeGrado/" . $fichero["name"]);

$result=$tdg->insert($_POST["carrera"],$_POST["linea_investigacion"],$_POST["autor"],$_POST["titulo"],$_POST["fecha"],$fichero["name"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNERG AIAT</title>
</head>
<body>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
<div class="wrap">


<header>
        <div id="banner">
        <img src="../assets/img/blue_logo.png" alt="" id="logo">
            <h1>TRABAJOS DE GRADO DEL ÁREA DE INGENIERÍA, ARQUITECTURA Y TECNOLOGÍA</h1>
        </div>
    </header>
<nav>
    <ul>

    <a href="../index.php">Incio</a>
        </li>

            <li>
                <a href="buscarNoticia.php">Noticias</a>
            </li>
            <?php if (isset($_SESSION["user"])) : ?>
            <li>
                <a href="../views/subirNoticia.php">Subir noticia</a>
            </li>
            <?php endif; ?>

            <li>
            <a href="buscarTrabajoDeGradoController.php">Trabajos de grado</a>
            </li>
            <?php if (isset($_SESSION["user"])) : ?>
            <li>
            <a href="../views/subirTrabajoDeGrado.php">Subir trabajo de Grado</a>
            </li>
            <?php endif; ?>

            
            <?php if (!isset($_SESSION["user"])) : ?>
                    <li>
                        <a href="../views/login.php">Iniciar sesión</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION["user"])) : ?>
                    <li>
                        <a href="../views/logoff.php">Cerrar sesión</a>
                    </li>
                <?php endif; ?>
    </ul>
</nav>

        <section>
            <?php if($result): ?>
                <div id="exito">
                    <p>
                        ¡Proyecto subido con exito!
                    </p>
                    <a href="../views/subirTrabajoDeGrado.php"><button>Aceptar</button></a>
                </div>
            <?php endif; ?>
            
            <?php if(!$result): ?>
                <div id="error">
                    <p>
                        ¡No se ha subido el proyecto!
                    </p>
                    <a href="../views/subirTrabajoDeGrado.php"><button>Aceptar</button></a>
                </div>
            <?php endif; ?>

        </section>
        <footer>
        <p>Universidad Nacional Experimental De los LLanos Centrales "Rómulo Gallegos"</p>
    </footer>
</div>
</body>
</html>
</body>
</html>