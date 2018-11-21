<html>
    <body>
        <?php if($key == null&&$mahang==null){
            $max = dienthoai::totalpage(dienthoai::getDienThoai());
            if($max>1){
        ?>
        <ul class="pagination">
            <?php for($i = 1 ; $i <=$max ; $i++){?>
                <li><a href="index.php?page=<?php echo($i);?>"><?php echo($i);?></a></li>
            <?php }?>
        </ul>
        <?php }}?>
        
        <?php if($mahang != null&&$key==null){
            $max = dienthoai::totalpage(dienthoai::getDienThoaiTheoHang($mahang));
            if($max>1){
        ?>
        <ul class="pagination">
            <?php for($i = 1 ; $i <=$max ; $i++){?>
                <li><a href="index.php?mahang=<?php echo($mahang);?>&page=<?php echo($i);?>"><?php echo($i);?></a></li>
            <?php }?>
        </ul>
        <?php }}?>
        
         <?php if($mahang == null&&$key!=null){
            $max = dienthoai::totalpage(dienthoai::TimKiem($key));
            if($max>1){
        ?>
        <ul class="pagination">
            <?php for($i = 1 ; $i <=$max ; $i++){?>
                <li><a href="index.php?key=<?php echo($key);?>&page=<?php echo($i);?>"><?php echo($i);?></a></li>
            <?php }?>
        </ul>
         <?php }}?>
    </body>
</html>

