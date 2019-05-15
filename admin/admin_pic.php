 <?php
 include('./base datos/dbcon.php'); 
dbcon(); 
 include('session.php');
 
 									//consulta sql para guardar la imagen de usuario con su respectivo id
                            if (isset($_POST['change'])) {
                               

                                $image = addslashes(file_get_contents($_FILES['']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "img-usuario/" . $_FILES["image"]["name"]);
                                $adminthumbnails = "img-usuario/" . $_FILES["image"]["name"];
								
								mysql_query("update admin set adminthumbnails = '$adminthumbnails' where admin_id  = '$session_id' ")or die(mysql_error());
								
								?>
 
								<script>
								window.location = "dashboard.php";  
								</script>

                       <?php     }  ?>