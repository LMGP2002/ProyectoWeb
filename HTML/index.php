<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HardWork </title>
    <link rel="stylesheet" href="../CSS/estilos.css">
    <script src="https://kit.fontawesome.com/523f0710e5.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header-contenedor disable-select" id="header">
        <nav class="nav">
            <h2 class="logo">HardWork</h2>
            <ul>
                <li><a href="#header">Home</a></li>
                <li><a href="#about">About us</a></li>
                <li><a href="#health">Health</a></li>
                <li><a href="#plans">Plans</a></li>
            </ul>
            <div class="container-icons">
                <a class="modal_users" id="modalUser" href="#"><i class="fas fa-user icon"></i></a>
                <a href="https://www.facebook.com/profile.php?id=100074361196775" target="_blank" ><i class="fab fa-facebook-f icon"></i></a>
                <a href="https://www.youtube.com/channel/UCiyLs3C67dYlHt86otVEwJw" target="_blank"><i class="fab fa-youtube icon"></i></a>
                <a href="../PHP/cerrar_sesion.php"><i class="fas icon fa-sign-out-alt"></i></a>
            </div>
        </nav>
        <!-- Modal Users -->
        <div class="modal_container">
            <div class="modal_content modal_close disable-select">
                <div class="transparencia">
                    <a href="" class="close"><i class="fas fa-times equis"></i></a>
                    <div class="modal_mover">
                        <h2 class="modal_title">Your user</h2>
                        <div class="modal_img"><img src="../Recursos/h.png" alt="hombre"></div>
                        <div class="modal_texts">
                            <p id="bandera" data-description="<?php if(isset($_SESSION['admin']) ){
                                echo $_SESSION['admin'];
                            }else {
                                echo ('Vacío');
                            }?>"> <?php
                            if(isset($_SESSION['admin']) ){
                                echo $_SESSION['admin'];
                            }else {
                                echo ('Vacío');
                            }
                                ?>
                            </p>                            
                            <span id="tittle"><?php echo ($_SESSION['planes']);?></span>                                                       
                        </div>
                    </div>
                    <div class="button_container_modal">
                        <?php if(isset($_SESSION['admin'])):  ?>
                            <a href="profile.php?id=<?php echo $_SESSION['id']?>"><button onclick="location.href='profile.html'" class="modal_button">Ver perfil</button></a> 
                       <?php else:?>
                        <button class="modal_button">Ver perfil</button>
                        <?php endif?>                  
                    </div>
                </div>
            </div>
        </div>
        <div class="container-text">
            <span class="text1">welcome to</span>
            <span class="text2">the glory</span>
            <a class="boton" id="ocultarBtn" href="../HTML/login.html">Login</a>
        </div>
        <video loading='lazy' class="fondo" src="../Recursos/bg.mp4" loop autoplay muted></video>
        <div class="overlay"></div>
    </header>
