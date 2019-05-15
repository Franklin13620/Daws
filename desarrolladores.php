<!DOCTYPE html>
<html lang="es">

<head> <!-- fotos y descripcion de los alumnos implicados en el proyecto -->
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link rel="shortcut icon" href="images/logo.png" />
</head>
<?php include('header_dashboard.php'); ?>
    <body id="home">
		<?php include('navbar_acerca.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12" id="content">
                     <div class="row-fluid">
                        <!-- funcion para ocultar la leyenda *volver al login* -->
                        <div class="block">
								<div class="navbar navbar-inner block-header">
									<div id="" class="muted pull-right"><a id="return" data-placement="left" title="Volver al login" href="index.php"><i class="icon-arrow-left"></i> Atras</a></div>
									<script type="text/javascript">
																$(document).ready(function(){
																	$('#return').tooltip('show');
																	$('#return').tooltip('hide');
																});
																</script>
								</div>
								<center>
                            <div class="block-content collapse in">
							<h3></i><i class="icon-group"></i>&nbsp;Universidad Gerardo Barrios</h3>
							<hr>
                                <div class="span3">
										<center>
										<img id="desarrolladores" src="admin/images/franklin.jpg" class="img-circle">
										<hr>
										<p>Nombre: Franklin Geovany Torres Rodr&iacuteguez </p>
										<p>Carrera: Ingenier&iacutea en Sistemas</p>
										<p>Email: franklintorres13620@gmail.com.com</p>
										</center>
								</div>
                                <div class="span3">
										<center>
								        <img id="desarrolladores" src="admin/images/Krissia.jpeg" class="img-circle">
								        <hr>
										<p>Nombre: Krissia Marcela Orellana  &Aacutemaya </p>
										<p>Carrera: Ingenier&iacutea en Sistemas</p>
										<p>Email: krissiaorellana96@gmail.com</p>
								        </center>
								</div>

                                <div class="span3">
                    <center>
                        <img id="desarrolladores" src="admin/images/logo.png" class="img-circle">
                        <hr>
                    <p>Nombre: Jos&eacute Luis Lopez Salmeron </p>
                    <p>Carrera: Ingenier&iacutea en Sistemas</p>
                    <p>Email: joseluis.lopez.salmeron@gmail.com</p>
                        </center>
                </div>
                                <div class="span3">
                    <center>
                        <img id="desarrolladores" src="admin/images/sandoval.jpeg" class="img-circle">
                        <hr>
                    <p>Nombre: Mario Humberto Sandoval Guzm&aacuten </p>
                    <p>Carrera: Ingenier&iacutea en Sistemas</p>
                    <p>Email: mario.sandoval97@gmail.com</p>
                        </center>
                </div>
								</center>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>
