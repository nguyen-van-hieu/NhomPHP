<?php 
    	include 'head.php';
?>
<body>
	<header>
        <div class="container">        	
	            <a href="#">
					<h1>QUẢN LÝ ĐIỆN THOẠI</h1>
	            </a>	         
        </div>
    </header>
    <?php 
    	include 'menu.php';
     ?>
    <section>
    	<div class="container">    	
    		<div class="row header1">
			  	<div class="col-xs-12 col-md-6">
			  		<p>
						<a href="product-add.php" class="btn btn-success">Thêm điện thoại</a>
					</p>
			  	</div>
			  	<form action="search.php" method="post" name="form_search" onsubmit="return validation();">
				  	<div class="col-xs-6 col-md-4">
				  		<input name="keyword" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập tên điện thoại cần tìm">
				  	</div>
				  	<div class="col-xs-6 col-md-2">
				  		<p>							
							<button type="submit" class="btn btn-success">Tìm kiếm</button>
						</p>
				  	</div>
			  	</form>
			</div>			
			
			<div class="row">
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Mã sản phẩm</th>
		                  <th>Tên sản phẩm</th>
		                  <th>Hình ảnh</th>

		                  <th>Giá (VNĐ)</th>	
		                  <th>Số lượng</th>	                  
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
		              	$sql1 = 'select * from dienthoai';
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
	              			             
		              	$sql = 'select * from dienthoai';
		              	foreach ($pdo->query($sql) as $row) {
		              		echo '<tr class="success">';
		              			echo '<td>'.$row['madienthoai'].'</td>';
		              			echo '<td>'.$row['ten'].'</td>';
		              			echo  '<td>';
		              			echo '<img src="../images/products/'.$row['urlimg'].'" class="img-responsive image_product"  alt="image product">';
								  echo '</td>';
								  
		              					              			
		              			echo '<td style="text-align: right;">'.number_format($row['gia']).'</td>';
		              			echo '<td style="text-align: right;">'.number_format($row['soluong']).'</td>';
		              			echo '<td width=250>';
		              			echo '<a class="btn btn-info" href="detail.php?id='.$row["madienthoai"].'">Xem chi tiết</a>';
		              			echo '&nbsp;';
		              			echo '<a class="btn btn-success" href="update.php?id='.$row["mahang"].'">Sửa</a>';
		              			echo '&nbsp;';
		              			echo '<a class="btn btn-danger" href="delete.php?id='.$row["mahang"].'">Xóa</a>';
		              			echo '</td>';
		              		echo '</tr>';
		              	}
		              	Database::disconnect();	
		               ?>
		              </tbody>
	            </table>
	            <?php 
	            	if($page>1){echo '<a class="btn btn-success" href="product.php?page='.($page-1).'">Trang trước</a>';}
	            	echo '&nbsp;';
					for ($i=1 ; $i<=$pagenumber ; $i++) {
						if ($i == $page) {
						       echo $i;
						       echo '&nbsp;';
						} 
						else {
						      echo '<a class="btn btn-info" href="product.php?page='.$i.'">'.$i.'</a>';
						      echo '&nbsp;';
						}
					}
					if($page<$pagenumber){echo '<a class="btn btn-success" href="product.php?page='.($page+1).'"">Trang sau</a>';}
				?>

			</div>

			
    	</div>
    </section>
</body>
</html>