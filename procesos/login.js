var app = new Vue({
    el:"#app",
    data:{
        newlogin:false,
        password:'',
        passwordFieldType:'password'
    },
    methods:{
        visible(){
            this.passwordFieldType=this.passwordFieldType==='password'?'text':'password'
        }
    }
})