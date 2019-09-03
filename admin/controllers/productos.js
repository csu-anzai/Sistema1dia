var app = new Vue({
    el:"#app",
    data:{
        newempleados:false,
        nuevoProducto:false,
        editarProducto:false,
        eliminarProducto:false,
        newmaterial:false,
        nuevoMaterial:false,
        editarMaterial:false,
        eliminarMaterial:false,
        nuevoTipoP:false,
        nuevoTipoM:false,
        nuevoTipoProducto:false,
        editarTipoProducto:false,
        eliminarTipoProducto:false,
        nuevoTipoMaterial:false,
        editarTipoMaterial:false,
        eliminarTipoMaterial:false,
        url:null,
        eurl:null,
        productos:[],
        tipo:[],
        tipoMaterial:[],
        materiales:[],
        mensaje:"",
        mensaje1:"",
        color:"",
        ventaM:0,
        compraM:0,
        gananciaM:0,
        ventaP:0,
        compraP:0,
        gananciaP:0,
        totalGanaciaP:0,
        totalProducto:0,
        verProducto:false,
        totalGanaciaM:0,
        totalMateriales:0
        
    },
    mounted:function(){
        this.mostrarProductos()
        this.mostrarTipo()
        this.mostrarMateriales()
        this.mostrartipoMaterial()
    },
    computed:{
        gananciaMaterial(){
            this.gananciaM=0
            this.gananciaM=this.ventaM - this.compraM
            return this.gananciaM
        },
        gananciaProducto(){
            this.gananciaP=0
            this.gananciaP=this.ventaP - this.compraP
            return this.gananciaP
        },
        gananciaProductoE(){
            this.gananciaP=0
            this.gananciaP=this.elegido.precioventa - this.elegido.preciocompra
            return this.gananciaP
        },
        gananciaMaterialE(){
            this.gananciaM=0
            this.gananciaM=this.elegido.precioventa - this.elegido.preciocompra
            return this.gananciaM
        },
        sumaGananciaP(){
            this.totalGanaciaP=0
            for(producto of this.productos){
                this.totalGanaciaP = this.totalGanaciaP + parseFloat(producto.ganancia)
            }
            return this.totalGanaciaP
        },
        TotalProductos(){
            this.totalProducto=0
            for(producto of this.productos){
                this.totalProducto++
            }
            return this.totalProducto
        },
        sumaGananciaM(){
            this.totalGanaciaM=0
            for(material of this.materiales){
                this.totalGanaciaM = this.totalGanaciaM + parseFloat(material.ganancia)
            }
            return this.totalGanaciaM
        },
        TotalMaterial(){
            this.totalMateriales=0
            for(material of this.materiales){
                this.totalMateriales++
            }
            return this.totalMateriales
        }
    },
    
    methods:{
        mostrarMateriales:function(){
            axios.get("admin/controllers/materiales.php?accion=mostrar")
            .then((res)=>{
                this.materiales=res.data.materiales
                console.log(res)
            })
         },
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
         mostrartipoMaterial:function(){
            axios.get("admin/controllers/materiales.php?accion=mostrar2")
            .then((res)=>{
                this.tipoMaterial=res.data.tipo
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
                     this.compraP=0
                     this.ventaP=0
                     this.gananciaP=0
                })
            }
            
        },
        insertarMaterial:function(){
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
                axios.post("admin/controllers/materiales.php?accion=insertar",formdata)
                .then((res)=>{
                     this.mostrarMateriales()
                     this.mensaje=res.data.mensaje
                     this.color=res.data.color
                     this.compraM=0
                     this.ventaM=0
                     this.gananciaM=0
                })
            }
            
        },
        insertarTipoProducto:function(){
            let formdata= new FormData()
            formdata.append("nombre",document.getElementById("nombre").value)
            formdata.append("detalle",document.getElementById("detalle").value)

            if(document.getElementById("nombre").value =="" || document.getElementById("detalle").value == ""){
                alert("Los campos deben estar completos")

            }else{
                axios.post("admin/controllers/tipoProducto.php?accion=insertar",formdata)
                .then((res)=>{
                     this.mostrarTipo()
                     this.mensaje1=res.data.mensaje1
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
                     location.reload();
                })
            }
            
        },
        actualizarTipoProducto:function(){
            let formdata= new FormData()
            formdata.append("eid",document.getElementById("eid").value)
            formdata.append("enombre",document.getElementById("enombre").value)
            formdata.append("edetalle",document.getElementById("edetalle").value)

            if(document.getElementById("enombre").value =="" || document.getElementById("edetalle").value == ""){
                alert("Los campos deben estar completos")
                nuevoProducto:false
            }else{
                axios.post("admin/controllers/tipoProducto.php?accion=editar",formdata)
                .then((res)=>{
                    console.log(res)
                     this.mostrarTipo()
                     this.mensaje1=res.data.mensaje1
                     this.color=res.data.color
                })
            }
            
        },
        actualizarMaterial:function(){
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
                axios.post("admin/controllers/materiales.php?accion=editar",formdata)
                .then((res)=>{
                    console.log(res)
                     this.mostrarMateriales()
                     this.mensaje=res.data.mensaje
                     this.color=res.data.color
                     location.reload();
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
        deleteTipoProducto:function(){
            let formdata= new FormData()
            formdata.append("did",document.getElementById("did").value)

            axios.post("admin/controllers/tipoProducto.php?accion=eliminar",formdata)
           .then((res)=>{
                console.log(res)
                this.mostrarTipo()()
                this.mensaje1=res.data.mensaje1
                this.color=res.data.color
           })
        },
        deleteMaterial:function(){
            let formdata= new FormData()
            formdata.append("did",document.getElementById("did").value)

            axios.post("admin/controllers/materiales.php?accion=eliminar",formdata)
           .then((res)=>{
                console.log(res)
                this.mostrarMateriales()
                this.mensaje=res.data.mensaje
                this.color=res.data.color
           })
        },
        elegirProducto(producto){
            this.elegido=producto

        },
        elegirMaterial(material){
            this.elegido=material

        },
        elegirTipoProducto(tipos){
            this.elegido=tipos

        }
    }
})