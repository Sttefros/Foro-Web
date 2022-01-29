<?php 
require_once './includes/conexion.php';

if(isset($_SESSION['usuario']) && isset($_GET['id'])){
    // rescatar id del usuario y id del post
    $entrada_id = $_GET['id'];
    $usuario_id = $_SESSION['usuario']['id'];

        $consulta = "DELETE FROM entradas WHERE usuario_id = $usuario_id AND id = $entrada_id";
        mysqli_query($db, $consulta);

        
}

header ("Location:index.php");

