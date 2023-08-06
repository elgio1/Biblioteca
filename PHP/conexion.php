
<!-- Aqui empieza la conexion a la base de datos -->
<?php
    $conexion = mysqli_connect("localhost","root","","usuarios"); //En la variable conexion se inicia la conexion a la base de datos se usa con mysqli_connect
                                                                //mysqli_connect recibe primero el host, segundo el usuario, tercero la contraseña(en este caso no usamos) y cuarto la base de datos 

    //Esto de abajo era para checar si la base de datos se conecto correctamente, porfavor ignorar
    // if($conexion){
    //     echo 'Conectado exitosamente a la base de datos';
    // }else{
    //     echo 'No se ha podido conectar a la base de datos';
    // }
?>