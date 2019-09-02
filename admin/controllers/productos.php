<?php

require "../../conexion.php";

$con= new ConexionBD();

$accion="mostrar";
$res=array("error"=>false);
if(isset($_GET['accion']))
    $accion=$_GET['accion'];

switch ($accion) {
    case 'mostrar':
        $u=$con->buscar("producto","1");
        if($u){
            $res['productos']=$u;
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
        $id_tipo=$_POST['tipo'];
        $foto=$_FILES['foto']['name'];

        $target_dir="../../img/producto/";
        $target_file=$target_dir.basename($foto);
        move_uploaded_file($_FILES['foto']['tmp_name'],$target_file);

        $data="'$nombre','$detalle','$foto','$compra','$venta','$ganancia','$id_tipo'";
        $u=$con->insertar("producto","nombre,detalle,foto,preciocompra,precioventa,ganancia,id_tipo",$data);
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
        $id_tipo=$_POST['etipo'];
        $foto="";

        if(isset($_FILES['efoto']['name'])){
            $foto=$_FILES['efoto']['name'];
            $target_dir="../../img/producto/";
            $target_file=$target_dir.basename($foto);
            move_uploaded_file($_FILES['efoto']['tmp_name'],$target_file);
            $foto=", foto='".$_FILES['efoto']['name']."'";
        }

        $data="nombre='$nombre',detalle='$detalle',preciocompra='$compra',precioventa='$venta',ganancia='$ganancia',id_tipo='$id_tipo'".$foto;
        $u=$con->actualizar("producto",$data,"id=".$id);
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
        $u=$con->borrar("producto","id=".$id);
        if($u){
            $res['mensaje']="Eliminacion Exitosa";
            $res['color']="danger";
        }else{
            $res['mensaje']="Aun no hay Registros";
            $res['error']=true;
        } 
        break;
    case 'mostrar2':
        $u=$con->buscar("tipoproducto","1");
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