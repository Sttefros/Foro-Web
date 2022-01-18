<?php

if(isset($_POST)){
    //conexion a la base de datos
    require_once './includes/conexion.php';
    
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    
    //array de errores
    $errores = array();
    
    //validaciones de nombre
    if(!empty($nombre)){
        $nombre_validado = true;
        echo "el nombre es valido.";
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido.";
    }
    
    if(count($errores) == 0){
        $sql = "INSERT INTO categorias VALUES(NULL, '$nombre');";
        $guardar = mysqli_query($db, $sql);
    }

}

header("Location: index.php");
