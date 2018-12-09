
<?php 
		
		require 'database.php';
    	include 'head.php';    	
    	if ( !empty($_POST)) {
		// keep track validation errors
		$NameError = null;	
		$DescriptionError = null;
		$ContentError = null;
		
		// keep track post values
		$name = $_POST['name'];
		$category = $_POST['category'];
		$description = $_POST['description'];
		$image = $_POST['image'];	
		$content = $_POST['content'];	
		$status = $_POST['status'];
		$user = $_SESSION['login'];
		$link = ToLink($name);
		// validate input
		$valid = true;
		if (empty($name)) {
			$NameError = 'Nhập tiêu đề bài đăng';
			$valid = false;
		}
		
		if (empty($description)) {
			$DescriptionError = 'Nhập mô tả ngắn cho bài đăng';
			$valid = false;
		} 
				
		if (empty($content)) {
			$ContentError = 'Nhập nội dung cho bài đăng';
			$valid = false;
		}
		
	   	
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO articles (TieuDe,TheLoai,Mota,HinhAnh, NoiDung,TinhTrang, User, Link) values(?,?,?,?,?,?,?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$category,$description,$image,$content,$status,$user,$link));
			Database::disconnect();
			header("Location: article.php");
		}
	}
     ?>
<body>
	<header>
        <div class="container">        	
	            <a href="#">
					<h1>QUẢN LÝ BÀI VIẾT</h1>
	            </a>	         
        </div>
    </header>
   <?php 
    	include 'menu.php';
     ?>
    <section>
    	<div class="container">
    			<h3>Thêm bài viết mới</h3>
				<div class="row">
	    			<form class="form-horizontal" role="form" action="article-add.php" method="post">						 
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Tiêu đề</label>
						    <div class="col-sm-10">
						      	<input type="text" class="form-control" name="name" id="inputEmail3" placeholder="Tiêu đề bài viết">
						      	<?php if (!empty($NameError)): ?>
					      			<span class="help-inline"><?php echo $NameError;?></span>
					      		<?php endif; ?>
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Thể loại</label>
						    <div class="col-sm-10">
						      	<select name="category" class="form-control">
							      	<?php 							      		
			              				$pdo = Database::connect();
			              				$sql = 'SELECT * FROM Category';
			              				foreach ($pdo->query($sql) as $row) {			              							              		
			              					echo '<option value="'.$row["Id"].'">'.$row["Name"].'</option>';
			              				}
			              				Database::disconnect();	
							      	 ?>
						      	 </select>						      	
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Mô tả</label>
						    <div class="col-sm-10">
						      	<textarea name="description" class="form-control" placeholder="Nhập mô tả" rows="3"></textarea>	
						      	<?php if (!empty($DescriptionError)): ?>
					      			<span class="help-inline"><?php echo $DescriptionError;?></span>
					      		<?php endif; ?>					      						      
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh</label>
						    <div class="col-sm-10">
						      	<input type="text" id="Image" style="width:42%; float:left" class="form-control" name="image" id="inputEmail3" placeholder="Chọn hình ảnh thumb">
						      	<input type="button" id="BrowseImageIcon" style="width:10%; float:left" class="btn btn-success" value="Duyệt ảnh" />
						    </div>
						  </div>
						  
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Nội dung</label>
						    <div class="col-sm-10">
						      	<textarea name="content" class="ckeditor" placeholder="Nhập mô tả" rows="3"></textarea>	
						      	<?php if (!empty($ContentError)): ?>
					      			<span class="help-inline"><?php echo $ContentError;?></span>
					      		<?php endif; ?>						      						      
						    </div>
						  </div>
						 
						  
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Hiển thị</label>
						    <div class="col-sm-2">
						      	<select name="status" class="form-control">							      			              							              		
			              			<option value="1">Có</option>		
			              			<option value="0">Không</option>	              				
						      	 </select>							      	
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      	<button type="submit" class="btn btn-success">Xuất bản</button>
				  				<a class="btn" href="article.php">Quay lại</a>
						    </div>
						  </div>
					</form>
	    		</div>
    	</div>
			

			<div class="row">
				<div class="contact">
					WEB DESIGN BY <a href="http://wmo.vemientrung.com">WMO</a>
				</div>
			</div>
    </section>
    <script type="text/javascript">
            $(function () {
                $("#BrowseImageIcon").click(function () {
                    var ckfider = new CKFinder();
                    ckfider.selectActionFunction = function (fileUrl) {
                        $("#Image").val(fileUrl);
                    };
                    ckfider.popup();
                })
            });
        </script>

</body>
</html>