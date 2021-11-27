<?php
session_start();
include_once '../PHP/conexion.php'; 
if($_GET){
$id = $_GET['id'];
$sql = 'SELECT * FROM usuario where id=?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($id));
$resultado= $sentencia->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="../Bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Bootstrap/icofont/icofont.min.css" rel="stylesheet">
  <link href="../Bootstrap/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../Bootstrap/aos/aos.css" rel="stylesheet">
  <link href="../CSS/profile.css" rel="stylesheet">

</head>

<body>

  <!--Mobile button-->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!--Header-->
  <header id="header" class="disable-select">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="../Recursos/user.png" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html">User profile</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="https://twitter.com/HardWorkUdB" target="_blank"><i class="bx bxl-twitter"></i></a>
          <a href="https://www.facebook.com/profile.php?id=100074361196775" target="_blank"><i class="bx bxl-facebook"></i></a>
          <a href="https://www.youtube.com/channel/UCiyLs3C67dYlHt86otVEwJw" target="_blank"><i class="bx bxl-youtube"></i></a>
          <a href="https://www.snapchat.com/add/hardworkudb" target="_blank"><i class="bx bxl-snapchat"></i></a>
        </div>
      </div>
      <!-- nav -->
      <nav class="nav-menu">
        <ul>
          <li class="active"><a href="#hero"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about"><i class="bx bx-user"></i> <span>About you</span></a></li>
          <li><a href="#"><i class="bx bx-dumbbell"></i> <span>Trainers</span></a></li>
          <li><a href="index.php"><i class="bx bx-exit"></i>Exit</a></li>
        </ul>
      </nav>
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header>

  <!--Hero Section-->
  <section id="hero"  class="disable-select d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>HardWork</h1>
      <p>Somos <span class="typed" data-typed-items="fuertes, disciplinados, los mejores"></span></p>
    </div>
  </section>

<main id="main">
  <?php if($_GET):?>
    <form method="GET" action="../PHP/actualizar.php">
    <!--About Section>-->
       <section id="about" class="about">
       <div class="datos_container">
          <div class="datos_column left_datos">
          <input  type="hidden" name="id"  value="<?php echo $resultado['id'] ?>">
            <div>
              <h3>Nombre</h3>
              <input class="input" type="text"  id="nombre" name="nombre"  value="<?php echo $resultado['nombre'] ?>">
            </div>
            <div>
              <h3>Apellido</h3>
              <input class="input" type="text" id="apellido" name="apellido"  value="<?php echo $resultado['apellido'] ?>">
            </div>
            <div>
              <h3>Edad</h3>
              <input class="input" type="text" id="edad" name="edad"  value="<?php echo $resultado['edad'] ?>">
            </div>
          </div>
          <div class="datos_column right_datos">
            <div>
              <h3>Peso</h3>
              <input class="input" type="text" id="peso" name="peso"  value="<?php echo $resultado['peso'] ?>">
            </div>
            <div>
              <h3>Estatura</h3>
              <input class="input" type="text" id="estatura" name="estatura"  value="<?php echo $resultado['estatura'] ?>">
            </div>
            <div class="radio_container">
              <div>
                <input class="radio" type="radio" name="sexo" id="hombre" checked='checked'>
                <label class="label" for="hombre">Hombre</label>
              </div>
              <div>
                <input class="radio" type="radio" name="sexo" id="mujer">
                <label class="label" for="mujer">Mujer</label>
              </div>
            </div>
          </div>
      </div>

      <button type="submit" class="btn_datos">Actualizar</button>
        </section>
    </form>
  <?php endif?>
</main>

  <!--Footer-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Sports</span></strong>
      </div>
      <div class="credits">
       Designed by <a href="#">HardWork</a>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="../Bootstrap/jquery/jquery.min.js"></script>
  <script src="../Bootstrap/jquery.easing/jquery.easing.min.js"></script>
  <script src="../Bootstrap/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../Bootstrap/typed.js/typed.min.js"></script>
  <script src="../Bootstrap/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../JS/profile.js"></script>

</body>

</html>