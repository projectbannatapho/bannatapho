<?php
session_start();
include("../conn.php");

$results = $conn->query("SELECT * FROM `packages`");

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
  <div class="row">
    <?php foreach ($results as $key => $value): ?>
    <div class="col-4">
    <div class="card">
      <img src="../admin/packages/images/<?= $value['package_img1']?>" class="card-img-top" height="350">
      <div class="card-body">
        <h5 class="card-title"><?= $value['package_name']?></h5>
        <?php if ($value['package_type'] == 'รายคน'){ ?>
          
        
        <div class="row">
          <label for="staticEmail" class="col-sm-6 col-form-label">เด็ก</label>
          <label for="staticEmail" class="col-sm-2 col-form-label">
            <?= $value['package_pice_child']?>  
          </label>
          <label for="staticEmail" class="col-sm-2 col-form-label">บาท</label>
        </div>
        <div class="row">
          <label for="staticEmail" class="col-sm-6 col-form-label">ผู้ใหญ่</label>
          <label for="staticEmail" class="col-sm-2 col-form-label">
            <?= $value['package_pice_adult']?>  
          </label>
          <label for="staticEmail" class="col-sm-2 col-form-label">บาท</label>
        </div>
        <?php }else{ ?>

        
        <div class=" row">
          <label for="staticEmail" class="col-sm-6 col-form-label">
            แบบหมู่คณะ <?= $value['people_per_group']?> คน
          </label>
          <label for="staticEmail" class="col-sm-2 col-form-label">
            <?= $value['package_pice_group'] ?> 
          </label>
          <label for="staticEmail" class="col-sm-2 col-form-label">บาท</label>
        </div>

        <div style="height:37px;"></div>
        <?php }?>
        <center><a href="detail_package.php?id=<?= $value['package_id'] ?>" class="btn btn-success">ข้อมูลเพิ่มเติม</a></center>
      </div>
    </div>
    </div>
    <?php endforeach ?>
  </div>

  <div class="mt-5"></div>
</div>



</body>
</html>
