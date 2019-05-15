 <?php
 include('./base datos/dbcon.php'); 
 dbcon(); 
//consulta en la base de datos para cambiar la contraseña de un usuario
 include('session.php');
 $new_password  = $_POST['new_password'];
 mysql_query("update admin set password = '$new_password' where admin_id = '$session_id'")or die(mysql_error());
 ?>