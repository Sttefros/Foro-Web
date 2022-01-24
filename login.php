<?php

//inciaar la sesion y la conexion
require_once 'includes/conexion.php';
//comprobar si existe un post 
if(isset($_POST)){
    
    if(isset($_SESSION['error_login'])){
               session_unset($_SESSION['error_login']);
           }
    
    //recoger datos del formulario
   $email = trim($_POST['email']);
   $password = trim($_POST['password']);
   
   //consulta para comprobrar las credenciales del usuario
   $sql = "SELECT * FROM usuarios WHERE email = '$email'";
   $login = mysqli_query($db, $sql);
   
   if($login && mysqli_num_rows($login) == 1){
       //con mysqli_fetch_assoc saca un array asociativo  del objeto
       $usuario = mysqli_fetch_assoc($login);
       
       //comparar la contrasena del $usuario columna 'password'
       $verify = password_verify($password, $usuario['password']);
       
       //comprovar si existe una contrasena en la variable $verify
       if($verify){
           //utilizar una sesion para guardar los datos del usuario logeado
           $_SESSION['usuario'] = $usuario;
           
           
       }else{
           //si algo falla enviar sesion con el fallo
           $_SESSION['error_login'] = "Login incorrecto!!";
       }
   }else{
       //si algo falla crea sesion con el fallo
       $_SESSION['error_login'] = "Login incorrecto!!";
   }
   
}
//redirigir al index.php 
header('Location : index.php');
