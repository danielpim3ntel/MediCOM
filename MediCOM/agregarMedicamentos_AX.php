<?php
    $nombre = $_POST["nombre"];
    $descr = $_POST["descripcion"];
    $fechaComienzo = $_POST["fechaComienzo"];
    $fechaTermino = $_POST["fechaTermino"];
    $frecuencia = $_POST["frecuencia"];
    
    $id = $_POST["id"];
    $numMed = $_POST["numMed"];

    $respAX_JSON = array();
        $conexion = mysqli_connect("localhost","root","","medicom");
        mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        $sql = "INSERT INTO medicamentos VALUES(NULL,'$id','$nombre','$descr','$fechaComienzo','$fechaTermino','$frecuencia')";
        $resultado = mysqli_query($conexion,$sql);
        if(mysqli_affected_rows($conexion) == 1){
            $respAX_JSON["codigo"] = 1;
            $respAX_JSON["msj"] = "<h3> Se agrego el medicamento </h3>";
            $respAX_JSON["numMeds"] = $numMed - 1;
            $respAX_JSON["id"] = $id;
        }else{
            $respAX_JSON["codigo"] = 2;
            $respAX_JSON["msj"] = "<h3> Error. Intentalo de nuevo </h3>";
        }
    
    echo json_encode($respAX_JSON);
?>