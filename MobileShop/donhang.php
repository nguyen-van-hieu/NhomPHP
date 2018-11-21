<html>
    <head>
        <title>Theo dõi đơn hàng</title>
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
        $tk = null;
        $mataikhoan = 0;
        if (isset($_SESSION["tk"])) {
            $tk = $_SESSION["tk"];
            $mataikhoan = $tk->mataikhoan;
        }
    }
    ?>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-8" style="background-color: white">
                    <table style="width: 100%;" class="table-condensed">
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày mua</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                        <?php
                        $conn = new mysqli("localhost", "root", "", "mobileshop");
                        $conn->set_charset("utf8");
                        $sql = "SELECT * FROM donhang WHERE mataikhoan = $mataikhoan";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $madonhang = $row["madonhang"];
                                ?>
                                <tr>
                                    <td><?php echo($madonhang); ?></td>
                                    <td><?php echo($row["ngaymua"]); ?></td>
                                    <td>
                                        <?php if($row["damua"]==0){echo("Chưa thanh toán");}else{echo("Đã thanh toán");}?>
                                    </td>
                                    <td><button data-toggle="collapse" data-target="#<?php echo($madonhang); ?>">Xem chi tiết</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                    <div id="<?php echo($madonhang); ?>" class="collapse">
                                    <?php
                                    $conn1 = new mysqli("localhost", "root", "", "mobileshop");
                                    $conn1->set_charset("utf8");
                                    $sql1 = "SELECT * FROM v_donhang WHERE madonhang = $madonhang";
                                    $result1 = $conn1->query($sql1); ?>
                                    <table class="table">
                                        <tr>
                                            <td></td><td>Số lượng mua</td><td>Giá</td><td></td>
                                        </tr>
                                    <?php
                                    if ($result1->num_rows > 0) {
                                        while ($row1 = $result1->fetch_assoc()) { ?>
                                            <tr>
                                            <td><img src="./image_mobile/<?php echo($row1["urlimg"]);?>" width="50" height="90"></td>
                                            <td><?php echo($row1["soluongmua"]); ?></td>
                                            <td> <?php echo(number_format($row1["gia"]).' <u>đ</u>'); ?></td>
                                            <td></td>
                                            </tr>        
                                    <?php }}
                                        $conn1->close();
                                    ?>
                                        <tr align="center">
                                            <td colspan="4">
                                            <?php
                                                $conn3 = new mysqli("localhost", "root", "", "mobileshop");
                                                $conn3->set_charset("utf8");
                                                $sql3 = "SELECT SUM(soluongmua * gia) AS tt FROM v_donhang WHERE madonhang = $madonhang";
                                                $result3 = $conn3->query($sql3);
                                                if ($result3->num_rows > 0) {
                                                while ($row3 = $result3->fetch_assoc()) {
                                                    echo("<span style='font-weight: 700'>Tổng thành tiền: ".number_format($row3['tt']). ' <u>đ</u></span>');
                                                }
                                                $conn3->close();
                                                }
                                            ?>
                                            </td>
                                        </tr>
                                    </table>
                                    </div>
                                    </td>
                                </tr>
                        <?php }}
                            $conn->close();
                        ?>
                    </table>
                </div>
                <div class="col-sm-3">
                </div>
            </div>
        </div>
<?php include './modal.php'; ?>
    </body>
</html>


