<?php
    if(isset($_SESSION["paciente"])){
        $correo = $_SESSION["paciente"];
        $conexion = mysqli_connect("localhost","root","","medicom");
        mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        $sqlUsuario = "SELECT * FROM pacientes WHERE correo = '$correo'";
        $resUsuario = mysqli_query($conexion,$sqlUsuario);
        $infUsuario = mysqli_fetch_row($resUsuario); 
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function(){
        $(".dropdown-trigger").dropdown();
        $('.sidenav').sidenav();
        $('.tabs').tabs();
        $('.collapsible').collapsible();
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('select').formSelect();
        $('.carousel').carousel();
        $("form#formActualizarDatos").validetta({
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./actualizarDatos_paciente_AX.php",
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
                                window.location.href = "./datos_paciente.php";
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
                    url: "./actualizarContrasena_paciente_AX.php",
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
                                window.location.href = "./datos_paciente.php";
                            }
                        });
                    }
                });
            }
        });

        $("form#formAgregarComentario").validetta({
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./agregar_comentario_AX.php",
                    method:"post",
                    data:$("form#formAgregarComentario").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Agregar comentario</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.codigo == 1)
                                window.location.href = "./diagnostico_usuario.php";
                            }
                        });
                    }
                });
            }
        });

        $("form#formParanoide").validetta({
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./FormParanoide_AX.php",
                    method:"post",
                    data:$("form#formParanoide").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Paranoide</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.codigo == 1)
                                    window.location.href = "./formularios.php";
                            }
                        });
                    }
                });
            }
        });

        $("form#formEsquizoide").validetta({
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./FormEsquizoide_AX.php",
                    method:"post",
                    data:$("form#formEsquizoide").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Esquizoide</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.codigo == 1)
                                    window.location.href = "./formularios.php";
                            }
                        });
                    }
                });
            }
        });

        $("form#formAntisocial").validetta({
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./FormAntisocial_AX.php",
                    method:"post",
                    data:$("form#formAntisocial").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Antisocial</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.codigo == 1)
                                    window.location.href = "./formularios.php";
                            }
                        });
                    }
                });
            }
        });

        $("form#formNarcisista").validetta({
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./FormNarcisista_AX.php",
                    method:"post",
                    data:$("form#formNarcisista").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Narcisista</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.codigo == 1)
                                    window.location.href = "./formularios.php";
                            }
                        });
                    }
                });
            }
        });

        $("form#formDependencia").validetta({
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./FormDependencia_AX.php",
                    method:"post",
                    data:$("form#formDependencia").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Dependencia emocional</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.codigo == 1)
                                    window.location.href = "./formularios.php";
                            }
                        });
                    }
                });
            }
        });

        $("form#formObsesivo").validetta({
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./FormObsesivo_AX.php",
                    method:"post",
                    data:$("form#formObsesivo").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Obsesivo compulsivo</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.codigo == 1)
                                    window.location.href = "./formularios.php";
                            }
                        });
                    }
                });
            }
        });

        $("form#formAutodestructivo").validetta({
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./FormAutodestructivo_AX.php",
                    method:"post",
                    data:$("form#formAutodestructivo").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Autodestructivo</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.codigo == 1)
                                    window.location.href = "./formularios.php";
                            }
                        });
                    }
                });
            }
        });

        $("form#formDepresivo").validetta({
            onValid:function(){
                event.preventDefault();
                $.ajax({
                    url: "./FormDepresivo_AX.php",
                    method:"post",
                    data:$("form#formDepresivo").serialize(),
                    cache:false,
                    success:function(respAX){
                        let AX = JSON.parse(respAX);
                        let tipo;
                        if(AX.codigo == 1)
                            tipo = "green";
                        else
                            tipo = "red";
                        $.alert({
                            title:"<h3>Depresivo</h3>",
                            content:AX.msj,
                            type:tipo,
                            icon:"fas fa-info-circle fa-2x",
                            boxWidth: "50%",
                            useBootstrap: false,
                            onDestroy:function(){
                                if(AX.codigo == 1)
                                    window.location.href = "./formularios.php";
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
        <li><a href="./datos_paciente.php">Cambio de datos</a></li>
        <li class="divider"></li>
        <li><a href="./cerrarSession.php">Cerrar sesion</a></li>
    </ul>
    <nav>
        <div class="nav-wrapper  light-blue darken-4">
            <a href="#!" class="brand-logo"><img src="./img/logo.png" width="43%" height="43%"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <!-- Dropdown Trigger -->
                <li><a href="index_paciente.php">Acerca de nosotros</a></li>
                <li><a href="foro_paciente.php">Foro</a></li>
                <li><a href="diagnostico_usuario.php">Bitácora</a></li>
                <li><a href="formularios.php">Prueba psicológica</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown2"> <?php echo $infUsuario[2] ?> <i class="fas fa-sort-down"></i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li>Menu</li>
        <li><a href="./index_paciente.php">Acerca de nosotros</a></li>
        <li class="divider"></li>
        <li><a href="./foro_paciente.php">Foro</a></li>
        <li class="divider"></li>
        <li><a href="./diagnostico_usuario.php.php">Bitácora</a></li>
        <li class="divider"></li>
        <li><a href="./formularios.php">Prueba psicológica</a></li>
        <li class="divider"></li>
        <li><?php echo $infUsuario[2] ?></li>
        <li class="divider"></li>
        <li><a href="./datos_paciente.php">Cambio de datos</a></li>
        <li><a href="./cerrarSession.php">Cerrar sesion</a></li>
    </ul>
    </header>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/62a646947b967b11799423eb/1g5co7cp8';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>
<?php
    }else{
        header("location: ./login.php");
    }
?>