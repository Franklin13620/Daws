<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body > <!-- interfaz para visualizar y administrar todos los componentes por reporte -->
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
			
				<div class="span9" id="content">
                     <div class="row-fluid">
					 <a href="add_Device.php" class="btn btn-info"  id="add" data-placement="right" title="" ><i class="icon-plus-sign icon-large"></i> Agregar componente</a>
					  
					 <div id="sc" align="center"><image src="images/sclogo.png" width="45%" height="45%"/></div>
				<?php	
	             $count_item=mysql_query("select * from stdevice
				 LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id");
	             $count = mysql_num_rows($count_item);
                 ?>	 
				   <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                             <div class="muted pull-left"><i class="icon-reorder icon-large"></i> Lista de componentes por tipo de reporte</div>
                          <div class="muted pull-right">
								Componentes en total: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
						  </div>
						  
                 <h4 id="sc">Lista de componentes
					<div align="right" id="sc">Date:
						<?php
                            $date = new DateTime();
                            echo $date->format('l, F jS, Y');
                         ?></div>
				 </h4>

				

							
<div class="container-fluid">
 <div class="row-fluid">						 
 <br/>
	<div class="pull-left">
			    <ul class="nav nav-pills">
				<li class="active">
					<a href="device_stocks.php" action="alert.php" onclick="document.location.href='alert.php';">Todos</a>
				</li>
					
			  <?php	
	           $count_item=mysql_query("select * from stdevice 
			   LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
			   where dev_name = 'Nivel D' 
			   
			   ORDER BY stdevice.id DESC");
	           $count = mysql_num_rows($count_item);
               ?>					
				<li class="">
					<a href="niveld.php">Nivel D&nbsp;<span class="label label-default" action="alert.php" > <?php echo $count;?></span></a>
				</li>
				
				<?php	
	           $count_item=mysql_query("select * from stdevice 
			   LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
			   where dev_name = 'Validacion de comp.'  

			   ORDER BY stdevice.id DESC");
	           $count = mysql_num_rows($count_item);
               ?>
				<li class="">
				<a href="val_comp.php">Validacion de comp.&nbsp;<span class="label label-default" action="alert.php"> <?php echo $count;?></span></a></a>
				</li>
				
			   <?php	
	           $count_item=mysql_query("select * from stdevice 
			   LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
			   where dev_name = 'Test report' 

			   ORDER BY stdevice.id DESC");
	           $count = mysql_num_rows($count_item);
               ?>
				<li class="">
				<a href="test_report.php">Test report&nbsp;<span class="label label-default" action="alert.php"> <?php echo $count;?></span></a></a></a>
				</li>
				
			 <?php	
	           $count_item=mysql_query("select * from stdevice 
			   LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
			   where dev_name = 'PPAP' 
			   
			   ORDER BY stdevice.id DESC");
	           $count = mysql_num_rows($count_item);
               ?>
				<li class="">
				<a href="ppap.php">PPAP&nbsp;<span class="label label-default" action="alert.php"> <?php echo $count;?></span></a>
				</li>
				
			 <?php	
	           $count_item=mysql_query("select * from stdevice 
			   LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
			   where dev_name = 'CCN' 
			
			   ORDER BY stdevice.id DESC");
	           $count = mysql_num_rows($count_item);
               ?>
				<li class="">
				<a href="ccn.php">CCN&nbsp;<span class="label label-default" action="alert.php"> <?php echo $count;?></span></a>
				</li>
				
				<?php	
	           $count_item=mysql_query("select * from stdevice 
			   LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
			   where dev_name = 'QN' 
			  
			   ORDER BY stdevice.id DESC");
	           $count = mysql_num_rows($count_item);
               ?>
				<li class="">
				<a href="qn.php"> QN&nbsp;<span class="label label-default" action="alert.php"> <?php echo $count;?></span></a>
				</li>
				

				</ul>
	</div>
</div>
</div>
															
<div class="container-fluid">
  <div class="row-fluid"> 
     <div class="empty">
	     <div class="pull-right">
		   <a href="print_all_stock.php" class="btn btn-info" id="print" data-placement="left" ><i class="icon-print icon-large"></i> Imprimir</a> 		      
		         	   
         </div>
      </div>
    </div> 
</div>
	
<div class="block-content collapse in">
    <div class="span12">
	<form action="" method="post">
  	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<thead>		
		        <tr>			        
				<th class="empty"></th>
					<th>Reporte</th>
					<th>Descripcion</th>
			        <th>Proveedor</th>
					<th>Codigo</th>
					<th>Expiracion</th>					
                    <th>proximo a caducar</th>	
                    <th class="empty"> Descargar pdf</th>				
		    </tr>
		</thead>



<tbody>
<!--comprobacion de Estado de los componentes-->
<?php

				

		$device_query = mysql_query("select * from stdevice 
		LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id ")or die(mysql_error());
		while($row = mysql_fetch_array($device_query)){
		$id = $row['id'];
		$dev_id = $row['dev_id'];
		?>
							
		<tr>
		<td><?php

//codigo para avisar de la caducidad 

			   $device_query2 = mysql_query("select * from stdevice ")or die(mysql_error());
		       $dev=mysql_fetch_assoc($device_query2);
		   
		       $fecha_exp=strtotime($row['nuevafecha']); //timesamp  
				$interv=((60*60)*24)*30; //treinta dias
				$dia_alerta=date('Y-m-d', ($fecha_exp-$interv)); //que día me debe hacer el alerta
				$hoy=date('Y-m-d');

		       if($hoy >= $row['nuevafecha'])
		       {
			   echo '<i class="icon-exchange"></i><div id="hide"><strong>'.$row['nuevafecha'].'</strong></div>';
		       }
			  ?>

		</td>
			<td><?php echo $row['dev_name']; ?></td>
			<td><?php echo $row['dev_desc']; ?></td>
			<td><?php echo $row['dev_brand']; ?></td>
			<td><?php echo $row['dev_model']; ?></td>
			<td><?php echo $row['nuevafecha']; ?></td>
				

			<td><?php
			   $device_query1 = mysql_query("select * from stdevice ")or die(mysql_error());
		       $dev=mysql_fetch_assoc($device_query1);

		       $fecha_exp=strtotime($row['nuevafecha']); //timesamp  
				$interv=((60*60)*24)*30; //treinta dias
				$dia_alerta=date('Y-m-d', ($fecha_exp-$interv)); //que día me debe hacer el alerta
				$hoy=date('Y-m-d');

		       if($hoy >= $dia_alerta and $hoy < $row['nuevafecha'])
		       {
			   echo '<div class="alert alert-danger"><i></i><strong>'.$row['dev_serial'].'</strong></div>';
		       }
		       
			  ?></td>
			
			<?php include('toolttip_edit_delete.php'); ?>												
			
			<td class="empty" width=""><a rel="tooltip"  id="e<?php echo $id; ?>" href="pdf.php<?php echo '?id='.$id; ?>" class="btn btn-warning"><i class="icon-download"> PDF reporte</i></a></td>
		</tr>
											
	<?php } ?>   

</tbody>
</table>
</form>		
			
</div>
</div>
</div>
</div>
</div>
</div>	

<?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>
 </body>
</html>