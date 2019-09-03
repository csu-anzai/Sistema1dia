var app = new Vue({
    el:"#app",
    data:{
        nuevoUsuario:false,
        editarUsuario:false,
        eliminarUsuario:false,
        tareas:[],
        elegido:{},
        url:null,
        eurl:null,
        mensaje:""
    },
    mounted:function(){
        this.mostrarTareas()
    },
    methods:{
        mostrarTareas:function(){
           axios.get("api.php?accion=mostrar")
           .then((res)=>{
               this.tareas=res.data.tareas
           })
        },
        verImagen:function(){
            var _this = this
            _this.file = _this.$refs.foto.files[0];
            _this.url = URL.createObjectURL(_this.file)
        },

        everImagen:function(){
            var _this = this
            _this.file = _this.$refs.efoto.files[0];
            _this.url = URL.createObjectURL(_this.file)
        },
        insertarTarea:function(){
            let formdata= new FormData()
            formdata.append("nombre",document.getElementById("nombre").value)
            formdata.append("detalle",document.getElementById("detalle").value)
            formdata.append("foto",document.getElementById("foto").files[0])

            if(document.getElementById("nombre").value =="" || document.getElementById("detalle").value == ""){
                alert("Los campos deben estar completos")
            }else{
                axios.post("api.php?accion=insertar",formdata)
                .then((res)=>{
                     this.mostrarTareas()
                     this.mensaje=res.data.mensaje
                })
            }
            
        },
        editarTarea:function(){
            let formdata= new FormData()
            formdata.append("eid",document.getElementById("eid").value)
            formdata.append("enombre",document.getElementById("enombre").value)
            formdata.append("edetalle",document.getElementById("edetalle").value)
            formdata.append("efoto",document.getElementById("efoto").files[0])

            if(document.getElementById("enombre").value =="" || document.getElementById("edetalle").value == ""){
                alert("Los campos deben estar completos")
                this.mostrarTareas()
            }else{
                axios.post("api.php?accion=editar",formdata)
                .then((res)=>{
                    console.log(res)
                    this.mostrarTareas()
                    this.mensaje=res.data.mensaje
           })
            }

            
        },
        eliminarTarea:function(){
            let formdata= new FormData()
            formdata.append("did",document.getElementById("did").value)

            axios.post("api.php?accion=eliminar",formdata)
           .then((res)=>{
                console.log(res)
                this.mostrarTareas()
                this.mensaje=res.data.mensaje
           })
        },
        elegirTarea(tarea){
            this.elegido=tarea

        }
    }
})