<?php

require "../../conexion.php";

$con= new ConexionBD();

$accion="mostrar";
$res=array("error"=>false);
if(isset($_GET['accion']))
    $accion=$_GET['accion'];

switch ($accion) {
    case 'mostrar':
        $u=$con->buscar("tipoproducto","1");
        if($u){
            $res['tipoProductos']=$u;
            $res['mensaje']="exito";
        }else{
            $res['mensaje']="Aun no hay Registros";
            $res['error']=true;
        }
        
        break;
    case 'insertar':
        $nombre=$_POST['nombre'];
        $detalle=$_POST['detalle'];

        $data="'$nombre','$detalle'";
        $u=$con->insertar("tipoproducto","nombre,detalle",$data);
        if($u){
            $res['mensaje1']="Insercion Exitosa";
            $res['color']="success";
        }else{
            $res['mensaje1']="Aun no hay Registros";
            $res['error']=true;
        }
        break;
    case 'editar':
        $id=$_POST['eid'];
        $nombre=$_POST['enombre'];
        $detalle=$_POST['edetalle'];

        $data="nombre='$nombre',detalle='$detalle'";
        $u=$con->actualizar("tipoproducto",$data,"id=".$id);
        if($u){
            $res['mensaje1']="Edicion Exitosa";
            $res['color']="warning";
        }else{
            $res['mensaje1']="Aun no hay Registros";
            $res['error']=true;
        }
    break;
        break;
    case 'eliminar':
        $id=$_POST['did'];
        $u=$con->borrar("tipoproducto","id=".$id);
        if($u){
            $res['mensaje1']="Eliminacion Exitosa";
            $res['color']="danger";
        }else{
            $res['mensaje1']="Aun no hay Registros";
            $res['error']=true;
        } 
        break;
}

echo json_encode($res);
die();
?>