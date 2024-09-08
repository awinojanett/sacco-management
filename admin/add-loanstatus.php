 
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


<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Members loan Status score</title>
	</head>
	<body>
	<?php include('../common/commonh.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Members loan Status score</h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="add-loanstatus.php" method="post">
							<div class="row mt-3">
								<div class="col-md-6">
									<div class="form-group">
										<label>Enter Member Id:</label>
										<div class="d-flex">
											<input type="text" class="form-control" name="member_id" placeholder="Enter Member Id">
											<input type="submit" name="submit" class="btn btn-primary px-4 ml-4" value="Press">
										</div>
									</div>
								</div>
								<div class="col-md-6 align-items-baseline pt-4">
								</div>
							</div>	
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="border mt-3">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
							<tr class="table-tr-head table-three text-white">
						        	<th>Member Id.</th>
									<th>Name</th>
									<th>Credit status</th>
									<th>Qualified Amount (Ksh) </th>
									<th>Interest rate</th>
									<th>Confirm Id</th>
								</tr>
								<?php  
									if (isset($_POST['submit'])) {
									$member_id=$_POST['member_id'];
									$que="SELECT * FROM member_information WHERE member_id = $member_id ";
									$result= mysqli_query($conn,$que);
									if($result){
										while($row=mysqli_fetch_assoc($result))  { 
											$member_id=$row['member_id'];
											$first_name=$row['first_name'];
											$middle_name=$row['middle_name'];
											$last_name=$row['last_name'];
										
	 
											echo '<tr>
											<form action="add-loanstatus.php" method="POST">
											<td>'.$member_id.'</td>
											<td> '.$first_name.' '.$middle_name.' '.$last_name.'</td>
											<td>  <label for="Credit Status"></label> 
											<select class="browser-default custom-select" name="credit_status" required>
											<option>Select Credit Score</option>
											<option value="Bad">Bad</option>
											<option value="Good">Good</option>
											
										  </select>
											</td>
											<td>
											<input type="text" name="qualified_amount" class="form-control" placeholder="Qualified Amount"> </td>
											<td>  <label for="qualified_amount"></label> 
											<select class="browser-default custom-select" name="rate" required>
											<option>Interest Rate</option>
											<option value="20%">20%</option>
											<option value="15%">15%</option>
										  </select>
											</td>
											<input type="hidden" name="status" value="Approved">
											<td>
											<input type="text" name="member_id" class="form-control" placeholder="Confirm ID"> </td>
											<input type="submit" name="subm">
										</form>
										</tr>';
									 
										}
									    }
									    }

										?>
										
										
							</table>
								<br>
								<hr>
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
							<tr class="table-tr-head table-three text-white">
									<th>Member Id.</th>
									<th>Name.</th>
									<th>ID number</th>
									<th>Gender</th>
									<th>Phone number</th>
									<th>Credit status</th>
									<th>Qualified Amount (Ksh)</th>
									<th>Interest rate</th> 
								</tr>
								<?php  
										$query="SELECT * FROM member_information JOIN member_loan_sts ON member_loan_sts.member_id = member_information.member_id ";
									$result= mysqli_query($conn,$query);
									if($result){
										while($row=mysqli_fetch_assoc($result))  { 
										$member_id=$row['member_id'];
										$first_name=$row['first_name'];
										$middle_name=$row['middle_name'];
										$last_name=$row['last_name'];
										$id_number=$row['id_number'];
										$gender=$row['gender'];
										$phone_number=$row['phone_number'];
										$credit_status = $row['credit_status'];
										$qualified_amount = $row['qualified_amount'];
                                        $rate =$row['rate'];

										echo '<tr>
										<td>'.$member_id.'</td>
								    	<td> '.$first_name.' '.$middle_name.' '.$last_name.'</td>
									 	<td>'.$id_number.'</td>
								     	<td>'.$gender.'</td>
										<td> '.$phone_number.'</td>
										<td> '.$credit_status.'</td>
										<td> '.$qualified_amount.'</td>
										<td> '.$rate.'</td>
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
<?php
if (isset($_POST['subm'])) {
 	$member_id=$_POST['member_id'];
 	$credit_status=$_POST['credit_status'];
	$qualified_amount=$_POST['qualified_amount'];
 	$rate=$_POST['rate'];
    $status = $_POST['status'];
	$que="INSERT INTO member_loan_sts(member_id,credit_status,qualified_amount,rate,status) VALUES('$member_id','$credit_status','$qualified_amount','$rate','$status')";
	$result=mysqli_query($conn,$que);
	if ($result) {
			echo "Insert Successfully";
			 
		}	
		else{
			echo " Insert Not Successfully";
		}
	}

?>



