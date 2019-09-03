<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Style/bootstrap.min.css">
    <link rel="stylesheet" href="Style/fontawesome/css/all.css">
    <link rel="stylesheet" href="Style/efect.css">
    <style>
      body{
        background-image: url(img/fondos/como-hacer-un-banner.png);
        background-size: cover;
      }
    </style>
    <title>Login</title>
</head>
<body id="particles-js"> 
  <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary"> 
          <div class="container">
                <a class="navbar-brand" href="#">Sistema Presupuesto</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                  </ul>

                    <a href="#" @click="newlogin=true" class="text-light">Login</a>
               
                </div>
                </div>
              </nav>
              
        <!-- Modal -->
        <div class="contenedor" v-if="newlogin">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title ">Login</h5>
                <button type="button" class="close" @click="newlogin=false" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container">
                <form action="procesos/login.php" method="post" autocomplete="off">
                  <div class="form-group">
                    <label><strong>Usuario</strong></label>
                    <input class="form-control" type="text" name="txtuser" placeholder="Ingrese Usuario" required>
                  </div>
                  <div class="form-group">
                    <label><strong>Password</strong></label>
                    <span class="btn btn-primary btn-sm" @click="visible"><i class="fas fa-eye"></i></span>
                    <input class="form-control" :type="passwordFieldType" v-model="password" name="txtpass" placeholder="Ingrese Password" required>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary btn-block" name="btnlogin">Iniciar Sesion</button>
                  </div>
                </form>
                
                </div>
              </div>
            </div>
          </div>
          </div>

        </div>
    
    
    <script src="Style/jquery.js"></script>
    <script src="Style/bootstrap/js/bootstrap.min.js"></script>
    <script src="Style/fontawesome/js/all.js"></script>
    <script src="js/vue.js"></script>
    <script src="js/axios.js"></script>
    <script src="procesos/login.js"></script>
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
</body>
</html>