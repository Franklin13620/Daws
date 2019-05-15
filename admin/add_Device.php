<?php include('header.php'); ?>
<?php include('session.php'); ?>

    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
				
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
							
		                        <!-- interfaz para agregar nuevos componentes al sistema -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Agragar componente</div>
										<div class="muted pull-right"><a id="return" data-placement="left"  href="device_stocks.php"><i class="icon-arrow-left icon-large"></i> Atras</a></div>
                         
		                            </div>
									
		                <div class="block-content collapse in">	
                         <div class="alert alert-success"><i class="icon-info-sign"></i> Por favor llenar los campos correctamente</div>						
							<form class="form-horizontal" method="post" enctype="multipart/form-data">											
								
										<div class="control-group">
		                                 <label class="control-label" for="inputEmail">Seleccionar reporte</label>
			                                <div class="controls">
				                              <select name="dev_id" class="chzn-select"  required/>
				                                 <option></option>
			                                     <?php $device_name=mysql_query("select * from device_name")or die(mysql_error()); 
			                                     while ($row=mysql_fetch_array($device_name)){ 												
												 ?>
				                                 <option value="<?php echo $row['dev_id']; ?>&nbspName&nbsp<?php echo $row['dev_name']; ?>"><?php echo $row['dev_name']; ?></option>
				                                 <?php } ?>
				                               </select>
		                                     </div>
	                                    </div>
											
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Proveedor</label>
											<div class="controls">
											<input type="text" class="span8" name="dev_brand" id="inputPassword"  required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Codigo</label>
											<div class="controls">
											<input type="text" class="span8" name="dev_serial" id="inputPassword"  required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">No. de parte</label>
											<div class="controls">
											<input type="text" class="span8" name="dev_model" id="inputPassword" placeholder="Ingrese el numero de parte y la inicial de reporte. Ejemplo: (903TCR-00PLG-N) N=NIVEL D" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="inputPassword">Fecha de expedicion</label>
											<div class="controls">
											<input type="date" class="span8" name="fecha_ingreso" id="inputPassword" >
											</div>
										</div>

									

										<div class="modal-body">
																	
											<div class="control-group">
											<label class="control-label" for="inputPassword">Cargar archivo de reporte correspondiente</label>
											<div class="controls">
												<input name="uploadedfile" class="input-file uniform_on" id="uploadedfile" type="file">
											</div>
											</div>
										</div>
										
										
										

										<div id="hide">
										<div class="control-group">
											<label class="control-label" for="inputPassword" >Estado</label>
											<div class="controls">
											<select name="dev_status"  required>										
													<option>Nuevo</option>																									
												</select>								
											</div>
										</div>
										</div>
												
												

										<div class="control-group">
											<label class="control-label" for="inputPassword">Descripcion</label>
											<div class="controls">
													<textarea name="dev_desc" id="ckeditor_full"></textarea>
											</div>
										</div>
											
										<div class="control-group">
										<div class="controls">
										<button  name="save" id="save"  data-placement="right"  class="btn btn-primary"><i class="icon-save"></i> Guardar</button>				
										</div>
										</div>
										
							</form>
<?php


if (isset($_POST['save'])){
$dev_id = $_POST['dev_id'];
$dev_desc = $_POST['dev_desc'];
$dev_serial = $_POST['dev_serial'];
$dev_brand = $_POST['dev_brand'];
$dev_model = $_POST['dev_model'];
$dev_status = $_POST['dev_status'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$rowAlert = $_POST['rowAlert'];



//codigo para ingresar el reporte del componente en PDF a una carpeta especifica del sistema -->
$image = addslashes(file_get_contents($_FILES['']['tmp_name']));
$image_name = addslashes($_FILES['uploadedfile']['name']);
$image_size = getimagesize($_FILES['uploadedfile']['tmp_name']);

move_uploaded_file($_FILES["uploadedfile"]["tmp_name"], "reportes/" . $_FILES["uploadedfile"]["name"]);
$pdf = "reportes/" . $_FILES["uploadedfile"]["name"];
								


//codigo para agregar 1 año a la fecha de registro y obtener la fecha de expiracion									
$nuevafecha = strtotime('+1 year', strtotime($fecha_ingreso));//timesamp
$nuevafecha = date('y-m-j', $nuevafecha);
echo $nuevafecha;
														
									

$query = mysql_query("select * from stdevice where dev_serial = '$dev_serial' ")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 0){ ?>
<script>
alert('El numero de parte del componente ya existe');
window.location = "device_stocks.php";
</script>
<?php
}else{
mysql_query("insert into stdevice (dev_id,dev_desc,dev_serial,dev_brand,dev_model,dev_status,fecha_ingreso,pdf_report,nuevafecha) values('$dev_id','$dev_desc','$dev_serial','$dev_brand','$dev_model','$dev_status','$fecha_ingreso','$pdf','$nuevafecha')")or die(mysql_error());


//actividad guardada en la bitacora
mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Componente agregado $dev_id')")or die(mysql_error());											
?>
<script>
window.location = "device_stocks.php";
$.jGrowl("Componente agregado correctamente", { header: 'Device add' });
</script>
<?php

}
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