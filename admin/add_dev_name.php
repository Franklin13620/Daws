
  <div class="row-fluid">
                        <!-- menu lateral para agregar nuevos reportes al sistema -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Agregar nombre de nuevo reporte</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								 <!--formulario-->
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="dev_name" id="focusedInput" type="text" placeholder = "Reporte" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-info" id="save" data-placement="right" ><i class="icon-plus-sign icon-large"> Guardar</i></button>
												
                                          </div>
                                        </div>
                                </form>
								
								</div>
                            </div>
                        </div>
                        
                    </div>				 
					<?php
if (isset($_POST['save'])){
$dev_name = $_POST['dev_name'];

$query = mysql_query("select * from device_name where dev_name = '$dev_name'")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 0){ ?>
<script>
alert('El reporte ya existe');
</script>
<?php
}else{

mysql_query("insert into device_name (dev_name) values('$dev_name')")or die(mysql_error());

mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Registro de nuevo tipo de reporte $dev_name')")or die(mysql_error());
?>
<script>
window.location = "dev_name.php";
$.jGrowl("Reporte agregado correctamente", { header: 'Device Name add' });
</script>
<?php
}
}
?>