<?php

session_start();
$mensaje="";
if(isset($_POST['btnlogin'])){

    require "../conexion.php";

    $admin = new ConexionBD();

    $usuario=$_POST['txtuser'];
    $pass=md5($_POST['txtpass']);



<<<<<<< master
    $condicion="user ='".$usuario."' and clave ='".$pass."'";
    $u=$admin->buscar("usuario",$condicion);
=======
    $condicion="usuario ='".$usuario."' and contraseña ='".$pass."' and estado=1";
    $u=$admin->validar2($condicion);
>>>>>>> xd


    if($u){
        foreach ($u as $value) {
<<<<<<< master
            if($value["tipo"]=="admin"){
                
                $nombre=$value['nombre'];
                $_SESSION['admin']=$nombre;
=======
            if($value["nombre"]=="admin"){
                
                $nombre=$value['nombre'];
                $_SESSION['admin']=$nombre;

            }else if($value["nombre"]=="tecnico"){

                $_SESSION['tecnico']=$value['nombres'];

            }else if($value["nombre"]=="cajero"){

                $_SESSION['cajero']=$value['nombres'];

            }else{
                $_SESSION['empleado']=$value['id'];
>>>>>>> xd
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