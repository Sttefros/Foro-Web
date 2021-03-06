<?php


if(isset($_POST)){
    //conexion a la base de datos
    require_once './includes/conexion.php';
    
  //recojer los valores del formmulario de actualizacion
    //mysqli_real_escape_string interpretar todo lo que pasa por consulta como stringincluyendo simbolos
    // para lograr mas seguridad si se intenta introducir consultar corruptas 
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
	$apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($db, $_POST['apellido']) : false;
	$email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    
    
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
    
    $guardar_usuario = false;
    if(count($errores) == 0){
        $usuario = $_SESSION['usuario'];
        $guardar_usuario = true;

        //comprobar que el email existe en la db
        $sql = "SELECT id, email FROM usuarios WHERE email = '$email'";
        $isset_email = mysqli_query($db, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);

        if($isset_user['id'] == $usuario['id'] || empty($isset_user)){

            $usuario = $_SESSION['usuario'] ;
            $sql = "UPDATE usuarios SET ".
                    "nombre = '$nombre', ".
                    "apellido= '$apellido', ".
                    "email = '$email' ".
                    "WHERE id = ".$usuario['id'];
            $guardar = mysqli_query($db, $sql);
            
        
            
            if($guardar){
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellido'] = $apellido;
                $_SESSION['usuario']['email'] = $email;
                $_SESSION['completado'] = "Tus datos se actualizaron con exito!";
            }else{
                $_SESSION['errores'] ['general'] = "Fallo al actualizar tus datos de usuario !";
            }
        }else{
            $_SESSION['errores'] ['general'] = "El usuario ya existe!";
        }
        
    }else{
        $_SESSION['errores'] = $errores;
    }
}
header('Location: mis-datos.php');