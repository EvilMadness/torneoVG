<?php
session_start();
?>
<!DOCTYPE html>
<!--
Template Name: Escarine-Biz
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
  <title>Torneo de Videojuegos: Smash</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link href="images/MarioIcon2.png" rel="shortcut icon" type="image/x-icon" />
</head>

<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul class="nospace inline pushright">
        <li><i class="fa fa-phone"></i> (386) 106 4302</li>
        <li><i class="fa fa-envelope-o"></i> luisgarcia@alumnos.udg.mx</li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="http://www.facebook.com/LuizGarcia.CA"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="https://twitter.com/RayoMonster"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="index.php">Torneo de videojuegos</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.php">Inicio</a></li>
          <?php
          if (isset($_SESSION["nickname"])){
          if ($_SESSION["tipo"]==2){ ?>
              <li class="drop"><a href="index.php">Carrera</a>
                  <ul>
                      <li><a href="pags/report_carreras.php">Administrar carreras</a></li>
                      <li><a href="pags/form_add_carrera.php">Agregar carreras</a></li>
                  </ul>
              </li>
              <li class="drop"><a href="index.php">Institución</a>
                  <ul>
                      <li><a href="pags/report_instituto.php">Administrar instituciones</a></li>
                      <li><a href="pags/form_add_instituto.php">Agregar instituciones</a></li>
                  </ul>
              </li>
              <li class="drop"><a href="index.php">Personaje</a>
                  <ul>
                      <li><a href="pags/report_personajes.php">Administrar personajes</a></li>
                      <li><a href="pags/form_add_personaje.php">Agregar personaje</a></li>
                      <li><a href="pags/subir_imagen.php">Subir imagen</a></li>
                  </ul>
              </li>
          <?php }?>
              <li><a class="drop" href="#"><?php echo $_SESSION["nickname"];?></a>
                  <ul>
                      <li><a href="pags/logoff.php">Cerrar Sesión</a></li>
                      <li><a href="pags/reporte_users.php">Ver tabla de concursantes</a></li>
                  </ul>
          <?php } else {?>
          <li><a class="drop" href="#">REGISTRO</a>
              <ul>
                  <li><a href="pags/login.php">Iniciar Sesión</a></li>
                  <li><a href="pags/form_registro.php">Registrarse</a></li>
                  <li><a href="pags/reporte_users.php">Ver tabla de concursantes</a>
              </ul>
          </li>
          <?php } ?>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('images/Smash2.jpg')">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article class="introtxt">
      <h3 class="heading underline center fondosombreado">4° Torneo de  Smash Bros</h3>
      <h6 class="fondosombreado" ">
        Feria Academica Cultural CUValles 2018
      </h6>
    </article>
  </div>
</div>
<div class="wrapper row4">
    <footer id="footer" class="hoc topspace-0 clear">
        <!-- ################################################################################################ -->
        <br>
        <!-- ################################################################################################ -->
        <div class="group">
            <div class="one_half first">
                <h6 class="title">Contacto</h6>
                <address class="btmspace-15">
                    Luis Ángel García Castro<br>
                    Carretera Guadalajara - Ameca Km 45.5
                    Ameca, Jalisco, México
                    C.P. 46600
                </address>
            </div>
            <div class="one_half">
                <h6 class="title">Comunicate</h6>
                <ul class="nospace">
                    <li class="btmspace-10"><span class="fa fa-phone"></span> (386) 106 4302</li>
                    <li><span class="fa fa-envelope-o"></span> luisgarcia@alumnos.udg.mx</li>
                </ul>
            </div>
        </div>
    </footer>
</div>
<div class="wrapper row5">
    <div id="copyright" class="hoc clear">
        <!-- ################################################################################################ -->
        <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="../../index.php">Luis A. García</a></p>
        <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
        <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
</div>
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
</body>
</html>