<?php

if($_POST){

    require_once 'includes/conexion.php';

    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
	$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
	$categoria = isset($_POST['categorias']) ? (int)$_POST['categorias'] : false;
	$usuario = $_SESSION['usuario']['id'];

    $errores = array();

    if(empty($titulo)){
        $errores['titulo'] = 'El titulo es invalido';
    }
    if(empty($descripcion)) {
        $errores['descripcion'] = 'la descripcion no es valida';
    }
    if(empty($categoria)){
        $errores['categoria'] = 'La categoria no es valida';
    }


    if(count($errores) == 0){
        $sql = "INSERT INTO entradas VALUE (null, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
        mysqli_query($db, $sql);
        header("Location: index.php");
    }else{
        $_SESSION['errores_entrada'] = $errores;
        header("Location: craer-entradas.php");
    }


}

