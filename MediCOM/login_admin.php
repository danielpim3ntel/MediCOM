<?php
include 'templates/cabecera.php';
?>

    <main>
    <div class="row ">
        <div class="col s12 m12 l12" id="titulo" name="titulo"><span class="flow-text"><h3 class="center"> <font color="#1a237e " ><i class="fas fa-solid fa-user-check">   Inicio de sesión</font></i></h3></span></div>
    </div>
        <br>

        <div class="container">
            <div class="row">
                <ul id="tabs-swipe-demo" class="tabs"><!-- Selectior de registro o acceso -->
                    <li class="tab col s12 l12 m12"><a href="#test-swipe-1">Acceso a administrador</a></li>
                </ul>
                <!-- Inicio del formularios de ingreso -->
                <div id="test-swipe-1" class="col s12 white">
                    <form id="formLoginAdmin">
                        <div class="row">
                            <div class="col s12 m6 l6 offset-m3 offset-l3  input-field">
                                <i class="fas fa-envelope prefix"></i>
                                <label for="correoLog">Correo:</label>
                                <input type="text" id="correoLog" name="correoLog" data-validetta="required,email">
                            </div>


                            <div class="col s12 m6 l6 offset-m3 offset-l3  input-field">
                                <i class="fas fa-key prefix"></i>
                                <label for="contrasenaLog">Contraseña:</label>
                                <input type="password" id="contrasenaLog" name="contrasenaLog" data-validetta="required">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col s12 m6 l6 offset-m3 offset-l3">
                                <button type="submit" class="btn light-blue darken-1" style="width:100%">Acceder</button>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                            <div class="col s12 m6 l6 offset-m3 offset-l3 input-field">
                            <a class="waves-effect waves-light btn light-blue darken-1" href="recuperarContrasena_admin.php" style="width:100%">Recuperar contraseña</a>
                            </div>
                    </div>

                </div>
                
            </div>
        </div>
    </main>

<?php
include 'templates/piePagina.php';
?>