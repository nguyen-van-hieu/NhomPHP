<?php

class hang {
    //put your code here
    var $mahang;
    var $tenhang;

    public function __construct($mahang, $tenhang) {
        $this->mahang = $mahang;
        $this->tenhang = $tenhang;
    }

    static function getHang() {
        $rs = array();
        $conn = new mysqli("localhost","root","","mobileshop");
        $conn->set_charset("utf8");
        $sql = "SELECT * FROM hang";
        $result = $conn->query($sql);
        $i = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mahang = $row["mahang"];
                $tenhang = $row["tenhang"];
                $hang = new hang($mahang, $tenhang);
                $rs[$i] = $hang;
                $i++;
            }
        }
        $conn->close();
        return $rs;
    }
}
