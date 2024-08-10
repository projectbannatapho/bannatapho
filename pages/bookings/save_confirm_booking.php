<?php
session_start();
include("../conn.php");

$booking_id 	= $_POST['booking_id'];
$status 			= $_POST['status'];
$date_payment 	= $_POST['date_payment'];
$time_payment 	= $_POST['time_payment'];

if($_FILES["slip_payment"]["name"] != ""){
      	
    $target_dir = "image/";
    $target_name = $_FILES["slip_payment"]["name"];
    $target_file = $target_dir . basename($target_name);

    if (move_uploaded_file($_FILES["slip_payment"]["tmp_name"], $target_file)) {
    	
       $slip_payment = $target_name;
    } else {
       $slip_payment = "";
    }

    $update = "UPDATE `booking` SET `date_payment`='".$date_payment."', `time_payment`='".$time_payment."', `slip_payment`='".$slip_payment."', `status`='".$status."' WHERE `booking_id`='".$booking_id."'";

    if ($conn->query($update) === true) {
	    echo "
	        <script>
	          alert('บันทึกข้อมูลเรียบร้อย')
	          window.location.href = 'booking.php'
	        </script>
	    ";
	}else{
		echo "
	      	<script>
	        	alert('กรุณาแนบหลักฐานการชำระเงิน')
	        	window.location.href = 'confirm_booking.php?id=$booking_id'
	      	</script>
	    ";
	}

}else{
	echo "
      	<script>
        	alert('กรุณาแนบหลักฐานการชำระเงิน')
        	window.location.href = 'confirm_booking.php?id=$booking_id'
      	</script>
    ";
}


?>