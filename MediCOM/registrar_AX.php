<?php
    include 'SED.php';
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $sexo = $_POST["sexo"];
    $edad = $_POST["edad"];
    $peso = $_POST["peso"];
    $direccion = $_POST["direccion"];
    $contrasena = $_POST["contrasena"];
    $escondida = SED::encryption($contrasena);

    $respAX_JSON = array();
    $conexion = mysqli_connect("localhost","root","","medicom");
    mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    $sql = "INSERT INTO pacientes VALUES(NULL,'$correo','$nombre','$telefono','$edad','$sexo','$peso','$direccion','$escondida')";
    $sqlCheckCorreo = "SELECT * FROM pacientes WHERE correo = '$correo'";
    $resultadoCheckCorreo = mysqli_query($conexion,$sqlCheckCorreo);
    if(mysqli_num_rows($resultadoCheckCorreo) == 1){
        $respAX_JSON["codigo"] = 2;
        $respAX_JSON["msj"] = "<h3> Error. El correo ya ha sido registrado en otra cuenta. Intentalo de nuevo </h3>";
    }else{
        $resultado = mysqli_query($conexion,$sql);
        if(mysqli_affected_rows($conexion) == 1){
            $respAX_JSON["codigo"] = 1;
            $respAX_JSON["msj"] = "<h3> Tu registro se realizo correctamente </h3>";
        }else{
            $respAX_JSON["codigo"] = 2;
            $respAX_JSON["msj"] = "<h3> Error. Intentalo de nuevo </h3>";
        }
    }
    
    echo json_encode($respAX_JSON);
    
?>