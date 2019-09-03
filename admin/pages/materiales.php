<div class="container">

<div v-if="mensaje" :class="'alert alert-'+(color) + ' alert-dismissible fade show'"  role="alert">
    {{mensaje}}
  <button class="close" @click="mensaje=false">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<button class="btn btn-success btn-sm" @click="nuevoMaterial=true">Nuevo</button>
<span class="ml-3">Tienes: <strong>{{TotalMaterial}}</strong> Materiales</span>
    <button class="btn btn-primary btn-sm float-right" @click="nuevoTipoM=true">Nuevo Tipo</button>
    <span class="float-right mr-5">Ganancia Total: <strong> S/. {{sumaGananciaM}}</strong></span>
<br><br>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Foto</th>
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
                <td><a href="#" @click="perfil=true"><img :src="'./img/material/'+ material.foto" width="50px" height="50px"></a></td>
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
                                 <input class="form-control" type="number" name="compra" id="compra" v-model="compraM">
                            </div>
                            <div class="form-group">
                                 <label for="">Venta</label>
                                 <input class="form-control" type="number" name="venta" id="venta" v-model="ventaM">
                            </div>
                            <div class="form-group">
                                 <label for="">Ganancia</label>
                                 <input class="form-control" readonly type="number" name="ganancia" :value="(gananciaMaterial)" id="ganancia">
                            </div>
                            <div class="form-group">
                                 <label for="">Tipo</label>
                                 <select class="form-control" name="tipo" id="tipo">
                                     <option v-for="item of tipoMaterial" :value="(item.id)">{{item.nombre}}</option>
                                 </select>
                                 
                            </div>
                            <div class="from-group">
                                <label for="">Foto</label>
                                <div class="card">
                                    <div class="card-body">
                                    <center><img v-if="url" :src="url" width="150px" height="150px"></center>
                                    </div>
                                </div>
                                <input class="form-control-file" type="file" name="foto" ref="foto" id="foto" v-on:change="verImagen()">
                            </div><br>
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
    
                                 <input class="form-control" type="number" readonly name="eganancia" id="eganancia" v-model="gananciaMaterialE">
                                 
                                 
                                 
                            </div>
                            <div class="form-group">
                                 <label for="">Tipo</label>
                                 <select class="form-control" name="etipo" id="etipo">
                                     <option :value="(elegido.id_tipo)">{{elegido.id_tipo}}</option>
                                     <option v-for="item of tipoMaterial" :value="(item.id)">{{item.nombre}}</option>
                                 </select>
                                 
                            </div>
                            <div class="from-group">
                                <label for="">Foto</label>
                                <div class="card">
                                    <div class="card-body">
                                    <div v-if="eurl">
                                          <center><img :src="eurl" width="150px" height="150px"></center>  
                                    </div>
                                    <div v-else="eurl">
                                        <center><img :src="'./img/material/'+elegido.foto" width="150px" height="150px"></center>
                                    </div>
                                    </div>
                                </div>
                                <input class="form-control-file" type="file" name="efoto" ref="efoto" id="efoto" v-on:change="everImagen()">
                            </div><br>
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
                    <button class="btn btn-outline-secondary float-right " @click="eliminarMaterial=false">Cancelar</button>
            </div>
                           
                
            
        </div>
    </div>

</div>

</div>

<div class="contenido" v-if="nuevoTipoM">



<div class="modal-dialog modal-lg modal-dialog-scrollable">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Nuevo Tipo de Material</h2></center>
           <button type="button" class="close" @click="nuevoTipoM=false" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
                <div v-if="mensaje1" :class="'alert alert-'+(color) + ' alert-dismissible fade show'"  role="alert">
                    {{mensaje1}}
                <button class="close" @click="mensaje1=false">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                    
             <button class="btn btn-success btn-sm" @click="nuevoTipoMaterial=true">Nuevo</button>
                <br><br>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Detalle</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
            <tr v-for="tipos of tipoMaterial">
                
                <td><div style="width: 200px">{{tipos.nombre}}</div></td>
                <td><div style="width: 200px">{{tipos.detalle}}</div></td>
              
                <td>
                    <button @click="editarTipoMaterial=true;elegirTipoMaterial(tipos)" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                    <button @click="eliminarTipoMaterial=true;elegirTipoMaterial(tipos)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        </tbody>
    </table>


      <div class="contenido" v-if="nuevoTipoProducto">

<div class="modal-dialog modal-lg modal-dialog-scrollable">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Nuevo Tipo de Producto</h2></center>
           <button type="button" class="close" @click="nuevoTipoProducto=false" data-dismiss="modal" aria-label="Close">
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
                                <button class="btn btn-outline-success btn-block" @click="nuevoTipoProducto=false;insertarTipoProducto()">Save</button>
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

<div class="contenido" v-if="editarTipoProducto">

<div class="modal-dialog modal-lg modal-dialog-scrollable">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Editar Tipo de Producto</h2></center>
           <button type="button" class="close" @click="editarTipoProducto=false" data-dismiss="modal" aria-label="Close">
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
                            <input type="hidden" name="eid" id="eid" v-model="elegido.id">
                            <div class="form-group">
                                <button class="btn btn-outline-warning btn-block" @click="editarTipoProducto=false;actualizarTipoProducto()">Actualizar</button>
                            </div>
                             </div>
                         </div>
                    
                        </div>
                 </div>
                

            </div>
        </div>
    </div>

</div>

<div class="contenido" v-if="eliminarTipoProducto">

<div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Eliminar Tipo de Producto</h2></center>
           <button type="button" class="close" @click="eliminarTipoProducto=false" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
                     
            <input type="hidden" name="did" id="did" v-model="elegido.id">
             <div class="form-group">
                   <p>¿Estas seguro que quieres eliminar a <strong>{{elegido.nombre}}</strong>? Como ella te borro de su vida :'v</p>
                    <button class="btn btn-outline-danger " @click="eliminarTipoProducto=false;deleteTipoProducto()">Eliminar</button>
                    <button class="btn btn-outline-secondary float-right" @click="eliminarTipoProducto=false">Cancelar</button>
            </div>
                           
                
            
        </div>
    </div>

</div>
</div>
            
            </div>
    </div>

</div>
</div>


</div>