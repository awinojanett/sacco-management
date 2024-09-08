 <!---------------- Session starts form here ----------------------->
 <?php
	session_start();
	if (!$_SESSION["LoginMember"]) {
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
	?>
 <!---------------- Session Ends form here ------------------------>
 <title>Member - Sacco Name</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <?php include('../common/member-sidebar.php') ?>
 <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
 	<div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
 		<!-- <h4>Member Dashboard </h4>    -->
 		<div class="text-right d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
 			<h4 class="">Welcome: <?php $member_id = $_SESSION['LoginMember'];
									$query = "SELECT * FROM member_information where member_id='$member_id'";
									$run = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_array($run)) {
										echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];
									}
									?>
 		</div>
 	</div>

 	<div class="row">
 		<div class=" col-lg-10 col-md-12 col-sm-12 ">
 			<div>
 				<section class="mt-3">
 					<div class="btn btn-block table-one text-light d-flex">
 						<span class="font-weight-bold"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i> Sacco
 							Activities</span>
 						<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>

 					</div>
 					<div class="collapse show mt-2" id="collapseOne">
 						<table class="w-100 table-elements table-three-tr">
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
									$query = "SELECT *  FROM sacco_activities";
									$run = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_array($run)) {

										$id = $row['id'];
										$activity_name = $row['activity_name'];
										$expected_activity = $row['expected_activity'];
										$start_date = $row['start_date'];
										$end_date = $row['end_date'];
										$status = $row['status'];


										echo '<tr>
												<td>' . $id . '</td>
												<td> ' . $activity_name . '</td>
												<td>' . $expected_activity . '</td>
												<td> ' . $start_date . '</td>
												<td>' . $end_date . '</td>
												<td>' . $status . '</td>
												 
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