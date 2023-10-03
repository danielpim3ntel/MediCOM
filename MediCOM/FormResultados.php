<?php
session_start();
include 'templates/cabecera_paciente.php';
include 'SED.php';
include 'config.php';
include 'conexion.php';
$escondida = SED::decryption($infUsuario[8]);
$correoPaciente = $_SESSION["paciente"];
$conexionPaciente = mysqli_connect("localhost","root","","medicom");
mysqli_query($conexionPaciente, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$sqlPaciente = "SELECT * FROM pacientes WHERE correo = '$correoPaciente'";
$resPaciente = mysqli_query($conexionPaciente,$sqlPaciente);
$infPaciente = mysqli_fetch_row($resPaciente);

$sentencia=$pdo->prepare("SELECT * FROM resform WHERE correo='$correoPaciente'");
$sentencia->execute();
$listaTrastornos=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<main>
    <div class="container">
        <div class="row ">
            <div class="col s12 m12 l12" id="titulo" name="titulo"><span class="flow-text"><h3 class="center"> <font color="#1a237e " ><i class="fas fa-thin fa-chart-pie">   Resultados</font></i></h3></span></div>
        </div>
        <div class="row white">
            <div class="col s12 m12 l12">
                <table class="striped">
                    <thead>
                    <tr>
                        <th>Trastorno</th>
                        <th>Porcentaje (%)</th>
                        <th>Categoría</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach($listaTrastornos as $trastorno){ ?>
                    <tr>
                        <td><?php echo $trastorno['transtorno'] ?></td>
                        <td><?php echo $trastorno['porcentaje'] ?></td>
                        <td><?php echo $trastorno['categoria'] ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php
include 'templates/piePagina.php';
?>