<?php
include_once'../classes/crud.php';
include_once'header.php';
//include_once'main.php';


	

 

	$crud = new crud();
	$result = $crud->getParkingSlots();
	$status = $crud->resetSlots();
	$bikeRate = $crud->getBikeRate();
	$bike = $bikeRate->fetch_assoc();
	$carRate = $crud->getCarRate();
	$car = $carRate->fetch_assoc();
// $bike = array();
// $car = array();
// $booked = array();
// 	foreach ($result as  $value) {
// 		if ($value['vehicleType_id']==1) {
// 			$bike[] = $value['parkingSlots_id'];
// 		}else{
// 			$car[] = $value['parkingSlots_id'];
// 		}

// 		if ($value['status']=="booked") {
			
// 		}
// 	}


	
?>
<style type="text/css">
.header {
 background-color: #e4f1fe;
 height: 100px;
}
</style>
<!-- main starts here -->

			<div class="main">

				<div class="slots-wrapper">

					<div class="bike-slots">
						<h2 class="slots">Parkir Kiri: <i class="badge badge-info"><?php echo $bike['rate']; ?>/ day</i></h2>
					<?php
					foreach ($result as $value) { 
						if ($value['vehicleType_id']==1) {
							if ($value['status']=="booked") { ?>
								<span ><a href="bookForm.php?id=<?php echo $value['parkingSlots_id']; ?>" class="booked"><?php echo $value['parkingSlots_id']; ?></a></span>
								
						<?php	}

						else{ ?>

							<span ><a href="bookForm.php?id=<?php echo $value['parkingSlots_id']; ?>" class="button"><?php echo $value['parkingSlots_id']; ?></a></span>

						<?php  }
						}
						?>
							
				 <?php
				}?>

					</div>

					<div class="car-slots">
						<h2 class="slots">Parkir Kanan: <i class="badge badge-info"><?php echo $car['rate']; ?>/ day</i></h2>
						<?php 
							foreach ($result as $value) { 
								if ($value['vehicleType_id']==2) {
									if ($value['status']=="booked") { ?>

								<span ><a href="bookForm.php?id=<?php echo $value['parkingSlots_id']; ?>" class="booked"><?php echo $value['parkingSlots_id']; ?></a></span>
										
								<?php	}
								else{  ?>

									<span ><a href="bookForm.php?id=<?php echo $value['parkingSlots_id']; ?>" class="button"><?php echo $value['parkingSlots_id']; ?></a></span>
							<?php	}
						}

								?>
								
								
								
						<?php	}
						 ?>
						
					</div>

					
				</div>


				
			</div>
			<!-- main ends here -->

			
