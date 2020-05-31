<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php
include_once'../classes/adminCRUD.php';
include_once'adminHeader.php';
//include_once'../views/header.php';
$id = $_GET['id'];
	$crud = new adminCRUD();

	$result = $crud->getRateById($id);
?>
<!-- main starts here -->
<div class="main">
	<div class="admin-side-bar">
		<?php 
				include_once'adminSideBar.php';
		?>
	</div>
	<div class="main-content">

		<div class="rate-wrapper">
			<?php
				foreach ($result as $value) {?>
				  	

			<form action="../classes/admin_formValue.php" method="POST">
				<input type="hidden" name="vehicleType_id" value="<?php echo $id; ?>">
				<label for="type">Vehicle Type</label>
				<input type="text" name="type" value="<?php echo $value['type']; ?>">
				<label for="rate">Vehicle Rate</label>
				<input type="number" name="rate" value="<?php echo $value['rate']; ?>">
				<input type="submit" class="button" name="updateRate" value="Update">
			</form>

				<?php
				 }  
			?>

		</div>


	</div>
	
</div>
<!-- main ends here -->
<?php
include_once'../views/footer.php';
?>
