<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cửa Hàng</title>
        <script src="./assets/Jquery/jquery.js"></script>
        <link rel="stylesheet" href="assets/style/m.css">
        <link rel="stylesheet" type="text/css" href="slider.css">
        <script  src="slider.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>
    <?php
    include './class/dienthoai.php';
    include './class/taikhoan.php';
    include './class/giohangclass.php';
    include './mheader.php';
    $lstdt = null;
    $key = null;
    $mahang = null;
    if (isset($_GET["mahang"]) && isset($_GET["timkiem"]) == FALSE) {
        $mahang = $_GET["mahang"];
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
            $lstdt = dienthoai::PhanTrangTheoHang($mahang, $page);
        } else {
            $lstdt = dienthoai::PhanTrangTheoHang($mahang, 1);
        }
    } else if (isset($_GET["key"]) && isset($_GET["mahang"]) == FALSE) {
        $key = $_GET["key"];
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
            $lstdt = dienthoai::PhanTrangTimKiem($key, $page);
        } else {
            $lstdt = dienthoai::PhanTrangTimKiem($key, 1);
        }
    } else if (isset($_GET["page"])) {
        $page = $_GET["page"];
        $lstdt = dienthoai::phanTrang($page);
    } else {
        $lstdt = dienthoai::phanTrang(1);
    }
    ?>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2">
                    <?php include './danhmuc.php'; ?>
                </div>
                <div class="col-sm-10">
                    <div id="slider"">
                            <a href="#" class="control_next"><i class="fas fa-arrow-alt-circle-right" style="font-size: 70px"></i></a>
                            <a href="#" class="control_prev"><i class="fas fa-arrow-alt-circle-left" style="font-size: 70px "></i></a>
                            <ul>
                                <li><img src="slider/1.jpg"></li>
                                <li><img src="slider/2.jpg"></li>
                                <li><img src="slider/3.jpg"></li>
                                <li><img src="slider/4.jpg"></li>
                                <li><img src="slider/5.jpg"></li>
                                <li><img src="slider/6.jpg"></li>
                                <li><img src="slider/7.jpg"></li>
                                <li><img src="slider/8.jpg"></li>
                                <li><img src="slider/9.jpg"></li>
                            </ul>  
                        </div><!-- end slider-->
                    <?php
                    foreach ($lstdt as $value) {
                        ?>
                        <div class="col-sm-3">
                            <div class="border-mobile">
                                <img class="img-mobile" src="image_mobile/<?php echo($value->urlimg); ?>" width="140" height="250"/>
                                <div><?php echo($value->ten); ?></div>
                                <div style="padding-top: 5px; padding-bottom: 5px;">
                                    <span style="font-weight: 600; margin-right: 20%;"><?php echo number_format($value->gia) . ' <u>đ</u>'; ?></span>
                                    <span><?php echo("<a class='btn btn-sm btn-success' href='xulygiohang.php?madienthoai=$value->madienthoai&ten=$value->ten&gia=$value->gia&soluongmua=1&urlimg=$value->urlimg'>Đặt mua</a>"); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center">
            <?php include './phantrang.php'; ?>
        </div>
        <?php include './modal.php'; ?>
    </body>
</html>
