   <div class="row-fluid">
                        <!-- interfaz para agregar nuevos ususrios al sistema -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Agregar usuario nuevo</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="firstname" id="focusedInput" type="text" placeholder = "Nombre" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="lastname" id="focusedInput" type="text" placeholder = "Apellido" required>
                                          </div>
                                        </div>
										
											<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="username" id="focusedInput" type="text" placeholder = "Nombre de usuario" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="password" id="focusedInput" type="password" placeholder = "Contraseña" required>
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
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysql_query("select * from admin where username = '$username' and password = '$password' and firstname = '$firstname' and password = '$password' ")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Usuario ya existente');
</script>
<?php
}else{
mysql_query("insert into admin (username,password,firstname,lastname,adminthumbnails) values('$username','$password','$firstname','$lastname','images/NO-IMAGE-AVAILABLE.jpg')")or die(mysql_error());

mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Usuario agregado $firstname')")or die(mysql_error());
?>
<script>
window.location = "admin_user.php";
$.jGrowl("Usuario agregado correctamente", { header: 'System User add' });
</script>
<?php
}
}
?>