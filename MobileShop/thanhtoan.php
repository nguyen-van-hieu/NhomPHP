<?php
include './class/giohangclass.php';
include './class/taikhoan.php';
include './mheader.php';
if (isset($_SESSION["tk"])) {
    if (isset($_GET["madonhang"])) {
        $madonhang = $_GET["madonhang"];
        $conn = new mysqli("localhost", "root", "", "mobileshop");
        $conn->set_charset("utf8");
        $sql = "UPDATE donhang SET damua = 1 WHERE madonhang = ? AND mataikhoan = ?";
        $result = $conn->prepare($sql);
        $result->bind_param("ss", $madonhang, $tk->mataikhoan);
        $result->execute();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $madonhang = $row["madonhang"];
            }
        }
        $conn->close();
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Thanh Toán thành công!</strong>
                    </div>
                    <div align="center">
                        <a class="btn btn-sm btn-success" href="donhang.php">Tiếp tục</a>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>

        <?php
    }
}
?>
