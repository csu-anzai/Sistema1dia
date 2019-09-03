<?php 
require "../../conexion.php";

$con= new ConexionBD();

$rst = $con->buscar('tipoinstalacion','1=1');

$tipoinstalacion=$_POST['tipoinstalacion'];

$rst1 = $con->buscar('instalacion',"id_tipo=".$tipoinstalacion);

$lugarinstalacion=$_POST['lugarinstalacion'];
if ($lugarinstalacion != "lima" && $lugarinstalacion !=0) {
  $cajapasaje = "<input type='text' value='' id='pasaje' name='pasaje' placeholder='Ingrese aqui el costo del pasaje' size='35' onKeyPress='return filterFloat(event,this)'> <br>";
}
else{
  $cajapasaje = "";
}

 ?>

 <style type="text/css">
  input{
    border-style: none;
  }
 </style>
  <div class="col-6"></div>
    <table class="table-sm">
      <thead class="table-dark">
        <tr>
          <th></th>
          <th>N°</th>
          <th>Foto</th>
          <th>Producto</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Sub Total</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          if(isset($rst1)){ $i=0; ?>

            <?php foreach ($rst1 as $value) { $i++; ?>
  <script type="text/javascript">


   function <?php echo 'prueba'.$value['id'] ?>(cantidad){

      var precio = document.getElementById('precio'+<?php echo $value['id'] ?>).value;

      var importe = cantidad * precio;

      document.getElementById('subtotal'+<?php echo $value['id'] ?>).value =importe;
   }
 </script>
            <tr>
              <td>
                <a class="btn btn-outline-primary" href=""><i class="far fa-eye"></i></a>
              </td>
              <td><?php echo $i; ?></td>
               <td>
               <a href="#"><img src="../img/producto/<?php echo ""?>"  
               height="150" class="imagen" alt="..."></a>
                </td>
              <td><?php echo $value['Nombre']; ?></td>
              <td><input type="text" readonly="readonly" name="<?php echo 'precio'.$value['id'] ?>" id="<?php echo 'precio'.$value['id'] ?>" value="<?php echo $value['precioporunidad'] ?>" ></td>
              <td>
                <input onKeyPress='return soloNumeros(event)' class="form-group" type="text" name="<?php echo 'cantidad'.$value['id'] ?>" id="<?php echo 'cantidad'.$value['id'] ?>" value="" placeholder="0" size="7" onkeydown="prueba(this.value)" onkeyup="<?php echo 'prueba'.$value['id'] ?>(this.value)" onkeypress="<?php echo 'prueba'.$value['id'] ?>(this.value)" maxlength="7" >
              </td>       
               <td>
                <input class="form-group" type="text" name="<?php echo 'subtotal'.$value['id'] ?>" id="<?php echo 'subtotal'.$value['id'] ?>" value="0" size="7" readonly="readonly">
              </td>

            </tr>

            <?php } ?>
        <?php }else{
          echo "No hay Cuartos";
        } ?>
      </tbody>
      <tr>
        <?php echo $cajapasaje ?>
      </tr>
        <tr id="filaxd">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td id='celdaxd'>HOLAAAA</td>
        <td id='celdaxd'>K PZ</td>
      </tr>
    </table>

  
  </div>
