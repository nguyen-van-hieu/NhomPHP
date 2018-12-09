<?php 
//	require 'database.php';
//	$id = 0;
	
//	if ( !empty($_GET['id'])) {
//		$id = $_REQUEST['id'];
//	}
	
//	if ( !empty($_POST)) {
		// keep track post values
//		$id = $_POST['id'];
		
		// delete data
//		$pdo = Database::connect();
//		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//		$sql = "DELETE FROM dienthoai  WHERE madienthoai = ?";
//		$q = $pdo->prepare($sql);
//		$q->execute(array($id));
//		Database::disconnect();
//		header("Location: product.php");
		
//	} 
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
    				<h3>XÓA SẢN PHẨM</h3>
    			</div>
				<div class="row">
					<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
					  <p class="alert alert-error">Bạn có chắc muốn xóa ?</p>
					  <div class="form-actions">
						  <button  class="btn btn-danger"  ><a class="btn" href="product.php">Yes</a></button>
						  <a class="btn" href="product.php">No</a>
						</div>
					</form>
	    		</div>
    	</div>
			

			
    </section>

  </body>
</html>