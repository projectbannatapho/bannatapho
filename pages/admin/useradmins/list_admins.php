<?php
session_start();
include("../../conn.php");

$results = $conn->query("SELECT * FROM `user` WHERE `level` = 'admin'");


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
                                <h3>รายการข้อมูลผู้ดูแลระบบ</h3>
                              </div>
                              
                              <div class="col-auto offset-6">
                                <a href="form_admin.php" class="btn btn-success">เพิ่มข้อมูลผู้ดูแลระบบ</a>
                              </div>
                        </div>
                        

                        <br><br><br>
                        <table class="table table-bordered">
                            <thead>
                                <tr align="center">
                                  <th scope="col">ลำดับ</th>
                                  <th scope="col">ชื่อ-นามสกุล</th>
                                  <th scope="col">เบอร์โทร</th>
                                  <th scope="col">ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($results as $key => $value): ?>
                                <tr>
                                    <td align="center"><?= $key+1 ?></td>
                                    <td><?= $value['full_name']?></td>
                                    <td><?= $value['tel']?></td>
                                    <td align="center">
                                        <a 
                                            href="form_admin.php?id=<?= $value['user_id'] ?>" 
                                            class="btn btn-warning"
                                        >
                                            แก้ไข
                                        </a>
                                        <a 
                                            href="delete_admin.php?id=<?= $value['user_id'] ?>"
                                            onclick="return confirm('ยืนยันลบข้อมูล <?= $value['full_name']?>');" 
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
