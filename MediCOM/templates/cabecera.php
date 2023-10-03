<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>MediCOM</title>
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"> <!-- css de fount awesome para logos -->
<link href="./materilize/materialize/css/materialize.min.css" rel="stylesheet"><!-- css dde materialize -->
<link href="./js/plugins/validetta-v1.0.1-dist/validetta.min.css" rel="stylesheet"> <!-- css de validetta (para la validacion de formularios) -->
<link href="./js/plugins/confirm/dist/jquery-confirm.min.css" rel="stylesheet"> <!-- css de jquery-confirm los mensajes de confirmacion de validetta -->
<link href="css/footer.css" rel="stylesheet"> <!-- css del footer para que siempre este abajo -->
<link href="css/card_width.css" rel="stylesheet"> <!-- css para el tamaño de las cartas del menu -->
<script src="./jquery/jquery-3.6.0.min.js"></script> <!-- js de jquery para activar los elementos de materialize -->
<script src="./materilize/materialize/js/materialize.min.js"></script> <!-- js de materialize  -->
<script src="./js/plugins/validetta-v1.0.1-dist/validetta.min.js"></script><!-- js de materialize -->
<script src="./js/plugins/localization/validettaLang-es-ES.js"></script><!-- js lenguaje de validetta -->
<script src="./js/plugins/confirm/dist/jquery-confirm.min.js"></script><!-- js de jquery confirm-->
<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
        $('.tabs').tabs();
        $('select').formSelect();

        $("form#formRegistrarPaciente").validetta({//form para registrar paciente
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url:"./registrar_AX.php",
                    method:"post",
                    data:$("form#formRegistrarPaciente").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Registro</h3>",
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

        $("form#formLogin").validetta({//form del login de paciente y medico
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./login_AX.php",
                    method:"post",
                    data:$("form#formLogin").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1 || AX.codigo == 2)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Acceso</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.codigo == 1)
                                    window.location.href = "./index_medico.php";
                                if(AX.codigo == 2)
                                    window.location.href = "./index_paciente.php";
                            }
                        });
                    }
                });
            }
        });

        $("form#formLoginAdmin").validetta({//form del login de paciente y medico
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./login_admin_AX.php",
                    method:"post",
                    data:$("form#formLoginAdmin").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Acceso</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.codigo == 1)
                                    window.location.href = "./index_admin.php";
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
                    url: "./recuperarContrasena_AX.php",
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

    $(document).ready(function() {
                $('.carousel').carousel();
            });
    
</script>
</head>
<body class="brown lighten-5">
    <header>
    <!-- Dropdown Structure -->
    <nav>
        <div class="nav-wrapper  light-blue darken-4">
            <a href="#!" class="brand-logo left"><img src="./img/logo.png" width="43%" height="43%"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger brand-logo right"><i class="fas fa-solid fa-bars"></i></a>
            <ul class="right hide-on-med-and-down">
                <!-- Dropdown Trigger -->
                <li><a href="index.php">Acerca de nosotros</a></li>
                <li><a href="login.php">Inicio de sesión</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
    <li>Menú</li>
    <li><a href="index.php">Acerca de nosotros</a></li>
    <li class="divider"></li>
    <li><a href="login.php">Inicio de sesión</a></li>
</ul>
    </header>