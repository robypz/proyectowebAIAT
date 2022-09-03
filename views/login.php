<?php
    session_start();
    $session=true;

    if(isset($_POST["iniciar"])){
        require("../models/UserModel.php");
        $u = new User();
        $session=$u->login($_POST["user"], $_POST["password"]);

        if($session){
            header("Location: ../index.php");
            exit;
        }else{
            $session=false;
        }

    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <a href="subirTrabajoDeGrado.php">Subir trabajos de Grado</a>
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
        <form action="login.php" method="post" id="login">
            <BR></BR>
            <h3>Iniciar sesión</h3>
            <br>
            <input type="text" placeholder="Usuario" name="user">
            <br>
            <br>
            <input type="password" placeholder="Contraseña" name="password">
            <br>
            <br>
            <input type="submit" name="iniciar" value="Iniciar Sesion" id="btn-iniciar">
        </form>
    </section>

    <footer>
        <p>Universidad Nacional Experimental De los LLanos Centrales "Rómulo Gallegos"</p>
    </footer>
</div>
</body>
    <?php if($session==false): ?>
        <script>
            alert("Nombre de usuarios o contraseña incorrectos");
        </script>
    <?php endif; ?>
</html>