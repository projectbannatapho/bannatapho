<?php
	session_start();

	include('../conn.php');

	$uername 	= $_POST['email'];
	$password 	= $_POST['password'];


	$sql = "SELECT * FROM `user` WHERE `email` = '".$uername."' AND `password` = '".$password."'";
	$result = mysqli_query($conn, $sql);


	$count = 0;

	foreach ($result as $key => $User) {
		$_SESSION["full_name"] 	= $User['full_name'];
		$_SESSION["user_id"] 	= $User['user_id'];
		$_SESSION["level"] 		= $User['level'];
		$count ++;
	}	


	if ($count > 0) {
		if ($_SESSION["level"] == 'admin') {
			header( "location: /$project_name/pages/admin/index.php" ); //ไปยังหน้าหลัก
		}else{
			header( "location: /$project_name/" ); //ไปยังหน้าหลัก
		}
		
		
	}else{
		
		echo "<script>
		alert('Username หรือ Password ไม่ถูกต้อง\\n\\n\\nกรุณาลองใหม่อีกครั้ง!!');
		window.location.href='/$project_name/pages/Login';
		</script>";
		
		
	}

	$conn->close();

?>