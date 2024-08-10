<?php
session_start();
include("pages/conn.php")

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("pages/layouts/title.php")?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }

  .imgheight-home{
    height: 600px;
  }
  </style>
</head>
<body>

<?php include("pages/layouts/navbar.php")?>
<!-- <div class="container">
  <div class="row">
    <img src="images/LINE_ALBUM_3_240115_61.jpg" width="100%" height="100%" >
  </div>
</div> -->


<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/img_home/LINE_ALBUM3_240531_1.jpg" class="d-block w-100 imgheight-home" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/img_home/LINE_ALBUM3_240531_2.jpg" class="d-block w-100 imgheight-home" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/img_home/LINE_ALBUM3_240531_3.jpg" class="d-block w-100 imgheight-home" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/img_home/LINE_ALBUM3_240531_4.jpg" class="d-block w-100 imgheight-home" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/img_home/LINE_ALBUM3_240531_5.jpg" class="d-block w-100 imgheight-home" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/img_home/LINE_ALBUM3_240531_6.jpg" class="d-block w-100 imgheight-home" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



</body>
</html>
