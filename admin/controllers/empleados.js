var app = new Vue({
    el:"#app",
    data:{
        newempleados:false,
        perfil:false,
        empleado:[]
    },
    mounted:function(){
        this.mostrarEmpleados()
    },
    methods:{
        mostrarEmpleados:function(){
            axios.get("admin/controllers/empleados.php?accion=mostrar")
            .then((res)=>{
                this.empleado=res.data.empleados
                console.log(res)
            })
         },
         verImagen:function(){
            var _this = this
            _this.file = _this.$refs.foto.files[0];
            _this.url = URL.createObjectURL(_this.file)
        },
    }
})