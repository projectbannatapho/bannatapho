<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
    <div class="container-fluid">
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <?= $_SESSION["full_name"]." ( ".$_SESSION["level"]." )" ?>   
                  </a>
                </li>
                <li class="nav-item">
                  <a 
                    class="nav-link" 
                    href="/<?= $project_name?>/pages/managelogins/logout.php"
                  >
                    ออกจากระบบ
                  </a>
                </li>
            </ul>
        </div>
    </div>
</nav>