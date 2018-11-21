<html>
    <body>
        <?php
        include './class/hang.php';
        $lst = hang::getHang();
        ?>
        <ul class="list-group">
            <li class="list-group-item active">Hãng Điện Thoại</li>
            <?php
            foreach ($lst as $value) { ?>
                <li class="list-group-item"><a href="index.php?mahang=<?php echo($value->mahang);?>"><?php echo($value->tenhang);?></a></li>
            <?php } ?>
        </ul>
    </body>
</html>
