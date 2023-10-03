<?php
session_start();
include 'templates/cabecera_medico.php';
include 'SED.php';
include 'config.php';
include 'conexion.php';
$id = $_GET["id"];
$medicamentos = $_GET["num"];
?>
<main>
    <div class="row ">
        <div class="col s12 m12 l12" id="titulo" name="titulo"><span class="flow-text"><h3 class="center"> <font color="#1a237e " ><i class="fas fa-solid fa-file">   Agregar medicamento: <?php echo $medicamentos?></font></i></h3>
    </span></div>
    </div>
    <div class="container white">   
        <form id="formAgregarMedicamento">
            <div class="row">
                <div class="col s12 m12 l12 input-field">
                    <i class="fas fa-solid fa-capsules prefix"></i>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" data-validetta="required">
                </div>
                <div class="col s12 m12 l12 input-field">
                    <i class="fas fa-solid fa-file-medical prefix"></i>
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" id="descripcion" name="descripcion" data-validetta="required">
                </div>
                <div class="col s12 m6 l6 input-field">
                    <i class="fas fa-solid fa-capsules prefix"></i>
                    <label for="fechaComienzo">Fecha de comienzo:</label>
                    <input type="text" class="datepicker" id="fechaComienzo" name="fechaComienzo" data-validetta="required">
                </div>
                <div class="col s12 m6 l6 input-field">
                    <i class="fas fa-solid fa-capsules prefix"></i>
                    <label for="fechaTermino">Fecha de termino:</label>
                    <input type="text" class="datepicker" id="fechaTermino" name="fechaTermino" data-validetta="required">
                </div>
                <div class="col s12 m6 l6 input-field">
                    <i class="fas fa-solid fa-capsules prefix"></i>
                    <label for="frecuencia">Frecuencia (Horas):</label>
                    <input type="number" id="frecuencia" name="frecuencia" data-validetta="required" min="0">
                </div>
                <input type="hidden" id="id" name="id" value="<?php echo $id ?>">
                <input type="hidden" id="numMed" name="numMed" value="<?php echo $medicamentos ?>">
                <div class="col s12 m5 l5  input-field">
                    <button type="submit" class="btn light-blue darken-1" style="width:100%">Agregar medicamento</button>
                </div>
            </div>
                

        </form>
        <br>
        <br>
    </div>
    </main>
<?php
include 'templates/piePagina.php';
?>