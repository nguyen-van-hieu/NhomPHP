<?php

class giohang {

    var $List;

    function __construct() {
        $this->List = array();
    }

    function addItem($item) {
        foreach ($this->List as $value) {
            if ($value->madienthoai == $item->madienthoai) {
                $value->soluongmua += $item->soluongmua;
                return;
            }
        }
        $this->List[] = $item;
    }

    function removeItem($madienthoai) {
        foreach ($this->List as $key => $value) {
            if ($value->madienthoai == $madienthoai) {
                unset($this->List[$key]);
            }
        }
    }

    function up($madienthoai) {
        foreach ($this->List as $value) {
            if ($value->madienthoai == $madienthoai) {
                $value->soluongmua += 1;
                $value->thanhtien = $value->soluongmua * $value->gia;
                return;
            }
        }
        return;
    }

    function giam($madienthoai) {
        foreach ($this->List as $value) {
            if ($value->madienthoai == $madienthoai && $value->soluongmua > 1) {
                $value->soluongmua -= 1;
                $value->thanhtien = $value->soluongmua * $value->gia;
                return;
            }
        }
        return;
    }

    function tongthanhtien() {
        $tongthanhtien = 0;
        foreach ($this->List as $value) {
            $tongthanhtien += $value->thanhtien;
        }
        return $tongthanhtien;
    }

    function soluonghang() {
        $sl = 0;
        foreach ($this->List as $value) {
            $sl += $value->soluongmua;
        }
        return $sl;
    }

}

class item {

    var $madienthoai;
    var $ten;
    var $gia;
    var $soluongmua;
    var $urlimg;
    var $thanhtien;

    public function __construct($madienthoai, $ten, $gia, $soluongmua, $urlimg) {
        $this->madienthoai = $madienthoai;
        $this->ten = $ten;
        $this->gia = $gia;
        $this->soluongmua = $soluongmua;
        $this->urlimg = $urlimg;
        $this->thanhtien = $soluongmua * $this->gia;
    }

}
