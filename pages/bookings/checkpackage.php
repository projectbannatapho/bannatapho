<?php
session_start();
include("../conn.php");

$package_id = $_POST['package_id'];



$results = $conn->query("SELECT * FROM `packages` WHERE `package_id` = '".$package_id."'");
$p = $results->fetch_array();


echo $p['package_type'];

?>