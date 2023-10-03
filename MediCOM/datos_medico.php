<?php
session_start();
include 'templates/cabecera_medico.php';
include 'SED.php';
$escondida = SED::decryption($infMedico[7]);
?>
<main>
    <div class="row ">
        <div class="col s12 m12 l12" id="titulo" name="titulo"><span class="flow-text"><h3 class="center"> <font color="#1a237e " ><i class="fas fa-solid fa-database">   Datos de tu cuenta</font></i></h3></span></div>
    </div>

        <br>
        <div class="container">
            <div class="row">
                <ul id="tabs-swipe-demo" class="tabs">
                    <li class="tab col s6 l4"><a href="#test-swipe-1">Datos de la cuenta</a></li>
                    <li class="tab col s6 l4"><a href="#test-swipe-2">Actualizar datos</a></li>
                    <li class="tab col s6 l4"><a href="#test-swipe-3">Actualizar Contraseña</a></li>
                </ul>

                <div id="test-swipe-1" class="col s12 white">
                    
                    <div class="row">

                        <div class="col s12 m6 l6 input-field">
                            <i class="fas fa-user prefix"></i>
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" value="<?php echo $infMedico[2] ?>" readonly="readonly">
                        </div>

                        <div class="col s12 m6 l6 input-field">
                            <i class="fas fa-solid fa-venus-mars prefix"></i>
                            <label for="sexo">Sexo:</label>
                            <input type="text" id="sexo" name="sexo" value="<?php echo $infMedico[5] ?>" readonly="readonly">
                        </div>

                        <div class="col s12 m6 l6 input-field">
                            <i class="fas fa-mobile-alt prefix"></i>
                            <label for="telefono">Telefono:</label>
                            <input type="text" id="telefono" name="telefono" value="<?php echo $infMedico[3] ?>" readonly="readonly">
                        </div>

                        <div class="col s12 m6 l6 input-field">
                            <i class="fas fa-solid fa-calendar-day prefix"></i>
                            <label for="edad">Edad:</label>
                            <input type="number" id="edad" name="edad" value="<?php echo $infMedico[4] ?>" readonly="readonly">
                        </div>

                        <div class="col s12 m6 l6 input-field">
                            <i class="fas fa-envelope prefix"></i>
                            <label for="correo">Correo:</label>
                            <input type="text" id="correo" name="correo" value="<?php echo $infMedico[1] ?>" readonly="readonly">
                        </div>


                        <div class="col s12 m12 l12 input-field">
                            <i class="fas fa-solid fa-house-user prefix"></i>
                            <label for="direccion">Dirección:</label>
                            <input type="text" id="direccion" name="direccion" value="<?php echo $infMedico[6] ?>" readonly="readonly">
                        </div>

                        <div class="col s12 m6 l6 input-field">
                            <i class="fas fa-key prefix"></i>
                            <label for="contrasena">Contraseña:</label>
                            <input type="password" id="contrasena" name="contrasena" value="<?php echo $escondida ?>" readonly="readonly">
                        </div>
                    </div>
                </div><!--Cierre de la primera seccion-->

                <div id="test-swipe-2" class="col s12 white">
                    <form id="formActualizarDatos">
                        <div class="row">
                            <div class="col s12 m6 l6 input-field">
                                <i class="fas fa-mobile-alt prefix"></i>
                                <label for="telefonoNew">Telefono:</label>
                                <input type="text" id="telefonoNew" name="telefonoNew" value="<?php echo $infMedico[3] ?>" data-validetta="required" >
                            </div>
                            
                            <div class="col s12 m12 l12 input-field">
                                <i class="fas fa-solid fa-house-user prefix"></i>
                                <label for="direccionNew">Dirección:</label>
                                <input type="text" id="direccionNew" name="direccionNew" value="<?php echo $infMedico[6] ?>" data-validetta="required">
                            </div>
                            <div class="col s12 m6 l6 input-field">
                                <i class="fas fa-key prefix"></i>
                                <label for="contrasenaConf">Contraseña:</label>
                                <input type="password" id="contrasenaConf" name="contrasenaConf" data-validetta="required">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m3 l4 offset-l4  offset-m4 input-field">
                                <button type="submit" class="btn light-blue darken-1" style="width:100%">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div><!--Cierre de la segunda seccion-->

                <div id="test-swipe-3" class="col s12 white">
                    <form id="formActualizarContrasena">
                        <div class="row">

                        <div class="col s12 m6 l6 input-field">
                            <i class="fas fa-key prefix"></i>
                            <label for="contrasenaAc">Contraseña antigua:</label>
                            <input type="password" id="contrasenaAc" name="contrasenaAc" data-validetta="required">
                        </div>

                        <div class="col s12 m6 l6 input-field">
                            <i class="fas fa-key prefix"></i>
                            <label for="contrasenaAcC">Nueva contraseña:</label>
                            <input type="password" id="contrasenaAcC" name="contrasenaAcC" data-validetta="required, equalTo[contrasenaAcCConfirm]">
                        </div>
                                    
                        <div class="col s12 m6 l6 offset-m6 offset-l6 input-field">                                    
                            <i class="fas fa-key prefix"></i>
                            <label for="contrasenaAcCConfirm">Confirmacion de la nueva contraseña:</label>
                            <input type="password" id="contrasenaAcCConfirm" name="contrasenaAcCConfirm" data-validetta="required,equalTo[contrasenaAcC]">
                        </div>

                        </div>

                        <div class="row">
                            <div class="col s12 m3 l4 offset-l4  offset-m4 input-field">
                                <button type="submit" class="btn light-blue darken-1" style="width:100%">Actualizar</button>
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