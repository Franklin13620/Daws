<?php  include('header.php'); ?>
<?php include('session.php');?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
               <div class="span9" id="content">
                     <div class="row-fluid">

					  <div class="alert alert-success"><i class="icon-info-sign"></i> Llene todos los campos en la zona de abajo</div>

                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><i class="icon-user"></i>&nbsp;Cambio de contraseña</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">

								<?php
								$query = mysql_query("select * from admin where admin_id = '$session_id'")or die(mysql_error());
								$row = mysql_fetch_array($query);
								?>
								 <div class="container-fluid">
                                    <div class="row-fluid">

									 <!--formulario para el cambio de contrseña-->
								    <form  method="post" id="change_password" class="form-horizontal">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Contraseña anterior</label>
											<div class="controls">
											<input type="hidden" id="password" name="password" value="<?php echo $row['password']; ?>"  placeholder="Current Password">
											<input type="password" id="current_password" name="current_password"  required/>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Contraseña nueva</label>
											<div class="controls">
											<input type="password" id="new_password" name="new_password" >
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Confirmar contraseña</label>
											<div class="controls">
											<input type="password" id="retype_password" name="retype_password"  required/>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
											<button type="submit" class="btn btn-info"><i class="icon-save"></i> Guardar</button>
											</div>
										</div>
									</form>

   <script>
			jQuery(document).ready(function(){
			jQuery("#change_password").submit(function(e){
					e.preventDefault();

						var password = jQuery('#password').val();
						var current_password = jQuery('#current_password').val();
						var new_password = jQuery('#new_password').val();
						var retype_password = jQuery('#retype_password').val();
						if (password != current_password)
						{
						$.jGrowl("La contraseña no cincide con la anterior  ", { header: 'Error al intentar cambiar la contraseña' });
						}else if  (new_password != retype_password){
						$.jGrowl(" La contraseña no cincide con la nueva ", { header: 'Error al intentar cambiar la contraseña' });
						}else if ((password == current_password) && (new_password == retype_password)){
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "update_password_admin.php",
						data: formData,
						success: function(html){

						$.jGrowl("La contraseña fue cambiada", { header: 'Cambio correcto' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'dashboard.php'  }, delay);

						}


					});

					}
				});
			});
</script>

                                </div>
                            </div>
                        </div>

                    </div>
				 </div>
                </div>
	         </div>
        </div>
<?php include('footer.php'); ?>
</div>
</div>
<?php include('script.php'); ?>
 </body>
</html>
