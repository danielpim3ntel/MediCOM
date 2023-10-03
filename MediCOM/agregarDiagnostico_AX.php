<?php
    include 'SED.php';
    $descr = $_POST["descripcion"];
    $descrDetallada = $_POST["descripcionDetallada"];
    $numMeds = $_POST["NumMedicamentos"];
    $correoPaciente = $_POST["correoPaciente"];
    $correoMedico = $_POST["correoMedico"];
    $fechaActualMasUnDia = date('Y-m-d');
    $fechaActual = date('Y-m-d',strtotime($fechaActualMasUnDia."- 1 days"));
    $respAX_JSON = array();

    $conexion = mysqli_connect("localhost","root","","medicom");
    mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    $sql = "INSERT INTO diagnosticos VALUES(NULL,'$correoPaciente','$correoMedico','$descr','$descrDetallada','$fechaActual')";
        $resultado = mysqli_query($conexion,$sql);
        if(mysqli_affected_rows($conexion) == 1){
            $respAX_JSON["codigo"] = 1;
            $respAX_JSON["msj"] = "<h3> Se agrego el diagnostico </h3>";
            $respAX_JSON["numMeds"] = $numMeds;

            $sqlId = "SELECT MAX(id) FROM diagnosticos";
            $resId = mysqli_query($conexion,$sqlId);
            $infDiagnos = mysqli_fetch_row($resId);
            $respAX_JSON["id"] = $infDiagnos[0];
        }else{
            $respAX_JSON["codigo"] = 2;
            $respAX_JSON["msj"] = "<h3> Error. Intentalo de nuevo </h3>";
        }
    echo json_encode($respAX_JSON);
?>