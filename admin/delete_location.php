<?php
include('./base datos/dbcon.php'); 
// consulta sql para borrar una ubicacion del sistema
dbcon(); 
if (isset($_POST['delete_location'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM stlocation where stdev_id='$id[$i]'");
}
header("location: location.php");
}
?>