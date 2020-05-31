<?php
include_once'header.php';
include_once'../classes/crud.php';

$crud = new crud();

$parkingSlot_id = $_GET['id'];

if (isset($_SESSION['email'])) {
	$email = $_SESSION['email'];
	$result = $crud->getUserId($email);

	foreach ($result as  $value) {
		$user_id = $value['user_id'];
		//echo $id;
	}

	?>

<?php
}


?>
<div class="booking">
	<div class="booking-form">
		
		<form action="../classes/formValue.php" id="doit" method="post">
			<input type="hidden" name="parkingSlot_id" value="<?php echo $parkingSlot_id; ?>">
			<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
		    <label class="gap">
		        <input type="hidden" name="bookingDate" value="<?php echo date("Y-m-d"); ?>">
		        Booking Date
		        <input type="text" id="datePicker"  value="<?php echo date("Y-m-d"); ?>"   disabled>
		    </label>

		    <label>
		        Vehicle Number
		        <input type="text" name="vehicleNo" placeholder="Enter Vehicle No." required="required" />
		    </label>
		    <input type="submit" class="button" name="book">
		</form>

	</div>

</div>


<?php
include_once'footer.php';
?>

<script type="text/javascript">
	$(document).ready(function(){
			document.getElementById('datePicker').value = moment().format("Y-m-d");
	});
</script>