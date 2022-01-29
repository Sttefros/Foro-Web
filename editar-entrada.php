<?php require_once 'includes/redireccion.php';?>
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

<div id="principal">
    <h1>Editar Post</h1>
    <p>Edita tu entrada <?=$entrada_actual['titulo']?></p>

    <form action="guardar-entrada.php?editar=<?=$entrada_actual['id']?>" method="POST">
        <label  for="titulo">Titulo</label>
        <input type="text" name="titulo" value="<?=$entrada_actual['titulo']?>"/>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : '';?>
        
        <label for="descripcion">Descripccion</label>
        <textarea class="textArea" name="descripcion"><?=$entrada_actual['descripcion']?></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : '';?>
        
        <label for="categorias">Cateogiras</label>
        <select name="categorias">
            <?php 
                $categorias = consultarCategorias($db);
                while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
            <option value="<?=$categoria['id']?>" <?=($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"' : ''?>>
                <?=$categoria['nombre']?>
            </option>
            <?php
            endwhile;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : '';?>
        
        <input type="submit" value="Guardar" />
        
    </form>
    <?php borrarErrores();?>
    
    
</div>


<?php require_once './includes/pie.php';?>
