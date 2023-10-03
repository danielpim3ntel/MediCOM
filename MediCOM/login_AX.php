<?php
    session_start();
    include 'SED.php';
    $correo = $_POST["correoLog"];
    $contrasena = $_POST["contrasenaLog"];
    $escondida = SED::encryption($contrasena);
    
    $conexion = mysqli_connect("localhost","root","","medicom");
    mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    
    $sql = "SELECT * FROM medico WHERE correo = '$correo' AND contrasena = '$escondida'";
    $resultado = mysqli_query($conexion,$sql);
    $info = mysqli_num_rows($resultado);

    $respAX = array();

    if($info == 1){
        $respAX["codigo"] = 1;
        $respAX["msj"] = "<h3> Bienvenido médico </h3>";
        $_SESSION["medico"] = $correo;
    }else{
        $sql1 = "SELECT * FROM pacientes WHERE correo = '$correo' AND contrasena = '$escondida'";
        $resultado1 = mysqli_query($conexion,$sql1);
        $info1 = mysqli_num_rows($resultado1);
        if($info1 == 1){
            $respAX["codigo"] = 2;
            $respAX["msj"] = "<h3> Bienvenido paciente </h3>";
            $_SESSION["paciente"] = $correo;
        }else{
            $respAX["codigo"] = 3;
            $respAX["msj"] = "<h3> Error el correo o la contraseña son incorrectos</h3>";
        }
        
    }
    
    echo json_encode($respAX);
?>