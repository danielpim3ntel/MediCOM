<?php
    $correo = $_POST["correo"];
    $p1=$_POST["p1"];
    $p2=$_POST["p2"];
    $p3=$_POST["p3"];
    $p4=$_POST["p4"];
    $p5=$_POST["p5"];
    $p6=$_POST["p6"];
    $p7=$_POST["p7"];
    $p8=$_POST["p8"];
    $p9=$_POST["p9"];
    $p10=$_POST["p10"];
    $respuesta = $p1+$p2+$p3+$p4+$p5+$p6+$p7+$p8+$p9+$p10;

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
    $respAX=array();
    $sql = "INSERT INTO resform values (null,'$correo','paranoide','$porcentaje','$categoria')";
    $resultado = mysqli_query($conexion,$sql);
    if(mysqli_affected_rows($conexion)==1){
        $respAX["codigo"] = 1;
        $respAX["msj"] = "<h3>Formulario Completado con éxito</h3>";
    }else{
        $respAX["codigo"] = 2;
        $respAX["msj"] = "<h3>Error</h3>";
    }
    echo json_encode($respAX);
?>