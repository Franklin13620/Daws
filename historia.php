<?php include('header_dashboard.php'); ?>
     <body id="home">
		<?php include('navbar_acerca.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12" id="content">
                     <div class="row-fluid">
                        <!-- funcion para ocultar leyenda volver al login -->
                        <div id="block_bg" class="block">
								<div class="navbar navbar-inner block-header">
									<div id="" class="muted pull-right"><a id="return" data-placement="left" title="volver al login" href="index.php"><i class="icon-arrow-left"></i> Regresar</a></div>
									<script type="text/javascript">
																$(document).ready(function(){
																	$('#return').tooltip('show');
																	$('#return').tooltip('hide');
																});
																</script>
								</div>

                                <!-- funcion sql para llamar elemnto historia de la base de datos -->
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="container-fluid">                                    
										<?php
											$historia_query = mysql_query("select * from content where title  = 'Historia' ")or die(mysql_error());
											$historia_row = mysql_fetch_array($historia_query);
											echo $historia_row['content'];
										?>										                             
                                  </div>
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