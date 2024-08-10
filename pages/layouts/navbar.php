<div class="row">     
  <img src="/<?=$project_name?>/images/BANNATAPhO.png" width="100%" height="250px"  >
</div>
  
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/<?=$project_name?>/">หน้าแรก</a>
        </li>

        <li class="nav-item">
          <a 
            class="nav-link" 
            href="/<?=$project_name?>/pages/infomations/detail_info.php"
          >
            ความเป็นมาของพิพิธภัณฑ์
          </a>
        </li>
        
       <!--  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ความเป็นมาของพิพิธภัณฑ์
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a 
                class="dropdown-item" 
                href="/<?=$project_name?>/pages/infomations/detail_info.php"
              >
                ความเป็นมา
              </a>
            </li>
            <li>
              <a 
                class="dropdown-item" 
                href="/<?=$project_name?>/pages/infomations/openday.php"
              >
                วันและเวลาทำการ
              </a>
            </li>
           
          </ul>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            แนะนำวัฒธรรมและอาหารพื้นบ้าน
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a 
                class="dropdown-item" 
                href="/<?=$project_name?>/pages/infomations/culture.php"
              >
                วัฒธรรม
              </a>
            </li>
            <li>
              <a 
                class="dropdown-item" 
                href="/<?=$project_name?>/pages/infomations/foods.php"
              >
                อาหารพื้นบ้าน
              </a>
            </li>
           
          </ul>
        </li>
        <li class="nav-item">
        <a 
          class="nav-link" 
           href="/<?=$project_name?>/pages/infomations/ebook.php"
        >
          หนังสืออิเล็กทรอนิกส์
          </a>
        </li>
        <li class="nav-item">
          <a 
            class="nav-link" 
            href="/<?=$project_name?>/pages/bookings/list_package_user.php"
          >
            แพ็คเกจการเข้าชมพิพิธภัณฑ์
          </a>
        </li>
        <?php if (isset($_SESSION['level']) && ($_SESSION["level"] != '')){?>
        <li class="nav-item">
          <a 
            class="nav-link" 
            href="/<?=$project_name?>/pages/bookings/booking.php"
          >
            การจองรอบการเข้าชมพิพิธภัณฑ์
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/<?=$project_name?>/pages/contact.php">ช่องทางการติดต่อ</a>
        </li>
        <?php }?>
        <?php if (isset($_SESSION['level']) && ($_SESSION["level"] != '')){?>
        <li class="nav-item">
          <a 
            class="nav-link" 
            href="/<?= $project_name?>/pages/managelogins/logout.php"
          >
            ออกจากระบบ
          </a>
        </li>

        <?php }else{?>
        <li class="nav-item">
          <a 
            class="nav-link" 
            href="/<?=$project_name?>/pages/managelogins/login.php"
          >
            เข้าสู่ระบบ
          </a>
        </li>
        <li class="nav-item">
          <a 
            class="nav-link" 
            href="/<?=$project_name?>/pages/managelogins/register.php"
          >
            สมัครสมาชิก
          </a>
        </li>
        <?php }?>

      </ul>
    </div>
  </div>
</nav>
