<?php
session_start();
include("../../conn.php");

$user_id    = $_POST['user_id'];
$full_name  = $_POST['full_name'];
$email      = $_POST['email'];
$password   = $_POST['password'];
$tel        = $_POST['tel'];
$level      = $_POST['level'];

if ($user_id != "") {
	$results = $conn->query("SELECT * FROM `user` WHERE `full_name` ='".$full_name."' AND `email` = '".$email."' AND `user_id` != '".$user_id."'");
	if ($results !== false && $results->num_rows > 0){
		echo "
          <script>
            alert('พบข้อมูลซ้ำ กรุณาลองอีกครั้ง')
            window.location.href = 'form_admin.php?id=$user_id'
          </script>
        ";
		
	}else{
		$update = "UPDATE `user` SET `full_name`='".$full_name."',`email`='".$email."',`password`='".$password."',`tel`='".$tel."',`level`='".$level."' WHERE `user_id`='".$user_id."'";
		if ($conn->query($update) === true) {
	      echo "
	        <script>
	          alert('บันทึกข้อมูลเรียบร้อย')
	          window.location.href = 'list_admins.php'
	        </script>
	      ";
	    }else{
	      echo "
	        <script>
	          alert('บันทึกข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง')
	          window.location.href = 'form_admin.php?id=$user_id'
	        </script>
	      ";
	    }
	}

}else{
	$results = $conn->query("SELECT * FROM `user` WHERE `full_name` ='".$full_name."' AND `email` = '".$email."' ");
	if ($results !== false && $results->num_rows > 0){
		echo "
          <script>
            alert('พบข้อมูลซ้ำ กรุณาลองอีกครั้ง')
            window.location.href = 'form_admin.php'
          </script>
        ";
		
	}else{
		$insert = "INSERT INTO `user`(`full_name`, `email`, `password`, `tel`, `level`) VALUES ('".$full_name."','".$email."','".$password."','".$tel."','".$level."')";
		if ($conn->query($insert) === true) {
	      echo "
	        <script>
	          alert('บันทึกข้อมูลเรียบร้อย')
	          window.location.href = 'list_admins.php'
	        </script>
	      ";
	    }else{
	      echo "
	        <script>
	          alert('บันทึกข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง')
	          window.location.href = 'form_admin.php'
	        </script>
	      ";
	    }
	}
}
?>