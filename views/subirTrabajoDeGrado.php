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
                        <a href="subirNoticia.php">Publicar Noticia</a>
                    </li>
                    <?php endif; ?>
        
                    <li>
                    <a href="../controllers/buscarTrabajoDeGradoController.php">Trabajos de grado</a>
                    </li>
                    <?php if (isset($_SESSION["user"])) : ?>
                    <li>
                    <a href="subirTrabajoDeGrado.php">Subir trabajo de grado</a>
                    </li>
                    <?php endif ?>
        
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
            <form action="../controllers/subirTrabajoDeGradoController.php" method="post" enctype="multipart/form-data" id="subir-trabajo">
                <h3>Cargar trabajo de grado</h3>
                <br>
                <br>
                <label for="carrera">Carrera</label>
                <select name="carrera" id="">
                    <option value="Ingeniería en Hidrocarburos">Ingeniería en Hidrocarburos</option>
                    <option value="Ingeniería Civil">Ingeniería Civil</option>
                </select>
                <br><br>
                <label for="linea_investigacion">Linea de investigación</label>
                <select name="linea_investigacion" id="">
                    <option value="" disabled><b>Ingeniería en Hidrocarburos Mención Gas y Petroleo</b></option>
                    <option value="Geología">Geología</option>
                    <option value="Yacimientos">Yacimientos</option>
                    <option value="Complementación y reabilitación de pozo">Complementación y reabilitación de pozo</option>
                    <option value="Perforación de pozo">Perforación de Pozo</option>
                    <option value="Procesamiento de hidrocarburos">Procesamiento de hidrocarburos</option>
                    <option value="Producción de hidrocarburos">Producción de hidrocarburos</option>
                    <option value="Petroleo y ambiente">Petroleo y ambiente</option>
                    
                    <option value="" disabled><br></option>

                    <option value="" disabled><b>Ingeniería Civil</b></option>
                    <option value="Administracion de la construccion">Administracion de la construccion</option>
                    <option value="Materiales y procedimientos de construcción">Materiales y Procedimientos de Construcción</option>
                    <option value="Gestión de Construcción">Gestión de Construcción</option>
                    <option value="Diseño, síntesis y caracterización en la innovación y restauración en materiales para la construcción">Diseño, síntesis y caracterización en la innovación y restauración en materiales para la construcción</option>
                    <option value="Topografía e Ingeniería">Topografía e Ingeniería</option>
                    <option value="Topografía aplicada en la comunidad">Topografía aplicada en la comunidad</option>
                    <option value="Transporte, estructura de pavimento y control de calidad">Transporte, estructura de pavimento y control de calidad</option>
                    <option value="Comportamiento de Puentes">Comportamiento de Puentes</option>
                    <option value="Planificación, criterio de diseño y método constructivos Túneles">Planificación, criterio de diseño y método constructivos Túneles</option>
                    <option value="Geotecnia en la ingeniería del transporte">Geotecnia en la ingeniería del transporte</option>
                    <option value="Vulnerabilidad sísmica de estructuras">Vulnerabilidad sísmica de estructuras</option>
                    <option value="Modelación analítica y medición experimental de suelos y estructuras">Modelación analítica y medición experimental de suelos y estructuras</option>
                    <option value="Análisis estructural">Análisis estructural</option>
                    <option value="Diseños estructurales">Diseños estructurales</option>
                    <option value="Patología de la construcción">Patología de la construcción</option>
                    <option value="Balances hidrológicos para la gestión integral de las aguas superficiales y subterráneas">Balances hidrológicos para la gestión integral de las aguas superficiales y subterráneas</option>
                    <option value="Modelos físicos y matemáticos de simulación de recursos hidráulicos">Modelos físicos y matemáticos de simulación de recursos hidráulicos</option>
                    <option value="Hidrología e hidráulica urbana y rural">Hidrología e hidráulica urbana y rural</option>
                    <option value="Riesgos hidrológicos e hidráulicos en zonas urbanas y rurales">Riesgos hidrológicos e hidráulicos en zonas urbanas y rurales</option>
                    <option value="Planeación de los recursos ambientales">Planeación de los recursos ambientales</option>
                    <option value="Calidad ambiental">Calidad ambiental</option>
                    <option value="Impacto ambiental">Impacto ambiental</option>
                    <option value="Tecnología en la ingeniería civil">Tecnología en la ingeniería civil</option>
                </select>
                <br>
                <label for="autor">Autor</label>
                <input type="text" name="autor">
                <br>
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo">
                <br>
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha">
                <br>
                <label for="archivo">Archivo</label>
                <input type="file" name="archivo" id="archivo">
                <br>
                <button type="submit" id="btn-subir">Subir</button>

            </form>
        </section>
        <footer>
            <p>Universidad Nacional Experimental De los LLanos Centrales "Rómulo Gallegos"</p>
        </footer>
    </div>
</body>
</html>