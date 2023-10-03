<?php
session_start();
include 'templates/cabecera_medico.php';
include 'SED.php';
include 'config.php';
include 'conexion.php';
$escondida = SED::decryption($infMedico[7]);
?>
<main>
    <div class="row ">
        <div class="col s12 m12 l12" id="titulo" name="titulo"><span class="flow-text"><h3 class="center"> <font color="#1a237e " ><i class="fas fa-solid fa-file">   Diagnosticos del paciente</font></i></h3></span></div>
    </div>

        <br>
        <div class="container white">   
            <form action="diagnostico_medico_registros.php" method="post">
                <div class="row"> 
                    <div class="col s12 m9 l9 input-field">                                    
                        <i class="fas fa-key prefix"></i>
                        <label for="correo">Introducir correo del paciente</label>
                        <input type="text" id="correo" name="correo" data-validetta="required">
                    </div>
                    <div class="col s12 m3 l3 input-field">
                        <button type="submit" class="btn light-blue darken-1" style="width:100%">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
<?php
include 'templates/piePagina.php';
?>