<div class="container">

<div v-if="mensaje" :class="'alert alert-'+(color) + ' alert-dismissible fade show'"  role="alert">
    {{mensaje}}
  <button class="close" @click="mensaje=false">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<button class="btn btn-success btn-sm" @click="nuevoMaterial=true">Nuevo</button><br><br>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Detalle</th>
                <th>$ Compra</th>
                <th>$ Venta</th>
                <th>Ganancia</th>
                <th>Tipo</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="material of materiales">
                <td><div style="width: 150px">{{material.nombre}}</div></td>
                <td><div style="width: 200px">{{material.detalle}}</div></td>
                <td>S/. {{material.preciocompra}}</td>
                <td>S/. {{material.precioventa}}</td>
                <td>S/. {{material.ganancia}}</td>
                <td>{{material.id_tipo}}</td>
                <td>
                    <button @click="editarMaterial=true;elegirMaterial(material)" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                    <button @click="eliminarMaterial=true;elegirMaterial(material)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="contenido" v-if="nuevoMaterial">

<div class="modal-dialog modal-xl modal-dialog-scrollable">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Nuevo Material</h2></center>
           <button type="button" class="close" @click="nuevoMaterial=false" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-3 ml-5"></div>
                     <div class="col-5">
                         <div class="card">
                             <div class="card-body">
                            <div class="form-group">
                                 <label for="">Nombre</label>
                                 <input class="form-control" type="text" name="nombre" id="nombre">
                            </div>
                            <div class="form-group">
                                 <label for="">Detalle</label>
                                 <textarea class="form-control" name="detalle" id="detalle" cols="20" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                 <label for="">Compra</label>
                                 <input class="form-control" type="number" name="compra" id="compra" v-model="compra">
                            </div>
                            <div class="form-group">
                                 <label for="">Venta</label>
                                 <input class="form-control" type="number" name="venta" id="venta" v-model="venta">
                            </div>
                            <div class="form-group">
                                 <label for="">Ganancia</label>
                                 <input class="form-control" type="number" name="ganancia" :value="(sumarFrutas)" id="ganancia">
                            </div>
                            <div class="form-group">
                                 <label for="">Tipo</label>
                                 <select class="form-control" name="tipo" id="tipo">
                                     <option v-for="item of tipoMaterial" :value="(item.id)">{{item.nombre}}</option>
                                 </select>
                                 
                            </div>
                            <div class="form-group">
                                <button class="btn btn-outline-success btn-block" @click="nuevoMaterial=false;insertarMaterial()">Insertar</button>
                            </div>
                             </div>
                         </div>
                    
                        </div>
                 </div>
                

            </div>
        </div>
    </div>

</div>

<!----- Editar Producto ------>

<div class="contenido" v-if="editarMaterial">

<div class="modal-dialog modal-xl modal-dialog-scrollable">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Editar Producto</h2></center>
           <button type="button" class="close" @click="editarMaterial=false" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-3 ml-5"></div>
                     <div class="col-5">
                         <div class="card">
                             <div class="card-body">
                            <div class="form-group">
                                 <label for="">Nombre</label>
                                 <input class="form-control" type="text" name="enombre" id="enombre" v-model="elegido.nombre">
                            </div>
                            <div class="form-group">
                                 <label for="">Detalle</label>
                                 <textarea class="form-control" name="edetalle" id="edetalle" v-model="elegido.detalle" cols="20" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                 <label for="">Compra</label>
                                 <input class="form-control" type="number" name="ecompra" id="ecompra" v-model="elegido.preciocompra">
                            </div>
                            <div class="form-group">
                                 <label for="">Venta</label>
                                 <input class="form-control" type="number" name="eventa" id="eventa" v-model="elegido.precioventa">
                            </div>
                            <div class="form-group">
                                 <label for="">Ganancia</label>
                                 <input class="form-control" type="number" name="eganancia" id="eganancia" v-model="elegido.ganancia">
                            </div>
                            <div class="form-group">
                                 <label for="">Tipo</label>
                                 <select class="form-control" name="etipo" id="etipo">
                                     <option :value="(elegido.id_tipo)">{{elegido.id_tipo}}</option>
                                     <option v-for="item of tipoMaterial" :value="(item.id)">{{item.nombre}}</option>
                                 </select>
                                 
                            </div>
                            <input type="hidden" name="eid" id="eid" v-model="elegido.id">
                            <div class="form-group">
                                <button class="btn btn-outline-warning btn-block" @click="editarMaterial=false;actualizarMaterial()">Actualizar</button>
                            </div>
                             </div>
                         </div>
                    
                        </div>
                 </div>
                

            </div>
        </div>
    </div>

</div>

<div class="contenido" v-if="eliminarMaterial">

<div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Eliminar Producto</h2></center>
           <button type="button" class="close" @click="eliminarMaterial=false" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
                     
            <input type="hidden" name="did" id="did" v-model="elegido.id">
             <div class="form-group">
                   <p>¿Estas seguro que quieres eliminar a <strong>{{elegido.nombre}}</strong>? Como ella te borro de su vida :'v</p>
                    <button class="btn btn-outline-danger " @click="eliminarMaterial=false;deleteMaterial()">Eliminar</button>
                    <button class="btn btn-outline-secondary " @click="eliminarMaterial=false">Cancelar</button>
            </div>
                           
                
            
        </div>
    </div>

</div>

</div>


</div>