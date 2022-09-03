<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <div class="wrap">


        <header>
            <div id="banner">
                <img src="assets/img/blue_logo.png" alt="" id="logo">
                <h1>TRABAJOS DE GRADO DEL ÁREA DE INGENIERÍA, ARQUITECTURA Y TECNOLOGÍA</h1>
            </div>
        </header>
        <nav>
            <ul>

                <li>
                    <a href="index.php">Incio</a>
                </li>

                <li>
                    <a href="controllers/buscarNoticia.php">Noticias</a>
                </li>
                <?php if (isset($_SESSION["user"])) : ?>
                    <li>
                        <a href="views/subirNoticia.php">Publicar noticia</a>
                    </li>
                <?php endif; ?>

                <li>
                    <a href="controllers/buscarTrabajoDeGradoController.php">Trabajos de grado</a>
                </li>
                <?php if (isset($_SESSION["user"])) : ?>
                    <li>
                        <a href="views/subirTrabajoDeGrado.php">Subir trabajo de grado</a>
                    </li>
                <?php endif; ?>

                <?php if (!isset($_SESSION["user"])) : ?>
                    <li>
                        <a href="views/login.php">Iniciar sesión</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION["user"])) : ?>
                    <li>
                        <a href="views/logoff.php">Cerrar sesión</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>

        <section id="inicio">
            <h2>Bienvenido</h2>
        </section>

        <footer>
            <p>Universidad Nacional Experimental De los LLanos Centrales "Rómulo Gallegos"</p>
            <div id="enlaces">
                <p><a href="http://cde.unerg.me/">DACE-UNERG</a></p>
            </div>
        </footer>
    </div>
</body>

</html>