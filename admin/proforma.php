<script type="text/javascript" src="../Style/jquery.js"></script>
<?php 
session_start();
require "inc/header.php";
require "../conexion.php";

$con= new ConexionBD();

$rst = $con->buscar('tipoproducto','1=1');
$rst1 = $con->buscar('tipomaterial','1=1');
$rst2 = $con->buscar('tipoinstalacion','1=1');

?>
<style type="text/css">
  #filaxd{
    background-color: black;
  }  #celdaxd{
    background-color: white;
  }

</style>
<br>
<div class="container">
<div class="card border border-primary" style="width: 330px;  ">
    <div class="card-body">
    Bienvenido <strong><?php echo $_SESSION['admin'] ?></strong>
    </div>
</div>
<br>
 <script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e)
{
  var key = window.Event ? e.which : e.keyCode
  return ((key >= 48 && key <= 57) || (key==8))
}

</script>
 <script type="text/javascript">
// Solo permite ingresar numeros.
function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;    
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{       
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {     
              return true;              
          }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{       
                    return true;
                }
          }else{
              return false;
          }
    }
}
function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }
    
}
</script>
<div id="app">
<div class="row">

    <div class="col-auto">
    <div class="card" style="width: 19rem;">

        </div>
    </div>
    
</div>
  <div class="container">
  <h2><center>Productos</center></h2>
  <br>
  <form action="#" method="post">


          <div class="row">
          <div class="form-group">
            <label>Kit de Productos</label>
            <select class="form-control" name="cbproducto" id="cbproducto">
              <option value="0">TODOS</option>
              <?php foreach ($rst as $value): ?>
                      <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>        

                            <?php endforeach ?>              
            </select>
          </div>        
          
          </div>
  </form>
          <div id="listaproductos"></div>  


</div> 

 <div class="container">
  <h2><center>Materiales</center></h2>
  <br>
  <form action="#" method="post">


          <div class="row">
          <div class="form-group">
            <label>Materiales</label>
            <select class="form-control" name="cbmaterial" id="cbmaterial">
              <option value="0">TODOS</option>
              <?php foreach ($rst1 as $value): ?>
                      <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>        

                            <?php endforeach ?>              
            </select>
          </div>        
          
          </div>
  </form>
          <div id="listamateriales"></div>  


</div> 
 <div class="container">
  <h2><center>Instalacion</center></h2>
  <br>
  <form action="#" method="post">


          <div class="row">
          <div class="form-group">
            <input type="" name="">
            <select class="form-control" name="cbinstalacion" id="cbinstalacion">
              <option value="0">TODOS</option>
              <?php foreach ($rst2 as $value): ?>
                      <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>        

                            <?php endforeach ?>              
            </select>
            <label>Lugar de Instalacion</label>
            <select class="form-control" name="cblugar" id="cblugar">
              <option value="0">-Seleccione-</option>
              <option value="lima">Lima</option>     
              <option value="2">Otros</option>     
            </select>
          </div>  
          </div>        
          
          </div>        
  </form>
          <div id="listainstalacion"></div>  


</div>


</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#cbproducto').val(0);
    recargarListaProductos();
    $('#cbproducto').change(function(){
      recargarListaProductos();
    });
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#cbmaterial').val(0);
    recargarListaMateriales();
    $('#cbmaterial').change(function(){
      recargarListaMateriales();
    });
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#cbinstalacion').val(0);
    recargarListaInstalacion();
    $('#cbinstalacion').change(function(){
      recargarListaInstalacion();
    });
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#cblugar').val(0);
    recargarListaInstalacion();
    $('#cblugar').change(function(){
      recargarListaInstalacion();
    });
  })
</script>
<script type="text/javascript">
  function recargarListaProductos(){
    $.ajax({
      type:"POST",
      url:"controllers/controlarproducto.php",
      data:{idtipoproducto:$('#cbproducto').val()}, 
      success:function(r){
        $('#listaproductos').html(r);
      }
    });
  }
</script>
<script type="text/javascript">
  function recargarListaMateriales(){
    $.ajax({
      type:"POST",
      url:"controllers/controlarmaterial.php",
      data:{idtipomaterial:$('#cbmaterial').val()}, 
      success:function(r){
        $('#listamateriales').html(r);
      }
    });
  }
</script>
<script type="text/javascript">
  function recargarListaInstalacion(){
    $.ajax({
      type:"POST",
      url:"controllers/controlarinstalacion.php",
      data:{tipoinstalacion:$('#cbinstalacion').val(),lugarinstalacion:$('#cblugar').val()}, 
      success:function(r){
        $('#listainstalacion').html(r);
      }
    });
  }
</script>

<?php require "inc/footer.php"?>
