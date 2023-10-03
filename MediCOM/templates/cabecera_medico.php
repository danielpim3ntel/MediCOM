<?php
    
    if(isset($_SESSION["medico"])){
        $correo = $_SESSION["medico"];
        $conexion = mysqli_connect("localhost","root","","medicom");
        mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        $sqlMedico = "SELECT * FROM medico WHERE correo = '$correo'";
        $resMedico = mysqli_query($conexion,$sqlMedico);
        $infMedico = mysqli_fetch_row($resMedico);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>MediCOM</title>
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<link href="./materilize/materialize/css/materialize.min.css" rel="stylesheet">
<link href="./js/plugins/validetta-v1.0.1-dist/validetta.min.css" rel="stylesheet">
<link href="./js/plugins/confirm/dist/jquery-confirm.min.css" rel="stylesheet">
<link href="css/footer.css" rel="stylesheet">
<link href="css/listas.css" rel="stylesheet">
<link href="css/card_width.css" rel="stylesheet">
<script src="./jquery/jquery-3.6.0.min.js"></script>
<script src="./materilize/materialize/js/materialize.min.js"></script>
<script src="./js/plugins/validetta-v1.0.1-dist/validetta.min.js"></script>
<script src="./js/plugins/localization/validettaLang-es-ES.js"></script>
<script src="./js/plugins/confirm/dist/jquery-confirm.min.js"></script>
<script src="js/recargar_usuario.js"></script>
<script>
    $(document).ready(function(){
        $(".dropdown-trigger").dropdown();
        $('.sidenav').sidenav();
        $('.tabs').tabs();
        $('.collapsible').collapsible();
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('.carousel').carousel();

        $("form#formActualizarDatos").validetta({
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./actualizarDatos_medico_AX.php",
                    method:"post",
                    data:$("form#formActualizarDatos").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Actualizar datos</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.codigo == 1)
                                window.location.href = "./datos_medico.php";
                            }
                        });
                    }
                });
            }
        });

        


        $("form#formActualizarContrasena").validetta({
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./actualizarContrasena_medico_AX.php",
                    method:"post",
                    data:$("form#formActualizarContrasena").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Cambio de contraseña</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.codigo == 1)
                                window.location.href = "./datos_medico.php";
                            }
                        });
                    }
                });
            }
        });

        $("form#formRealizarDiagnostico").validetta({
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./agregarDiagnostico_AX.php",
                    method:"post",
                    data:$("form#formRealizarDiagnostico").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Diagnostico</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.meds == 0)
                                    window.location.href = "./diagnostico_medico.php";
                                else
                                    window.location.href = "./agregar_medicamento.php?id="+AX.id+"&num="+AX.numMeds;
                            }
                        });
                    }
                });
            }
        });

        $("form#formAgregarMedicamento").validetta({
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./agregarMedicamentos_AX.php",
                    method:"post",
                    data:$("form#formAgregarMedicamento").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Agregar medicamento</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.numMeds === 0)
                                    window.location.href = "./diagnostico_medico.php";
                                else
                                    window.location.href = "./agregar_medicamento.php?id="+AX.id+"&num="+AX.numMeds;
                            }
                        });
                    }
                });
            }
        });

    });
</script>
</head>
<body class="brown lighten-5">
    <header>
    <!-- Dropdown Structure -->
    <ul id="dropdown2" class="dropdown-content">
        <li><a href="./datos_medico.php">Cambio de datos</a></li>
        <li class="divider"></li>
        <li><a href="./cerrarSession.php">Cerrar sesion</a></li>
    </ul>
    <nav>
        <div class="nav-wrapper  light-blue darken-4">
            <a href="#!" class="brand-logo"> <img src="./img/logo.png" width="43%" height="43%"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                
                <li><a href="index_medico.php">Acerca de nosotros</a></li>
                <li><a href="foro_medico.php">Foro</a></li>
                <li><a href="diagnostico_medico.php">Bitácoras</a></li>
                <!-- Dropdown Trigger -->
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown2"> <?php echo $infMedico[2] ?>  <i class="fas fa-sort-down"></i></a></li><!-- Dropdown Trigger -->
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="index_medico.php">Acerca de nosotros</a></li>
        <li class="divider"></li>
        <li><a href="foro_medico.php">Foro</a></li>
        <li class="divider"></li>
        <li><a href="diagnostico_medico.php">Bitácoras</a></li>
        <li class="divider"></li>
        <li><?php echo $infMedico[2] ?></li>
        <li class="divider"></li>
        <li><a href="./datos_medico.php">Cambio de datos</a></li>
        <li><a href="./cerrarSession.php">Cerrar sesion</a></li>
    </ul>
    </header>

<?php
    }else{
        header("location: ./login.php");
    }
?>