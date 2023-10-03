<?php
    session_start();
    include 'SED.php';
    $correo = $_SESSION["medico"];
    $telefono = $_POST["telefonoNew"];
    $direccion = $_POST["direccionNew"];
    $contrasena = $_POST["contrasenaConf"];
    $escondida = SED::encryption($contrasena);
    $conexion = mysqli_connect("localhost","root","","medicom");
    mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    $sqlUsuario = "SELECT * FROM medico WHERE correo = '$correo'";
    $resUsuario = mysqli_query($conexion,$sqlUsuario);
    $infUsuario = mysqli_fetch_row($resUsuario);
    
    $respAX = array();
    
    if(strcmp($infUsuario[7], $escondida) === 0){
        $sql = "UPDATE medico SET telefono='$telefono', direccion='$direccion' WHERE correo='$correo'";
            if(mysqli_query($conexion, $sql)){
                $respAX["codigo"] = 1;
                $respAX["msj"] = "<h3>Se actualizaron tus datos con exito</h3>";
            }else{
                $respAX["codigo"] = 2;
                $respAX["msj"] = "<h3> Error, volver a intentar</h3>";
            }
    }else{
        $respAX["codigo"] = 2;
        $respAX["msj"] = "<h3> Error, la contraseña que ingresaste es incorrecta</h3>";
    }
    echo json_encode($respAX);
?>