<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body> <!-- interfaz para editar nombres de reportes -->
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
									<a href="add_Device.php" class="btn btn-info"  id="add" data-placement="right"  ><i class="icon-plus-sign icon-large"></i> Agregar componente</a>
					                
		                        
		                        <div id="" class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Editar componente</div>
										<div class="muted pull-right"><a id="return" data-placement="left"  href="device_stocks.php"><i class="icon-arrow-left icon-large"></i> Atras</a></div>
																
		                            </div>
		                            <div class="block-content collapse in">									
									
									<?php
									$query = mysql_query("select * from stdevice 
									LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
									where id = '$get_id'")or die(mysql_error());
									$row = mysql_fetch_array($query);
									?>
									
									    <form class="form-horizontal" method="post" enctype="multipart/form-data">
										
										<div class="control-group">
											<label class="control-label" for="inputEmail">Reporte</label>
											<div class="controls">			
												<select id="qtype" name="dev_id" required>

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
											<label class="control-label" for="inputPassword">Proveedor</label>
											<div class="controls">
											<input type="text" class="span8" value="<?php echo $row['dev_brand']; ?>" name="dev_brand" id="inputPassword"  required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Codigo</label>
											<div class="controls">
											<input type="text" class="span8" value="<?php echo $row['dev_serial']; ?>" name="dev_serial" id="inputPassword"  required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">No. de parte</label>
											<div class="controls">
											<input type="text" class="span8" value="<?php echo $row['dev_model']; ?>" name="dev_model" id="inputPassword"  required>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="inputPassword">Fecha de expedicion</label>
											<div class="controls">
											<input type="date" class="span8" value="<?php echo $row['fecha_ingreso']; ?>" name="fecha_ingreso" id="inputPassword"  required>
											</div>
										</div>



																	
								<div class="control-group">
								<label class="control-label" for="inputPassword">Cargar archivo</label>
								<div class="controls">
									<input name="uploadedfile" class="input-file uniform_on" id="uploadedfile" type="file" >
								</div>
								</div>
										


										<div id="hide">
										<div class="control-group">
											<label class="control-label" for="inputPassword"  placeholder="Device Status" >Estado</label>
											<div class="controls">
											<select value="" name="dev_status" required>
													<option><?php echo $row['dev_status']; ?></option>													
												</select>								
											</div>
										</div>
									   </div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Descripcion</label>
											<div class="controls">
													<textarea name="dev_desc" id="ckeditor_full">
													<?php echo $row['dev_desc']; ?>
													</textarea>
											</div>
										</div>
										
										<div class="control-group">
										<div class="controls">
										
										<button id="update" data-placement="right" name="update" type="submit" class="btn btn-info"><i class="icon-save icon-large"></i> Guardar</button>
										</div>
										</div>
										
										</form>
										
										<?php



										if (isset($_POST['update'])){

											

											$image = addslashes(file_get_contents($_FILES['']['tmp_name']));
                               			 $image_name = addslashes($_FILES['uploadedfile']['name']);
                              			  $image_size = getimagesize($_FILES['uploadedfile']['tmp_name']);

		                                move_uploaded_file($_FILES["uploadedfile"]["tmp_name"], "reportes/" . $_FILES["uploadedfile"]["name"]);
		                                $pdf = "reportes/" . $_FILES["uploadedfile"]["name"];


										$dev_id = $_POST['dev_id'];
										$dev_desc = $_POST['dev_desc'];
										$dev_serial = $_POST['dev_serial'];
										$dev_brand = $_POST['dev_brand'];
										$dev_model = $_POST['dev_model'];
										$fecha_ingreso = $_POST['fecha_ingreso'];
										$dev_status = $_POST['dev_status'];



										
										
										//codigo para agregar un año a la fecha
										$nuevafecha = strtotime('+1 year', strtotime($fecha_ingreso));
										$nuevafecha = date('y-m-j', $nuevafecha);
										echo $nuevafecha;
										
									
										mysql_query("update stdevice set dev_id = '$dev_id' ,
																		dev_desc = '$dev_desc',
																		dev_serial  = '$dev_serial',
																		dev_brand = '$dev_brand',
																		dev_model = '$dev_model',
																		fecha_ingreso = '$fecha_ingreso',
																		nuevafecha = '$nuevafecha',
																		dev_status = '$dev_status',
																		pdf_report = '$pdf'
																		where id = '$get_id'
																		 ")or die(mysql_error());
																										
									    mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','informacion componente modificado $dev_name')")or die(mysql_error());
										?>
										<script>										
										window.location = "device_stocks.php";
										$.jGrowl("componente actualizado", { header: 'Device update' });
										</script>
										<?php
										}
										
										
										?>
									
								
		                            </div>
		                        </div>
		                        
		                    </div>
		                </div>
            </div>
<script>
	jQuery(document).ready(function(){
		jQuery("#opt11").hide();
		jQuery("#opt12").hide();
		jQuery("#opt13").hide();		

		jQuery("#qtype").change(function(){	
			var x = jQuery(this).val();			
			if(x == '1') {
				jQuery("#opt11").show();
				jQuery("#opt12").hide();
				jQuery("#opt13").hide();
			} else if(x == '2') {
				jQuery("#opt11").hide();
				jQuery("#opt12").show();
				jQuery("#opt13").hide();
			}
		});
		
	});
</script>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>