<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
include_once'../classes/crud.php';
include_once'adminHeader.php';
//include_once'../views/header.php';
	$crud = new crud();
	$result = $crud->getParkingSlots();
	$status = $crud->resetSlots();
?>
<!-- main starts here -->
<div class="main">

	<div class="slots-wrapper">
		<div class="bike-slots">
			<h2 class="slots">Bike Slots</h2>
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
			<h2 class="slots">Car Slots</h2>
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
<!-- main ends here -->
<?php
include_once'../views/footer.php';
?>