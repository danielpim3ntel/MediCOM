<?php
    session_start();
    include 'SED.php';
    $correo = $_SESSION["paciente"];
    $contrasenaAntigua = $_POST["contrasenaAc"];
    $contrasenaNueva = $_POST["contrasenaAcC"];
    $contrasenaNuevaConfirm = $_POST["contrasenaAcCConfirm"];
    $conexion = mysqli_connect("localhost","root","","medicom");
    mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    $sqlUsuario = "SELECT * FROM pacientes WHERE correo = '$correo'";
    $resUsuario = mysqli_query($conexion,$sqlUsuario);
    $infUsuario = mysqli_fetch_row($resUsuario);
    
    
    $escondidaNueva = SED::encryption($contrasenaNueva);
    $escondidaAntigua = SED::encryption($contrasenaAntigua);
    $respAX = array();
    
    if(strcmp($infUsuario[8], $escondidaAntigua) === 0){
        $sql = "UPDATE pacientes SET contrasena='$escondidaNueva' WHERE correo='$correo'";
            if(mysqli_query($conexion, $sql)){
                $respAX["codigo"] = 1;
                $respAX["msj"] = "<h3>se actualizo tu contraseña</h3>";
            }else{
                $respAX["codigo"] = 2;
                $respAX["msj"] = "<h3> Error, volver a intentar</h3>";
            }
    }else{
        $respAX["codigo"] = 2;
        $respAX["msj"] = "<h3> Error, la contraseña antigua que ingresaste es incorrecta</h3>";
    }
    echo json_encode($respAX);
?>