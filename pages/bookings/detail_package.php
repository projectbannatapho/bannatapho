<?php
session_start();
include("../conn.php");

$results = $conn->query("SELECT * FROM `packages` WHERE `package_id` = '".$_GET['id']."'");
$p = $results->fetch_array();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("../layouts/title.php")?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>



<?php include("../layouts/navbar.php")?>

<div class="container mt-5">
  <div class="card">
    <div class="row">
      <div class="col-6">
        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

          <!-- Indicators/dots -->
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
          </div>
          
          <!-- The slideshow/carousel -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../admin/packages/images/<?= $p['package_img1']?>" width="100%" height="550">
            </div>
            <?php if($p['package_img2'] != ""){?>
            <div class="carousel-item">
              <img src="../admin/packages/images/<?= $p['package_img2']?>" width="100%" height="550">
            </div>
            <?php } ?>
            <?php if($p['package_img3'] != ""){?>
            <div class="carousel-item">
              <img src="../admin/packages/images/<?= $p['package_img3']?>" width="100%" height="550">
            </div>
            <?php } ?>
            <?php if($p['package_img4'] != ""){?>
            <div class="carousel-item">
              <img src="../admin/packages/images/<?= $p['package_img4']?>" width="100%" height="550">
            </div>
            <?php } ?>
          </div>
          
          <!-- Left and right controls/icons -->
          <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </div>

      <div class="col-6">
        <div class="mt-5"></div>

        <h5 class="card-title"><?= $p['package_name']?></h5>
        <div class="mt-2"></div>
        <?php if ($p['package_type'] == 'รายคน'){ ?>
        <div class="row">
          <label for="staticEmail" class="col-sm-4 col-form-label">เด็ก</label>
          <label for="staticEmail" class="col-sm-2 col-form-label">
            <?= $p['package_pice_child']?>  
          </label>
          <label for="staticEmail" class="col-sm-2 col-form-label">บาท</label>
        </div>
        <div class=" row">
          <label for="staticEmail" class="col-sm-4 col-form-label">ผู้ใหญ่</label>
          <label for="staticEmail" class="col-sm-2 col-form-label">
            <?= $p['package_pice_adult']?>  
          </label>
          <label for="staticEmail" class="col-sm-2 col-form-label">บาท</label>
        </div>
        <?php }else{ ?>
        
        <div class=" row">
          <label for="staticEmail" class="col-sm-4 col-form-label">
            แบบหมู่คณะ <?= $p['people_per_group']?> คน
          </label>
          <label for="staticEmail" class="col-sm-2 col-form-label">
            <?= $p['package_pice_group'] ?> 
          </label>
          <label for="staticEmail" class="col-sm-2 col-form-label">บาท</label>
        </div>
        <?php }?>
        <div class=" row">
          <label for="staticEmail" class="col-sm-4 col-form-label"><b>รายละเอียด : </b></label>
          
        </div>
        <div class=" row">
          <label for="staticEmail" class="col-sm-12 col-form-label"><?= $p['package_detail']?></label>
          
        </div>


        <br>
        <center>
          <a href="list_package_user.php" class="btn btn-warning">ย้อนกลับ</a>
          <a href="booking.php" class="btn btn-success">จองเลย</a>
        </center>

        
      </div>
    </div>

  </div>

  <div class="mt-5"></div>
</div>



</body>
</html>
