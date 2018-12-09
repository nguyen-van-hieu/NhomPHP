<?php 
    	include 'head.php';
?>
<body>
	<header>
        <div class="container">        	
	            <a href="#">
					<h1>QUẢN LÝ THÀNH VIÊN</h1>
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
					 
				
					</p>
			  	</div>
			  	<form action="search.php" method="post" name="form_search" onsubmit="return validation();">
				  	<div class="col-xs-6 col-md-4">
				  		<input name="keyword" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập tên tài khoản cần tìm">
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
		                  <th>Mã Tài khoản</th>
		                  <th>Họ tên </th>
		                  <th>Quyền</th>

		                  <th>Tên đăng nhập</th>	
		                  <th>Mật khẩu</th>	                  
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
		              	$sql1 = 'select * from taikhoan';
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
	              			             
		              	$sql = 'select * from taikhoan';
		              	foreach ($pdo->query($sql) as $row) {
		              		echo '<tr class="success">';
		              			echo '<td>'.$row['mataikhoan'].'</td>';
		              			echo '<td>'.$row['hoten'].'</td>';
                                 
                                  echo '<td>'.$row['quyen'].'</td>';
		              			
								
								  
		              					              			
		              			echo '<td>'.$row['tendangnhap'].'</td>';
		              			echo '<td>'.$row['matkhau'].'</td>';
		              			echo '<td >';
		              			echo '<a class="btn btn-info" href="detail.php?id='.$row["mataikhoan"].'">Xem chi tiết</a>';
		              			echo '&nbsp;';
		              			echo '<a class="btn btn-success" href="update.php?id='.$row["mataikhoan"].'">Sửa</a>';
		              			echo '&nbsp;';
		              			echo '<a class="btn btn-danger" href="delete.php?id='.$row["mataikhoan"].'">Xóa</a>';
		              			echo '</td>';
		              		echo '</tr>';
		              	}
		              	Database::disconnect();	
		               ?>
		              </tbody>
	            </table>
	            <?php 
	            	if($page>1){echo '<a class="btn btn-success" href="menber.php?page='.($page-1).'">Trang trước</a>';}
	            	echo '&nbsp;';
					for ($i=1 ; $i<=$pagenumber ; $i++) {
						if ($i == $page) {
						       echo $i;
						       echo '&nbsp;';
						} 
						else {
						      echo '<a class="btn btn-info" href="menber.php?page='.$i.'">'.$i.'</a>';
						      echo '&nbsp;';
						}
					}
					if($page<$pagenumber){echo '<a class="btn btn-success" href="menber.php?page='.($page+1).'"">Trang sau</a>';}
				?>

			</div>

			
    	</div>
    </section>
</body>
</html>