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
		<title>Members Savings</title>
	</head>
	<body>
	   <?php require_once ('../connection/connection.php') ?>
		<?php include('../common/member-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			 <div class="sub-main ">
			    <div class="d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="w-100  table-hover">My Savings Summary</h4>
				 </div> 
				      
							<table class="w-100 table-striped table-hover" cellpadding="10">	 
							<th colspan="9"><h4 class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">Savings details</h4 class="text-center"></th>
                       					 
								
								<tr>
									<th>Tr Id.</th>
									<th>Amount Paid (Ksh)</th>
									<th>Payment Mode </th>
									<th>Posting Date</th>
									<th>Status</th>
								</tr>

								<?php 
								    $member_id=$_SESSION['LoginMember'];
									$query="SELECT * FROM members_savings  WHERE member_id = $member_id ORDER BY payment_date DESC ";
								 
									$result=mysqli_query($conn,$query);

									if($result){
									while($row=mysqli_fetch_assoc($result))  { 
										$transaction_id =$row['transaction_id'];
										$payment_mode=$row['payment_mode'];
										$amount_paid=$row['amount_paid'];
										$payment_date=$row['payment_date'];
										$status=$row['status'];
										
										echo '<tr>
									 
										<td>'.$transaction_id.'</td>
										<td>'.$amount_paid.'</td>
										<td>'.$payment_mode.'</td>
										<td> '.$payment_date.'</td>
										<td>'.$status.'</td>
									
										</tr>';
									}
									}
									
								?> 
								
							</table>
							<br>
							<br>
							<?php
								$query1= "SELECT SUM(amount_paid) FROM members_savings WHERE member_id = $member_id ";
										$result1= mysqli_query($conn,$query1);
										 $row = mysqli_fetch_array($result1);
										  echo '<b> Total Savings:</b> '. $row[0];
										 ?>				
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>