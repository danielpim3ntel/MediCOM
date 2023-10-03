<?php
session_start();
include 'templates/cabecera_medico.php';
include 'SED.php';
include 'config.php';
include 'conexion.php';
$correoPaciente = $_POST["correo"];
$conexionPaciente = mysqli_connect("localhost","root","","medicom");
mysqli_query($conexionPaciente, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$sqlPaciente = "SELECT * FROM pacientes WHERE correo = '$correoPaciente'";
$resPaciente = mysqli_query($conexionPaciente,$sqlPaciente);
$infPaciente = mysqli_fetch_row($resPaciente);
?>
<main>
    <div class="row ">
        <div class="col s12 m12 l12" id="titulo" name="titulo"><span class="flow-text"><h3 class="center"> <font color="#1a237e " ><i class="fas fa-solid fa-file">   Diagnosticos del paciente: <?php echo $infPaciente[2]?></font></i></h3>
    </span></div>
    </div>
    <div class="container white">   
        <form id="formRealizarDiagnostico">
            <div class="row">
                <div class="col s12 m12 l12 input-field">
                    <i class="fas fa-solid fa-file-medical prefix"></i>
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" id="descripcion" name="descripcion" data-validetta="required">
                </div>
                <div class="col s12 m12 l12 input-field">
                    <i class="fas fa-solid fa-align-justify prefix"></i>
                    <label for="descripcionDetallada">Descripcion detallada:</label>
                    <input type="text" id="descripcionDetallada" name="descripcionDetallada" data-validetta="required">
                </div>
                <div class="col s12 m12 l12 input-field">
                    <i class="fas fa-solid fa-capsules prefix"></i>
                    <label for="NumMedicamentos">Numero de medicamentos que se recetaran:</label>
                    <input type="number" id="NumMedicamentos" name="NumMedicamentos" data-validetta="required" min="0">
                </div>
                <input type="hidden" id="correoPaciente" name="correoPaciente" value="<?php echo $correoPaciente ?>">
                <input type="hidden" id="correoMedico" name="correoMedico" value="<?php echo $infMedico[1] ?>">
            </div>

            <div class="row">
                <div class="col s12 m3 l2 offset-l5  offset-m4 input-field">
                    <button type="submit" class="btn light-blue darken-1" style="width:100%">Agregar registro</button>
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