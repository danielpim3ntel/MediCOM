<?php
    $descr = $_POST["descripcion"];
    $id = $_POST["id"];
    $fechaActualMasUnDia = date('Y-m-d');
    $fechaActual = date('Y-m-d',strtotime($fechaActualMasUnDia."- 1 days"));
    $conexion = mysqli_connect("localhost","root","","medicom");
    mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    $sql = "INSERT INTO bitacoras VALUES(NULL,'$id','$descr','$fechaActual')";
    $resultado = mysqli_query($conexion,$sql);
    mysqli_affected_rows($conexion);
    header("Location: diagnostico_usuario.php");
    exit();
?>