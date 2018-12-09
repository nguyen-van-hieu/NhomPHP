<?php 
    	include 'head.php';
     ?>
<body>
	<header>
        <div class="container">        	
	            <a href="#">
					<h1>QUẢN LÝ ĐƠN HÀNG</h1>
	            </a>	         
        </div>
    </header>
    <?php 
    	include 'menu.php';
     ?>
    <section>
    	<div class="container">
    		<div class="row header1">
			  	<div class="col-xs-12 col-md-12">
			  		
			  	</div>			  	
			</div>			
			
			<div class="row">
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Mã đơn hàng</th>
		                  <th>Mã điện thoại</th>		                 
		                  <th>Số lượng mua</th>
		                  <th>Thao tác</th>		                 
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
		              	include 'database.php';
		              	if (!isset($_GET['page'])) {
							$page = 1;
						}
						else
						{
							$page = $_REQUEST['page'];
						}
						$vitri = ($page - 1) * 5;
		              	$pdo = Database::connect();	
		              	$sql1 = 'select * from chitietdonhang';
		              	if($result = $pdo->query($sql1))
						{
						    //đếm số trang lấy được
						    $recordnumber = $result->rowCount();
						    if ($recordnumber%5 ==0)
						    {
						    	$pagenumber = $recordnumber/5;
						    }	
						    else{
						    	$pagenumber = floor($recordnumber/5) + 1;								    		 	
						    }
						    
						}
	              			             
		              	$sql = 'select * from chitietdonhang limit '.$vitri.', 5';
		              	foreach ($pdo->query($sql) as $row) {
		              		echo '<tr class="success">';
		              			echo '<td>'.$row['madonhang'].'</td>';
		              			echo '<td>'.$row['madienthoai'].'</td>';		              			
		              			echo '<td>'.$row['soluongmua'].'</td>';
		              			echo '<td >';		              					              					              			
		              			echo '<a class="btn btn-success" href="category_update.php?id='.$row["madonhang"].'">Sửa</a>';
		              			echo '&nbsp;';
		              			echo '<a class="btn btn-danger" href="category_delete.php?id='.$row["madonhang"].'">Xóa</a>';
		              			echo '</td>';
		              		echo '</tr>';
		              	}
		              	Database::disconnect();	
		               ?>
		              </tbody>
	            </table>
	            <?php 
	            	if($page>1){echo '<a class="btn btn-success" href="category.php?page='.($page-1).'">Trang trước</a>';}
	            	echo '&nbsp;';
					for ($i=1 ; $i<=$pagenumber ; $i++) {
						if ($i == $page) {
						       echo $i;
						       echo '&nbsp;';
						} 
						else {
						      echo '<a class="btn btn-info" href="category.php?page='.$i.'">'.$i.'</a>';
						      echo '&nbsp;';
						}
					}
					if($page<$pagenumber){echo '<a class="btn btn-success" href="category.php?page='.($page+1).'"">Trang sau</a>';}
				?>

			</div>

			
    	</div>
    </section>
</body>
</html>