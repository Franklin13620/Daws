   <div class="row-fluid">
                        <!--panel izquierdo para agregar ubicaciones nuevas al sistema-->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"> <i class="icon-plus-sign icon-large"> Agrergar ubicacion</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input name="stdev_location_name" class="input focused" id="focusedInput" type="text"  required>
                                          </div>
                                        </div>
										
										<div id="hide">
										<div class="control-group">
                                          <div class="controls">
                                            <input name="thumbnails" class="input focused" >
                                          </div>
                                        </div>
									    </div>
										 
											<div class="control-group">
											<div class="controls">
												<button name="save" class="btn btn-info" id="save" data-placement="right" ><i class="icon-plus-sign icon-large"> Agregar</i></button>
                                                
                                          </div>                                          
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        
                    </div><?php
if (isset($_POST['save'])){
$stdev_location_name = $_POST['stdev_location_name'];
$thumbnails = $_POST['thumbnails'];

$query = mysql_query("select * from stlocation where stdev_location_name  =  '$stdev_location_name' ")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 0){ ?>
<script>
alert('El nombre de la ubicacion ya existe');
</script>
<?php
}else{
mysql_query("insert into stlocation (stdev_location_name,thumbnails) values('$stdev_location_name','images/thumbnails.jpg')")or die(mysql_error());

mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Ubicacion agregada $stdev_location_name')")or die(mysql_error());
?>
<script>
$.jGrowl("Ubicacion agregada correctamente", { header: 'Location add' });
window.location = "location.php";
</script>
<?php
}
}
?>