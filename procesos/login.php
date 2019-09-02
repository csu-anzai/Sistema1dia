<?php

session_start();
$mensaje="";
if(isset($_POST['btnlogin'])){

    require "../conexion.php";

    $admin = new ConexionBD();

    $usuario=$_POST['txtuser'];
    $pass=md5($_POST['txtpass']);



    $condicion="user ='".$usuario."' and clave ='".$pass."'";
    $u=$admin->buscar("usuario",$condicion);


    if($u){
        foreach ($u as $value) {
            if($value["tipo"]=="admin"){
                
                $nombre=$value['nombre'];
                $_SESSION['admin']=$nombre;
            }

        }
        $mensaje="mensaje=bienvenido";
        header("location: ../index.php"."?".$mensaje);

    }else{
        $mensaje="mensaje=Acceso denegado";
        header("location: ../index.php"."?".$mensaje);
    }

}else{

}

 ?>