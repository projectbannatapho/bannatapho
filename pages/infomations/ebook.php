<?php
session_start();
include("../conn.php")

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("../layouts/title.php")?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  #rcorners1 {
    border-radius: 25px;
    background: #73AD21;
    padding: 10px; 
    text-align: center;
    background-color: #6F3B06;
    color: #fff;
        
  }
  </style>
</head>
<body>



<?php include("../layouts/navbar.php")?>

<div class="container mt-5">
  <iframe src="https://heyzine.com/flip-book/debc979f6c.html" width="100%" height="800"></iframe>
  <div class="mt-5"></div>
</div>



</body>
</html>
