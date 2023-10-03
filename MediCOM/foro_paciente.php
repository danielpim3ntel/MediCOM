<?php
session_start();
include 'templates/cabecera_paciente.php';
include 'SED.php';
include 'config.php';
include 'conexion.php';

$conexion = mysqli_connect("localhost","root","","medicom");
mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

?>


<main> 

    <div class="carousel carousel-slider">
        <div class="carousel-item"><img src="./img/medical1.jpg"></div>
        <div class="carousel-item"><img src="./img/medical2.jpg"></div>
        <div class="carousel-item"><img src="./img/medical3.jpg"></div>
    </div>    
    <div class="contanier white">

        <div class="row ">
            <div class="col s12 m12 l12" id="titulo" name="titulo"><span class="flow-text"><h3 class="center"> <font color="#1a237e " ><i class=" fas fa-solid fa-comments-question-check"> ¿Cuál es tu duda? </font></i></h3></span></div>
        </div>
        

        <div class="container">

            <form action="foro_paciente_AX.php" method="post" >
                
                <div class="col s12 m12 l12 input-field">
                <input type="text" id="duda" name="duda" data-validetta="required">
                </div>
                
                <div class="row">
                <div class="col s12 m6 l6 offset-m3 offset-l3">
                        <button type="submit" class="btn light-blue darken-1" style="width:100%" name="enviar" >Enviar</button>
                </div>
                </div>

            </form>
        </div>

        <br><br>

        <div class="row ">
            <div class="col s12 m12 l12" id="titulo" name="titulo"><span class="flow-text"><h3 class="center"> <font color="#1a237e " ><i class=" fas fa-solid fa-comments-question-check"> Preguntas de la comunidad </font></i></h3></span></div>
        
        </div>

    <br><br>

    <div class="container white">   
            <br>
            <div class="container">
                
                <ul class="collapsible">
                    
                    <?php 
                    
                    $sentencia=$pdo->prepare("SELECT * from dudas WHERE respuesta IS NOT NULL ORDER BY id DESC");
                    $sentencia->execute();
                    $lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach($lista as $row){ ?>
                    
                    <li>
                    <div class="collapsible-header"><i class="fas fa-solid fa-file-medical"></i><span class="flow-text"><?php echo $row['pregunta'] ?></span>
                    </div>
                    
                    <div class="collapsible-body">
                        <span class="flow-text">Médico:</span>
                        <br><br>
                        <span><?php echo $row['medico'] ?></span>
                        <br><br>
                        <span class="flow-text">Respuesta:</span>
                        <br><br>
                        <span><?php echo $row['respuesta'] ?></span>
                        <br><br>
                                        
                    </div>
                    </li>
                    <?php } ?>
                </ul>

            </div>
    </div>

    <br><br>                
    <div class="row ">
            <div class="col s12 m12 l12" id="titulo" name="titulo"><span class="flow-text"><h3 class="center"> <font color="#1a237e " ><i class=" fas fa-solid fa-comments-question-check">Preguntas pendientes </font></i></h3></span></div>
        </div>  

        <div class="container white">   
            <br>
            <div class="container">
                
                <ul class="collapsible">
                    
                    <?php 
                    
                    $sentencia=$pdo->prepare("SELECT * from dudas WHERE respuesta IS NULL ORDER BY id DESC");
                    $sentencia->execute();
                    $lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach($lista as $row){ ?>
                    
                    <li>
                    <div class="collapsible-header"><i class="fas fa-solid fa-file-medical"></i><span class="flow-text"><?php echo $row['pregunta'] ?></span>
                    </div>
                    
                    <div class="collapsible-body">
                        <span class="flow-text">Aviso:</span>
                        <br><br>
                        <span><?php echo "Esperando la respuesta de alguno de nuestros médicos registrados"?></span>
                            
                    </div>
                    </li>
                    <?php } ?>
                </ul>

            </div>
    </div>
    <br>
    <br>
   </div>

</main>

<?php
include 'templates/piePagina.php';
?>