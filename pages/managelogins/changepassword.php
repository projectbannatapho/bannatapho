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
  <style type="text/css">
    .border-login{
      border-bottom: solid groove; 
      border-right: solid groove; 
      border-top: solid groove;
      margin-left: -12px;
      -webkit-box-shadow: 0 12px 34px rgba(0, 0, 0, 0.12);
      -moz-box-shadow: 0 12px 34px rgba(0, 0, 0, 0.12);
      box-shadow: 0 12px 34px rgba(0, 0, 0, 0.12);
    }
    a:link { text-decoration: none; }
    a:visited { text-decoration: none; }
    a:hover { text-decoration: none; color: black; }
    a:active { text-decoration: none; }
    a{
      color: gray;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row mt-4">
    <div class="col-6">
      <img src="../../images/LINE_ALBUM_ผ้าทอ_3_240115_16.jpg" width="100%" height="680">
    </div>
    <div class="col-6 border-login">
      <br><br>
      <div class="row mt-5">
        <center>
        <h3>Forgot Password</h3>
        </center>
      </div>
      <form action="save_newpassword.php" method="POST">
      <input type="hidden" name="user_id" value="<?= $_GET['id']?>">
      <div class="row col-8 offset-2 mt-2">
        <div class="mb-3">
          <label for="email" class="form-label">New Password</label>
          <input 
            type="password" 
            class="form-control" 
            name="New_Password" 
            id="New_Password" 
            placeholder="***************"
            
          >
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Confrim Password</label>
          <input 
            type="password" 
            class="form-control" 
            name="Confrim_Password" 
            id="Confrim_Password" 
            placeholder="***************"
            onkeyup="validate_password()"
          >
        </div>
        <span id="wrong_pass_alert"></span>
        
        <button type="submit" id="create" class="btn btn-success col-8 offset-2 mt-5">SEND</button>
      </div>
      </form>

    </div>
  </div>

  
  <div class="mt-5"></div>
</div>



</body>
<script>
function validate_password() {
  	let pass = document.getElementById('New_Password').value;
  	let confirm_pass = document.getElementById('Confrim_Password').value;
  	if (pass != confirm_pass) {
  		document.getElementById('wrong_pass_alert').style.color = 'red';
    	document.getElementById('wrong_pass_alert').innerHTML = 'Use same password';
    	document.getElementById('create').disabled = true;
    	document.getElementById('create').style.opacity = (0.4);
  	}else{
  		document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML = 'Password Matched';
        document.getElementById('create').disabled = false;
        document.getElementById('create').style.opacity = (1);
  	}
}
</script>
</html>
