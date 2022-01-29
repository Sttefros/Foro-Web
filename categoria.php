<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helper.php'; ?>
<?php
	$categoria_actual = conseguirCategoria($db, $_GET['id']);
    // condicional que permite identificar si no existe la categoria solicitada redireccionara a index.php
	if(!isset($categoria_actual['id'])){
		header("Location: index.php");
	}
?>

<?php require_once './includes/cabecera.php';?>
<?php require_once './includes/lateral.php';?>
<!-- caja principal de contenido para las entradas de una categoria especifica -->
<div id="principal">


                <h1>Publicaciones de <?= $categoria_actual['nombre']?></h1>
                <?php
                    $entradas = conseguirPost($db, null, $_GET['id']);
                    if(!empty($entradas) ):
                        while($entrada = mysqli_fetch_assoc($entradas)):
                ?>
                        <article class="entrada">
                            <a href="entrada.php?id=<?=$entrada['id']?>">
                                <h2><?=$entrada['titulo']?></h2>
                                <span class="fecha">
                                    <?=$entrada['categoria'].' | | '.$entrada['fecha']?>
                                </span>
                                    <p>
                                        <?=substr($entrada['descripcion'], 0, 410)."...."?>
                                    </p>
                                <br/><hr color="#2979CD"/>
                            </a>
                        </article>
                <?php     
                        endwhile;
                    else:
                ?>
                <div class="alerta-error">No hay entradas en esta categoria</div>
                <?php  endif;?>
            </div>
<?php require_once './includes/pie.php';?>