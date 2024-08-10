<?php
session_start();
include("../../conn.php");

$results = $conn->query("SELECT * FROM `packages`");


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
                                <h3>รายการข้อมูลแพ็คเกจการเข้าชมพิพิธภัณฑ์</h3>
                              </div>
                              
                              <div class="col-auto offset-4">
                                <a href="form_package.php" class="btn btn-success">เพิ่มข้อมูลแพ็คเกจ</a>
                              </div>
                        </div>
                        

                        <br><br><br>
                        <table class="table table-bordered">
                            <thead>
                                <tr align="center">
                                  <th scope="col">ลำดับ</th>
                                  <th scope="col">ชื่อแพ็คเกจ</th>
                                  <th scope="col">รายละเอียด</th>
                                  <th scope="col">ราคาเด็ก</th>
                                  <th scope="col">ราคาผู้ใหญ่</th>
                                  <th scope="col">ราคากลุ่ม</th>
                                  <th scope="col">ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($results as $key => $value): ?>
                                <tr>
                                    <td align="center"><?= $key+1 ?></td>
                                    <td><?= $value['package_name']?></td>
                                    <td><?= $value['package_detail']?></td>
                                    <td><?= $value['package_pice_child']?></td>
                                    <td><?= $value['package_pice_adult']?></td>
                                    <td><?= $value['package_pice_group']?></td>
                                    <td align="center">
                                        <a 
                                            href="form_package.php?id=<?= $value['package_id'] ?>" 
                                            class="btn btn-warning"
                                        >
                                            แก้ไข
                                        </a>
                                        <a 
                                            href="delete_package.php?id=<?= $value['package_id'] ?>"
                                            onclick="return confirm('ยืนยันลบข้อมูล <?= $value['package_name']?>');" 
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
