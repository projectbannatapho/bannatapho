<?php
$project_name = "Weaving-Museum";



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WeavingMuseumDB";
$timezone = date_default_timezone_set("Asia/Bangkok");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


function DateThai($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));

    $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยาน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    $strMonthThai=$strMonthCut[$strMonth];
    echo "$strDay $strMonthThai $strYear";
}


$status_Arr = ['รอโอนมัดจำ','รอตรวจสอบ', 'อนุมัติการจอง (รอชำระเงิน)', 'ยืนยันการชำระเงิน','อนุมัติ', 'ไม่อนุมัติ', 'ยกเลิกการจองโดยแอดมิน'];

?>