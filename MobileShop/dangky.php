<?php
include './class/taikhoan.php';
include './class/giohangclass.php';
include './mheader.php';
if (isset($_POST["dangky"])) {
    $tendangnhap = $_POST["tendangnhap"];
    $matkhau = $_POST["matkhau"];
    $hoten = $_POST["hoten"];
    $diachi = $_POST["diachi"];
    $email = $_POST["email"];
    if (taikhoan::kiemtratontai($tendangnhap)) {
        taikhoan::taotaikhoan($tendangnhap, $matkhau, $hoten, $email, $diachi);
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Thông báo!</strong> Tạo tài khoản thành công
        </div>
        <?php
    } else { ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Thông báo!</strong> Tạo tài khoản không thành công
        </div>
    <?php
    }
}?>
<html>
    <div align="center"><a class="btn btn-sm btn-success" href="index.php">Quay lại trang chủ</a></div>
</html>