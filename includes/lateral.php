<!-- barra lateral con login y registro -->
            <aside id="sidebar">
                <!-- Div que contiene un h3 donde se mustra el nombre y apellido del usuario en caso de que se logee correctamente -->
                <?php if(isset($_SESSION['usuario'])): ?>
                    <div id="usuario-logeado" class="block">
                        <h3>    Bienvenido, 
                            <?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellido'];?>
                        </h3>
                        <!-- Botones  -->
                        <a href="crear-entradas.php" class="boton">Crear nuevo Post</a>
                        <a href="crear-categoria.php" class="boton">Crear categoria</a>
                        <a href="mis-datos.php" class="boton">Editar mis datos</a>
                        <a href="cerrar.php" class="boton">Cerrar Sesion</a>
                    </div>
                <?php endif;  ?>
                
                <?php if(!isset($_SESSION['usuario'])): ?>
                
                <div id="login" class="block">
                    <h3>Ingresa con tu cuenta</h3>
                    
                    <?php if(isset($_SESSION['error_login'])): ?>
			<div class="alerta alerta-error">
				<?=$_SESSION['error_login'];?>
			</div>
		<?php endif; ?>
                    
                    
                    <form action="login.php" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email"/>
                        <br/>
                        <label for="password">Contrasena</label>
                        <input type="password" name="password"/>
                        
                        <input type="submit"  value="Ingresar">
                    </form>
                </div>
                <!-- Div que contiene formulario de registro -->
                <div id="registro" class="block">
                    <h3>Registrate</h3>
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
                    
                    <form action="registro.php" method="POST">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre"/>
                        <!-- invoca la funcion mostrarErrores($nombre) -->
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
                        
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido"/>
                        <!-- invoca la funcion mostrarErrores($apellido) -->
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : '' ?>
                        
                        <label for="email">Email</label>
                        <input type="email" name="email"/>
                        <!-- invoca la funcion mostrarErrores($email) -->
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : '' ?>
                        
                        <label for="password">Contrasena</label>
                        <input type="password" name="password"/>
                        <!-- invoca la funcion mostrarErrores($password) -->
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : '' ?>
                        
                        <input type="submit" name="submit" value="Registrar" />
                      
                    </form>
                    <?php borrarErrores(); ?>
                </div>
                <?php endif;?>
            </aside>