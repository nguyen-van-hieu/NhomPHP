<?php
session_start();
include './class/taikhoan.php';
if (isset($_POST["login"])) {
    $tendangnhap = $_POST["tendangnhap"];
    $matkhau = $_POST["matkhau"];
    $tk = taikhoan::kiemtradangnhap($tendangnhap, $matkhau);
    if ($tk != null) {
        $_SESSION["tk"] = $tk;
        header("Location:index.php");
    }
}
if (isset($_GET["logout"])) {
    if(isset($_SESSION["tk"])){
        unset($_SESSION["tk"]);
    }
    header("Location:index.php");
}