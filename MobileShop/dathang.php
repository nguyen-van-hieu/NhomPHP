<?php

include './class/giohangclass.php';
include './class/taikhoan.php';
session_start();
$gh = new giohang();
if (isset($_SESSION["tk"]) && isset($_SESSION["gh"])) {
    $tk = $_SESSION["tk"];
    $gh = $_SESSION["gh"];
    if ($gh->soluonghang() > 0) {
        $conn = new mysqli("localhost", "root", "", "mobileshop");
        $conn->set_charset("utf8");
        $sql = "INSERT INTO donhang (mataikhoan,ngaymua,damua) VALUES (?,CURRENT_DATE,0)";
        $result = $conn->prepare($sql);
        $result->bind_param("i", $tk->mataikhoan);
        $result->execute();
        $result->close();
        $conn->close();

        $conn1 = new mysqli("localhost", "root", "", "mobileshop");
        $conn1->set_charset("utf8");
        $madonhang = 0;
        $sql1 = "SELECT MAX(madonhang) AS madonhang FROM donhang WHERE mataikhoan = $tk->mataikhoan";
        $result1 = $conn1->query($sql1);
        $i = 0;
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $madonhang = $row["madonhang"];
            }
        }
        $conn1->close();

        $conn2 = new mysqli("localhost", "root", "", "mobileshop");
        $conn2->set_charset("utf8");
        foreach ($gh->List as $value) {
            $sql2 = "INSERT INTO chitietdonhang (madienthoai,madonhang,soluongmua) VALUES (?,?,?)";
            $result2 = $conn2->prepare($sql2);
            $result2->bind_param("sii", $value->madienthoai, $madonhang, $value->soluongmua);
            $result2->execute();
        }
        $result2->close();
        $conn2->close();
        unset($_SESSION["gh"]);
        header("Location:donhanghientai.php");
    }else{
        header("Location:giohang.php");
    }
}


