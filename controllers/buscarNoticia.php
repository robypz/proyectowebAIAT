<?php
session_start();
require("../models/NoticiaModel.php");

$n=new Noticia();

$limit = 10;


$s = $n->count();

$total_results = $s;
$total_pages = ceil($total_results/$limit);

if (!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = $_GET['page'];
}



$starting_limit = ($page-1)*$limit;



$r = $n->select($starting_limit,$limit);

    

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
                <a href="buscarNoticia.php">Noticias</a>
            </li>
            <?php if (isset($_SESSION["user"])) : ?>
            <li>
                <a href="../views/subirNoticia.php">Publicar noticia</a>
            </li>
            <?php endif; ?>

            <li>
            <a href="buscarTrabajoDeGradoController.php">Trabajos de grado</a>
            </li>
            <?php if (isset($_SESSION["user"])) : ?>
            <li>
            <a href="../views/subirTrabajoDeGrado.php">Subir de grado</a>
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

        <div  id="noticias">
            <h2>Noticias</h2>
            

            <?php
                while($res = $r->fetch(PDO::FETCH_ASSOC)):
                ?>
                <div class="noticia">

                

                <p><img src="../uploads/noticias/<?php echo $res['img'];?>" alt="" srcset="" height="480px" class="noticia-img"></p>
                <h3><?php echo $res['titulo'];?></h3>
                <br>
                <br>
                <p class="content"><?php echo $res['contenido'];?></p>
                <?php if($res['archivo']!=""):?>
                    <p><a title="Descargar titulo" href="../uploads/documents/<?php echo $res['archivo']; ?>" download="<?php echo $res['archivo']; ?>">Descargar Documentos</a></p>
                <?php endif;?>
                <br><br>
                <p class="fecha"><?php echo $res['fecha'];?></p>
                </div>
                <?php
                endwhile;


                for ($page=1; $page <= $total_pages ; $page++):?>
                    <div id="paginas">
                    <a href='<?php echo "?page=$page"; ?>' class="links"><?php  echo $page; ?></a>
                    </div>
                    

                <?php endfor; ?>

            </div>
        <footer>
        <p>Universidad Nacional Experimental De los LLanos Centrales "Rómulo Gallegos"</p>
    </footer>
    </div>
</body>
</html>