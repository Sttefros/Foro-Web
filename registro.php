<?php


if(isset($_POST)){
    //conexion a la base de datos
    require_once './includes/conexion.php';
    //iniciar sesion si es que no existe una sesion 
    if(!isset($_SESSION)){
        session_start();
    }
  //recojer los valores del formmulario registro  
    //mysqli_real_escape_string interpretar todo lo que pasa por consulta como stringincluyendo simbolos
    // para lograr mas seguridad si se intenta introducir consultar corruptas 
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre'] ): false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($db, $_POST['apellido']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;
    
    
    //array de errores
    $errores = array();
    
    //validaciones de nombre
    if(!empty($nombre) && !is_numeric($nombre)){
        $nombre_validado = true;
        echo "el nombre es valido.";
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido.";
    }
    //validacion de apellido
    if(!empty($apellido) && !is_numeric($apellido)){
        $apellido_validado = true;
        echo "Apellido valido.";
    }else{
        $apellido_validado = false;
        $errores['apellido'] = "El apelldio no es valido.";
    }
    //validacion de email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
        echo "Email validado.";
    }else{
        $email_validado = false;
        $errores['email']= "El email no es valido.";
    }
    //validacion de contrasena
    if(!empty($password)){
        $password_validado = true;
        echo "Password valida.";
    }else{
        $password_validado = false;
        $errores['password'] = "Paswword invalida.";
    }
    $guardar_usuario = false;
    if(count($errores) == 0){
        $guardar_usuario = true;
        //cifrar la contraseña con password_hash 
        $password_segura = password_hash($password, PASSWORD_BCRYPT,['cost'=>4]);
        //insertar usuarios en la tabla usuarios de la bd
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellido', '$email', '$password_segura');";
        $guardar = mysqli_query($db, $sql);
        
        
        
        if($guardar){
            $_SESSION['completado'] = "Registro se ah completado con exito!";
        }else{
            $_SESSION['errores'] ['general'] = "Fallo al registrar usuario !";
        }
        
    }else{
        $_SESSION['errores'] = $errores;
    }
}
header('Location: index.php');