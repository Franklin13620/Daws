<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('add_location.php'); ?>		   			
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- interfaz para agregar nuevas ubicaciones al sistmea -->
					<div class="empty">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon-info-sign"></i>  <strong>Nota!:</strong> Selecciona uno o varios elementos a borrar
                        </div>
                    </div>
					
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
							   <div class="muted pull-left"><i class="icon-reorder icon-building"></i> Lista de ubicaciones</div>                       
								
								<div id="" class="muted pull-right">
								<?php 
								$my_location = mysql_query("select * from stlocation ")or die(mysql_error());
								$count_my_location = mysql_num_rows($my_location);?>
								Total de ubicaciones: <span class="badge badge-info"><?php echo $count_my_location; ?></span>
						        </div>
								
                            </div>
														
                            <div class="block-content collapse in">
                                <div class="span12">
									<form action="delete_location.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
										<a data-placement="right"  data-toggle="modal" href="#delete_location" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"> Borrar</i></a>
										
									  <?php include('modal_delete.php'); ?>
									  <thead>
										  <tr>
													<th></th>
													<th>Ubicacion</th>
													<th></th>
										   </tr>
										</thead>
										<tbody>
										<?php
										$location_query = mysql_query("select * from stlocation")or die(mysql_error());
										while($location_row = mysql_fetch_array($location_query)){
										$id = $location_row['stdev_id'];
										?>
												
										<tr>
											<td width="30">
											<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											</td>
											<td><?php echo $location_row['stdev_location_name']; ?></td>
											
											<?php include('toolttip_edit_delete.php'); ?>																											
											<td width="125">
											<a rel="tooltip"  title="Edit Location" id="e<?php echo $id; ?>" href="edit_location.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i> Editar Ubicacion</a>
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