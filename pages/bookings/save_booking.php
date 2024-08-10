<?php
session_start();
include("../conn.php");

$booking_id			= $_POST['booking_id'];
$package_id			= $_POST['package_id'];
$date_booking		= $_POST['date_booking'];
$user_id			= $_POST['user_id'];
$total_child		= $_POST['total_child'] == "" ? 0 : $_POST['total_child'];
$total_adult		= $_POST['total_adult'] == "" ? 0 : $_POST['total_adult'];
$total_group		= $_POST['total_group'] == "" ? 0 : $_POST['total_group'];
$note				= $_POST['note'];
$total_price		= 0;
$status				= 1;
$date_null			= date("Y-m-d");


if ($date_booking <= $date_null) {
	echo "
	    <script>
	      alert('กรุณาจองล่วงหน้าอย่างน้อยหนึ่งวัน')
	      window.location.href = 'booking_add.php'
	    </script>
  	";
}else{
	$results = $conn->query("SELECT * FROM `packages` WHERE `package_id` = '".$package_id."'");
	$p = $results->fetch_array();

	if ($p['package_type'] == 'รายคน') {
		$total_price = ($total_child * $p['package_pice_child'])+($total_adult*$p['package_pice_adult']);
	}else{
		$total_price = $total_group * $p['package_pice_group']; 
	}


	if ($booking_id != "") {
		$update = "UPDATE `booking` SET `package_id`			='".$package_id."',
										`user_id`				='".$user_id."',
										`total_child`			='".$total_child."',
										`total_adult`			='".$total_adult."',
										`total_group`			='".$total_group."',
										`date_booking`			='".$date_booking."',
										`total_price`			='".$total_price."',
										`note`					='".$note."' 
							WHERE `booking_id`					='".$booking_id."'";
		if ($conn->query($update) === true) {
		  	echo "
			    <script>
			      window.location.href = 'confirm_booking.php?id=$booking_id'
			    </script>
			";
		}else{
			// echo $insert;
		  	echo "
			    <script>
			      alert('บันทึกข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง')
			      window.location.href = 'booking_add.php'
			    </script>
		  	";
		}
	}else{
		$insert = "INSERT INTO `booking`(`package_id`, `user_id`, `total_child`, `total_adult`, `total_group`, `date_booking`, `total_price`, `note`,`status`) VALUES ('".$package_id."','".$user_id."','".$total_child."','".$total_adult."','".$total_group."','".$date_booking."','".$total_price."','".$note."','".$status."')";

		if ($conn->query($insert) === true) {
			$last_id = $conn->insert_id;
		  	echo "
			    <script>
			      window.location.href = 'confirm_booking.php?id=$last_id'
			    </script>
			";
		}else{
			// echo $insert;
		  	echo "
			    <script>
			      alert('บันทึกข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง')
			      window.location.href = 'booking_add.php'
			    </script>
		  	";
		}
	}
}
?>