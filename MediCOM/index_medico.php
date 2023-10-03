<?php
session_start();
include 'templates/cabecera_medico.php';
?>
    <main>
    <div class="carousel carousel-slider">
        <div class="carousel-item"><img src="./img/medical1.jpg"></div>
        <div class="carousel-item"><img src="./img/medical2.jpg"></div>
        <div class="carousel-item"><img src="./img/medical3.jpg"></div>
    </div>

    <div class="container white">
        <div class="row">
            <div class="col s12 center">
                <br>
                <div class="col s12 blue lighten-1">
                    <h3>¿Quienes somos?</h3>
                </div>
                <p class="flow-text" style="text-align: justify; padding: 10px;">
                    MediCOM es un sistema web que sirve de apoyo médico a pacientes, específicamente en el área
                    psicológica.

                    Contamos con un sistema de control médico, en el cual manejamos un sistema de diagnósticos. En cada
                    diagnóstico el especialista puede colocar una descripción junto a una receta en caso de requerirse.
                    Además, el paciente contará con una bitácora para colocar todos los efectos presentados.

                </p>

            </div>
            <div class="col s6 center">
                <div class=" col s12 center blue lighten-3">
                    <h3>Misión</h3>
                </div>
                <p class="flow-text" /*style="border:5px solid #42a5f5;*/">Ayudar a detectar trastornos psicológicos que afecten
                    la salud mental de las personas.</p>
            </div>
            <div class="col s6 center">
                <div class="col s12 center blue lighten-3">
                    <h3>Visión</h3>
                </div>
                <p class="flow-text" /*style="border:5px solid #42a5f5;*/">Ayudar a detectar no solo trastornos psicológicos,
                    sino también problemas en alguna otra área médica como nutrición. </p>
            </div>

        </div>
    </div>
    <div class="container white">
        <div class="row">
            <div class="col s12 center blue lighten-4">
                <h3>Equipo de trabajo</h3>
            </div>

            <div class="col s6 center" style="padding:20px 20px 0px;">
                <div class="row valign-wrapper">
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <div class="col s4">
                            <img src="img/ivan.jpg" class="circle responsive-img">
                        </div>
                        <div class="col s8">
                            <h5>Arenas Suárez Iván</h5>
                            <h6>ivanarenassuarez@gmail.com</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s6 center" style="padding:20px 20px 0px;">
                <div class="row valign-wrapper">
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <div class="col s4">
                            <img src="img/levi.jpg" class="circle responsive-img">
                        </div>
                        <div class="col s8">
                            <h5>Basilio Orihuela Levi Abdul</h5>
                            <h6>levi13basilio@gmail.com </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s6 center" style="padding:0px 20px 0px;">
                <div class="row valign-wrapper">
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <div class="col s4">
                            <img src="img/pime.jpg" class="circle responsive-img">
                        </div>
                        <div class="col s8">
                            <h5>Pimentel Paulin Daniel Jezrael</h5>
                            <h6>daniel.pim3ntel@gmail.com</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s6 center" style="padding:0px 20px 0px;">
                <div class="row valign-wrapper">
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <div class="col s4">
                            <img src="img/naye.jpeg" class="circle responsive-img">
                        </div>
                        <div class="col s8">
                            <h5>Tello Gómez Lilia Anayeli</h5>
                            <h6>anayelitg01@gmail.com</h6>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</main>
<?php
include 'templates/piePagina.php';
?>