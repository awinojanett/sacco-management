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

                                <tr>
									
								</tr>
								<!doctype html>
<html lang="en">
	<head>
		<title>Member- Members Savings</title>
	</head>
	<body>

		<?php include('../common/member-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>My loan information </h4>
					<a href="lapplicform.php"><button type="button" class="btn btn-primary ml-5">Apply loan</button></a>
				</div>
				
				</div>
				<!-- <div class="row"> -->
					<div class="col-md-12 ml-2">
						<section class="border mt-3">
							 
								<br>
								
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
							<tr class="table-tr-head table-three text-white">
							      <th>Loan Id.</th>
								  <th>Amount requested (Ksh)</th>
								  <th>Date requested </th>
								  <th>Time</th>
								  <th>Repayment date</th>
								  <th>Interest</th>
								  <th>Total Repayment</th>
								  <th>Status</th>
								  <th>Repay status</th>
								</tr>
								<?php  
                                     $member_id=$_SESSION['LoginMember'];
									$query="SELECT * FROM member_information INNER JOIN loan_applicants ON loan_applicants.member_id = member_information.member_id WHERE member_information.member_id = $member_id";
									$result= mysqli_query($conn,$query);
									if($result){
										while($row=mysqli_fetch_assoc($result))  { 
										$loan_id = $row['loan_id'];
										$member_id=$row['member_id'];
										$requested_amount =$row['requested_amount'];
										$requested_date=$row['date_requested'];
										$period=$row['duration'];
										$status = $row['status'];
										$payment_sts = $row['psts'];

										$intrest = $requested_amount*0.15;

										$total_repay = $requested_amount + $intrest;

										$Today = date('y:m:d',time());
										$new = date('l, F d, Y', strtotime($Today));
										 $Date = $new;
										
										 $newDate = date('Y-m-d', strtotime($Date. ' + 30 days'));
 
										echo '<tr>
										<td>'.$loan_id.'</td>
								    	<td> '.$requested_amount.' </td>
									 	<td>'.$requested_date.'</td>
								     	<td>'.$period.'</td>
										<td> '.$newDate.'</td>
										<td> '.$intrest.'</td>
										<td>'.$total_repay.'</td>
										<td> '.$status.'</td>
										<td> '.$payment_sts.'</td>
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