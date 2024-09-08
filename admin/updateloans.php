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
		<title>Admin -Uwezo sacco</title>
	</head>
	<body>
	    <?php include('../common/commonh.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
<div class="row">
					<div class="col-md-12">
						<form action="updateloans.php" method="post">
							<div class="row mt-3">
								<div class="col-md-6">
									<div class="form-group">
										<label>Enter Loan Id:</label>
										<div class="d-flex">
											<input type="text" class="form-control" name="loan_id" placeholder="Loan Id">
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
									<th>Loan Id.</th>
                                    <th>Amount taken</th>
									<th>Transaction Id</th>
									<th>Amount  paid</th>
									<th>Payment Mode</th>
                                    <th>Comments</th>
								</tr>
								<?php  
									if (isset($_POST['submit'])) {
									    $loan_id=$_POST['loan_id'];
									$que="SELECT * FROM loan_applicants  WHERE loan_id = $loan_id ";
									$result= mysqli_query($con,$que);
									if($result){
										while($row=mysqli_fetch_assoc($result))  { 
										$loan_id=$row['loan_id'];
									    $first_name=$row['first_name'];
                                        $requested_amount= $row['requested_amount'];
									
 
										echo '<tr>
										<form action="" method="POST">
										 
										<td>'.$loan_id.'</td>
                                        <td>'.$requested_amount.'</td>
							           <td> <input type="text" name="transaction_id" class="form-control" placeholder="Tr Id"> </td>
										<td>
										<input type="text" name="amount_paid" class="form-control" placeholder="Enter Amount"> </td>
									
										<td>  <label for="payment_mode"></label> 
										<select class="browser-default custom-select" name="payment_mode" required>
										<option>Select Payment Mode</option>
										<option value="Cash">Cash</option>
										<option value="Mpesa">Mpesa</option>
										<option value="Bank">Bank</option>
									  </select>
										</td>
										<td><input type="text" name="comment" class="form-control" placeholder="comment"> </td>
										
										<input type="submit" name="subm">
										</form>
										</tr>';
									 
										}
									    }
									    }

										?>

<?php
if (isset($_POST['subm'])) {
    $loan_id = $_POST['loan_id'];
 	$tr_id=$_POST['transaction_id'];
 	$amount_paid=$_POST['amount_paid'];
	$payment_mode=$_POST['payment_mode'];
 	$comment=$_POST['comment'];

	 $loan_id=$_POST['loan_id'];
	$que="INSERT INTO loan_applicants(tranasction_id,amount_paid,payment_mode,pst) VALUES('$tr_id','$amount_paid','$payment_mode','$comment')";
	$result=mysqli_query($con,$que);
	if ($result) {
			echo "Insert Successfully";
			 
		}	
		else{
			echo " Insert Not Successfully";
		}
	}

?>
										