<?php require_once './includes/cabecera.php';?>
<?php require_once './includes/lateral.php';?>



<div id="principal">
    <h1>Editar mis datos</h1>

     <!-- Div que contiene formulario de registro -->
     <div id="registro" class="block">
                    <!-- Mostrar mensajes en formulario registro -->
                    <?php if(isset($_SESSION['completado'])): ?>
                        <div class="alerta alerta-exito">
                            <?=$_SESSION['completado']?>
                        </div>
                    <?php elseif(isset($_SESSION['errores']['general'])):?>
                        <div class="alerta alerta-error">
                            <?=$_SESSION['errores']['general']?>
                        </div>
                    <?php endif; ?>
                    
                    <form action="actualizar-usuario.php" method="POST">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" value="<?=$_SESSION['usuario']['nombre'];?>"/>
                        <!-- invoca la funcion mostrarErrores($nombre) -->
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
                        
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" value="<?=$_SESSION['usuario']['apellido'];?>"/>
                        <!-- invoca la funcion mostrarErrores($apellido) -->
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : '' ?>
                        
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?=$_SESSION['usuario']['email']; ?>"/>
                        <!-- invoca la funcion mostrarErrores($email) -->
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : '' ?>
                        
                       
                        
                        <input type="submit" name="submit" value="Actualizar" />
                      
                    </form>
                    <?php borrarErrores(); ?>
                </div>

</div>





<?php require_once './includes/pie.php';?>
