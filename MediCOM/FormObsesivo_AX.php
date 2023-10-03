<?php
    $correo = $_POST["correo"];
    $respuesta = $_POST["p1"]+$_POST["p2"]+$_POST["p3"]+$_POST["p4"]+$_POST["p5"]+$_POST["p6"]+$_POST["p7"]+$_POST["p8"]+$_POST["p9"]+$_POST["p10"];
    $porcentaje=$respuesta/60*100;
    if($porcentaje<36)
        $categoria="Rasgo de personalidad";
    elseif($porcentaje>35 && $porcentaje<71)
            $categoria="Esquema de personalidad";
        elseif($porcentaje>70)
                $categoria="Trastorno de personalidad";
            else
                $categoria="No hay valor.";        
    $conexion = mysqli_connect("localhost","root","","medicom");
    mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    $sql = "INSERT INTO resform values (null,'$correo','Obsesivo compulsivo','$porcentaje','$categoria')";
    $sql1 = "SELECT * FROM resform WHERE correo='$correo' and transtorno='Obsesivo compulsivo'";
    $resultado = mysqli_query($conexion,$sql1);
    $info = mysqli_num_rows($resultado);
    if($info==1){
        $sql2="DELETE FROM resform WHERE correo='$correo' and transtorno='Obsesivo compulsivo'";
        $resultado2 = mysqli_query($conexion,$sql2);
        $resultado1 = mysqli_query($conexion,$sql);
    }else
        $resultado1 = mysqli_query($conexion,$sql);
    $respAX=array();

    if(mysqli_affected_rows($conexion)==1){
        $respAX["codigo"] = 1;
        $respAX["msj"] = "<h4>Resultados<h4> <h6>Porcentaje: ".$porcentaje."%<br>Categoria interpretativa: ".$categoria."</h6>";
    }else{
        $respAX["codigo"] = 2;
        $respAX["msj"] = "<h3>Error</h3>"+"<h2>Inténtelo de nuevo.</h2>";
    }
    echo json_encode($respAX);
?>