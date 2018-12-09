<?php 
	require 'database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id || !(is_numeric($id))) {
		header("Location: product.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "select from dienthoai and madienthoai = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}
?>

<?php 
    	include 'head.php';
     ?>
<body>
	<header>
        <div class="container">        	
	            <a href="#">
					<h1>QUẢN LÝ SẢN PHẨM</h1>
	            </a>	         
        </div>
    </header>
    <?php 
    	include 'menu.php';
     ?>
    <section>
    	<div class="container">
    			<div class="row">
    				<h3>CHI TIẾT SẢN PHẨM</h3>
    			</div>
				<div class="row">
					<div class="col-xs-12 col-md-8">						
			    			<form class="form-horizontal">		
				    			  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Mã sản phẩm</label>
								    <div class="col-sm-10">
								      	<?php echo $data['madienthoai'];?>						
								    </div>
								  </div>				 		    				
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
								    <div class="col-sm-10">
								      	<?php echo $data['ten'];?>
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Tên tác giả</label>
								    <div class="col-sm-10">
								      	<?php echo $data['mahang'];?>
								    </div>
								  </div>
								   <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Loại sản phẩm</label>
								    <div class="col-sm-10">
								      	<?php echo $data['mahang'];?>
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Giá</label>
								    <div class="col-sm-10">
								      	<?php echo number_format($data['gia']);?> đ
								    </div>
								  </div>							  
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">							      	
						  				<a class="btn" href="product.php">Quay lại</a>
								    </div>
								  </div>
							</form>
					</div>
					<div class="col-xs-12 col-md-4">
						<?php if ($data['urlimg']!=null): ?>							
							<img src="../images/products/<?php echo $data['urlimg'];?>" width="200px" height="250px">
						<?php endif; ?>						
					</div>
	    		</div>
    	</div>
			

			<
    </section>
</body>
</html>