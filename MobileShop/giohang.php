<html>
    <head>
        <title>Giỏ hàng</title>
        <script src="./assets/Jquery/jquery.js"></script>
        <link rel="stylesheet" href="assets/style/m.css">
    </head>
    <?php
    include './class/taikhoan.php';
    include './class/giohangclass.php';
    include './mheader.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $gh;
        if (isset($_SESSION["gh"])) {
            $gh = $_SESSION["gh"];
        } else {
            $gh = new giohang();
            $_SESSION["gh"] = $gh;
        }
    }
    ?>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-8">

                    <?php if ($gh->List != null) { ?>
                        <?php foreach ($gh->List as $item) { ?>
                            <div style="height: 150px; background-color: white; margin-bottom: 10px;">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-2"><img src="image_mobile/<?php echo($item->urlimg); ?>" width="60" height="100" style="padding-left: 10px; padding-top: 10px;"></div>
                                        <div class="col-sm-7">
                                            <div style="padding: 5px;"><?php echo "$item->ten"; ?></div>
                                            <div style="padding: 5px;">Số lượng mua: <?php echo "$item->soluongmua"; ?></div>
                                            <div style="padding: 5px;"><?php echo number_format($item->gia) . " <u>đ<u>"; ?></div>
                                            <div style="padding: 5px;"><a href="xulygiohang.php?removeId=<?php echo($item->madienthoai); ?>" class="btn">Remove</a></div>
                                        </div>
                                        <div class="col-sm-3" align="center">
                                            <ul class='pagination'>
                                                <li><a href="xulygiohang.php?idDown=<?php echo($item->madienthoai); ?>">-</a></li>
                                                <li><a href="javascript:void(0)"><?php echo($item->soluongmua); ?></a></li>
                                                <li><a href="xulygiohang.php?idUp=<?php echo($item->madienthoai); ?>">+</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <div align="center"><a href="index.php">Tiếp tục mua</a></div>
                    <?php if ($gh->List == null) { ?>
                        <div align="center"><h1>Giỏ hàng trống</h1><br><a href="index.php">Quay lại</a></div>
                    <?php } ?>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-default" style="position: fixed; width: 22%" align="center">
                        <div class="panel-heading">Thành tiền</div>
                        <div class="panel-body"><span style="font-size: 20px; font-weight: 500;"><?php echo(number_format($gh->tongthanhtien())." <u>đ<u>"); ?></span></div>
                        <div class="panel-body">
                            <?php if($tk==null){?>
                                <button style="width: 100%" class="btn btn-sm btn-success" data-toggle="modal" data-target="#dangnhap">Đăng nhập để đặt hàng</button>
                            <?php }?>
                            <?php if($tk!=null){?>
                                <a style="width: 100%" class="btn btn-sm btn-success" href="dathang.php">Xác nhận đơn hàng</a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './modal.php'; ?>
    </body>
</html>

