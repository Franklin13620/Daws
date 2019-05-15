
<!-- finalizar la sesion en el sistema y registrarlo en la bitacora-->
<?php
include('./base datos/dbcon.php'); 
dbcon(); 
include('session.php');

$oras = strtotime("now");
$ora = date("Y-m-d",$oras);	
echo date_format($ora, 'Y-m-d H:i:s');									
mysql_query("update user_log set logout_Date = '$ora' where admin_id = '$session_id' ")or die(mysql_error());

session_destroy();
header('location:../index.php'); 
?>