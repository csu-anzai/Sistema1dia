<div class="container">

<div v-if="mensaje" :class="'alert alert-'+(color) + ' alert-dismissible fade show'"  role="alert">
    {{mensaje}}
  <button class="close" @click="mensaje=false">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    
    <button class="btn btn-success btn-sm" @click="nuevoProducto=true">Nuevo</button><br><br>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Detalle</th>
                <th>$ Compra</th>
                <th>$ Venta</th>
                <th>Ganancia</th>
                <th>Tipo Producto</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="producto of productos">
                <td><a href="#" @click="perfil=true"><img :src="'../img/producto/'+producto.foto" width="50px" height="50px"></a></td>
                <td><div style="width: 200px">{{producto.nombre}}</div></td>
                <td><div style="width: 200px">{{producto.detalle}}</div></td>
                <td>S/. {{producto.preciocompra}}</td>
                <td>S/. {{producto.precioventa}}</td>
                <td>S/. {{producto.ganancia}}</td>
                <td>{{producto.id_tipo}}</td>
                <td>
                    <button @click="editarProducto=true;elegirProducto(producto)" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                    <button @click="eliminarProducto=true;elegirProducto(producto)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="contenido" v-if="nuevoProducto">

<div class="modal-dialog modal-xl modal-dialog-scrollable">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Nuevo Producto</h2></center>
           <button type="button" class="close" @click="nuevoProducto=false" data-dismiss="modal" aria-label="Close">
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
                                 <input class="form-control" type="number" name="compra" id="compra" v-model="compraP">
                            </div>
                            <div class="form-group">
                                 <label for="">Venta</label>
                                 <input class="form-control" type="number" name="venta" id="venta" v-model="ventaP">
                            </div>
                            <div class="form-group">
                                 <label for="">Ganancia</label>
                                 <input class="form-control" readonly type="number" :value="(gananciaProducto)" name="ganancia" id="ganancia">
                            </div>
                            <div class="form-group">
                                 <label for="">Tipo</label>
                                 <select class="form-control" name="tipo" id="tipo">
                                     <option v-for="item of tipo" :value="(item.id)">{{item.nombre}}</option>
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
                                <button class="btn btn-outline-success btn-block" @click="nuevoProducto=false;insertarProducto()">Save</button>
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

<div class="contenido" v-if="editarProducto">

<div class="modal-dialog modal-xl modal-dialog-scrollable">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Editar Producto</h2></center>
           <button type="button" class="close" @click="editarProducto=false" data-dismiss="modal" aria-label="Close">
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
                                 <div v-if="gananciaProductoE">  
                                    
                                 <input class="form-control" type="number" name="eganancia" id="eganancia" v-model="gananciaProductoE">
                                 </div>
                                 <div v-else="gananciaProductoE">
                                 <input class="form-control" type="number" name="eganancia" id="eganancia" v-model="elegido.ganancia">
                                
                                 </div>
                                 
                            </div>
                            <div class="form-group">
                                 <label for="">Tipo</label>
                                 <input class="form-control" type="number" name="etipo" id="etipo" v-model="elegido.id_tipo">
                            </div>
                            <div class="from-group">
                                <label for="">Foto</label>
                                <div class="card">
                                    <div class="card-body">
                                    <div v-if="eurl">
                                          <center><img :src="eurl" width="150px" height="150px"></center>  
                                    </div>
                                    <div v-else="eurl">
                                        <center><img :src="'../img/producto/'+elegido.foto" width="150px" height="150px"></center>
                                    </div>
                                    </div>
                                </div>
                                <input class="form-control-file" type="file" name="efoto" ref="efoto" id="efoto" v-on:change="everImagen()">
                            </div><br>
                            <input type="hidden" name="eid" id="eid" v-model="elegido.id">
                            <div class="form-group">
                                <button class="btn btn-outline-warning btn-block" @click="editarProducto=false;actualizarProducto()">Actualizar</button>
                            </div>
                             </div>
                         </div>
                    
                        </div>
                 </div>
                

            </div>
        </div>
    </div>

</div>

<div class="contenido" v-if="eliminarProducto">

<div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Eliminar Producto</h2></center>
           <button type="button" class="close" @click="eliminarProducto=false" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
                     
            <input type="hidden" name="did" id="did" v-model="elegido.id">
             <div class="form-group">
                   <p>¿Estas seguro que quieres eliminar a <strong>{{elegido.nombre}}</strong>? Como ella te borro de su vida :'v</p>
                    <button class="btn btn-outline-danger " @click="eliminarProducto=false;deleteProducto()">Eliminar</button>
                    <button class="btn btn-outline-secondary " @click="eliminarProducto=false">Cancelar</button>
            </div>
                           
                
            
        </div>
    </div>

</div>



</div>