<?php
session_start();
include 'templates/cabecera_medico.php';
include 'SED.php';
include 'config.php';
include 'conexion.php';

$conexion = mysqli_connect("localhost","root","","medicom");
mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

?>


<main> 
  
    

    <div class="row ">
        <div class="col s12 m12 l12" id="titulo" name="titulo"><span class="flow-text"><h3 class="center"> <font color="#1a237e " ><i class="fas fa-solid fa-file">  Preguntas de los pacientes</font></i></h3></span></div>
    </div>
    
  <br><br>

  <div class="container white">   
        <br>
        <div class="container">
            
            <ul class="collapsible">
                
                <?php 
                
                $sentencia=$pdo->prepare("SELECT * from dudas WHERE respuesta is NULL ORDER BY id DESC");
                $sentencia->execute();
                $lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($lista as $row){ ?>
                
                <li>
                <div class="collapsible-header"><i class="fas fa-solid fa-file-medical"></i><span class="flow-text"><?php echo $row['pregunta'] ?></span>
                </div>
                
                <div class="collapsible-body">
                    <br>
                    <br>
                    <form action="foro_medico_AX.php" method="post">
                        <div class="row">
                            <div class="col s12 m12 l12 input-field">
                                <i class="fas fa-solid fa-comments prefix"></i>
                                <label for="descripcion">Agregar respuesta:</label>
                                <input type="text" id="respuesta" name="respuesta" data-validetta="required">
                            </div>
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $row['id'] ?>">

                            <div class="col s12 m5 l5 offset-m7 offset-l7 input-field">
                                <button type="submit" class="btn light-blue darken-1" style="width:100%">Agregar</button>
                            </div>
                        </div>
                    </form>
                                    
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