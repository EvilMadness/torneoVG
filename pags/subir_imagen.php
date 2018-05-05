<?php
include "conexion_bd.php";
 $sql = 'SELECT * FROM personaje';
 $result = $conn ->query($sql);
 $personajes = $result -> fetchAll();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Imagen</title>
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="../css/botones.css" rel="stylesheet" type="text/css" media="all">
    <link href="../images/MarioIcon2.png" rel="shortcut icon" type="image/x-icon" >

    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />


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
            <h1><a href="../index.php">Torneo de videojuegos</a></h1>
        </div>
        <nav id="mainav" class="fl_right">
            <ul class="clear">
                <li><a href="../index.php">Inicio</a></li>
                <li><a class="drop active" href="#">Registro</a>
                    <ul>
                        <li><a href="pags/formularios/captura_vendedores.html">Iniciar Sesión</a></li>
                        <li><a  href="#">Resgistrarse</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- ################################################################################################ -->
    </header>
</div>

<div class="wrapper row3 bgded overlay2 fondoformulario">
    <main class="hoc container clear">
        <div id="comments" align="center">
            <form enctype="multipart/form-data" action="process/save_image.php" method="POST" style="width: 50%">
                <h2 style="background-color: rgba(255,255,255,0.75)">Subir / Actualizar la imagen del personaje</h2>
                <div>
                    <select name="nombre" id="nombre">
                        <option value="0" >════════════════ Elige el personaje ═══════════════</option>
                        <?php
                        foreach ($personajes as $personaje){
                            echo '<option value="'.$personaje['idPersonaje'].'">'.$personaje['idPersonaje'].' - '.utf8_encode($personaje['nombre']).'</option>';
                        } ?>
                    </select>
                </div>
                <div>
                    <label for="imagen"></label>
                    <input name="imagen" id="imagen" type="file" required>
                </div>
                <input type="submit" value="Subir foto"/>
            </form>
        </div>
    </main>
</div>

<!--<div class="wrapper row4">
    <footer id="footer" class="hoc topspace-0 clear">
        <!-- ################################################################################################ --
        <br>
        <!-- ################################################################################################ --
        <div class="group">
            <div class="one_half first">
                <h6 class="title">Contacto</h6>
                <address class="btmspace-15">
                    Luis Ángel García Castro<br>
                    Carretera Guadalajara - Ameca Km 45.5<br>
                    Ameca, Jalisco, México<br>
                    C.P. 46600
                </address>
                <ul class="nospace">
                    <li class="btmspace-10"><span class="fa fa-phone"></span> (386) 106 4302</li>
                    <li><span class="fa fa-envelope-o"></span> luisgarcia@alumnos.udg.mx</li>
                </ul>
            </div>
            <div class="one_half">
                <h6 class="title">Comunicate</h6>
                <p>Guadalajara[Matriz] (33) 3105 7071</p>
                <p>México D.F.  (55) 3105 7071</p>
                <p>Arabia Saudita.  +966 (5) 105 7071</p>
                <p>Ahualulco de Mdo.  (386) 105 7071</p>
            </div>
        </div>
        <!-- ################################################################################################ --
    </footer>
</div>-->
<div class="wrapper row5">
    <div id="copyright" class="hoc clear">
        <!-- ################################################################################################ -->
        <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="../../index.php">AKBARIA STORE متجر أكباريا</a></p>
        <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
        <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
</div>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src=""></script>
</body>
</html>