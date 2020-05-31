<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php
include_once'../classes/crud.php';
include_once'adminHeader.php';
//include_once'../views/header.php';
	$crud = new crud();
	$result = $crud->getParkingSlots();
	$status = $crud->resetSlots();
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


		<div class="slots-wrapper">
			<div class="bike-slots">
				<h2 class="slots">Kiri</h2>
				<?php
				foreach ($result as $value) {
					if ($value['vehicleType_id']==1) {
				if ($value['status']=="booked") { ?>
				<span ><a href="../classes/admin_formValue.php?id=<?php echo $value['parkingSlots_id']; ?>" class="booked-admin" OnClick="return confirm('Sure to release slot '+<?php echo $value['parkingSlots_id']; ?>);"><?php echo $value['parkingSlots_id']; ?></a></span>
				
				<?php	}
				else{ ?>
				<span ><a href="" class="button"><?php echo $value['parkingSlots_id']; ?></a></span>
				<?php  }
				}
				?>
				
				<?php
				}?>
			</div>
			<div class="car-slots">
				<h2 class="slots">Kanan</h2>
				<?php
					foreach ($result as $value) {
						if ($value['vehicleType_id']==2) {
				if ($value['status']=="booked") { ?>
				<span ><a href="../classes/admin_formValue.php?id=<?php echo $value['parkingSlots_id']; ?>" class="booked-admin" OnClick="return confirm('Sure to release slot '+<?php echo $value['parkingSlots_id'];  ?>);"><?php echo $value['parkingSlots_id']; ?></a></span>
				
				<?php	}
				else{  ?>
				<span ><a href="" class="button"><?php echo $value['parkingSlots_id']; ?></a></span>
				<?php	}
				}
				?>
				
				
				
				<?php	}
				?>
				
			</div>
			
		</div>
	</div>
	
</div>
