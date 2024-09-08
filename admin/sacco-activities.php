<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php 
 
 	if (isset($_POST['submit']))
{
	$id=$_POST["id"];
	$activity_name=$_POST["activity_name"];
	$expected_activity=$_POST["expected_activity"];		
	$start_date=$_POST["start_date"];	
	$end_date=$_POST["end_date"];	
 	$status=$_POST["status"];	
 		$query="INSERT INTO sacco_activities(id,activity_name,expected_activity,start_date,end_date,status)VALUES('$id','$activity_name','$expected_activity','$start_date','$end_date','$status')";
 		$run=mysqli_query($conn, $query);
 		if ($run) {
			header('location:../admin/sacco-activities.php');
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}
 	}
?>

<!-- ---------------------------------------update time table------------------------------------------------ -->
<?php 
 
 	if (isset($_POST['btn_update'])) {
 		echo $id=$_POST["id"];
 		echo $activity_name=$_POST["activity_name"];
 		echo $expected_activity=$_POST["expected_activity"];	
 		echo $start_date=$_POST["start_date"];	
 		echo $end_date=$_POST["end_date"];	
 		echo $subject_code=$_POST["subject_code"];
 		echo $status=$_POST["status"];
 		$query1="update sacco_activities set activity_name='$activity_name','$timing_from',timing_to='$timing_to' where subject_code='$subject_code'";
 		$run1=mysqli_query($conn, $query1);
 		if ($run1) {
 			echo "Your Data has been updated";
 		}
 		else {
 			echo "Your Data has not been updated";
 		}
 	}
?>
<!-- ---------------------------------------update time table------------------------------------------------ -->

<!--*********************** PHP code end from here for data insertion into database ******************************* -->

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Sacco Activities</title>
	</head>
	<body>
	    <?php include('../common/commonh.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Sacco Activities </h4>
					<a href="activityform.php"><button type="button" class="btn btn-primary ml-5">Add activity</button></a>
					</div>
				</div>
				<table class="w-100 table-elements table-three-tr" >  
				<tr class="table-tr-head table-three text-white">
				<!-- <td colspan="5" class="text-center text-white">				  -->
											<th>Id</th>
											<th>Activity name</th>
											<th>Expected Activity</th>
											<th>Start Date</th>
											<th>End date</th>
											<th>Status</th>
											<th>Operation</th>
										 
										</td>
										 <?php  
											$query="SELECT *  from sacco_activities ORDER BY start_date DESC";
											$run=mysqli_query($conn,$query);
											while($row=mysqli_fetch_assoc($run)) {
                                             
												$id=$row['id'];
												$activity_name=$row['activity_name'];
												$expected_activity=$row['expected_activity'];
												$start_date=$row['start_date'];
												$end_date=$row['end_date'];
												$status=$row['status'];
												

												echo '<tr>
												<td>'.$id.'</td>
												<td> '.$activity_name.'</td>
												<td>'.$expected_activity.'</td>
												<td> '.$start_date.'</td>
												<td>'.$end_date.'</td>
												<td>'.$status.'</td>
												<td><a href="activityform.html"><button type="button" name = "btn_update" class="btn btn-success">Edit</button></a>
												<a href="activityform.html"><button type="button" class="btn btn-danger">Delete</button></a>
												</td>
												</tr>';
												
											}
										?>
			 
										
									</table>
								</div>
							</div>				
						</section>
					</div>
				</div>
			</div>
		</main>
	<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

