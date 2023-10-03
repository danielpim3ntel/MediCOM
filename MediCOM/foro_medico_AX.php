<?php
    session_start();
    include 'config.php';
    include 'conexion.php';

    $correo = $_SESSION["medico"];
    $resp = $_POST["respuesta"];
    $id = $_POST["id"];
   
    $conexion = mysqli_connect("localhost","root","","medicom");
    mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    

    $sqlMedico = "SELECT * FROM medico WHERE correo = '$correo'";
    $resMedico = mysqli_query($conexion,$sqlMedico);
    $infMedico = mysqli_fetch_row($resMedico);
    
    

    $sql = mysqli_query($conexion,"UPDATE dudas SET respuesta='$resp', medico='$infMedico[2]' WHERE id='$id'");
   
    $resultado = mysqli_query($conexion,$sql);
    mysqli_affected_rows($conexion);

   
    header("Location: foro_medico.php");
    exit();

?>