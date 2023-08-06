<!-- Aqui empieza el php donde te redirige si ya hay una sesion iniciada -->
<?php
     session_start();                                                                               //Iniciamos la sesion

     if(isset($_SESSION['usuario'])){
         header("location: php/bienvenida.php");                                                  //Si existe una sesion no sera necesario volver a logearnos, este codigo nos mandara a la pagina principal
     }
?>


<!-- Aqui empieza el html donde esta todo lo de inicio de sesion -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css" />
    <title>Biblioteca</title>                                                                     <!-- El titulo de la pagina es Biblioteca  -->
</head>
<body>
    <div class="content">
        <div class="info-content">
            <h1 class="titulo"> Iniciar Sesion</h1>                                               <!-- Texto de inicio de sesion -->
            <div class="iniciar-con">                                                             <!-- El div que contiene el inicio de sesion con google y con facebook-->
                <div class="facebook">                                                            <!-- Un div con clase de nombre facebook -->
                    <img src="assets/facebook.svg" alt="facebook-image">                          <!-- Aqui se encuentra el icono de facebook -->
                    <span>Facebook</span>                                                         <!-- Elemento en linea que dice Facebook  -->
                </div>
                <div class="google">                                                              <!-- Un div con clase de nombre facebook -->
                    <img src="assets/google.svg" alt="google-image">                              <!-- Aqui se encuentra el icono de facebook -->
                    <span>Google</span>                                                           <!-- Elemento en linea que dice Google  -->
                </div>
            </div>
            <p class="o">O</p>
            <form class="inputs" action="php/login_usuario.php" method="POST">
                <input class="input" type="text" name = "nombre_completo" placeholder="Nombre de Usuario">   <!-- input de tipo texto en donde se pone el nombre de usuario -->
                <input class="input" type="password" name = "contrasena" placeholder="Contraseña"> <!-- input de tipo password en donde se pone la contraseña -->
                <p>¿Olvidaste La Contraseña? <a href="#">Da Click Aqui</a></p>                     <!-- En caso de que se olvide la contraseña puede recuperarla aqui -->
                <button class="btn" type="submit" name="btnInicio">Iniciar Sesion</button>         <!-- Boton que inicia la sesion -->
                <p>¿No tienes una Cuenta? <a href="register.php">Registrate</a></p>                <!-- Si no tiene una cuenta te llevara a registrarte -->
            </form>
        </div>
        <img class="image" src="assets/Mobilelogin-bro.png" alt="login">                           <!-- imagen -->
    </div>
</body>
</html>