<!-- Sección Acerca de nosotros -->
    <section class="about-us" id="about">
        <article class="uno">
            <h1>HardWork</h1>
            <h3>¿Quieres empezar a forjar la disciplina en tu vida?</h3>
            <p>Contamos con el equipamento más moderno, planes alimenticios, rutinas de ejercicios y los mejores
                instructores para que puedas conseguir tu mejor versión. <br><span>¡No esperes más!</span></p>
            <a class="boton" id="modificarBtn" href="../HTML/login.html">Únete</a>
        </article>
        <article class="dos">
            <h3>Horarios de atención</h3>
            <div>
                <p>Lunes-Sábados</p>
                <p class="horarios">7:00 A.M. - 10:00 P.M.</p>
                <p>Festivos</p>
                <p class="horarios">7:00 A.M. - 8:00 P.M.</p>
                <p>Domingo: No hay servicio</p>
            </div>
        </article>
    </section>

    <!-- Cálculos -->    
    <section class="calculos" id="health">
        <article class="cal">
            <h1 id="in">IMC</h1>
            <h3 id="calcul">Calcula tu índice de masa corporal</h3>
            <label>Peso (Kg)</label>
            <input type="number" id="pesoo" onkeypress="return validarNeg(event)">
            <label id="style-label-cal-esta">Estatura (Mt)</label>
            <input type="number" id="estaturaa">
            <textarea id="res" disabled></textarea>
            <br>
            <button type="button" onclick="imc()" class="but" id="but">Calcular</button>
        </article>
        <article class="metabo">
            <div>
                 <h1>Metabolismo basal</h1>
                 <h3>Calcula tu metabolismo basal</h3>
            </div>
            <div class="input_container">
                <div>
                    <label >Sexo</label>
                    <input id="sex" style="text-transform:lowercase;">

                    <label >Estatura (Cm)</label>
                    <input onkeypress="return soloNumeros(event)" type="number" id="esta">
                </div>
                <div>
                    <label >Peso (Kg)</label>
                    <input type="number" id="pes" required onkeypress="return validarNeg(event)">
               
                    <label >Edad</label><br>
                    <input onkeypress="return soloNumeros(event)" type="number" id="ed">
                </div>
                            
            </div> 
            <div> 
                    <textarea id="resmeta" disabled></textarea>
                    <button type="button" onclick="meta()" id="metaBasal">Calcular</button>
            </div>    
        </article>
    </section>
    <!-- Modal Planes -->
    <div class="planes_modal">
        <div class="planes_modal_content close_modal_planes disable-select">
            <div class="left_column"></div>
            <div class="right_columm">
                <div>
                    <h4>Duración</h4>
                    <h6 id="duracion"></h6>
                </div>
                <div>
                    <h2>Este Plan Incluye</h2>
                    <p id="descripcion_plan"></p>
                </div>
                <a id="comprarBtn" data-id="<?php if(isset($_SESSION['id']) ){
                                echo $_SESSION['id'];
                            }else {
                                echo ('Vacío');
                            }?>" class="button_modal_planes">Comprar</a>
            </div>
        </div>
    </div>
    <!-- Planes -->
    <section id="plans" class="Planes_section">
        <h2 class="Planes_title">Selecciona tu plan</h2>
            <div class="Planes_container disable-select">
                <div class="cards">
                    <a  data-category="Bronce"  class="card abrir_modal" href="">
                        <img src="../Recursos/card0.jpg" class="background_card" alt="gym">
                        <div class="card_content">
                            <p class="category" >Bronce</p>
                            <p class="card_heading">HardWork Regular Plan</p>
                            <p class="category">30.000 COP</p>
                        </div>
                    </a>
                    <a  data-category="Plata" class="card abrir_modal" href="">
                        <img src="../Recursos/card1.jpg" class="background_card" alt="gym">
                        <div class="card_content">
                            <p class="category">Plata</p>
                            <p class="card_heading">HardWork Normal Plan</p>
                            <p class="category">90.000 COP</p>
                        </div>
                    </a>
                    <a data-category="Platino"  class="card abrir_modal" href="">
                        <img src="../Recursos/card2.jpg" class="background_card" alt="gym">
                        <div class="card_content">
                            <p class="category">Platino</p>
                            <p class="card_heading">HardWork Special Plan</p>
                            <p class="category">180.000 COP</p>
                        </div>
                    </a>
                    <a  data-category="Oro"  class="card abrir_modal" href="">
                        <img src="../Recursos/card3.jpg" class="background_card" alt="gym">
                        <div class="card_content">
                            <p class="category">Oro</p>
                            <p class="card_heading">HardWork Exclusive Plan</p>
                            <p class="category">360.000 COP</p>
                        </div>
                    </a>
                </div>
            </div>
    </section>
        <!-- footer -->
        <footer>
            <div class="footer_container">
                <div class="sec aboutus">
                    <h2>About Us</h2>
                    <p>Somos un grupo de instructores especializados y capacitados en la actividad física. Tenemos como objetivo brindarte las mejores asesorías en el campo del entrenamiento y la alimetación.</p>
                    <ul class="sci">
                        <li><a href="https://www.facebook.com/profile.php?id=100074361196775" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/HardWorkUdB" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCiyLs3C67dYlHt86otVEwJw" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="https://www.snapchat.com/add/hardworkudb" target="_blank"><i class="fab fa-snapchat-ghost"></i></i></a></li>
                    </ul>
                </div>
                <div class="sec quickLinks">
                    <h2>Quick Links</h2>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Terms & Consitions</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="sec contact">
                    <h2>Contact Info</h2>
                    <ul class="info">
                        <li>
                            <span><i class="fas fa-map-marker-alt"></i></span>
                            <span> Cra sexta #5-50 Street<br>
                            López, PA 19460<br>COL</span>
                        </li>
                        <li>
                            <span><i class="fas fa-phone"></i></span>
                            <p><a href="#"> TEL : +57 312 725 6782</a></p>
                        </li>
                        <li>
                            <span><i class="fas fa-envelope"></i></span>
                            <p><a href="#">hardwork@email.com</a></p>
                        </li>
                    </ul>

                </div>
            </div>
        </footer>
        <script src="../JS/funcionamiento.js"></script>
        <script src="../JS/jquery-3.6.0.min.js"></script>
        <script src="../JS/interfaz.js"></script>
        <script src="../JS/style.js"></script>
        
</body>

</html>