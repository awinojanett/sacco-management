<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	
	if ($_SESSION["LoginMember"])
	{
		$member_id=$_GET['member_id'] ?? $_SESSION['LoginMember'];
	}
	else if(!$_SESSION["LoginMember"] && $_SESSION['LoginMember']){
		$member_id=$_SESSION['LoginMember'];
	}
	else{ ?>
		<script> alert("Your Are Not Authorize Person For This link");</script>
	<?php
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Sacco Activities</title>
	</head>
	<body>
		<?php include('../common/member-sidebar.php') ?>  
		<?php require_once('../connection/connection.php')?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Sacco Activities </h4>
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
										 
										</td>
										 <?php  
											$query="SELECT *  from sacco_activities";
											$run=mysqli_query($conn,$query);
											while($row=mysqli_fetch_array($run)) {
                                             
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

