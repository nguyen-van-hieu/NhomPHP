<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$NameCategoryError = null;	
		
		// keep track post values
		$category = $_POST['category'];
		$description = $_POST['description'];
			
		// validate input
		$valid = true;
		if (empty($category)) {
			$NameCategoryError = 'Nhập tên thể loại';
			$valid = false;
		}			
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO chungloai (TenChungLoai,Mota) values(?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($category,$description));
			Database::disconnect();
			header("Location: category.php");
		}
	}
?>
<?php 
    	include 'head.php';
     ?>

<body>
	<header>
        <div class="container">        	
	            <a href="#">
					<h1>QUẢN LÝ THỂ LOẠI SẢN PHẨM</h1>
	            </a>	         
        </div>
    </header>
    <?php 
    	include 'menu.php';
     ?>
    <section>
    	<div class="container">
    			<div class="row">
    				<h3>THÊM THỂ LOẠI SẢN PHẨM MỚI</h3>
    			</div>
				<div class="row">
	    			<form class="form-horizontal" role="form" action="category-add.php" method="post">						 
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Tên thể loại</label>
						    <div class="col-sm-10">
						      	<input type="text" class="form-control" name="category" id="inputEmail3" placeholder="Tên thể loại">
						      	<?php if (!empty($NameProductError)): ?>
					      			<span class="help-inline"><?php echo $NameProductError;?></span>
					      		<?php endif; ?>
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Mô tả</label>
						    <div class="col-sm-10">
						      	<textarea name="description" class="form-control" placeholder="Mô tả thể loại" rows="3"></textarea>						      						      
						    </div>
						  </div>
						  
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      	<button type="submit" class="btn btn-success">Thêm</button>
				  				<a class="btn" href="category.php">Quay lại</a>
						    </div>
						  </div>
					</form>
	    		</div>
    	</div>
			

			
    </section>
</body>
</html>