<?php 
require "../../conexion.php";

$con= new ConexionBD();

$rst = $con->buscar('tipomaterial','1=1');

$tipomaterial=$_POST['idtipomaterial'];

$rst1 = $con->buscar('material',"id_tipo=".$tipomaterial);
  

    

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
          <th>Detalle</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Sub total</th>
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
              <td><?php echo $value['nombre']; ?></td>
              <td><?php echo $value['detalle']; ?></td>
              <td><input type="text" readonly="readonly" name="<?php echo 'precio'.$value['id'] ?>" id="<?php echo 'precio'.$value['id'] ?>" value="<?php echo $value['precioventa'] ?>" ></td>
              <td>
                <input  class="form-group" type="text" name="<?php echo 'cantidad'.$value['id'] ?>" id="<?php echo 'cantidad'.$value['id'] ?>" value="" placeholder="0" size="7" onkeydown="prueba(this.value)" onkeyup="<?php echo 'prueba'.$value['id'] ?>(this.value)" onkeypress="<?php echo 'prueba'.$value['id'] ?>(this.value);return soloNumeros(event)"  maxlength="7" >
              </td>       
               <td>
                <input class="form-group"  type="text" onmousemove="calcularsubtotal()" name="<?php echo 'subtotal'.$value['id'] ?>" id="<?php echo 'subtotal'.$value['id'] ?>" value="0" size="7" readonly="readonly" >
              </td>
            </tr>


            <?php
             } ?>
        <?php }else{
          echo "No hay Cuartos";
        } ?>
      </tbody>
      <script type="text/javascript">
        function calcular() {
    // obtenemos todas las filas del tbody
    var filas=document.querySelectorAll("#miTabla tbody tr");
 
    var total=0;
 
    // recorremos cada una de las filas
    filas.forEach(function(e) {
 
        // obtenemos las columnas de cada fila
        var columnas=e.querySelectorAll("td");
 
        // obtenemos los valores de la cantidad y importe
        var cantidad=parseFloat(columnas[1].textContent);
        var importe=parseFloat(columnas[2].textContent);
 
        // mostramos el total por fila
        columnas[3].textContent=(cantidad*importe).toFixed(2);
 
        total+=cantidad*importe;
    });
 
    // mostramos la suma total
    var filas=document.querySelectorAll("#miTabla tfoot tr td");
    filas[1].textContent=total.toFixed(2);
}
</script>
      </script>
      <tr id="filaxd">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
        </td>
        <td id='celdaxd'><input type="text" name="total" id="total"></td>
      </tr>
    </table>

  
  </div>
