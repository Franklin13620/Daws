   <div class="row-fluid">					  
       <a href="location.php" class="btn btn-info"id="add" data-placement="right"  ><i class="icon-plus-sign icon-large"></i> Agregar ubicacion</a>
	               
                        <!-- barra lateral para agregar ubicaciones nuevas-->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Editar ubicacion</div>
                            </div>
							<?php
							$query = mysql_query("select * from stlocation where stdev_id = '$get_id'")or die(mysql_error());
							$row = mysql_fetch_array($query);
							?>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input name="stdev_location_name" value="<?php echo $row['stdev_location_name']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Nombre de la ubicacion" required>
                                          </div>
                                        </div>
	
									<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success" id="update" data-placement="right" "><i class="icon-save icon-large"> Guardar</i></button>
                                                
                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        
                    </div><?php
if (isset($_POST['update'])){
$stdev_location_name = $_POST['stdev_location_name'];

mysql_query("update stlocation set stdev_location_name = '$stdev_location_name' where stdev_id = '$get_id' ")or die(mysql_error());

mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Cambios en ubicacion $stdev_location_name')")or die(mysql_error());
?>

<script>
$.jGrowl("Datos actualizados correctamente", { header: 'Location update' });
window.location = "location.php";
</script>
<?php

}
?>