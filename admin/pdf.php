<?php //codigo para descargar los reportes del sistema
mysql_connect("localhost","root","") or die("No se pudo conectar a la base de datos");
mysql_select_db("daws1");

$qry="Select * from stdevice where id={$_REQUEST['id']}";
$res=mysql_query($qry) or die(mysql_error()." qry::$qry");
$obj=mysql_fetch_object($res);

//header("Content-type: {$obj->tipo}");
header("Content-type: application/pdf");
header('Content-Disposition: attachment; filename="'.$obj->pdf_report.'"');
//print $obj->contenido;
readfile($obj->pdf_report);
mysql_close();
 ?>