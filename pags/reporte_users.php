<?php
session_start();
/*if (isset($_SESSION["nickname"])==false){
    header("Location:../index.php");
}*/
/**
 * Created by PhpStorm.
 * User: MnDMzTR
 * Date: 01/05/2018
 * Time: 07:41 PM
 */
require_once "conexion_bd.php";
$sql = 'SELECT * FROM concursante
INNER JOIN personaje p on concursante.id_personaje = p.idPersonaje';
$result = $conn -> query($sql);
$datos = $result -> fetchAll();
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
            <h2 class="contador">Total <br> registrados <br><?php echo $total?> </h2>
            <h2 class="contador2">Cupos <br> disponibles <br><?php echo $vacantes?></h2>
        <main class="hoc container clear">
            <div id="comments">
                <div align="center">
                    <div class="one_quarter first">
                        <input type="text" id="search" placeholder="Buscar concursante" class="">
                    </div>
                    <h2 class="healset2">Lista de concursantes</h2>
                    <table class="tablapos" border="1" width="80%" style="background-color: #469599" id="result">
                        <tr>
                            <th>Nickname</th>
                            <th>Img</th>
                            <th>Personaje</th>
                            <th>Correo</th>
                            <th>Nombre</th>
                            <?php if (isset($_SESSION["tipo"])){
                                echo '<th>Acciones</th>';
                             } ?>
                        </tr>
                        <?php
                        foreach ($datos as $dato){
                            ?>
                            <tr align="center">
                                <td><?php echo $dato['nickname'];?></td>
                                <td style="padding: 0px" width="50px"><img src="../images/personajes/<?php echo $dato['imagen']; ?>"></td>
                                <td><?php echo $dato['nombre'];?></td>
                                <td><?php echo $dato['email'];?></td>
                                <td><?php echo utf8_encode($dato['nombres']);?></td>
                                <?php if (isset($_SESSION["tipo"])){
                                    echo '<td style="padding: 0px">';
                                    if ($_SESSION["nickname"]==$dato['nickname']||$_SESSION["tipo"]==2){ ?>
                                        <a href="detail_user.php?id=<?php echo $dato['idConcursante'];?>"><img src="../images/icon/Detalle.png"></a>
                                    <?php }
                                    if ($_SESSION["tipo"]==2){ ?>
                                            <a href="form_editar.php?id=<?php echo $dato['idConcursante'];?>"><img src="../images/icon/Edit.png"></a>
                                            <a href="process/remove_user.php?id=<?php echo $dato['idConcursante'];?>"onclick="return confirmDelete('<?php echo $dato['nickname'];?>')"><img src="../images/icon/delete.png"></a>
                                <?php } echo '</td>';
                                } ?>
                            </tr>
                        <?php } ?>
                    </table>
                    <?php
                    $datos = count($datos);
                    if ($datos==0){
                        echo '<h2 class="healsettabla">No hay concursantes registrados</h2>';
                    }
                    ?>
                </div><br>
                <div class="center">
                    <?php
                    if (isset($_SESSION["tipo"])){
                        if ($_SESSION["tipo"]==2 && $total<32){?>
                        <input type="submit" onclick="location.href='form_registro.php';" value="Registrar nuevo concursante">
                    <?php
                        } elseif ($total==32){
                            echo '<h2 class="healsettabla2">Registro lleno</h2>';
                         }
                    } elseif ($total<32) {?>
                    <input type="submit" onclick="location.href='form_registro.php';" value="Registrate" >
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
            <!-- ################################################################################################ -->
        </footer>
    </div>
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
    <script type="application/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <script type="application/javascript" src="../js/bootstrap.min.js"></script>
    <script type="application/javascript" src="../js/buscador.js"></script>
</body>
</html>
