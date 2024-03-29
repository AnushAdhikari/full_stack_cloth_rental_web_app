<?php 
include('wishlist-db.php');
 

include('mainheader.php');  

?>
 
<div class="container text-white">
    <h2 class='text-center text-white main-wishlist'>My Wishlist</h2>

    <section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
				 
					<div class="col-md-12">

		 
			<br>
			<table class="cart-table account-table table table-bordered bg-white text-dark">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Retail Price</th>
					 
						<th>Date and Time</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$c_id = $_SESSION['customerid']; 
  
				$sql = "SELECT * FROM wishlist JOIN product_table on product_table.product_id=wishlist.pid";
				$result = mysqli_query($conn, $sql);
			  
				if (mysqli_num_rows($result) > 0) {
				 // output data of each row
				 while($row = mysqli_fetch_assoc($result)) {
 				?>
					<tr>
						<td>
                        <a href="product.php?product_id=<?php echo $row["product_id"] ?>">	<?php echo $row["product_name"] ?></a>
						
						</td>
						<td>Rs.
						<?php echo $row["retail_price"] ?>
						</td>
					 
						<td>
						

						<?php echo date('M j g:i A', strtotime($row["timestamp"]));  ?>		
						</td>
						<td>
							<div id="delete_wishlist">
							<a href="delete-wishlist.php?product_id=<?php echo $row["product_id"] ?>&cid=<?php echo $_SESSION['customerid'] ?>">Delete</a> 
						</div>
							 
						</td>
					</tr>
				 
			
			<?php
				}
			   } else {
				 echo "0 results";
			   }
			 
			 
			 ?>
				</tbody>
			</table>		

			</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	
 
</div>

<?php include('footer.php');  ?>


