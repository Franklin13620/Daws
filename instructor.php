<!DOCTYPE html>
<html lang="es">
<head> <!-- fotos y descripcion del profesor -->
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
							<h3></i><i class="icon-user"></i>&nbsp;Ing. en Sistemas Informaticos</h3>
							<hr>
                <div class="span3">
										<center>
										<img id="desarrolladores" src="admin/images/IngLrivas.jpeg" class="img-circle">
										<hr>
										<p>Nombre: Luis Humberto Rivas </p>
										<p>Contacto:<a href="mailto:info@lrivas.net"> info@lrivas.net</a></p>
										<p>WebSite:<a href="http://www.lrivas.net/"> lrivas.net</a></p>
										</center>
								</div>
                            </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>
