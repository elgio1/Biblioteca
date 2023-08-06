<!-- Aqui empieza el php donde te redirige si ya hay una sesion iniciada -->
<?php
    session_start();                                               //Iniciamos la sesion

     if(isset($_SESSION['usuario'])){
            header("location: php/bienvenida.php");              //Si existe una sesion no sera necesario volver a logearnos, este codigo nos mandara a la pagina principal
     }
?>

<!-- Aqui empieza el html donde esta todo lo del registro -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css" />
    <title>Bibliteca</title>                                                                                        <!-- El titulo de la pagina es Biblioteca  -->
</head>
<body>
    <div class="content">
        <div class="info-content"> 
            <h1 class="titulo"> Registrarte</h1>                                                                   <!-- Texto registrate -->
            <div class="iniciar-con">                                                                              <!-- El div que contiene el inicio de sesion con google y con facebook-->
                <div class="facebook">                                                                             <!-- Un div con clase de nombre facebook -->
                    <img src="assets/facebook.svg" alt="facebook-image">                                           <!-- Aqui se encuentra el icono de facebook -->
                    <span>Facebook</span>                                                                          <!-- Elemento en linea que dice Facebook  -->
                </div>
                <div class="google">                                                                               <!-- Un div con clase de nombre facebook -->
                    <img src="assets/google.svg" alt="google-image">                                               <!-- Aqui se encuentra el icono de facebook -->
                    <span>Google</span>                                                                            <!-- Elemento en linea que dice Google  -->
                </div>
            </div>
            <br/>
            <!-- Formulario que enviara su contenido por el metodo POST al archivo registro_usuario -->
            <form class="inputs" action="php/registro_usuario.php" method="POST">                                  <!-- El formulario enviara los datos de sus inputs por el metodo post al archivo php registro_usuario  -->
                <input class="input" type="text" name= "nombre_completo" placeholder="Nombre de Usuario" >         <!-- input de tipo texto en donde se pone el nombre de usuario -->
                <input class="input" type="email" name= "correo" placeholder="Correo Electronico" >                <!-- input de tipo correo en donde se pone el correo -->
                <input class="input" type="password" name= "contrasena" placeholder="Contraseña">                  <!-- input de tipo password en donde se pone la contraseña -->
                <button class="btn" type="submit" name="btnRegistrar">Registrarse</button>                         <!-- Boton que te registra -->
                <p><br/>¿Ya tienes una Cuenta? <a href="login.php">Inicia Sesion</a></p>                           <!-- Si ya tiene una cuenta te llevara a iniciar sesion -->
            </form>
        </div>
        <img class="image" src="assets/login.svg" alt="register">                                                  <!-- imagen -->
        
    </div>

</body>
</html>