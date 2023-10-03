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

$sentencia=$pdo->prepare("SELECT * FROM diagnosticos WHERE paciente='$correoPaciente' ORDER BY fecha DESC");
$sentencia->execute();
$listaDiagnosticos=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>
<main>
    <div class="row ">
        <div class="col s12 m12 l12" id="titulo" name="titulo"><span class="flow-text"><h3 class="center"> <font color="#1a237e " ><i class="fas fa-solid fa-file">   Diagnosticos del paciente: <?php echo $infPaciente[2]?> </font></i></h3>
    </span></div>
    </div>
    <div class="container white">   
            <div class="row"> 
                <form action="agregar_diagnostico.php" method="post">
                <div class="row"> 
                    <div class="col s12 m7 l7 offset-l2 offset-m2 input-field">                                    
                        <span class="flow-text">Si se desea agregar otro diagnostico al paciente: </span>
                    </div>                                       
                    <input type="hidden" id="correo" name="correo" value="<?php echo $correoPaciente ?>">
                    <div class="col s12 m3 l3 offset-l4 offset-m4 input-field">
                        <button type="submit" class="btn light-blue darken-1" style="width:100%">Diagnosticar</button>
                    </div>
                </div>
            </form>
            </div>
    

        <br>
        <div class="container">
            
            <ul class="collapsible">
                <?php foreach($listaDiagnosticos as $diagnostico){ ?>
                <li>
                <div class="collapsible-header"><i class="fas fa-solid fa-file-medical"></i><span class="flow-text">Fecha: <?php echo $diagnostico['fecha'] ?>  <br>   Diagnostico: <?php echo $diagnostico['diagnostico'] ?> <br> Contacto del médico: <?php echo $diagnostico['medico'] ?></span>
                </div>
                <div class="collapsible-body">
                    <span class="flow-text">Descripcion detallada:</span>
                    <br><br>
                    <span><?php echo $diagnostico['descripcion'] ?></span>
                    <br><br>
                    <span class="flow-text">Medicamentos</span>
                    
                    <?php
                        $idDiagnostico = $diagnostico['id'];
                        $sentenciaMeds=$pdo->prepare("SELECT * FROM medicamentos WHERE id_diagnostico='$idDiagnostico'");
                        $sentenciaMeds->execute();
                        $listaMedicamentos=$sentenciaMeds->fetchAll(PDO::FETCH_ASSOC);
                        foreach($listaMedicamentos as $medicamentos){
                    ?>
                        <h4 style="font-size: 2vh;"><?php echo $medicamentos['nombre'] ?></h4>
                        <ul class="default">
                            <li class="defaultlist">Descripción: <?php echo $medicamentos['descripcion'] ?></li>
                            <li class="defaultlist">Fecha comienzo: <?php echo $medicamentos['fecha_inicio'] ?></li>
                            <li class="defaultlist">Fecha de termino: <?php echo $medicamentos['fecha_fin'] ?></li>
                            <li class="defaultlist">Frecuencia: <?php echo $medicamentos['frecuencia'] ?> horas</li>
                        </ul>
                    <?php } ?>
                    <br><br>
                    <span class="flow-text">Bitácora del paciente</span>
                    
                    <?php
                        $idBitacora = $diagnostico['id'];
                        $sentenciaBitacora=$pdo->prepare("SELECT * FROM bitacoras WHERE id_diagnostico='$idBitacora'");
                        $sentenciaBitacora->execute();
                        $listaBitacora=$sentenciaBitacora->fetchAll(PDO::FETCH_ASSOC);
                        foreach($listaBitacora as $bitacora){
                    ?>
                        <h4 style="font-size: 2vh;"><?php echo $bitacora['fecha'] ?></h4>
                        <ul class="default">
                            <li class="defaultlist">Descripción: <?php echo $bitacora['comentario'] ?></li>
                        </ul>
                    <?php } ?>
                </div>
                </li>
                <?php } ?>
            </ul>

        </div>
        <br>
        <br>
    </div>
    </main>
<?php
include 'templates/piePagina.php';
?>