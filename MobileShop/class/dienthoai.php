<?php
class dienthoai {
    //put your code here
    var $madienthoai;
    var $mahang;
    var $ten;
    var $gia;
    var $soluong;
    var $urlimg;
    public function __construct($madienthoai,$mahang,$ten,$gia,$soluong,$urlimg) {
        $this->madienthoai = $madienthoai;
        $this->mahang = $mahang;
        $this->ten = $ten;
        $this->gia = $gia;
        $this->soluong = $soluong;
        $this->urlimg = $urlimg;
    }
    static function totalpage($array){
        $i = 0;
        foreach ($array as $value){
            $i++;
        }
        if($i % 12 == 0){
            return $i/12;
        }else{
            return $i/12 + 1;
        }
    }
    static function phanTrang($page){
        $pagesize = 12;
        $n = ($page-1)*$pagesize;
        $rs = array();
        $conn = new mysqli("localhost","root","","mobileshop");
        $conn->set_charset("utf8");
        $sql = "SELECT * FROM dienthoai LIMIT ?,?";
        $result = $conn->prepare($sql);
        $result->bind_param("ii",$n,$pagesize);
        $result->execute();
        $result->store_result();
        $result->bind_result($madienthoai,$mahang, $ten, $gia, $soluong,$urlimg);
        $i = 0;
        if ($result->num_rows > 0) {
            while ($result->fetch()) {
                $dt = new dienthoai($madienthoai, $mahang, $ten, $gia, $soluong, $urlimg);
                $rs[$i] = $dt;
                $i++;
            }
        }
        $result->close();
        $conn->close();
        return $rs;
    }

    static function getDienThoai() {
        $rs = array();
        $conn = new mysqli("localhost","root","","mobileshop");
        $conn->set_charset("utf8");
        $sql = "SELECT * FROM dienthoai";
        $result = $conn->query($sql);
        $i = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $madienthoai = $row["madienthoai"];
                $mahang = $row["mahang"];
                $ten = $row["ten"];
                $gia = $row["gia"];
                $soluong = $row["soluong"];
                $urlimg = $row["urlimg"];
                $dt = new dienthoai($madienthoai, $mahang, $ten, $gia, $soluong, $urlimg);
                $rs[$i] = $dt;
                $i++;
            }
        }
        $conn->close();
        return $rs;
    }
    static function getDienThoaiTheoHang($mahang) {
        $rs = array();
        $conn = new mysqli("localhost","root","","mobileshop");
        $conn->set_charset("utf8");
        $sql = "SELECT * FROM dienthoai WHERE mahang = ?";
        $result = $conn->prepare($sql);
        $result->bind_param('s',$mahang);
        $result->execute();
        $result->store_result();
        $result->bind_result($madienthoai,$mahang, $ten, $gia, $soluong,$urlimg);
        $i = 0;
        if ($result->num_rows > 0) {
            while ($result->fetch()) {
                $dt = new dienthoai($madienthoai, $mahang, $ten, $gia, $soluong, $urlimg);
                $rs[$i] = $dt;
                $i++;
            }
        }
        $result->close();
        $conn->close();
        return $rs;
    }
    static function PhanTrangTheoHang($mahang,$page) {
        $pagesize = 12;
        $n = ($page-1)*$pagesize;
        $rs = array();
        $conn = new mysqli("localhost","root","","mobileshop");
        $conn->set_charset("utf8");
        $sql = "SELECT * FROM dienthoai WHERE mahang = ? LIMIT ?,?";
        $result = $conn->prepare($sql);
        $result->bind_param("sii",$mahang,$n,$pagesize);
        $result->execute();
        $result->store_result();
        $result->bind_result($madienthoai,$mahang, $ten, $gia, $soluong,$urlimg);
        $i = 0;
        if ($result->num_rows > 0) {
            while ($result->fetch()) {
                $dt = new dienthoai($madienthoai, $mahang, $ten, $gia, $soluong, $urlimg);
                $rs[$i] = $dt;
                $i++;
            }
        }
        $result->close();
        $conn->close();
        return $rs;
    }
    static function TimKiem($keyword) {
        $rs = array();
        $keyword = "%".$keyword."%";
        $conn = new mysqli("localhost","root","","mobileshop");
        $conn->set_charset("utf8");
        $sql = "SELECT * FROM dienthoai WHERE ten LIKE ?";
        $result = $conn->prepare($sql);
        $result->bind_param('s',$keyword);
        $result->execute();
        $result->store_result();
        $result->bind_result($madienthoai,$mahang, $ten, $gia, $soluong,$urlimg);
        $i = 0;
        if ($result->num_rows > 0) {
            while ($result->fetch()) {
                $dt = new dienthoai($madienthoai, $mahang, $ten, $gia, $soluong, $urlimg);
                $rs[$i] = $dt;
                $i++;
            }
        }
        $result->close();
        $conn->close();
        return $rs;
    }
    
    static function PhanTrangTimKiem($keyword,$page) {
        $pagesize = 12;
        $n = ($page-1)*$pagesize;
        $rs = array();
        $keyword = "%".$keyword."%";
        $conn = new mysqli("localhost","root","","mobileshop");
        $conn->set_charset("utf8");
        $sql = "SELECT * FROM dienthoai WHERE ten LIKE ? LIMIT ?,?";
        $result = $conn->prepare($sql);
        $result->bind_param("sii",$keyword,$n,$pagesize);
        $result->execute();
        $result->store_result();
        $result->bind_result($madienthoai,$mahang, $ten, $gia, $soluong,$urlimg);
        $i = 0;
        if ($result->num_rows > 0) {
            while ($result->fetch()) {
                $dt = new dienthoai($madienthoai, $mahang, $ten, $gia, $soluong, $urlimg);
                $rs[$i] = $dt;
                $i++;
            }
        }
        $result->close();
        $conn->close();
        return $rs;
    }
}
