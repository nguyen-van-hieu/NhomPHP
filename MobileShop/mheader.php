<html>
    <head>
        <link rel="icon" type="image/png" href="./assets/mobile-phone.png" sizes="32x32" />
        <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
        <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default" style="background: #337ab7;">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/projectPHP/MobileShop"><i class="glyphicon glyphicon-home" style="color: #ffffff"></i></a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                    </ul>
                    <form class="navbar-form navbar-left" action="index.php">
                        <div class="form-group">
                            <input size="20" type="text" class="form-control" placeholder="Search" name="key">
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Tìm kiếm</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <?php
                            session_start();
                            $tk = null;
                            if (isset($_SESSION["tk"])) {
                                $tk = $_SESSION["tk"];
                            }
                            $gh = null;
                            if (isset($_SESSION["gh"])) {
                                $gh = $_SESSION["gh"];
                            }
                            ?>
                            <?php if ($tk == null) { ?>
                            <a href="#" class="dropdown-toggle" style="color: #ffffff" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Đăng nhập <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div style="margin: 20px">
                                            <button style="width: 100%; margin-bottom: 10px;" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#dangnhap">Đăng nhập</button>
                                            <button style="width: 100%;" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#taotaikhoan">Tạo tài khoản</button>
                                        </div>
                                    </li>
                                </ul>
                            <?php } else { ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo($tk->tendangnhap); ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a><?php echo($tk->hoten); ?></a>
                                        <a href="donhang.php">Theo dõi đơn hàng</a>
                                        <a href="dangnhap.php?logout=1">Đăng xuất</a>
                                    </li>
                                </ul>
                            <?php } ?>
                        </li>
                        <li>
                            <a href="giohang.php" style="color: #ffffff">Giỏ hàng
                                <span class="badge">
                                    <?php
                                        if($gh!=null){
                                            echo($gh->soluonghang());
                                        }else {
                                            echo("0");
                                        }
                                    ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</html>

