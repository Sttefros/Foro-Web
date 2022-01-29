<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helper.php'; ?>

<?php
	$entrada_actual = conseguirPostPorId($db, $_GET['id']);

	if(!isset($entrada_actual['id'])){
		header("Location: index.php");
	}
?>
<?php require_once './includes/cabecera.php';?>
<?php require_once './includes/lateral.php';?>

<!-- caja principal de contenido para laa entrada solicitada -->
<div id="principal">


   <h1><?= $entrada_actual['titulo']?></h1>
   <a href="categoria.php?id=<?= $entrada_actual['categoria_id']?>">
        <h2><?= $entrada_actual['categoria']?></h2>
   </a>
   <span class="fecha"><?= $entrada_actual['fecha']?></span>
   <p>Autor: <?= $entrada_actual['usuario']?></p>
    </br>
   <p><?= $entrada_actual['descripcion'] ?></p>

    <?php if($_SESSION['usuario'] && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']) : ?>
        <!-- Botones  -->
        <a href="editar-entrada.php?id=<?=$entrada_actual['id']?>" class="botons">Editar Post</a>
        <a href="borrar-entrada.php?id=<?=$entrada_actual['id']?>" class="botons">Eliminar Entrada</a>
    <?php endif; ?>

</div>

<?php require_once './includes/pie.php';?>

