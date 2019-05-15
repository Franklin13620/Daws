<?php
        include('admin/base datos/dbcon.php');
		dbcon();
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];

		/*...consulta para ingresar con el usuario ingresado en la base de datos...*/
			$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
			$result = mysql_query($query)or die(mysql_error());
			$row = mysql_fetch_array($result);
			$num_row = mysql_num_rows($result);

		if( $num_row > 0 ) {
		$_SESSION['id']=$row['admin_id'];
		echo 'true_admin';

		mysql_query("insert into user_log (username,login_date,admin_id)values('$username',NOW(),".$row['admin_id'].")")or die(mysql_error());
		}


		?>
