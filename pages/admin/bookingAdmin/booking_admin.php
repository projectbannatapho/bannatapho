<?php
session_start();
include("../../conn.php");

$results = $conn->query("SELECT * FROM `booking`");


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
                        <div class="row">
                              <div class="col-auto">
                                <h3>รายการข้อมูลการจองเข้าชม</h3>
                              </div>
                        </div>
                        

                        <br><br><br>
                        <table class="table table-bordered">
                            <thead>
                                <tr align="center">
                                  <th scope="col">ลำดับ</th>
                                  <th scope="col">วัน/เดือน/ปี</th>
                                  <th scope="col">ชื่อ-นามสกุล</th>
                                  <th scope="col">จำนวนคน</th>
                                  <th scope="col">แพ็คเกจ</th>
                                  <th scope="col">ราคารวม</th>
                                 <!-- <th scope="col">เบอร์โทร</th>
                                  <th scope="col">E-mail</th>
-->  <th scope="col">สถานะ</th>
                                  <th scope="col">ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $record=0;
                                 foreach ($results as $key => $value): ?>
                                <?php
                                    $users = $conn->query("SELECT * FROM `user` WHERE `user_id` = '".$value['user_id']."'");
                                    $user = $users->fetch_array();

                                    $packages = $conn->query("SELECT * FROM `packages` WHERE `package_id` = '".$value['package_id']."'");
                                    $p = $packages->fetch_array();

                                    $color = "";

                                    if ($value['status'] == '2') {
                                        $color  = "#FCF400";
                                    }elseif($value['status'] == '3'){
                                        $color  = "#FFB200";
                                    }elseif($value['status'] == '4'){
                                        $color  = "#FFB200";
                                    }elseif($value['status'] == '5'){
                                        $color  = "#01BD26";
                                    }elseif($value['status'] == '6'){
                                        $color  = "#E70B05";
                                    }
                                ?>
                                <tr>
                                    <td align="center"> 
                                        <?php echo$record=$record+1;//$value['booking_id'] ?>
                                    </td>
                                    <td><?= DateThai($value['date_booking'])?></td>
                                    <td><?= $user['full_name']."<br>โทร:".$user['tel']."<br>e-mail:".$user['email']?></td>
                                    <td align="center">
                                        <?php if($p['package_type'] == 'รายคน'){?>
                                            <?= $value['total_adult'] + $value['total_child']?>
                                        <?php }else{?>
                                            <?= $value['total_group'] ?>
                                        <?php }?>
                                        
                                    </td>
                                    <td><?= $p['package_name']?></td>
                                    <td><?= $value['total_price']?></td>
                                   <!-- <td><?= $user['tel']?></td>
                                    <td><?= $user['email']?></td>
                                        -->
                                    <td>
                                        <font color="<?= $color?>">
                                        <?= $status_Arr[$value['status']-1]?>
                                            
                                    </td>
                                    <td align="center">
                                        <a 
                                            href="booking_detail_admin.php?id=<?= $value['booking_id'] ?>" 
                                            class="btn btn-warning"
                                        >
                                            แก้ไข
                                        </a>
                                        <a 
                                            href="delete_booking_admin.php?id=<?= $value['booking_id'] ?>"
                                            onclick="return confirm('ยืนยันลบข้อมูลการจอง');" 
                                            class="btn btn-danger"
                                        >
                                            ลบ
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
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
