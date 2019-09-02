<div class="container">
    <button class="btn btn-success btn-sm">Nuevo</button><br><br>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nombres y Apellidos</th>
                <th>Tipo Doc</th>
                <th>N° Documento</th>
                <th>Razon Social</th>
                <th>Cargo</th>
                <th>Celular / Telefono</th>
                <th>Hora Ingreso</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="empleados of empleado">
                <td><a href="#" @click="perfil=true"><img :src="'../img/empleados/'+empleados.foto" width="50px" height="50px"></a></td>
                <td>{{empleados.nombres}} {{empleados.apellidos}}</td>
                <td>{{empleados.tipo_documento}}</td>
                <td>{{empleados.documento}}</td>
                <td>{{empleados.razon_social}}</td>
                <td>{{empleados.cargo}}</td>
                <td>{{empleados.celular}} / {{empleados.telefono}}</td>
                <td>{{empleados.hora_ingreso}}</td>
                <td>
                    <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="contenido" v-if="perfil">

<div class="modal-dialog modal-xl">
       <div class="modal-content">
           <div class="modal-header">
            <center><h2 class="text-center">Perfil</h2></center>
           <button type="button" class="close" @click="perfil=false" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
                 
            </div>
        </div>
    </div>


<div>


</div>