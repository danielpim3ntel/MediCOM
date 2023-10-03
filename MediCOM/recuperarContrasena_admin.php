<?php
include 'templates/cabecera.php';
?>
    <main>
        <br>
        <div class="container">
            <div class="row">
                <ul id="tabs-swipe-demo" class="tabs">
                    <li class="tab col s12 m12 l12"><a href="#test-swipe-1">Recuperar contraseña</a></li>
                </ul>
                <div id="test-swipe-1" class="col s12 white">
                    <form id="formRecuperar">
                        <div class="row">
                            <h3>Introduzca un correo ya registrado, recibira un correo electronico para recuperar su contraseña</h3>
                            <div class="col s12 m12 l12 input-field">
                                <i class="fas fa-envelope prefix"></i>
                                <label for="correoRecuperar">Correo:</label>
                                <input type="text" id="correoRecuperar" name="correoRecuperar" data-validetta="required,email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 input-field">
                                <button type="submit" class="btn light-blue darken-1" style="width:100%">enviar</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                            <div class="col s12 m6 l3 input-field">
                            <a class="waves-effect waves-light btn light-blue darken-1" href="login_admin.php">Regresar</a>
                            </div>
                    </div>

                </div>

                
            </div>
        </div>
    </main>
<?php
include 'templates/piePagina.php';
?>