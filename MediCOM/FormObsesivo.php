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
    <div class="row ">
        <div class="col s12 m12 l12" id="titulo" name="titulo"><span class="flow-text"><h3 class="center"> <font color="#1a237e " ><i class="fas fa-solid fa-brain">   Obsesivo compulsivo</font></i></h3></span></div>
    </div>
        
        <div class="container white" style="heigth:20%;">
            <div class="row">
                <div class="col s12 m12 l12 input-field card-panel light-blue lighten-2"> <br></div>
                <!-- RANGO-->
                <div class="col s12 m6 l4 offset-l4 offset-m3 input-field">
                    <h4>Rango</h4><br>
                    0 = Nada característico de mí <br>
                    1 = Muy poco característico de mí <br>
                    2 = Poco característico de mí <br>
                    3 = Moderadamente característico de mí <br>
                    4 = Bastante característico de mí <br>
                    5 = Muy característico de mí <br>
                    6 = Totalmente característico de mí
                </div>
                <form id="formObsesivo">
                    <!-- P1-->
                    <div id="PR1">
                        <div class="col s12 m12 l12 input-field">
                            <p class="z-depth-3">1. Lo más importante para mí es seguir un procedimiento y un orden estricto a la hora de hacer las cosas.</p>
                        </div>
                        <input type="hidden" id="correo" name="correo" value="<?php echo $correoPaciente ?>">
                        <div class="col s12 m12 l12 input-field">
                            <i class="fas fa-solid fa-solid fa-question prefix"></i>
                            <label for="p1">Escribe un número entre el 0 y el 6 según el rango.</label>
                            <input type="number" min="0" max="6" id="p1" name="p1" data-validetta="required">
                        </div>
                    </div>
                    <!-- P2-->
                    <div id="PR2">
                        <div class="col s12 m12 l12 input-field">
                            <p class="z-depth-3">2. Pongo tanto interés en que las cosas salgan perfectas que en ocasiones no consigo terminarlas.</p>
                        </div>
                        <div class="col s12 m12 l12 input-field">
                            <i class="fas fa-solid fa-solid fa-question prefix"></i>
                            <label for="p2">Escribe un número entre el 0 y el 6 según el rango.</label>
                            <input type="number" min="0" max="6" id="p2" name="p2" data-validetta="required">
                        </div>
                    </div>
                    <!-- P3-->
                    <div id="PR3">
                        <div class="col s12 m12 l12 input-field">
                            <p class="z-depth-3">3. Es importante dedicar todo mi tiempo a mis obligaciones; las diversiones son secundarias.</p>
                        </div>
                        <div class="col s12 m12 l12 input-field">
                            <i class="fas fa-solid fa-solid fa-question prefix"></i>
                            <label for="p3">Escribe un número entre el 0 y el 6 según el rango.</label>
                            <input type="number" min="0" max="6" id="p3" name="p3" data-validetta="required">
                        </div>
                    </div>
                    <!-- P4-->
                    <div id="PR4">
                        <div class="col s12 m12 l12 input-field">
                            <p class="z-depth-3">4. Considero que sólo hay una forma de hacer las cosas bien y no hacerlo así es un desastre.</p>
                        </div>
                        <div class="col s12 m12 l12 input-field">
                            <i class="fas fa-solid fa-solid fa-question prefix"></i>
                            <label for="p4">Escribe un número entre el 0 y el 6 según el rango.</label>
                            <input type="number" min="0" max="6" id="p4" name="p4" data-validetta="required">
                        </div>
                    </div>    
                    <!-- P5-->
                    <div id="PR5">
                        <div class="col s12 m12 l12 input-field">
                            <p class="z-depth-3">5. Soy incapaz de tirar nada, nunca se sabe si me podrá hacer falta.</p>
                        </div>
                        <div class="col s12 m12 l12 input-field">
                            <i class="fas fa-solid fa-solid fa-question prefix"></i>
                            <label for="p5">Escribe un número entre el 0 y el 6 según el rango.</label>
                            <input type="number" min="0" max="6" id="p5" name="p5" data-validetta="required">
                        </div>
                    </div>
                    <!-- P6-->
                    <div id="PR6">
                        <div class="col s12 m12 l12 input-field">
                            <p class="z-depth-3">6. Para que las cosas salgan bien siempre tengo que hacerlas yo, porque los demás no ponen el mismo interés.</p>
                        </div>
                        <div class="col s12 m12 l12 input-field">
                            <i class="fas fa-solid fa-solid fa-question prefix"></i>
                            <label for="p6">Escribe un número entre el 0 y el 6  según el rango.</label>
                            <input type="number" min="0" max="6" id="p6" name="p6" data-validetta="required">
                        </div>
                    </div>    
                    <!-- P7-->
                    <div id="PR7">
                        <div class="col s12 m12 l12 input-field">
                            <p class="z-depth-3">7. Siempre trato de gastar el mínimo dinero por si alguna vez me hace falta.</p>
                        </div>
                        <div class="col s12 m12 l12 input-field">
                            <i class="fas fa-solid fa-solid fa-question prefix"></i>
                            <label for="p7">Escribe un número entre el 0 y el 6  según el rango.</label>
                            <input type="number" min="0" max="6" id="p7" name="p7" data-validetta="required">
                        </div>
                    </div>
                    <!-- P8-->
                    <div id="PR8">
                        <div class="col s12 m12 l12 input-field">
                            <p class="z-depth-3">8. Las normas es lo que determina el éxito de una empresa.</p>
                        </div>
                        <div class="col s12 m12 l12 input-field">
                            <i class="fas fa-solid fa-solid fa-question prefix"></i>
                            <label for="p8">Escribe un número entre el 0 y el 6  según el rango.</label>
                            <input type="number" min="0" max="6" id="p8" name="p8" data-validetta="required">
                        </div>
                    </div>    
                    <!-- P9-->
                    <div id="PR9">
                        <div class="col s12 m12 l12 input-field">
                            <p class="z-depth-3">9. Soy incapaz de cambiar mis planes.</p>
                        </div>
                        <div class="col s12 m12 l12 input-field">
                            <i class="fas fa-solid fa-solid fa-question prefix"></i>
                            <label for="p9">Escribe un número entre el 0 y el 6  según el rango.</label>
                            <input type="number" min="0" max="6" id="p9" name="p9" data-validetta="required">
                        </div>
                    </div>
                    <!-- P10-->
                    <div id="PR10">
                        <div class="col s12 m12 l12 input-field">
                            <p class="z-depth-3">10. Soy una persona muy organizada.</p>
                        </div>
                        <div class="col s12 m12 l12 input-field">
                            <i class="fas fa-solid fa-solid fa-question prefix"></i>
                            <label for="p10">Escribe un número entre el 0 y el 6 según el rango.</label>
                            <input type="number" min="0" max="6" id="p10" name="p10" data-validetta="required">
                        </div>
                        <!-- boton-->
                        <div class="col s12 m8 l8 offset-l2  offset-m2 input-field">
                            <button type="submit" class="btn light-blue darken-1" style="width:100%">Enviar respuestas</button>
                        </div>
                    </div>    
                </form>
            </div>
        </div>
    </main>
<?php
include 'templates/piePagina.php';
?>