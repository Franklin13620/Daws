<div class="row-fluid">				  
   <a href="dev_name.php" class="btn btn-info" id="add" data-placement="right"><i class="icon-plus-sign icon-large"></i> Agregar nombre de reporte</a>

	
                        <!-- formulario izquierdo para editar nombres de reportes -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-pencil icon-large"></i> Editar Nombre del reporte</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
								$query = mysql_query("select * from device_name where dev_id = '$get_id'")or die(mysql_error());
								$row = mysql_fetch_array($query);
								?>
								
								 <!-- form -->						
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['dev_name']; ?>" name="dev_name" id="focusedInput" type="text" placeholder = "Reporte" required>
                                          </div>
                                        </div>
										
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success" id="update" data-placement="right"><i class="icon-save icon-large"> Actualizar</i></button>
                                               
	                                          
                                          </div>
                                        </div>
                                </form>
										
					</div>
                </div>
            </div>
             
      </div>
<?php		
if (isset($_POST['update'])){

$dev_name = $_POST['dev_name'];

mysql_query("update device_name set dev_name = '$dev_name'  where dev_id = '$get_id' ")or die(mysql_error());

mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Tipo de reporte editado $dev_name')")or die(mysql_error());	
?>
<script>
  window.location = "dev_name.php";
 $.jGrowl("Finalizado", { header: 'Nombre actualizado' });  
</script>
<?php
}
?>