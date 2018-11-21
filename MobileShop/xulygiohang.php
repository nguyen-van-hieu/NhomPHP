<?php
    include './class/taikhoan.php';
    include './class/giohangclass.php';
    include './mheader.php';
    //session_start();
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $item;
        $gh;
        if (isset($_SESSION["gh"])) {
            $gh = $_SESSION["gh"];
        } else {
            $gh = new giohang();
            $_SESSION["gh"] = $gh;
        }
        if (isset($_GET["madienthoai"])) {
            $madienthoai = $_GET["madienthoai"];
            $ten = $_GET["ten"];
            $gia = $_GET["gia"];
            $soluongmua = $_GET["soluongmua"];
            $urlimg = $_GET["urlimg"];
            $item = new item($madienthoai, $ten, $gia, $soluongmua, $urlimg);
            $gh->addItem($item);
            $_SESSION["gh"] = $gh;
            header("Location:giohang.php");
        } else if (isset($_GET["removeId"])) {
            $gh = $_SESSION["gh"];
            $removeId = $_GET["removeId"];
            $gh->removeItem($removeId);
            $_SESSION["gh"] = $gh;
            header("Location:giohang.php");
        } else if (isset($_GET["idUp"])) {
            $idUp = $_GET["idUp"];
            $gh = $_SESSION["gh"];
            $gh->up($idUp);
            $_SESSION["gh"] = $gh;
            header("Location:giohang.php");
        } else if (isset($_GET["idDown"])) {
            $idDown = $_GET["idDown"];
            $gh = $_SESSION["gh"];
            $gh->giam($idDown);
            $_SESSION["gh"] = $gh;
            header("Location:giohang.php");
        }
    }
?>