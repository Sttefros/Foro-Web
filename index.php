<?php require_once './includes/cabecera.php';?>
<?php require_once './includes/lateral.php';?>
            <!-- caja principal de contenido -->
            <div id="principal">
                <h1>Publicaciones</h1>
                <?php
                    $entradas = conseguirPost($db, true);
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
                    endif;
                ?>
                <div id="ver-todas">
                    <a href="entradas.php">Ver Todos los post</a>
                </div>
            </div>
<?php require_once './includes/pie.php';?>

