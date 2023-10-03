<?php
    session_start();
    include 'SED.php';
    //datos de formulario
    $correo = $_POST["correoLog"];
    $contrasena = $_POST["contrasenaLog"];
    $escondida = SED::encryption($contrasena);//cifrado
    
    $conexion = mysqli_connect("localhost","root","","medicom");
    mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    
    $sql = "SELECT * FROM administradores WHERE correo = '$correo' AND contrasena = '$escondida'";
    $resultado = mysqli_query($conexion,$sql);
    $info = mysqli_num_rows($resultado);

    $respAX = array();

    if($info == 1){//verificar si son correctas
        $respAX["codigo"] = 1;
        $respAX["msj"] = "<h3> Bienvenido administrador </h3>";
        $_SESSION["administrador"] = $correo;
    }else{//si no lo son 
            $respAX["codigo"] = 2;
            $respAX["msj"] = "<h3> Error el correo o la contraseña son incorrectos</h3>";
    }
    
    echo json_encode($respAX);
?>