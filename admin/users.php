
<?php
include_once'../classes/adminCRUD.php';
include_once'adminHeader.php';

$crud = new admincrud();

$result = $crud->searchUser();



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
				<label for="email">Searh By Email</label>
				<input type="text" name="searchEmail" id="searchEmail" placeholder="Enter Email">
				<span id="searchMsg"></span>
				<input type="button" name="search" id="search" class="button" value="search">
			</form>

		</div>

		<div class="search-result">
			<div class="table-wrapper">
				<table class="table table-striped">
					
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>License Number</th>
						</tr>
					</thead>

					<?php 
						if ($result->num_rows>0) { ?>
							
					<tbody>
						<?php  
							foreach ($result as $value) { ?>	

						<tr>
							<td><?php echo $value['firstName']; ?></td>
							<td><?php echo $value['lastName']; ?></td>
							<td><?php echo $value['email']; ?></td>
							<td><?php echo $value['licenseNo']; ?></td>
						</tr>
						<?php	
					}
						?>

					</tbody>

						<?php 
						}
					 ?>
			

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

			var email = $('#searchEmail').val();

			$.ajax({

				url:'../classes/admin_formValue.php',
				method:'POST',
				dataType:'JSON',
				data:{
					emailSearch: email
				},

				success:function(result){
					$('table').html('');

                                var tr;
                                tr = $('<tr/>');
                                tr.append("<th><font color='saddlebrown'>S.N</th>");
                                tr.append("<th><font color='saddlebrown'>First Name</th>");
                                tr.append("<th><font color='saddlebrown'>Last Name </th>");
                                tr.append("<th><font color='saddlebrown'>Email</th>");
                                tr.append("<th><font color='saddlebrown'>License Number</th>");
                                
                               

                                $('table').append(tr);

                                if (result) {


                                var counter = 1;
                                var msg = "No Data Found";
                                for (var i in result) {
                                    tr = $('<tr/>');
                                    tr.append("<td>" + counter + "</td>");
                                    tr.append("<td>" + result[i].firstName + "</td>");
                                    tr.append("<td>" + result[i].lastName + "</td>");
                                    tr.append("<td>" + result[i].email + "</td>");
                                    tr.append("<td>" + result[i].licenseNo + "</td>");
                                   
                                    

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

<script type="text/javascript">
	
	$(document).ready(function(){
		$('#search').prop("disabled",true);

		$('#searchEmail').on("keyup",function(){
			var email = $('#searchEmail').val();

			$.ajax({
				url:'../emailCheck.php',
				dataType:'JSON',
				method:'POST',
				data:{
					email:email
				},

				success:function(response){

					if (response.status) {
						$('#searchMsg').html(response.msg);
						$('#search').prop("disabled",false);
					}else{
						$('#searchMsg').html(response.msg);
						$('#search').prop("disabled",true);

					}

				}
			})
		});

	});


</script>