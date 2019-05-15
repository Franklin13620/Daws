<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="admin/images/logo.png" />
</head>
<?php include('header_dashboard.php'); ?>
<?php header('Content-Type: text/html; charset=UTF-8'); ?>

     <body id="home">
		<?php include('navbar_acerca.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12" id="content">
                     <div class="row-fluid">
                        <!-- funcion para ocultar, volver al login -->
                        <div class="block">
								<div class="navbar navbar-inner block-header">
									<div id="" class="muted pull-left">&nbsp;Acerca</div><div id="" class="muted pull-right"><a id="return" data-placement="left" title="volver al login" href="index.php"><i class="icon-arrow-left"></i> Regresar</a></div>
									<script type="text/javascript">
									$(document).ready(function(){
									$('#return').tooltip('show');
									$('#return').tooltip('hide');
									});
									</script>
								</div>
								<!-- funcion sql para acceder a la informacion de la vision y mision en la base de datos -->
                            <div class="block-content collapse in">
                                <div class="span12">
										<?php
											$mision_query = mysql_query("select * from content where title  = 'mision' ")or die(mysql_error());
											$mision_row = mysql_fetch_array($mision_query);
											echo $mision_row['content'];
										?>
								<hr>
										<?php
											$vision_query = mysql_query("select * from content where title  = 'vision' ")or die(mysql_error());
											$vision_row = mysql_fetch_array($vision_query);
											echo $vision_row['content'];
										?>
                                </div>
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
