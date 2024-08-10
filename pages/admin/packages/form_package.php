<?php
session_start();
include("../../conn.php");

$title                  = "แบบฟอร์มเพิ่มข้อมูลแพ็คเกจ";
$package_id             = "";
$package_name           = "";
$package_detail         = "";
$package_img1           = "";
$package_img2           = "";
$package_img3           = "";
$package_img4           = "";
$package_pice_child     = "0";
$package_pice_adult     = "0";
$package_pice_group     = "0";
$people_per_group       = "0";
$people_per_groupArr[0] = "0";
$people_per_groupArr[1] = "0";
$check_one = "checked";
$check_group = "";



if (isset($_GET['id'])) {
    $title = "แบบฟอร์มแก้ไขข้อมูลแพ็คเกจ";

    $packages = $conn->query("SELECT * FROM `packages` WHERE `package_id` = '".$_GET['id']."'");
    $p = $packages->fetch_array();

    $package_id             = $p['package_id'];
    $package_name           = $p['package_name'];
    $package_detail         = $p['package_detail'];
    $package_img1           = $p['package_img1'];
    $package_img2           = $p['package_img2'];
    $package_img3           = $p['package_img3'];
    $package_img4           = $p['package_img4'];
    $package_pice_child     = $p['package_pice_child'];
    $package_pice_adult     = $p['package_pice_adult'];
    $package_pice_group     = $p['package_pice_group'];
    $people_per_group       = $p['people_per_group'];
    $package_type           = $p['package_type'];

    $people_per_groupArr    = explode('-', $people_per_group);

    if ($package_type != 'รายคน') {
        $check_one = "";
        $check_group = "checked";
    }
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
                    <form action="save_package.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="package_id" value="<?= $package_id ?>">
                    <div class="container row">
                        <h3><?= $title ?></h3>

                        <div class="mb-3 row mt-5">
                            <label for="package_name" class="col-sm-2 col-form-label">ชื่อแพ็คเกจ</label>
                            <div class="col-sm-10">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="package_name" 
                                    name="package_name"
                                    value="<?= $package_name?>" 
                                >
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tel" class="col-sm-2 col-form-label">รายละเอียด</label>
                            <div class="col-sm-10">
                                <textarea 
                                    id="summernote" 
                                    name="package_detail" 
                                    class="form-control"
                                ><?= $package_detail ?></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="package_pice_child" class="col-sm-2 col-form-label">ประเภทแพ็คเกจ</label>
                            <div class="col-sm-10">
                                <label class="radio-inline">
                                  <input 
                                    type="radio" 
                                    name="package_type" 
                                    <?= $check_one ?>
                                    onclick="show_one();" 
                                    value="รายคน"
                                > 
                                    รายคน
                                </label>
                                <label class="radio-inline">
                                  <input 
                                    type="radio" 
                                    name="package_type" 
                                    <?= $check_group ?>
                                    onclick="show_group();"
                                    value="หมู่คณะ" 
                                > 
                                    หมู่คณะ
                                </label>
                            </div>
                        </div>
                        <div id="div_one">
                        <div class="mb-3 row">
                            <label for="package_pice_child" class="col-sm-2 col-form-label">ราคาเด็ก</label>
                            <div class="col-sm-10">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="package_pice_child" 
                                    name="package_pice_child"
                                    value="<?= $package_pice_child ?>"
                                >
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="package_pice_adult" class="col-sm-2 col-form-label">ราคาผู้ใหญ่</label>
                            <div class="col-sm-10">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="package_pice_adult"
                                    name="package_pice_adult"
                                    value="<?= $package_pice_adult ?>"
                                >
                            </div>
                        </div>
                        </div>

                        <div id="div_group">
                        <div class="mb-3 row">
                            <label for="package_pice_group" class="col-sm-2 col-form-label">ราคาแบบหมู่คณะ</label>
                            <div class="col-sm-10">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="package_pice_group"
                                    name="package_pice_group"
                                    value="<?= $package_pice_group ?>"
                                   

                                >
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="people_per_group" class="col-sm-2 col-form-label">จำนวนคนต่หมู่คณะ</label>
                            <div class="col-sm-4">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="people_per_group"
                                    name="people_per_group_min"
                                    value="<?= $people_per_groupArr[0] ?>"
                                    placeholder="จำนวนคนน้อยที่สุดต่อหมู่คณะ"
                                >
                               
                            </div>
                            -
                            <div class="col-sm-4">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="people_per_group"
                                    name="people_per_group_max"
                                    value="<?= $people_per_groupArr[1] ?>"
                                    placeholder="จำนวนคนมากที่สุดต่อหมู่คณะ"

                                >
                                
                            </div>
                        </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="package_img1" class="col-sm-2 col-form-label">รูปที่ 1</label>
                            <div class="col-sm-10">
                                <input 
                                    type="file" 
                                    class="form-control" 
                                    id="package_img1"
                                    name="package_img1"
                                    value="<?= $package_img1 ?>"
                                >
                                
                                
                                
                            </div>
                        </div>
                        <?php if ($package_img1 != "") { ?>
                        <div class="mb-3 row">
                            <label for="package_img1" class="col-sm-2 col-form-label">รูปที่ 1 เดิม</label>
                            <div class="col-sm-10">
                               
                                <img src="images/<?= $package_img1 ?>" width="150">      
                                
                            </div>
                        </div>
                        <?php } ?>
                        <div class="mb-3 row">
                            <label for="package_img2" class="col-sm-2 col-form-label">รูปที่ 2</label>
                            <div class="col-sm-10">
                                <input 
                                    type="file" 
                                    class="form-control" 
                                    id="package_img2"
                                    name="package_img2"
                                    value="<?= $package_img2 ?>"
                                >
                            </div>
                        </div>
                        <?php if ($package_img2 != "") { ?>
                        <div class="mb-3 row">
                            <label for="package_img2" class="col-sm-2 col-form-label">รูปที่ 2 เดิม</label>
                            <div class="col-sm-10">
                               
                                <img src="images/<?= $package_img2 ?>" width="150">      
                                
                            </div>
                        </div>
                        <?php } ?>
                        <div class="mb-3 row">
                            <label for="package_img3" class="col-sm-2 col-form-label">รูปที่ 3</label>
                            <div class="col-sm-10">
                                <input 
                                    type="file" 
                                    class="form-control" 
                                    id="package_img3"
                                    name="package_img3"
                                    value="<?= $package_img3 ?>"
                                >
                            </div>
                        </div>
                        <?php if ($package_img3 != "") { ?>
                        <div class="mb-3 row">
                            <label for="package_img3" class="col-sm-2 col-form-label">รูปที่ 3 เดิม</label>
                            <div class="col-sm-10">
                               
                                <img src="images/<?= $package_img3 ?>" width="150">      
                                
                            </div>
                        </div>
                        <?php } ?>
                        <div class="mb-3 row">
                            <label for="package_img4" class="col-sm-2 col-form-label">รูปที่ 4</label>
                            <div class="col-sm-10">
                                <input 
                                    type="file" 
                                    class="form-control" 
                                    id="package_img4"
                                    name="package_img4"
                                    value="<?= $package_img4 ?>"
                                >
                            </div>
                        </div>
                        <?php if ($package_img4 != "") { ?>
                        <div class="mb-3 row">
                            <label for="package_img4" class="col-sm-2 col-form-label">รูปที่ 4 เดิม</label>
                            <div class="col-sm-10">
                               
                                <img src="images/<?= $package_img4 ?>" width="150">      
                                
                            </div>
                        </div>
                        <?php } ?>
                       
                        <div class="row">
                            
                            <div class="col-auto offset-5">
                                <a href="list_packages.php" class="btn btn-warning">ย้อนกลับ</a>
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
                        
                        <div class="mt-5"></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../../../js/scripts.js"></script>
        <!-- Summernote JS -->
       
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

        <script type="text/javascript">
            document.getElementById('div_one').style.display ='block';
            document.getElementById('div_group').style.display ='none';
            // new DataTable('#example');

            $('#summernote').summernote({
                placeholder: 'รายละเอียด',
                tabsize: 2,
                height: 200,
                fontNames: ['Kanit'],
                toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                
                


              ]
            });

            function show_one(){
              document.getElementById('div_one').style.display ='block';
              document.getElementById('div_group').style.display ='none';
            }

            function show_group(){
              document.getElementById('div_one').style.display ='none';
              document.getElementById('div_group').style.display ='block';
            }
        </script>
    </body>
</html>
