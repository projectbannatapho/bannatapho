<?php
session_start();
include("../../conn.php");

$results = $conn->query("SELECT * FROM `booking` WHERE `booking_id` = '".$_GET['id']."'");
$b = $results->fetch_array();

$users = $conn->query("SELECT * FROM `user` WHERE `user_id` = '".$b['user_id']."'");
$user = $users->fetch_array();

$packages = $conn->query("SELECT * FROM `packages` WHERE `package_id` = '".$b['package_id']."'");
$p = $packages->fetch_array();


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <?php include("../../layouts/title.php")?>
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../../../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <?php include("../../layouts/Sidebar_admin.php");?>
            
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <?php include("../../layouts/navbar_admin.php");?>
                <!-- Page content-->
                <div class="container-fluid mt-5">
                   
                    <div class="container row">
                        

                        <div class="card">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-auto">
                                                <h3>รายละเอียดการจอง</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">
                                                <b>วันที่จอง</b>
                                            </label>
                                            <label class="col-sm-4 col-form-label">
                                              <?= DateThai($b['date_booking'])?>  
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">
                                                <b>ชื่อ-นามสกุล</b>
                                            </label>
                                            <label class="col-sm-4 col-form-label">
                                              <?= $user['full_name']?>  
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">
                                                <b>E-mail</b>
                                            </label>
                                            <label class="col-sm-4 col-form-label">
                                              <?= $user['email']?>  
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">
                                                <b>เบอร์โทร</b>
                                            </label>
                                            <label class="col-sm-4 col-form-label">
                                              <?= $user['tel']?>  
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">
                                                <b>จำนวนผู้เข้าชม</b>
                                            </label>
                                            <div class="col-6">
                                                <?php if ($p['package_type'] == 'รายคน'){?>
                                                <div class="row">
                                                    <label class="col-sm-4 col-form-label">เด็ก</label>
                                                    <label class="col-sm-2 col-form-label">
                                                        <?= $b['total_child']?>  
                                                    </label>
                                                    <label class="col-sm-2 col-form-label">คน</label>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4 col-form-label">ผู้ใหญ่</label>
                                                    <label class="col-sm-2 col-form-label">
                                                        <?= $b['total_adult']?>  
                                                    </label>
                                                    <label class="col-sm-2 col-form-label">คน</label>
                                                </div>
                                                <?php }else{ ?>
                                                <div class=" row">
                                                    <label class="col-sm-4 col-form-label">
                                                        แบบหมู่คณะ 
                                                    </label>
                                                    <label class="col-sm-2 col-form-label">
                                                        <?= $b['total_group']?>
                                                    </label>
                                                    <label class="col-sm-2 col-form-label">คน</label>
                                                </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">
                                                <b>ราคารวม</b>
                                            </label>
                                            <label class="col-sm-2 col-form-label">
                                                <?= number_format($b['total_price'],2)?>  
                                            </label>
                                            <label class="col-sm-4 col-form-label"><b>บาท</b></label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-auto">
                                                <h3>หลักฐานการชำระเงิน</h3>
                                            </div>
                                        </div>
                                        <br>
                                        <center>
                                        <img 
                                            src="../../bookings/image/<?= $b['slip_payment'] ?>" 
                                            height="300"
                                        >
                                        </center>
                                        <br><br>
                                        <form 
                                            action="save_confirm_booking_admin.php" 
                                            method="POST" 
                                        >
                                        <input type="hidden" name="booking_id" value="<?= $b['booking_id']?>">
                                        <div class="mb-3 row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">
                                                สถานะ
                                            </label>
                                            <div class="col-sm-10">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="3">อนุมัติการจอง (รอชำระเงิน)</option>
                                                    <option value="5">อนุมัติ</option>
                                                    <option value="6">ไม่อนุมัติ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <center>
                                            
                                            <a 
                                                href="booking_admin.php"
                                                class="btn btn-danger"
                                            >
                                                ยกเลิก
                                            </a>
                                            <button type="submit" class="btn btn-success">บันทึก</button>
                                        </center>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        

                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../../../js/scripts.js"></script>
    </body>
</html>
