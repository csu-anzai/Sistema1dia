<?php 
require "inc/header.php"?>
<br>
<div class="container">

<div class="card border border-primary" style="width: 330px;  ">
    <div class="card-body">
    Bienvenido <strong><?php echo $_SESSION['admin'] ?></strong>
    </div>
</div>
<br>

<div id="app">
<div class="row">

    <div class="col-auto">
        <div class="card" style="width: 18rem;">
        <div class="contenedor">

        <a href="#"><img src="img/fondos/usuarios.jpg" height="250" class="imagen" alt="..."></a>
        </div>
        <div class="card-body">
            <h5 class="card-title">Usuarios</h5>
            <p class="card-text">Aqui podras Ver ,agregar , modificar y eliminar usuarios</p>
        </div>
        </div>
    </div>
    <div class="col-auto">
    <div class="card" style="width: 19rem;">

        <a href="#s" @click="newmaterial=true" ><img src="img/fondos/usuarios.jpg" height="250" class="imagen" alt="..."></a>
        </div>
        <div class="card-body">
            <h5 class="card-title">Material</h5>
            <p class="card-text">Aqui podras Ver ,agregar , modificar y eliminar Materiales </p>
        </div>
        </div>
    </div>

    <div class="col-auto">
    <div class="card" style="width: 18rem;">

    <div class="contenedor">
        <a href="#" @click="newempleados=true"><img class="imagen" src="img/fondos/empleados.jpg" height="250"  alt="..."></a>
        </div>
        <div class="card-body">
            <h5 class="card-title">Productos</h5>
            <p class="card-text">Aqui podras Ver, agregar , modificar y eliminar productos</p>
        </div>
        </div>
    </div>
    
</div>

<!-------------empleados--------------------------->
<!-- Button trigger modal -->

<!-- Modal -->

<div class="contenido" v-if="newmaterial">

 <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
             <center><h2 class="text-center">Materiales</h2></center>
            <button type="button" class="close" @click="newmaterial=false" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php include "pages/materiales.php"; ?>
             </div>
         </div>
     </div>

</div>


<div class="contenido" v-if="newempleados">

 <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
             <center><h2 class="text-center">Productos</h2></center>
            <button type="button" class="close" @click="newempleados=false" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <?php require "pages/productos.php" ?>
             </div>
         </div>
     </div>

</div>






</div>


</div>

<?php require "inc/footer.php"?>
