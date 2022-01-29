<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helper.php'; ?>


<!doctype html>

<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Foro videojuegos</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/style.css"/>
    </head>
    <body>
        <!-- cabecera -->
        <header id="cabecera">
            <div id="logo">
                <a href="index.php">
                     Foro videojuegos
                </a>
            </div>
            
            <!--menu-->
            <nav id="menu">
                <!--listado de paginas-->
                <ul>
                    <li>
                        <!--link a index.php-->
                        <a href="index.php">Inicio</a>
                    </li>
                        <?php 
                            $categorias = consultarCategorias($db); 
                            if(!empty($categorias)):
                                while($categoria = mysqli_fetch_assoc($categorias)) :
                        ?>
                            <li>
                                <a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?> </a>
                            </li>
                        <?php 
                                endwhile;
                            endif;
                        ?>
                    <li>
                        <a href="index.php">Contacto</a>
                    </li>
                </ul>
            </nav>
            
            <div class="clearfix"></div>
    
        </header>
    <div id="container">