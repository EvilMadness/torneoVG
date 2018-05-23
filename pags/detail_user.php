<?php
session_start();
if (isset($_SESSION["nickname"])==false){
    header("Location:../index.php");
}
$id = $_GET["id"];
$id = (int)$id;
/**
 * Created by PhpStorm.
 * User: MnDMzTR
 * Date: 01/05/2018
 * Time: 07:41 PM
 */
require_once "conexion_bd.php";
$sql = 'SELECT * FROM concursante INNER JOIN personaje p on concursante.id_personaje = p.idPersonaje';
$sqlinstitucion = 'SELECT * FROM concursante INNER JOIN institucioneducativa i on concursante.id_institucion = i.id_institucion';
$sqlcarrera = 'SELECT * FROM concursante INNER JOIN carrera c2 on concursante.idCarrera = c2.idCarrera';
$result = $conn -> query($sql);
$resInstituto = $conn -> query($sqlinstitucion);
$resCarrera = $conn -> query($sqlcarrera);
$datos = $result -> fetchAll();
$instituciones = $resInstituto -> fetchAll();
$carreras = $resCarrera -> fetchAll();
$total = count($datos);
$vacantes = (33-$total);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte Competidores</title>
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="../css/botones.css" rel="stylesheet" type="text/css" media="all">
    <link href="../images/MarioIcon2.png" rel="shortcut icon" type="image/x-icon" >


</head>
<script>
    function confirmDelete(user) {
        if (confirm("¿Estas seguro de eliminar al usuario "+user+"?")==true){
            return true;
        }else
            return false;
    }
</script>
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
                <?php
                if (isset($_SESSION["nickname"])){?>
                <li><a class="drop" href="#"><?php echo $_SESSION["nickname"];?></a>
                    <ul>
                        <li><a href="logoff.php">Cerrar Sesión</a></li>
                        <li><a href="reporte_users.php">Ver reporte completo</a></li>
                    </ul>
                    <?php } else {?>
                <li><a class="drop" href="#">REGISTRO</a>
                    <ul>
                        <li><a href="../pags/login.php">Iniciar Sesión</a></li>
                        <li><a href="../pags/form_registro.php">Registrarse</a></li>
                    </ul>
                    <?php } ?>
            </ul>
        </nav>
        <!-- ################################################################################################ -->
    </header>

    <div class="wrapper row3 bgded overlay2 fondoformulario">
        <main class="hoc container clear">
            <div id="comments">
                <div align="center">
                    <h2 class="healset2" style="text-transform: none">Detalle de
                        <?php foreach ($datos as $dato){

                        if ($dato["idConcursante"]==$id){
                            echo $dato["nickname"];?></h2>
                    <table class="tablapos" border="1" width="80%" style="background-color: #469599">
                        <tr>
                            <th>Nombre completo</th>
                            <td><?php echo utf8_encode($dato['nombres'].' '.$dato['apaterno'].' '.$dato['amaterno']);?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Institución</th>
                            <td><?php foreach ($instituciones as $institucion){if ($institucion["idConcursante"]==$id){ echo $institucion['nombre'];}}?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Carrera</th>
                            <td><?php foreach ($carreras as $carrera){if ($carrera["idConcursante"]==$id){  echo utf8_encode($carrera['nombre_carrera']);}}?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Nickname</th>
                            <td><?php echo $dato['nickname'];?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Personaje</th>
                            <td><?php echo $dato['nombre'];?></td>
                            <td style="padding: 0px" width="50px"><img src="../images/personajes/<?php echo $dato['imagen']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Correo</th>
                            <td><?php echo $dato['email'];?></td>
                            <td></td>
                        </tr>
                        <?php }}?>
                    </table>
                </div><br>
                <div class="center">
                    <?php
                    if (isset($_SESSION["tipo"])){?>
                        <input type="submit" onclick="location.href='reporte_users.php';" value="Regresar" >
                    <?php } ?>
                </div>
            </div>
        </main>
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
            <!-- ################################################################################################ -->
        </footer>
    </div>
    <div class="wrapper row5">
        <div id="copyright" class="hoc clear">
            <!-- ################################################################################################ -->
            <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="../index.php">Luis García</a></p>
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