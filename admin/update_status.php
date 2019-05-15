<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body> <!-- interfaz para cambiar el estado de un componente -->
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
					<?php include('sidebar.php'); ?>
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
									
		                        
		                        <div id="" class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Actualizar Estado</div>
										<div class="muted pull-right"><a id="return" data-placement="left"  href="Newdevice.php"><i class="icon-arrow-left"></i> Regresar</a>
										</div>
										 
		                            </div>
									
									
									 
		                            <div class="block-content collapse in">
									
								    <div class="container-fluid">
                                     <div class="row-fluid">
			 					     <div class="alert alert-danger">
                                     
                                     </div>
									 </div>
									 </div>
									 
									<?php
									$query = mysql_query("select * from stdevice 
									LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
									where id = '$get_id'")or die(mysql_error());
									$row = mysql_fetch_array($query);
									?>
									
									 <form class="form-horizontal" method="post">
									 
									    <div class="control-group">
											<label class="control-label" for="inputEmail">Componente/Reporte</label>
											<div class="controls">			
												<select id="qtype" name="dev_id" readonly="readonly" required>

													<option value="<?php echo $row['dev_id']; ?>" ><?php echo $row['dev_name']; ?></option>
													<?php
													$device_query = mysql_query("select * from device_name")or die(mysql_error());
													while($query_device_row = mysql_fetch_array($device_query)){
													$dev_name = $row['dev_name'];
													?>
													<option value="<?php echo $query_device_row['dev_id']; ?>"><?php echo $query_device_row['dev_name'];  ?></option>
													<?php } ?>

												</select>
											</div>
										</div>
												
										<div class="control-group">
											<label class="control-label" for="inputPassword"  placeholder="Device Status" >Estado del componente</label>
											<div class="controls">
											<select value="" name="dev_status" required>
													<option><?php echo $row['dev_status']; ?></option>																										
													<option>Obsoleto</option>
												</select>								
											</div>
										</div>
										
								
										<div class="control-group">
										<div class="controls">
										
										<button id="update" data-placement="right"  name="update" type="submit" class="btn btn-info"><i class="icon-save icon-large"></i> Actualizar</button>
										</div>
										</div>
										  
										</form>
										
										<?php
										if (isset($_POST['update'])){
										$dev_id = $_POST['dev_id'];
										$dev_status = $_POST['dev_status'];																
									
										mysql_query("update stdevice set 
										            dev_id = '$dev_id',																		
													dev_status = '$dev_status'
													where id = '$get_id' ")or die(mysql_error());
													
										mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Estado actualizado $dev_name to $dev_status')")or die(mysql_error());			
										?>
										<script>
										window.location = "newdevice.php";
										$.jGrowl("Estado componente actualizado", { header: 'Device Status Update' });
										</script>
										<?php
										}
										
										?>
									
								
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