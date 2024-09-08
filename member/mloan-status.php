<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginMember"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>Loan Status</title>
	</head>
	<body>
	 
		<?php include('../common/member-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main ">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">My loan Status score</h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<section class="border mt-3">
							<table class="w-100 table-elements table-three-tr" cellpadding="10">
								<tr>
									<th colspan="9"><h4 class="text-center">My Credit Score</h4 class="text-center"></th>
								</tr>
								<tr  class="table-tr-head table-three text-white">
									<th>My Id.</th>
									<th>Credit status</th>
									<th>Qualified Amount (Ksh) </th>
									<th>Interest rate</th>
									<th>Status</th>
								</tr>
								<?php 
								
								$member_id=$_SESSION['LoginMember'];
									$query="SELECT * FROM member_information INNER JOIN member_loan_sts ON member_loan_sts.member_id = member_information.member_id WHERE member_information.member_id = $member_id";
								 
									$result=mysqli_query($conn,$query);

									if($result){
									while($row=mysqli_fetch_assoc($result))  { 
										$member_id=$row['member_id'];
										$first_name=$row['first_name'];
										$middle_name=$row['middle_name'];
										$last_name=$row['last_name'];
										$credit_status=$row['credit_status'];
										$qualified_amount=$row['qualified_amount'];
										$rate=$row['rate'];
										$status = $row['status'];
										
										echo '<tr>
									 
										<td>'.$member_id.'</td>
										<td> '.$credit_status.'</td>
										<td>'.$qualified_amount.'</td>
										<td>'.$rate.'</td>
										<td>'.$status.'</td>
									
										</tr>';
									}
									}
								?>
							</table>				
						</section>
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>