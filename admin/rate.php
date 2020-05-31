<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php
include_once'../classes/adminCRUD.php';
include_once'adminHeader.php';
//include_once'../views/header.php';
	$crud = new adminCRUD();

	$result = $crud->getRate();
?>

<style type="text/css">
.container {
  padding-right: 0px;
  padding-left: 0px;
}

.admin-side-bar {
	top:100px;
	background-color: #f5f6fa;
}
</style>
<!-- main starts here -->
<div class="main">
	<div class="admin-side-bar">
		<?php 
				include_once'adminSideBar.php';
		?>
	</div>
	<div class="main-content">


		<div class="rate-wrapper ">

			<div class="rate-table">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>S.N</th>
							<th>Vehicle Type</th>
							<th>Rate/day</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php  
						if ($result->num_rows>0) { ?>
							

					<tbody>
						<?php 
						$counter = 1;
						foreach ($result as  $value) { ?>
							

						<tr>
							<td><?php echo $counter; ?></td>
							<td><?php echo $value['type']; ?></td>
							<td><?php echo $value['rate']; ?></td>
							<td><a  href="editRate.php?id=<?php echo$value['vehicleType_id']; ?>">Edit</a></td>
						</tr>

						<?php
						$counter++;
						 }
						?>

					</tbody>
				<?php	}
					?>

				</table>
				
			</div>




			
		</div>
	</div>
	
</div>
<!-- main ends here -->
<?php
include_once'../views/footer.php';
?>

<!-- <script type="text/javascript">
	$(document).ready(function(){
		$('#editBike').on("click",function(e){
			e.preventDefault();
			$('#bike-rate').show();
		})

		$('#editBike').on("click",function(e){
			e.preventDefault();
			$('#bike-rate').show();
		})

	});
</script> -->