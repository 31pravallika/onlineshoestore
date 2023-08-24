<?php
	include("../function/session.php");
	include("../db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Shoe Store</title>
	<link rel = "stylesheet" type = "text/css" href="../css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script src="../js/carousel.js"></script>
	<script src="../js/button.js"></script>
	<script src="../js/dropdown.js"></script>
	<script src="../js/tab.js"></script>
	<script src="../js/tooltip.js"></script>
	<script src="../js/popover.js"></script>
	<script src="../js/collapse.js"></script>
	<script src="../js/modal.js"></script>
	<script src="../js/scrollspy.js"></script>
	<script src="../js/alert.js"></script>
	<script src="../js/transition.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../javascripts/filter.js" type="text/javascript" charset="utf-8"></script>
	<script src="../jscript/jquery-1.9.1.js" type="text/javascript"></script>

		<!--Le Facebox-->
		<link href="../facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="../facefiles/jquery-1.9.js" type="text/javascript"></script>
		<script src="../facefiles/jquery-1.2.2.pack.js" type="text/javascript"></script>
		<script src="../facefiles/facebox.js" type="text/javascript"></script>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
		$('a[rel*=facebox]').facebox()
		})
		</script>
</head>
<body>
<div id="header" style="position:fixed;">
		<img src="../img/logo.jpg">
		<label>Online Shoe Store</label>
			<?php
				$id = (int) $_SESSION['id'];

					$query = $conn->query ("SELECT * FROM admin WHERE adminid = '$id' ") or die (mysqli_error());
					$fetch = $query->fetch_array ();
			?>

			<ul>
				<li><a href="../function/admin_logout.php"><i class="icon-off icon-white"></i>logout</a></li>
				<li>Welcome:&nbsp;&nbsp;&nbsp;<i class="icon-user icon-white"></i><?php echo $fetch['username']; ?></a></li>
			</ul>
	</div>
<div id="container">


							<?php

								$id = $_GET['id'];
								$query = $conn->query ("SELECT * FROM product WHERE product_id = '$id' ") or die (mysql_error());
								$fetch = $query->fetch_array ();
								{
									$product_name=$fetch['product_name'];
									$product_price=$fetch['product_price'];
									$product_size=$fetch['product_size'];
									$product_image=$fetch['product_image'];
									$brand=$fetch['brand'];
									$category=$fetch['category'];
                                    $product_id=$fetch['product_id'];
								}
                                $query1 = $conn->query ("SELECT * FROM stock WHERE product_id = '$id' ") or die(mysql_error());
                                $fetch1 = $query1->fetch_array ();
                                
                                    $qty=$fetch1['qty'];
                                    
                                
						?>
				<div id="account">
					<form method="POST" action="../function/edit_product2.php">
						<center>
						<h3 style="color:white;">Edit Product details...</h3>
							<table>
                            <tr>
                                <td>Product id:</td><td><input type="number" name="product_id" placeholder="Product id" style="width:250px;" default value="<?php echo $product_id; ?>"></td>
							</tr>
                            <tr>
								<td><input type="text" name="product_image" value="<?php echo $product_image;?>">
                                
                            </td>
							</tr>
							
							<tr>
								<td>Product Name:</td><td><input type="text" name="product_name" placeholder="Product Name" style="width:250px;" required value="<?php echo $product_name; ?>"></td>
							<tr/>
							<tr>
                                <td>Price:</td><td><input type="text" name="product_price" placeholder="Price" style="width:250px;" required value="<?php echo $product_price; ?>"></td>
							</tr>
							<tr>
                            <td>Size:</td><td><input type="text" name="product_size" placeholder="Size" style="width:250px;" maxLength="2" required value="<?php echo $product_size; ?>"></td>
							</tr>
							<tr>
                            <td>Brand:</td><td><input type="text" name="brand" placeholder="Brand Name	" style="width:250px;" required value="<?php echo $brand; ?>"></td>
							</tr>
							<tr>
                            <td>Stock:</td><td><input type="number" name="qty" placeholder="No. of Stock" style="width:250px;" required value="<?php echo $qty; ?>"></td>
							</tr>
							<tr>
								<td><input type="hidden" name="category" value="football"></td>
							</tr>
                            <tr>
									<td></td><td><input type="submit" name="edit2" value="Save Changes" class="btn btn-primary">&nbsp;<a href="admin_football.php"><input type="button" name="cancel" value="Cancel" class="btn btn-danger"></a></td>
								</tr>
							</table>
						</center>
					</form>
				</div>



	<br>

</div>
</body>
</html>
