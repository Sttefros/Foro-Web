<?php require_once './includes/redireccion.php';?>
<?php require_once './includes/cabecera.php';?>
<?php require_once './includes/lateral.php';?>

<div id="principal">
    <h1>Crear nueva post</h1>
    <form action="guardar-entrada.php" method="POST">
        <label  for="titulo">Titulo</label>
        <input class="titulo" type="text" name="titulo"/>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : '';?>
        
        <label for="descripcion">Descripccion</label>
        <textarea class="textArea" name="descripcion"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : '';?>
        
        <label for="categorias">Cateogiras</label>
        <select name="categorias">
            <?php $categorias = consultarCategorias($db);
                while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
            <option value="<?=$categoria['id']?>">
                <?=$categoria['nombre']?>
            </option>
            <?php
            endwhile;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : '';?>
        
        <input type="submit" value="Generar post"/>
        
        
    </form>
    <?php borrarErrores();?>
</div>


<?php require_once './includes/pie.php';?>