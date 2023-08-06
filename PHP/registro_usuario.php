<?php
    
    include "conexion.php";                                               //Incluimos el archivo conexion.php para poder usar su contenido

    //Las siguientes variables seran recibidas del archivo register en la parte del formulario, estas variables seran por el metodo POST
    $nombre_completo = $_POST['nombre_completo'];                      //La variable nombre_completo sera igual a nombre_completo, nombre_completo es el nombre que se le dio en register al input nombre de usuario
    $correo = $_POST['correo'];                                       //La variable correo sera igual a correo, correo es el nombre que se le dio en register al input correo electronico
    $contrasena = $_POST['contrasena'];                              //La variable contrasena sera igual a contrasena, contrasena es el nombre que se le dio en register al input contraseña
    $contrasena_encry= hash('sha512',$contrasena);                  //Aqui es como se enripta la contraseña


    $query = "INSERT INTO datos(nombre,correo,contrasena) 
            VALUES ('$nombre_completo','$correo','$contrasena_encry')";   //la variable query que se usara mas adelante sera un insert a la base de datos, en donde los datos(nombre,correo,contrasena) seran los que nos proporciono el usuario anteriormente

    // Aqui se verificaran que el correo no se repita en la base de datos
    
    $verificar_correo = mysqli_query($conexion,"SELECT * FROM datos WHERE correo='$correo'"); //Conectamos a la base de datos con la variable conexion y realizamos una consulta para checar que los correos coincidan

    if(mysqli_num_rows($verificar_correo) > 0 ){                                             //Le pasamos la variable verificar_correo para que mediante la instruccion mysqli_num_rows nos encuentre un correo que exista(la verficacion del correo se hace con la instruccion mysql), ponemos  > 0 porque si encuentra un correo que coincida sera 1 y podremos realizar la instruccion
        echo '      
            <script>
                    alert("El correo ya esta en uso, intenta con uno diferente"); 
                    window.location = "../register.php";
            </script>
        ';
        exit(); //Aqui cerramos el archivo para que no se ejecute el codigo de abajo 
    }

     // Aqui se verificaran que el nombre no se repita en la base de datos
    $verificar_nombre = mysqli_query($conexion,"SELECT * FROM datos WHERE nombre='$nombre_completo'"); //Conectamos a la base de datos con la variable conexion y realizamos una consulta para checar que los correos coincidan

    if(mysqli_num_rows($verificar_nombre) > 0 ){                                             //Le pasamos la variable verificar_nombre para que mediante la instruccion mysqli_num_rows nos encuentre un nombre que exista(la verficacion del nombre se hace con la instruccion mysql), ponemos  > 0 porque si encuentra un nombre que coincida sera 1 y podremos realizar la instruccion
        echo '      
            <script>
                    alert("El usuario ya esta en uso, intenta con uno diferente"); 
                    window.location = "../register.php";
            </script>
        ';
        exit(); //Aqui cerramos el archivo para que no se ejecute el codigo de abajo 
    }


    //Aqui se ejecuta la query para la incercion de los datos que pone el usuario 
    $ejecutar = mysqli_query($conexion,$query);                   //Aqui la variable ejecutar nos ejecutara una query, en este caso sera $query, necesitamos la variable conexion para poder conectarnos a la base de datos

    if($ejecutar){                                              //En caso de que se ejecute bien la variable, mandara una alerta y te llevara al archivo de login 
        echo ' 
            <script>
                    alert("Usuario almacenado exitosamente");
                    window.location = "../login.php";
            </script>
        ';
    }else{                                                   //En caso de que se ejecute mal la variable, mandara una alerta y te llevara al archivo de register para que te registres nuevamente 
        echo ' 
            <script>
                    alert("Intentalo de nuevo usuario no almacenado ");
                    window.location = "../register.php";
            </script>
        ';
    }

    mysqli_close($conexion);                           //Cuando todo esto termine, se cerrara la conexion
?>