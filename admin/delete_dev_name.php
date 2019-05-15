<!-- consulta sql para borrar nombres de reportes -->
<?php
include('./base datos/dbcon.php');
dbcon();
if (isset($_POST['delete_dev_name'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM device_name where dev_id='$id[$i]'");
}
header("location: dev_name.php");
}
?>