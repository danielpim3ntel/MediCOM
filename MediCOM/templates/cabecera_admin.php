<?php
    
    if(isset($_SESSION["administrador"])){
        $correo = $_SESSION["administrador"];
        $conexion = mysqli_connect("localhost","root","","medicom");
        mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        $sqlCocina = "SELECT * FROM administradores WHERE correo = '$correo'";
        $resCocina = mysqli_query($conexion,$sqlCocina);
        $infAdmin = mysqli_fetch_row($resCocina);
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
        $('select').formSelect();
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('.carousel').carousel();

        $("form#formRegistrarMedico").validetta({//form para registrar medico
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url:"./registrar_medico_AX.php",
                    method:"post",
                    data:$("form#formRegistrarMedico").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Registro de médico</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.codigo == 1)
                                window.location.href = "./agregar_medico.php";
                            }
                        });
                    }
                });
            }
        });

        $("form#formRecuperar").validetta({//form del login de paciente y medico
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./recuperarContrasena_admin_AX.php",
                    method:"post",
                    data:$("form#formRecuperar").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Recuperar contraseña</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.codigo == 1)
                                    window.location.href = "./login.php";
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
        <li><a href="./cerrarSession.php">Cerrar sesion</a></li>
    </ul>
    <nav>
        <div class="nav-wrapper  light-blue darken-4">
            <a class="brand-logo"><img src="./img/logo.png" width="43%" height="43%"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <!-- Dropdown Trigger -->
                <li><a href="index_admin.php">Acerca de nosotros</a></li>
                <li><a href="agregar_medico.php">Agregar médico</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown2"> ADMINISTRADOR <i class="fas fa-sort-down"></i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
    <li class="divider"></li>
    <li><a href="index_admin.php">Acerca de nosotros</a></li>
    <li class="divider"></li>
    <li><a href="agregar_medico.php">Agregar médico</a></li>
    <li class="divider"></li>
    <li><a href="./cerrarSession.php">Cerrar sesion</a></li>
  </ul>
    </header>

<?php
    }else{
        header("location: ./login_admin.php");
    }
?>