
  <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
               <div class="container-fluid">
				 <!-- Barra de navegacion del usuario en el inicio -->
				 <div class="navbar-header">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					 <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="dashboard.php" title="Haga clic para volver al inicio" id="inicioAdmin">Panel Administrador</a>
                    <script type="text/javascript">
                    $(document).ready(function(){
                    $('#inicioAdmin').tooltip('show');
                    $('#inicioAdmin').tooltip('hide');
                    });
                    </script>
				 </div>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
						<?php $query= mysql_query("select * from admin where admin_id = '$session_id'")or die(mysql_error());
							  $row = mysql_fetch_array($query);
						?>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><img id="avatar1" class="img-responsive" src="<?php echo $row['adminthumbnails']; ?>">&nbsp;<?php echo $row['firstname']." ".$row['lastname'];  ?> <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                       <a tabindex="-1" href="change_password_admin.php"><i class="icon-cog"></i>&nbsp;Cambiar Contrase&#241;a</a>
									   <a tabindex="-1" href="#myModal3" data-toggle="modal"><i class="icon-picture"></i>&nbsp;Cambiar Imagen</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="logout.php"><i class="icon-signout"></i>&nbsp;Cerrar Sesi&#243;n</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
		<?php include('admin_change_picture.php'); ?>
