<?php 
require "../../conexion.php";

$con= new ConexionBD();

$rst = $con->buscar('tipoproducto','1=1');

$tipoproducto=$_POST['idtipoproducto'];

$rst1 = $con->buscar('producto',"id_tipo=".$tipoproducto);
$rst2 = $con->subtotal('sum(precioventa)','producto',"id_tipo=".$tipoproducto);




 ?>

<script>
// generamos el evento para el boton

 
/**
 * funcion que realiza los calculos
 */
</script>
 <style type="text/css">
 	input{
 		border-style: none;
 	}
 </style>

  <div class="col-6"></div>
    <table class="table-sm" id='tablaprod'>
      <thead class="table-dark">
        <tr>
          <th></th>
          <th>N°</th>
          <th>Foto</th>
          <th>Producto</th>
          <th>Detalle</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Sub total</th>
        </tr>
      </thead>
      <tbody>
      	<script type="text/javascript">
      		var total=0;
      	</script>
        <?php 
          if(isset($rst1)){ $i=0; ?>

            <?php foreach ($rst1 as $value) { $i++; ?>



  <script type="text/javascript">


   function <?php echo 'prueba'.$value['id'] ?>(cantidad){

   		var precio = document.getElementById('precio'+<?php echo $value['id'] ?>).value;

   		var importe = cantidad * precio;

    	document.getElementById('subtotal'+<?php echo $value['id'] ?>).value =importe;
  
   }

function calcularTotal(){
	   	var <?php echo 'subtotal'.$value['id'] ?> = parseFloat(document.getElementById('subtotal'+<?php echo $value['id'] ?>).value);
   		
   		total += <?php echo 'subtotal'.$value['id'] ?>;
	  	document.getElementById('totalxd').value =total;
    	if (true) {}
}
 </script>
            <tr>
              <td>
                <a class="btn btn-outline-primary" href=""><i class="far fa-eye"></i></a>
              </td>
              <td><?php echo $i; ?></td>

              <td>
			<a href="#"><img src="../img/producto/<?php echo $value['foto']?>"  
			height="110" class="imagen" alt="..."></a>
              	</td>
              <td><?php echo $value['nombre']; ?></td>
              <td><?php echo $value['detalle']; ?></td>
              <td><input type="text" readonly="readonly" name="<?php echo 'precio'.$value['id'] ?>" id="<?php echo 'precio'.$value['id'] ?>" value="<?php echo $value['precioventa'] ?>" ></td>
              <td>
                <input class="form-group" type="text" onchange="calcularTotal()" name="<?php echo 'cantidad'.$value['id'] ?>" id="<?php echo 'cantidad'.$value['id'] ?>" value="" placeholder="0" size="7" onkeydown="prueba(this.value)" onkeyup="<?php echo 'prueba'.$value['id'] ?>(this.value)" onkeypress="<?php echo 'prueba'.$value['id'] ?>(this.value);return soloNumeros(event)" maxlength="7" onKeyPress='return soloNumeros(event)'>
              </td>       
               <td>
                <input class="form-group" type="text" onchange="calcularTotal()" name="<?php echo 'subtotal'.$value['id'] ?>" id="<?php echo 'subtotal'.$value['id'] ?>" value="0" size="7" readonly="readonly">
              </td>

            </tr>

            <?php } ?>
        <?php }else{
          echo "No hay Cuartos";
        } ?>
      </tbody>
      <tr id="filaxd">
      	<td></td>
      	<td></td>
      	<td></td>
      	<td></td>
      	<td></td>
      	<td></td>
        <td></td>
        <td id='celdaxd'><input type="" name="" id='totalxd' ></td>
      </tr>
    </table>

  
  </div>
