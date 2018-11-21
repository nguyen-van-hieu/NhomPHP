<?php
include './class/taikhoan.php';
include './class/giohangclass.php';
include './mheader.php';
?>
<html>
    <head>
        <title>Đơn hàng</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-8">
                    <?php
                    $madonhang = 0;
                    $conn = new mysqli("localhost", "root", "", "mobileshop");
                    $conn->set_charset("utf8");
                    $sql = "SELECT MAX(madonhang) AS madonhang FROM donhang WHERE mataikhoan = $tk->mataikhoan";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $madonhang = $row["madonhang"];
                        }
                    }
                    $conn->close();

                    $conn1 = new mysqli("localhost", "root", "", "mobileshop");
                    $conn1->set_charset("utf8");
                    $sql1 = "SELECT * FROM v_donhang WHERE madonhang = $madonhang";
                    $result1 = $conn1->query($sql1);
                    ?>
                    <table class="table">
                        <tr>
                            <td></td><td>Số lượng mua</td><td>Giá</td><td></td>
                        </tr>
                        <?php
                        if ($result1->num_rows > 0) {
                            while ($row1 = $result1->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><img src="./image_mobile/<?php echo($row1["urlimg"]); ?>" width="50" height="90"></td>
                                    <td><?php echo($row1["soluongmua"]); ?></td>
                                    <td> <?php echo(number_format($row1["gia"]) . ' <u>đ</u>'); ?></td>
                                    <td></td>
                                </tr>        
                                <?php
                            }
                        }
                        $conn1->close();
                        ?>
                        <tr align="center">
                            <td colspan="4">
                                
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-success" style="position: fixed; width: 22%" align="center">
                        <div class="panel-heading" style="font-size: 18px">Thanh toán</div>
                        <div class="panel-body" align="left">
                            <div style="font-size: 20px; padding-bottom: 10px;">Thanh toán vận chuyển</div>
                            <div style="font-size: 12px; padding-bottom: 10px;">Giao hàng tới</div>
                            <div style="font-size: 15px; padding-bottom: 10px; font-weight: 700; font-style: italic;"><?php echo($tk->hoten);?></div>
                            <div style="font-size: 15px;"><?php echo($tk->diachi);?></div>
                        </div>
                        <div class="panel-body">
                            <?php
                                $conn3 = new mysqli("localhost", "root", "", "mobileshop");
                                $conn3->set_charset("utf8");
                                $sql3 = "SELECT SUM(soluongmua * gia) AS tt FROM v_donhang WHERE madonhang = $madonhang";
                                $result3 = $conn3->query($sql3);
                                if ($result3->num_rows > 0) {
                                    while ($row3 = $result3->fetch_assoc()) {
                                        echo("<span style='font-weight: 700; font-size: 20px; color: blue;'>Tổng cộng: " . number_format($row3['tt']) . ' <u>đ</u></span>');
                                    }
                                    $conn3->close();
                                }
                                ?>
                        </div>
                        <div class="panel-body">
                            <a class="btn btn-sm btn-success" style="width: 100%" href="thanhtoan.php?madonhang=<?php echo($madonhang);?>">Thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

