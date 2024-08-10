<?php
session_start();
include("../../conn.php");

$title      = "แบบฟอร์มเพิ่มข้อมูลผู้ดูแลระบบ";
$user_id    = "";
$full_name  = "";
$email      = "";
$password   = "";
$tel        = "";
$level      = "admin";

if (isset($_GET['id'])) {
    $title = "แบบฟอร์มแก้ไขข้อมูลผู้ดูแลระบบ";

    $users = $conn->query("SELECT * FROM `user` WHERE `user_id` = '".$_GET['id']."'");
    $u = $users->fetch_array();


    $user_id    = $u['user_id'];
    $full_name  = $u['full_name'];
    $email      = $u['email'];
    $password   = $u['password'];
    $tel        = $u['tel'];
    $level      = $u['level'];
}
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
                    <form action="save_admin.php" method="POST">
                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                    <input type="hidden" name="level" value="<?= $level ?>">
                    <div class="container row">
                        <h3><?= $title ?></h3>

                        <div class="mb-3 row mt-5">
                            <label for="full_name" class="col-sm-2 col-form-label">ชื่อ-นามสกุล</label>
                            <div class="col-sm-10">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="full_name" 
                                    name="full_name"
                                    value="<?= $full_name?>" 
                                >
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tel" class="col-sm-2 col-form-label">เบอร์โทร</label>
                            <div class="col-sm-10">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="tel" 
                                    name="tel"
                                    value="<?= $tel ?>"
                                >
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">email</label>
                            <div class="col-sm-10">
                                <input 
                                    type="email" 
                                    class="form-control" 
                                    id="email" 
                                    name="email"
                                    value="<?= $email ?>"
                                >
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label">password</label>
                            <div class="col-sm-10">
                                <input 
                                    type="password" 
                                    class="form-control" 
                                    id="password"
                                    name="password"
                                    value="<?= $password ?>"
                                >
                            </div>
                        </div>
                       
                        <div class="row">
                            
                            <div class="col-auto offset-5">
                                <a href="list_admins.php" class="btn btn-warning">ย้อนกลับ</a>
                            </div>
                            <div class="col-auto">
                                <button 
                                    type="submit" 
                                    class="btn btn-success"
                                >
                                    บันทึก
                                </button>
                            </div>
                            
                        </div>
                        
                        
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../../../js/scripts.js"></script>
    </body>
</html>
