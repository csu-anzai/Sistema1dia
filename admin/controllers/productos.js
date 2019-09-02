var app = new Vue({
    el:"#app",
    data:{
        newempleados:false,
        nuevoProducto:false,
        editarProducto:false,
        eliminarProducto:false,
        perfil:false,
        url:null,
        eurl:null,
        productos:[],
        tipo:[],
        mensaje:"",
        color:""
    },
    mounted:function(){
        this.mostrarProductos()
        this.mostrarTipo()
    },
    methods:{
        mostrarProductos:function(){
            axios.get("admin/controllers/productos.php?accion=mostrar")
            .then((res)=>{
                this.productos=res.data.productos
                console.log(res)
            })
         },
         mostrarTipo:function(){
            axios.get("admin/controllers/productos.php?accion=mostrar2")
            .then((res)=>{
                this.tipo=res.data.tipo
                console.log(res)
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
        insertarProducto:function(){
            let formdata= new FormData()
            formdata.append("nombre",document.getElementById("nombre").value)
            formdata.append("detalle",document.getElementById("detalle").value)
            formdata.append("compra",document.getElementById("compra").value)
            formdata.append("venta",document.getElementById("venta").value)
            formdata.append("ganancia",document.getElementById("ganancia").value)
            formdata.append("tipo",document.getElementById("tipo").value)
            formdata.append("foto",document.getElementById("foto").files[0])

            if(document.getElementById("nombre").value =="" || document.getElementById("detalle").value == ""){
                alert("Los campos deben estar completos")
                nuevoProducto:false
            }else{
                axios.post("admin/controllers/productos.php?accion=insertar",formdata)
                .then((res)=>{
                     this.mostrarProductos()
                     this.mensaje=res.data.mensaje
                     this.color=res.data.color
                })
            }
            
        },
        actualizarProducto:function(){
            let formdata= new FormData()
            formdata.append("eid",document.getElementById("eid").value)
            formdata.append("enombre",document.getElementById("enombre").value)
            formdata.append("edetalle",document.getElementById("edetalle").value)
            formdata.append("ecompra",document.getElementById("ecompra").value)
            formdata.append("eventa",document.getElementById("eventa").value)
            formdata.append("eganancia",document.getElementById("eganancia").value)
            formdata.append("etipo",document.getElementById("etipo").value)
            formdata.append("efoto",document.getElementById("efoto").files[0])

            if(document.getElementById("enombre").value =="" || document.getElementById("edetalle").value == ""){
                alert("Los campos deben estar completos")
                nuevoProducto:false
            }else{
                axios.post("admin/controllers/productos.php?accion=editar",formdata)
                .then((res)=>{
                    console.log(res)
                     this.mostrarProductos()
                     this.mensaje=res.data.mensaje
                     this.color=res.data.color
                })
            }
            
        },
        deleteProducto:function(){
            let formdata= new FormData()
            formdata.append("did",document.getElementById("did").value)

            axios.post("admin/controllers/productos.php?accion=eliminar",formdata)
           .then((res)=>{
                console.log(res)
                this.mostrarProductos()
                this.mensaje=res.data.mensaje
                this.color=res.data.color
           })
        },
        elegirProducto(producto){
            this.elegido=producto

        }
    }
})