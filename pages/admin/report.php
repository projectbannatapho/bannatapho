<?php
session_start();
include("../conn.php");

$results = $conn->query("SELECT * FROM `booking`");

$groupStatus = $conn->query("SELECT `status`, COUNT(`booking_id`) AS count_status FROM `booking` WHERE MONTH(`date_booking`) = '".date('m')."' GROUP BY `status`;
");


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <?php include("../layouts/title.php")?>
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <?php include("../layouts/Sidebar_admin.php");?>
            
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <?php include("../layouts/navbar_admin.php");?>
                <!-- Page content-->
                <div class="container-fluid mt-5">
                   
                    <div class="container row">

                        <div class="row">
                              <div class="col-auto">
                                <h3>รายงานข้อมูลการจอง</h3>
                              </div>
                        </div>
                        <!------ลบ -->
                        <div class="row mt-5"> 
                            <?php
                             $record=0;
                              foreach ($groupStatus as $key => $value): ?>
                                
                            <div class="card col-3" style="background-color: #E7FAFA;">
                                <div class="card-body">
                                    <center>
                                    <h4><?= $status_Arr[$value['status']-1]?></h4>
                                    <h1><?= $value['count_status']?></h1>
                                    </center>
                                </div>
                            </div> 

                            <?php
                                
                            endforeach ?>   
                        </div>
                            <!------ลบ -->
                       
                        <table class="table table-bordered mt-5">
                            <thead>
                                <tr align="center">
                                  <th scope="col">ลำดับ</th>
                                  <th scope="col">วัน/เดือน/ปี</th>
                                  <th scope="col">ชื่อ-นามสกุล</th>
                                  <th scope="col">จำนวนคน</th>
                                  <th scope="col">แพ็คเกจ</th>
                                  <th scope="col">ราคารวม</th>
                                  <th scope="col">เบอร์โทร</th>
                                  <th scope="col">E-mail</th>
                                  <th scope="col">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($results as $key => $value): ?>
                                <?php 
                                    $users = $conn->query("SELECT * FROM `user` WHERE `user_id` = '".$value['user_id']."'");
                                    $user = $users->fetch_array();

                                    $packages = $conn->query("SELECT * FROM `packages` WHERE `package_id` = '".$value['package_id']."'");
                                    $p = $packages->fetch_array();
                                  ?>
                                <tr>
                                    <td align="center">
                                        
                                        <?php echo$record=$record+1;//$value['booking_id'] ?>
                                    </td>
                                    <td><?= DateThai($value['date_booking'])?></td>
                                    <td><?= $user['full_name']?></td>
                                    <td align="center">
                                        <?php if($p['package_type'] == 'รายคน'){?>
                                            <?= $value['total_adult'] + $value['total_child']?>
                                        <?php }else{?>
                                            <?= $value['total_group'] ?>
                                        <?php }?>

                                    </td>
                                    <td><?= $p['package_name']?></td>
                                    <td><?= $value['total_price']?></td>
                                    <td><?= $user['tel']?></td>
                                    <td><?= $user['email']?></td>
                                    <td><?= $status_Arr[$value['status']-1]?></td>
                                    
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
        <script src="../../js/scripts.js"></script>
    </body>
</html>
