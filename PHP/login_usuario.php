<?php
    
    session_start();                                                                                  //Iniciamos la sesion

    include "conexion.php";                                                                        //Incluimos el archivo conexion.php para poder usar su contenido


    $nombre_completo = $_POST['nombre_completo'];                                               //La variable nombre_completo sera igual a nombre_completo, nombre_completo es el nombre que se le dio en register al input nombre de usuario
    $contrasena = $_POST['contrasena'];                                                        //La variable contrasena sera igual a contrasena, contrasena es el nombre que se le dio en register al input contraseña
    $contrasena_des = hash('sha512',$contrasena);                                            //Con esto podemos acceder a la contraseña aunque este encriptada


    $validar_login = mysqli_query($conexion,"SELECT * FROM datos WHERE nombre='$nombre_completo'   
                                            and contrasena= '$contrasena_des'");                 ////Conectamos a la base de datos con la variable conexion y validamos que el nombre y la contraseña coincidan con los datos que tenemos en nuestra base de datos


if(mysqli_num_rows($validar_login) > 0 ){      //Le pasamos la variable validar_login para que mediante la instruccion mysqli_num_rows nos encuentre un usuario y contraseña que exista(la verficacion del usuario y contraseña se hace con la instruccion mysql), ponemos  > 0 porque si encuentra un correo que coincida sera 1 y podremos realizar la instruccion
    $_SESSION['usuario'] = $nombre_completo;  //Creamos una variable de sesion que nos almanecenará la variable usuario en el nombre_completo
    header("location: bienvenida.php");      //Si todo va bien nos mandara a nuestra pagina principal                                              
    exit;                                   //Cerramos el archivo para que no nos ejecute el codigo de abajo                   
}else{                                     //Si el usuario no existe nos mostrara una alerta y nos mandara al login de nuevo
    echo '      
            <script>
                    alert("El usuario no existe, por favor verifique los datos"); 
                    window.location = "../login.php";
            </script>
        ';
        exit;
}

?>