<?php
    include 'config.php';
    include 'conexion.php';

    $dud = $_POST["duda"];
    $conexion = mysqli_connect("localhost","root","","medicom");
    mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    $sql = mysqli_query($conexion,"INSERT INTO dudas(pregunta,respuesta) VALUES ('$dud', NULL)");
    $resultado = mysqli_query($conexion,$sql);
    mysqli_affected_rows($conexion);
    header("Location: foro_paciente.php");
    exit();

?>