<?php

require "../../conexion.php";

$con= new ConexionBD();

$accion="mostrar";
$res=array("error"=>false);
if(isset($_GET['accion']))
    $accion=$_GET['accion'];

switch ($accion) {
    case 'mostrar':
        $u=$con->buscar("empleado","1");
        if($u){
            $res['empleados']=$u;
            $res['mensaje']="exito";
        }else{
            $res['mensaje']="Aun no hay Registros";
            $res['error']=true;
        }
        
        break;
    case 'insertar':
        $nombre=$_POST['nombre'];
        $detalle=$_POST['detalle'];
        $foto=$_FILES['foto']['name'];

        $target_dir="img/";
        $target_file=$target_dir.basename($foto);
        move_uploaded_file($_FILES['foto']['tmp_name'],$target_file);

        $data="'$nombre','$detalle','$foto'";
        $u=$con->insertar("tareas","nombre,detalle,foto",$data);
        if($u){
            $res['mensaje']="Insercion Exitosa";
        }else{
            $res['mensaje']="Aun no hay Registros";
            $res['error']=true;
        }
        break;
    case 'editar':
        $id=$_POST['eid'];
        $nombre=$_POST['enombre'];
        $detalle=$_POST['edetalle'];
        $foto="";

        if(isset($_FILES['efoto']['name'])){
            $foto=$_FILES['efoto']['name'];
            $target_dir="img/";
            $target_file=$target_dir.basename($foto);
            move_uploaded_file($_FILES['efoto']['tmp_name'],$target_file);
            $foto=", foto='".$_FILES['efoto']['name']."'";
        }

        $data="nombre='$nombre',detalle='$detalle'".$foto;
        $u=$con->actualizar("tareas",$data,"id=".$id);
        if($u){
            $res['mensaje']="edicion Exitosa";
        }else{
            $res['mensaje']="Aun no hay Registros";
            $res['error']=true;
        }
    break;
        break;
    case 'eliminar':
        $id=$_POST['did'];
        $u=$con->borrar("tareas","id=".$id);
        if($u){
            $res['mensaje']="Eliminacion Exitosa";
        }else{
            $res['mensaje']="Aun no hay Registros";
            $res['error']=true;
        } 
        break;
}

echo json_encode($res);
die();
?>