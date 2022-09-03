<?php session_start(); 
    if(!isset($_SESSION["user"])){
        header("Location: ../index.php");
        exit;
    }
?>
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
    
                <li>
                    <a href="../index.php">Incio</a>
                </li>
        
                    <li>
                        <a href="../controllers/buscarNoticia.php">Noticias</a>
                    </li>
                    <?php if (isset($_SESSION["user"])) : ?>
                    <li>
                        <a href="subirNoticia.php">Publicar noticia</a>
                    </li>
                    <?php endif; ?>
        
                    <li>
                    <a href="../controllers/buscarTrabajoDeGradoController.php">Trabajos de grado</a>
                    </li>
                    <?php if (isset($_SESSION["user"])) : ?>
                    <li>
                    <a href="subirTrabajoDeGrado.php">Subir de grado</a>
                    </li>
                    <?php endif; ?>
        
                    
                    <?php if (!isset($_SESSION["user"])) : ?>
                    <li>
                        <a href="login.php">Iniciar sesión</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION["user"])) : ?>
                    <li>
                        <a href="logoff.php">Cerrar sesión</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>

        <section>
            <form action="../controllers/subirNoticiaController.php" method="post" enctype="multipart/form-data" id="subir-noticia">

                <h3>Publicar Noticia</h3>

                <label for="titulo"><b>Titulo</b></label>
                <input type="text" name="titulo">
                <br>
                <br>
                <label for="img"><b>Imagen</b></label>
                <input type="file" name="img" id="img">
                <br>
                <br>
                <label for="contenido"><b>Contenido</b></label>
                <textarea name="contenido" id="contenido" cols="30" rows="10">
                </textarea>
                <br>
                <br>
                <label for="archivo">Archivo</label>
                <input type="file" name="archivo">
                <br>
                <br>
                <button type="submit" id="subir">Subir</button>

            </form>
        </section>
        <footer>
            <p>Universidad Nacional Experimental De los LLanos Centrales "Rómulo Gallegos"</p>
        </footer>
    </div>
</body>
</html>