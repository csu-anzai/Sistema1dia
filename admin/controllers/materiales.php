<?php

require "../../conexion.php";

$con= new ConexionBD();

$accion="mostrar";
$res=array("error"=>false);
if(isset($_GET['accion']))
    $accion=$_GET['accion'];

switch ($accion) {
    case 'mostrar':
        $u=$con->buscar("material","1");
        if($u){
            $res['materiales']=$u;
            $res['mensaje']="exito";
        }else{
            $res['mensaje']="Aun no hay Registros";
            $res['error']=true;
        }
        
        break;
    case 'insertar':
        $nombre=$_POST['nombre'];
        $detalle=$_POST['detalle'];
        $compra=$_POST['compra'];
        $venta=$_POST['venta'];
        $ganancia=$_POST['ganancia'];
        $tipo=$_POST['tipo'];

        $data="'$nombre','$detalle','$compra','$venta','$ganancia',$tipo";
        $u=$con->insertar("material","nombre,detalle,preciocompra,precioventa,ganancia,id_tipo",$data);
        if($u){
            $res['mensaje']="Insercion Exitosa";
            $res['color']="success";
        }else{
            $res['mensaje']="Aun no hay Registros";
            $res['error']=true;
        }
        break;
    case 'editar':
        $id=$_POST['eid'];
        $nombre=$_POST['enombre'];
        $detalle=$_POST['edetalle'];
        $compra=$_POST['ecompra'];
        $venta=$_POST['eventa'];
        $ganancia=$_POST['eganancia'];

        $data="nombre='$nombre',detalle='$detalle',preciocompra='$compra',precioventa='$venta',ganancia='$ganancia'";
        $u=$con->actualizar("material",$data,"id=".$id);
        if($u){
            $res['mensaje']="Edicion Exitosa";
            $res['color']="warning";
        }else{
            $res['mensaje']="Aun no hay Registros";
            $res['error']=true;
        }
    break;
        break;
    case 'eliminar':
        $id=$_POST['did'];
        $u=$con->borrar("material","id=".$id);
        if($u){
            $res['mensaje']="Eliminacion Exitosa";
            $res['color']="danger";
        }else{
            $res['mensaje']="Aun no hay Registros";
            $res['error']=true;
        } 
        break;
    case 'mostrar2':
        $u=$con->buscar("tipomaterial","1");
        if($u){
            $res['tipo']=$u;
            $res['mensaje']="exito";
        }else{
            $res['mensaje']="Aun no hay Registros";
            $res['error']=true;
        }
        break;
}

echo json_encode($res);
die();
?>