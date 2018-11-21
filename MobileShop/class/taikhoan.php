<?php
class taikhoan {
    //put your code here
    var $mataikhoan;
    var $tendangnhap;
    var $hoten;
    var $email;
    var $diachi;
    var $quyen;
    public function __construct($mataikhoan,$tendangnhap,$hoten,$email,$diachi,$quyen) {
        $this->mataikhoan = $mataikhoan;
        $this->tendangnhap = $tendangnhap;
        $this->hoten = $hoten;
        $this->email = $email;
        $this->diachi = $diachi;
        $this->quyen = $quyen;
    }
    static function kiemtradangnhap($tendangnhap,$matkhau) {
        $tk = null;
        $conn = new mysqli("localhost","root","","mobileshop");
        $conn->set_charset("utf8");
        $sql = "SELECT mataikhoan,tendangnhap,hoten,email,diachi,quyen FROM taikhoan WHERE tendangnhap = ? AND matkhau = ?";
        $result = $conn->prepare($sql);
        $result->bind_param("ss",$tendangnhap,$matkhau);
        $result->execute();
        $result->store_result();
        $result->bind_result($mataikhoan,$tendangnhap,$hoten,$email,$diachi,$quyen);
        if ($result->num_rows > 0) {
            while ($result->fetch()) {
                $tk = new taikhoan($mataikhoan, $tendangnhap, $hoten, $email, $diachi, $quyen);
            }
        }
        $result->close();
        $conn->close();
        return $tk;
    }
    static function kiemtratontai($tendangnhap){
        $tk =null;
        $conn = new mysqli("localhost","root","","mobileshop");
        $conn->set_charset("utf8");
        $sql = "SELECT mataikhoan,tendangnhap,hoten,email,diachi,quyen FROM taikhoan WHERE tendangnhap = ?";
        $result = $conn->prepare($sql);
        $result->bind_param("s",$tendangnhap);
        $result->execute();
        $result->store_result();
        $result->bind_result($mataikhoan,$tendangnhap,$hoten,$email,$diachi,$quyen);
        if ($result->num_rows > 0) {
            while ($result->fetch()) {
                $tk = new taikhoan($mataikhoan, $tendangnhap, $hoten, $email, $diachi, $quyen);
            }
        }
        $result->close();
        $conn->close();
        if ($tk == NULL) {
            return TRUE;
        }
        return FALSE;
    }
    static function taotaikhoan($tendangnhap,$matkhau, $hoten, $email, $diachi){
        $quyen = "khachhang";
        $conn = new mysqli("localhost","root","","mobileshop");
        $conn->set_charset("utf8");
        $sql = "INSERT INTO taikhoan (tendangnhap,matkhau,hoten,diachi,email,quyen) VALUES (?,?,?,?,?,?)";
        $result = $conn->prepare($sql);
        $result->bind_param("ssssss",$tendangnhap,$matkhau,$hoten, $email, $diachi,$quyen);
        $result->execute();
        $result->close();
        $conn->close();
    }
}
