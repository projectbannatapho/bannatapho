<?php
session_start();
include("../../conn.php");

$package_id             = $_POST['package_id'];
$package_name           = $_POST['package_name'];
$package_detail         = $_POST['package_detail'];
$package_pice_child     = $_POST['package_pice_child'];
$package_pice_adult     = $_POST['package_pice_adult'];
$package_pice_group     = $_POST['package_pice_group'];
$people_per_group_min   = $_POST['people_per_group_min'];
$people_per_group_max   = $_POST['people_per_group_max'];
$package_type   				= $_POST['package_type'];
$people_per_group 			= $people_per_group_min."-".$people_per_group_max;
$user_id								= $_SESSION['user_id'];

if ($package_id != "") {
	$results = $conn->query("SELECT * FROM `packages` WHERE `package_name` = '".$package_name."' AND `package_id` != '".$package_id."'");
    if ($results !== false && $results->num_rows > 0){
      	echo "
          <script>
            alert('พบข้อมูลซ้ำ กรุณาลองอีกครั้ง')
            window.location.href = 'form_package.php?id=$package_id'
          </script>
        ";
      
   	}else{

		$results = $conn->query("SELECT * FROM `packages` WHERE `package_id` = '".$package_id."'");
		$p = $results->fetch_array();

		$package_img1 = uploadimage($_FILES["package_img1"]);
		$package_img2 = uploadimage($_FILES["package_img2"]);
		$package_img3 = uploadimage($_FILES["package_img3"]);
		$package_img4 = uploadimage($_FILES["package_img4"]);

		if ($package_img1 == "") {
			$package_img1 = $p['package_img1'];
		}
		if ($package_img2 == "") {
			$package_img2 = $p['package_img2'];
		}
		if ($package_img3 == "") {
			$package_img3 = $p['package_img3'];
		}
		if ($package_img4 == "") {
			$package_img4 = $p['package_img4'];
		}

		$update = "UPDATE `packages` SET`package_name`='".$package_name."',`package_detail`='".$package_detail."',`package_img1`='".$package_img1."',`package_img2`='".$package_img2."',`package_img3`='".$package_img3."',`package_img4`='".$package_img4."',`package_pice_child`='".$package_pice_child."',`package_pice_adult`='".$package_pice_adult."',`package_pice_group`='".$package_pice_group."',`people_per_group`='".$people_per_group."',`user_id`='".$user_id."',`package_type`='".$package_type."' WHERE  `package_id`='".$package_id."'";
		if ($conn->query($update) === true) {
	      echo "
	        <script>
	          alert('บันทึกข้อมูลเรียบร้อย')
	          window.location.href = 'list_packages.php'
	        </script>
	      ";
	    }else{
	      echo "
	        <script>
	          alert('บันทึกข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง')
	          window.location.href = 'form_package.php'
	        </script>
	      ";
	    }
	}


}else{
	$package_img1 = uploadimage($_FILES["package_img1"]);
	$package_img2 = uploadimage($_FILES["package_img2"]);
	$package_img3 = uploadimage($_FILES["package_img3"]);
	$package_img4 = uploadimage($_FILES["package_img4"]);

	$results = $conn->query("SELECT * FROM `packages` WHERE `package_name` = '".$package_name."'");
    if ($results !== false && $results->num_rows > 0){
      	echo "
          <script>
            alert('พบข้อมูลซ้ำ กรุณาลองอีกครั้ง')
            window.location.href = 'form_package.php'
          </script>
        ";
      
   	}else{
   		$insert = "INSERT INTO `packages`(`package_name`, `package_detail`, `package_img1`, `package_img2`, `package_img3`, `package_img4`, `package_pice_child`, `package_pice_adult`, `package_pice_group`, `people_per_group`, `user_id`, `package_type`) VALUES ('".$package_name."','".$package_detail."','".$package_img1."','".$package_img2."','".$package_img3."','".$package_img4."','".$package_pice_child."','".$package_pice_adult."','".$package_pice_group."','".$people_per_group."','".$user_id."','".$package_type."')";
   		if ($conn->query($insert) === true) {
	      echo "
	        <script>
	          alert('บันทึกข้อมูลเรียบร้อย')
	          window.location.href = 'list_packages.php'
	        </script>
	      ";
	    }else{
	    	echo $insert;
	      // echo "
	      //   <script>
	      //     alert('บันทึกข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง')
	      //     window.location.href = 'form_package.php'
	      //   </script>
	      // ";
	    }
   	}

}


function uploadimage($image){
	if($image["name"] != ""){
      	
        $target_dir = "images/";
        $target_name = $image["name"];
        $target_file = $target_dir . basename($target_name);

        if (move_uploaded_file($image["tmp_name"], $target_file)) {
        	
           $package_image = $target_name;
        } else {
           $package_image = "";
        }

    }else{
    	$package_image = "";
    }

    return $package_image;
}
?>