<div class="container">

<div v-if="mensaje" :class="'alert alert-'+(color) + ' alert-dismissible fade show'"  role="alert">
    {{mensaje}}
  <button class="close" @click="mensaje=false">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<button class="btn btn-success btn-sm" @click="nuevoInstalacion=true">Nuevo</button>
<span class="ml-3">Tienes: <strong>{{TotalInstalacion}}</strong> Instalaciones</span>
    <button class="btn btn-primary btn-sm float-right" @click="nuevoTipoM=true">Nuevo Tipo</button>
<br><br>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Precio por Unidad</th>
                <th>Pasaje</th>
                <th>Tipo</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="instalacion of instalaciones">
                <td><a href="#" @click="verProducto=true;elegirInstalacion(instalacion)"><img :src="'./img/instalacion/'+ instalacion.foto" width="50px" height="50px"></a></td>
                <td><div style="width: 150px">{{instalacion.Nombre}}</div></td>
                <td>S/. {{instalacion.precioporunidad}}</td>
                <td>S/. {{instalacion.Pasaje}}</td>
                <td>{{instalacion.id_tipo}}</td>
                <td>
                    <button @click="editarInstalacion=true;elegirInstalacion(instalacion)" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                    <button @click="eliminarInstalacion=true;elegirInstalacion(instalacion)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="contenido" v-if="nuevoInstalacion">

<div class="modal-dialog modal-xl modal-dialog-scrollable">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Nueva Instalacion</h2></center>
           <button type="button" class="close" @click="nuevoInstalacion=false" data-dismiss="modal" aria-label="Close">
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
                                 <label for="">Precio por unidad</label>
                                 <input class="form-control" type="number" name="precio" id="precio">
                            </div>
                            <div class="form-group">
                                 <label for="">Pasaje</label>
                                 <input class="form-control" type="number" name="pasaje" id="pasaje">
                            </div>
                            <div class="form-group">
                                 <label for="">Tipo</label>
                                 <select class="form-control" name="tipo" id="tipo">
                                     <option v-for="item of tipoInstalacion" :value="(item.id)">{{item.nombre}}</option>
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
                                <button class="btn btn-outline-success btn-block" @click="nuevoInstalacion=false;insertarInstalacion()">Insertar</button>
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

<div class="contenido" v-if="editarInstalacion">

<div class="modal-dialog modal-xl modal-dialog-scrollable">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Editar Producto</h2></center>
           <button type="button" class="close" @click="editarInstalacion=false" data-dismiss="modal" aria-label="Close">
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
                                 <input class="form-control" type="text" name="enombre" id="enombre" v-model="elegido.Nombre">
                            </div>
                            <div class="form-group">
                                 <label for="">Precio por Unidad</label>
                                 <input class="form-control" type="text" name="eprecio" id="eprecio" v-model="elegido.precioporunidad">
                            </div>
                            <div class="form-group">
                                 <label for="">Pasaje</label>
                                 <input class="form-control" type="number" name="epasaje" id="epasaje" v-model="elegido.Pasaje">
                            </div>
                            
                            <div class="form-group">
                                 <label for="">Tipo</label>
                                 <select class="form-control" name="etipo" id="etipo">
                                     <option :value="(elegido.id_tipo)">{{elegido.id_tipo}}</option>
                                     <option v-for="item of tipoInstalacion" :value="(item.id)">{{item.nombre}}</option>
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
                                        <center><img :src="'./img/instalacion/'+elegido.foto" width="150px" height="150px"></center>
                                    </div>
                                    </div>
                                </div>
                                <input class="form-control-file" type="file" name="efoto" ref="efoto" id="efoto" v-on:change="everImagen()">
                            </div><br>
                            <input type="hidden" name="eid" id="eid" v-model="elegido.id">
                            <div class="form-group">
                                <button class="btn btn-outline-warning btn-block" @click="editarInstalacion=false;actualizarInstalacion()">Actualizar</button>
                            </div>
                             </div>
                         </div>
                    
                        </div>
                 </div>
                

            </div>
        </div>
    </div>

</div>

<div class="contenido" v-if="eliminarInstalacion">

<div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Eliminar Producto</h2></center>
           <button type="button" class="close" @click="eliminarInstalacion=false" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
                     
            <input type="hidden" name="did" id="did" v-model="elegido.id">
             <div class="form-group">
                   <p>¿Estas seguro que quieres eliminar a <strong>{{elegido.Nombre}}</strong>? Como ella te borro de su vida :'v</p>
                    <button class="btn btn-outline-danger " @click="eliminarInstalacion=false;deleteInstalacion()">Eliminar</button>
                    <button class="btn btn-outline-secondary float-right " @click="eliminarInstalacion=false">Cancelar</button>
            </div>
                           
                
            
        </div>
    </div>

</div>

</div>

<div class="contenido" v-if="verProducto">

<div class="modal-dialog">
       <div class="modal-content">
       <button type="button" class="close" @click="verProducto=false" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
               </button>
             <div class="modal-body">
             <center><img :src="'./img/instalacion/'+elegido.foto" width="350px" height="340px"></center>
        </div>
    </div>

</div>
</div>


<!-- Nuevo tipo instalacion -->

<div class="contenido" v-if="nuevoTipoM">



<div class="modal-dialog modal-lg modal-dialog-scrollable">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Nuevo Tipo de Instalacion</h2></center>
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
            <tr v-for="tipos of tipoInstalacion">
                
                <td><div style="width: 200px">{{tipos.nombre}}</div></td>
                <td><div style="width: 200px">{{tipos.detalle}}</div></td>
              
                <td>
                    <button @click="editarTipoMaterial=true;elegirTipoMaterial(tipos)" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                    <button @click="eliminarTipoMaterial=true;elegirTipoMaterial(tipos)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        </tbody>
    </table>


      <div class="contenido" v-if="nuevoTipoMaterial">

<div class="modal-dialog modal-lg modal-dialog-scrollable">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Nuevo Tipo de Instalacion</h2></center>
           <button type="button" class="close" @click="nuevoTipoMaterial=false" data-dismiss="modal" aria-label="Close">
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
                                <button class="btn btn-outline-success btn-block" @click="nuevoTipoMaterial=false;insertarTipoInstalacion()">Save</button>
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

<div class="contenido" v-if="editarTipoMaterial">

<div class="modal-dialog modal-lg modal-dialog-scrollable">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Editar Tipo de Instalacion</h2></center>
           <button type="button" class="close" @click="editarTipoMaterial=false" data-dismiss="modal" aria-label="Close">
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
                                <button class="btn btn-outline-warning btn-block" @click="editarTipoMaterial=false;actualizarTipoInstalacion()">Actualizar</button>
                            </div>
                             </div>
                         </div>
                    
                        </div>
                 </div>
                

            </div>
        </div>
    </div>

</div>

<div class="contenido" v-if="eliminarTipoMaterial">

<div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Eliminar Tipo de Instalacion</h2></center>
           <button type="button" class="close" @click="eliminarTipoMaterial=false" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
                     
            <input type="hidden" name="did" id="did" v-model="elegido.id">
             <div class="form-group">
                   <p>¿Estas seguro que quieres eliminar a <strong>{{elegido.nombre}}</strong>? Como ella te borro de su vida :'v</p>
                    <button class="btn btn-outline-danger " @click="eliminarTipoMaterial=false;deleteTipoInstalacion()">Eliminar</button>
                    <button class="btn btn-outline-secondary float-right" @click="eliminarTipoMaterial=false">Cancelar</button>
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