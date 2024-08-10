<?php
session_start();
include("../conn.php")

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
                <div class="container-fluid">
                    <center><h1 class="mt-4">ยินดีต้อนรับ</h1></center>
                    <img src="../../images/LINE_ALBUM__240105_37.jpg" height="500" width="100%">
                    <center><h1 class="mt-4">" พิพิธภัณฑ์กลุ่มบ้านนาตาโพ "</h1></center>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../../js/scripts.js"></script>
    </body>
</html>
