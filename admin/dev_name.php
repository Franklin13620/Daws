<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body> <!-- interfaz para agregar o borrar nuevos tipos de reportes -->
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('add_dev_name.php'); ?>		   			
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        
						
				<div class="empty">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <i class="icon-info-sign"></i>  <strong>Tips!:</strong> Selecciona los elementos que deseas eliminar
                    </div>
               </div>
			   				<!--funcion para habilitar los check box -->				
				<?php	
	             $count_dev_name=mysql_query("select * from device_name");
	             $count = mysql_num_rows($count_dev_name);
                 ?>	 
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> Nombre de reporte (s) </div>
								<div class="muted pull-right">
								Reportes totales: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_dev_name.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-placement="right" title=""  data-toggle="modal" href="#device_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"> Borrar</i></a>
									
									<!--tabla contenedora de reportes -->
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												<th></th>
												<th>Reportes</th>										
												<th></th>
										   </tr>
										</thead>
										<tbody>
										<!--seleccion de reportes por id -->
													<?php
													$device_name_query = mysql_query("select * from device_name")or die(mysql_error());
													while($row = mysql_fetch_array($device_name_query)){
													$id = $row['dev_id'];
													?>
									
												<tr>
												<td width="30">
												<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>												
	                                            
												<td><?php echo $row['dev_name']; ?></td>
												
											    <?php include('toolttip_edit_delete.php'); ?>															
												<td width="75">
												<a rel="tooltip"  title="" id="e<?php echo $id; ?>" href="edit_dev_name.php
												<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"> Editar</i></a>
												</td>
									
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