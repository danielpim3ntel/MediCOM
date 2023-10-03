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
?>

<main>
    <div class="container">
    <div class="row ">
        <div class="col s12 m12 l12" id="titulo" name="titulo"><span class="flow-text"><h3 class="center"> <font color="#1a237e " ><i class="fas fa-solid fa-brain">   Transtornos de personalidad</font></i></h3></span></div>
    </div>
    <div class="row ">
        <div class="col s12 m12 l12 light-blue darken-3">
            <a class="waves-effect waves-light btn-large light-blue darken-3" href="./FormResultados.php"><!--<img src="img/Resultados.png">-->Resultados</a>
        </div>    
    </div>
        <div class="row">
            <div class="col s12 m5 l5 offset-l1  offset-m1">
                <div class="card">
                    <div class="card-image">
                        <img src="img/Autodestructivo.jpg">
                        <span class="card-title black">Autodestructivo</span>
                    </div>
                    <div class="card-content">
                        <p>
                        Según el Oxford Languages una persona autodestructica es una persona que causa o puede causar la propia destrucción.
                        </p>
                    </div>
                    <div class="card-action light-blue darken-4">
                        <a href="./FormAutodestructivo.php">Prueba psicológica</a>
                    </div>
                </div>
            </div>

        <div class="col s12 m5 l5 offset-l1  offset-m1">
            <div class="card">
                <div class="card-image">
                    <img src="img/Esquizoide.jpg">
                    <span class="card-title black">Esquizoide</span>
                </div>
                <div class="card-content">
                    <p>
                    Según la NCI es un grupo de trastornos mentales por los cuales una persona tiene problemas para indicar la diferencia entre las experiencias reales e irreales, pensar con lógica.
                    </p>
                </div>
                <div class="card-action light-blue darken-4">
                    <a href="./FormEsquizoide.php">Prueba psicológica</a>
                </div>
            </div>
        </div>

        <div class="col s12 m5 l5 offset-l1  offset-m1">
                <div class="card">
                    <div class="card-image">
                        <img src="img/Antisocial.jpg">
                        <span class="card-title black">Antisocial</span>
                    </div>
                    <div class="card-content">
                        <p>
                        Según la NCI antisocial se describe como una conducta que ignora los derechos de los otros, y las prácticas y leyes de la sociedad.
                        </p>
                    </div>
                    <div class="card-action light-blue darken-4">
                        <a href="./FormAntisocial.php">Prueba psicológica</a>
                    </div>
            </div>
        </div>

        <div class="col s12 m5 l5 offset-l1  offset-m1">
            <div class="card">
                <div class="card-image">
                    <img src="img/Narcisista.jpg">
                    <span class="card-title black">Narcisista</span>
                </div>
                <div class="card-content">
                    <p>
                    Según la RAE una persona es narcisista cuando cuida en exceso de su aspecto físico o que tiene un alto concepto de sí misma.
                    <br><br>
                    </p>
                </div>
                <div class="card-action light-blue darken-4">
                    <a href="./FormNarcisista.php">Prueba psicológica</a>
                </div>
            </div>
        </div>

        <div class="col s12 m5 l5 offset-l1  offset-m1">
            <div class="card">
                <div class="card-image">
                    <img src="img/Paranoide.jpg">
                    <span class="card-title black">Paranoide</span>
                </div>
                <div class="card-content">
                    <p>
                    Según la NCI es un trastorno mental por el cual las personas tiene un profundo miedo y desconfían de las otras personas. Una persona paranoide puede creer sin motivo que la gente está tratando de dañarla.
                    </p>
                </div>
                <div class="card-action light-blue darken-4">
                    <a href="./FormParanoide.php">Prueba psicológica</a>
                </div>
            </div>  
        </div>

        <div class="col s12 m5 l5 offset-l1  offset-m1">
            <div class="card">
                <div class="card-image">
                    <img src="img/Dependencia.jpg">
                    <span class="card-title black">Dependencia emocional</span>
                </div>
                <div class="card-content">
                    <p>
                    Según Sonia Castro (2022) la dependencia emocional es la dependencia afectiva o sentimental que consiste en una serie de comportamientos adictivos que se dan en una relación interpersonal donde existe una asimetría en el rol que asume cada persona.
                    </p>
                </div>
                <div class="card-action light-blue darken-4">
                    <a href="./FormDependencia.php">Prueba psicológica</a>
                </div>
            </div>
        </div>

        <div class="col s12 m5 l5 offset-l1  offset-m1">
            <div class="card">
                <div class="card-image">
                    <img src="img/Obsesivo.jpg">
                    <span class="card-title black">Obsesivo compulsivo</span>
                </div>
                <div class="card-content">
                    <p>
                    Según la RAE las características de una persona obsesivo compilsiva son: tiene ideas y hábitos que considera absurdos, pero que la dominan contra su voluntad y dificultan el desarrollo de su actividad normal.
                    </p>
                </div>
                <div class="card-action light-blue darken-4">
                    <a href="./FormObsesivo.php">Prueba psicológica</a>
                </div>
            </div>
        </div>

        <div class="col s12 m5 l5 offset-l1  offset-m1">
            <div class="card">
                <div class="card-image">
                    <img src="img/Depresivo.jpg">
                    <span class="card-title black">Depresivo</span>
                </div>
                <div class="card-content">
                    <p>
                    Según la NCI es un trastorno mental por el cual las personas tiene un profundo miedo y desconfían de las otras personas. Una persona paranoide puede creer sin motivo que la gente está tratando de dañarla.
                    </p>
                </div>
                <div class="card-action light-blue darken-4">
                    <a href="./FormDepresivo.php">Prueba psicológica</a>
                </div>
            </div>  
        </div>
    </div>
</main>

<?php
include 'templates/piePagina.php';
?>