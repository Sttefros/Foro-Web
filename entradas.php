<?php require_once './includes/cabecera.php';?>
<?php require_once './includes/lateral.php';?>
<!-- caja principal de contenido -->
<div id="principal">
                <h1>Publicaciones</h1>
                <?php
                    $entradas = conseguirPost($db);
                    if(!empty($entradas) ):
                        while($entrada = mysqli_fetch_assoc($entradas)):
                ?>
                        <article class="entrada">
                            <a href="">
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
            </div>
<?php require_once './includes/pie.php';?>