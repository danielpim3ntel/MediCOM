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
                    <li class="tab col s3 l6"><a href="#test-swipe-1">Acceso</a></li>
                    <li class="tab col s3 l6"><a href="#test-swipe-2">Registro</a></li>
                </ul>
                <!-- Inicio del formularios de ingreso -->
                <div id="test-swipe-1" class="col s12 white">
                    <form id="formLogin">
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
                            <a class="waves-effect waves-light btn light-blue darken-1" href="recuperarContrasena.php" style="width:100%">Recuperar contraseña</a>
                            </div>
                    </div>

                </div>
                <!-- Inicio del formularios de registro -->
                <div id="test-swipe-2" class="col s12 white">
                            <form id="formRegistrarPaciente">
                                <div class="row">
                                    <div class="col s12 m6 l6 input-field">
                                        <i class="fas fa-user prefix"></i>
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" id="nombre" name="nombre" data-validetta="required">
                                    </div>

                                    <div class="col s12 m6 l6 input-field">
                                        <i class="fas fa-solid fa-venus-mars prefix"></i>
                                        <select id="sexo" name="sexo">
                                        <option value="" disabled selected>Sexo</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>

                                    <div class="col s12 m6 l6 input-field">
                                        <i class="fas fa-mobile-alt prefix"></i>
                                        <label for="telefono">Telefono:</label>
                                        <input type="text" id="telefono" name="telefono" data-validetta="required">
                                    </div>

                                    <div class="col s12 m6 l6 input-field">
                                        <i class="fas fa-solid fa-calendar-day prefix"></i>
                                        <label for="edad">Edad:</label>
                                        <input type="number" id="edad" name="edad" data-validetta="required">
                                    </div>

                                        

                                    <div class="col s12 m6 l6 input-field">
                                        <i class="fas fa-envelope prefix"></i>
                                        <label for="correo">Correo:</label>
                                        <input type="text" id="correo" name="correo" data-validetta="required,email">
                                    </div>

                                    <div class="col s12 m6 l6 input-field">
                                        <i class="fas fa-solid fa-weight-hanging prefix"></i>
                                        <label for="peso">Peso:</label>
                                        <input type="number" id="peso" name="peso" data-validetta="required">
                                    </div>
                                    
                                    <div class="col s12 m12 l12 input-field">
                                        <i class="fas fa-solid fa-house-user prefix"></i>
                                        <label for="direccion">Dirección:</label>
                                        <input type="text" id="direccion" name="direccion" data-validetta="required">
                                    </div>

                                    <div class="col s12 m6 l6 input-field">
                                        <i class="fas fa-key prefix"></i>
                                        <label for="contrasena">Contraseña:</label>
                                        <input type="password" id="contrasena" name="contrasena" data-validetta="required, equalTo[contrasenaConfirm]">
                                    </div>
                                    
                                    <div class="col s12 m6 l6 input-field">
                                        <i class="fas fa-key prefix"></i>
                                        <label for="contrasenaConfirm">Confirmacion de Contraseña:</label>
                                        <input type="password" id="contrasenaConfirm" name="contrasenaConfirm" data-validetta="required,equalTo[contrasena]">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col s12 m3 l2 offset-l5  offset-m4 input-field">
                                        <button type="submit" class="btn light-blue darken-1" style="width:100%">Registrar</button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </main>

<?php
include 'templates/piePagina.php';
?>