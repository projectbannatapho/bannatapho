<?php
session_start();
include("../../conn.php");

$booking_id 	= $_POST['booking_id'];
$status 		= $_POST['status'];



$update = "UPDATE `booking` SET `status`='".$status."' WHERE `booking_id`='".$booking_id."'";

if ($conn->query($update) === true) {
    echo "
        <script>
          alert('บันทึกข้อมูลเรียบร้อย')
          window.location.href = 'booking_admin.php'
        </script>
    ";
}else{
	echo "
      	<script>
        	alert('กรุณาแนบหลักฐานการชำระเงิน')
        	window.location.href = 'booking_detail_admin.php?id=$booking_id'
      	</script>
    ";
}


?>