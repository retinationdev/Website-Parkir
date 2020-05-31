
<?php
include_once'../classes/adminCRUD.php';
include_once'adminHeader.php';


$crud = new admincrud();

$result = $crud->bookingHistory();



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

		<div class="search">

			<form action="">
				<label for="dateFrom">Date From</label>
				<input type="date" name="dateFrom" id="dateFrom">
				<label for="dateTo">Date To</label>
				<input type="date" name="dateTo" id="dateTo">
				<input type="button" name="search" id="search" class="button" value="search">
			</form>

		</div>

		<div class="search-result">
			<div class="table-wrapper">
	
				
				<table class="table table-striped">

				</table>

			</div>
		</div>

	</div>
	
</div>
<!-- main ends here -->

<!-- </div> -->


<?php
include_once'../views/footer.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

	$(document).ready(function(){

		$('#search').on("click",function(){

			var dateFromAjax = $('#dateFrom').val();
			var dateToAjax = $('#dateTo').val();

			if (dateFromAjax == "" || dateToAjax=="") {
				alert('Empty fields');
				return false;
			}

			if (dateFromAjax > dateToAjax) {
				alert('select correct date');
				return false;	
			}

			$.ajax({

				url:'../classes/admin_formValue.php',
				method:'POST',
				dataType:'JSON',
				data:{
					dateFrom:dateFromAjax,
					dateTo:dateToAjax
				},

				success:function(result){
					$('table').html('');

                                var tr;
                                tr = $('<tr/>');
                                tr.append("<th><font color='saddlebrown'>S.N</th>");
                                tr.append("<th><font color='saddlebrown'>Booking Date</th>");
                                tr.append("<th><font color='saddlebrown'>Parking Slot id </th>");
                                tr.append("<th><font color='saddlebrown'>Vehicle number</th>");
                                
                               

                                $('table').append(tr);

                                if (result) {


                                var counter = 1;
                                var msg = "No Data Found";
                                for (var i in result) {
                                    tr = $('<tr/>');
                                    tr.append("<td>" + counter + "</td>");
                                    tr.append("<td>" + result[i].bookingDate + "</td>");
                                    tr.append("<td>" + result[i].parkingSlot_id + "</td>");
                                    tr.append("<td>" + result[i].vehicleNo + "</td>");
                                   
                                    

                                    $('table').append(tr);
                                    counter++;

                                }
                            }else{
                            	tr = $('<tr/>');
                            	tr.append("<td>"+msg+"</td>");
                            	$('table').append(tr);
                            }
					
					
						// for (var i = response.length - 1; i >= 0; i--) {
						// 	 var trHTML = '';
						// 	 // trHTML += '<tr><td><strong>' + response[i].user_id+'</strong></td><td><span class="label label-success">'+response[i].bookingDate +'</span></td><td>'+response[i].parkingSlots_id+'</td></tr>';
						// 	 //  $('#table-wrapper').html(trHTML); 
						// 	console.log(response[i].vehicleNo);
						// }
				
				}

			});
		});

	});
	
</script>