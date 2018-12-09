
<?php 
		
		require 'database.php';
    	include 'head.php'; 
    	$id = null;
    	if ( !empty($_GET['id'])) {
			$id = $_REQUEST['id'];
		}   	
		if ( null==$id ) {
			header("Location: article.php");
		}	
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
			$sql = "UPDATE articles  set TieuDe = ?, TheLoai = ?, MoTa =?, HinhAnh = ?, NoiDung = ?, TinhTrang = ? WHERE Id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$category,$description,$image,$content,$status,$id));
			Database::disconnect();
			header("Location: article.php");

		}
	}
	else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM articles where Id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$id = $data['Id'];
		$name = $data['TieuDe'];
		$category = $data['TheLoai'];
		$description = $data['MoTa'];
		$image = $data['HinhAnh'];
		$content = $data['NoiDung'];
		$status = $data['TinhTrang'];		
		Database::disconnect();
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
    			<h3>Chỉnh sửa bài viết</h3>
				<div class="row">
	    			<form class="form-horizontal" role="form" action="article-update.php?id=<?php echo $id?>" method="post">						 
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Tiêu đề</label>
						    <div class="col-sm-10">
						      	<input type="text" class="form-control" name="name" id="inputEmail3" placeholder="Tiêu đề bài viết" value="<?php echo !empty($name)?$name:'';?>">
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
				              				$sql = 'SELECT * FROM category';
				              				foreach ($pdo->query($sql) as $row) {		
				              					if ($row["Id"] != $category){
				              						echo '<option value="'.$row["Id"].'">'.$row["Name"].'</option>';
				              					}
				              					else
				              					{
				              						echo '<option selected="selected" value="'.$row["Id"].'">'.$row["Name"].'</option>';	
				              					}	              							              		
				              					
				              				}
				              				Database::disconnect();	
								      	 ?>
						      	 </select>						      	
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Mô tả</label>
						    <div class="col-sm-10">
						      	<textarea name="description" class="form-control" placeholder="Nhập mô tả" rows="3" ><?php echo !empty($description)?$description:'';?></textarea>	
						      	<?php if (!empty($DescriptionError)): ?>
					      			<span class="help-inline"><?php echo $DescriptionError;?></span>
					      		<?php endif; ?>					      						      
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh</label>
						    <div class="col-sm-10">
						      	<input type="text" id="Image" style="width:42%; float:left" class="form-control" name="image" id="inputEmail3" placeholder="Chọn hình ảnh thumb" value="<?php echo !empty($image)?$image:'';?>">
						      	<input type="button" id="BrowseImageIcon" style="width:10%; float:left" class="btn btn-success" value="Duyệt ảnh" />
						    </div>
						  </div>
						  
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Nội dung</label>
						    <div class="col-sm-10">
						      	<textarea name="content" class="ckeditor" placeholder="Nhập mô tả" rows="3" value="<?php echo !empty($content)?$content:'';?>"></textarea>	
						      	<?php if (!empty($ContentError)): ?>
					      			<span class="help-inline"><?php echo $ContentError;?></span>
					      		<?php endif; ?>						      						      
						    </div>
						  </div>
						 
						  
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Hiển thị</label>
						    <div class="col-sm-2">
						      	<select name="status" class="form-control">							      			              							              		
			              			<option <?php if ($status==1) {echo 'selected="selected"';} ?> value="1">Có</option>		
			              			<option <?php if ($status==0) {echo 'selected="selected"';} ?> value="0">Không</option>	              				
						      	 </select>							      	
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      	<button type="submit" class="btn btn-success">Cập nhật</button>
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