<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
		$_SESSION["LoginMember"]="";
	?>
<!---------------- Session Ends form here ------------------------>

 
<!doctype html>
<html lang="en">
	<head>
		<title>Admin -Defaulters</title>
	</head>
	<body>
    	<?php include('../common/commonh.php') ?>
		<?php include('../common/admin-sidebar.php') ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div  class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Loan Defaulters list</h4>
					
					</div>
						

				</div>
			
		
				<table class="w-100 table-elements mb-3 table-three-tr text-left" cellpadding="10">
								<tr class="table-tr-head table-three text-white ml-0">
									<th>Loan ID </th>
									<th>Member Id</th>
									<th>Name</th>
                                    <th>Phone Number</th>
									<th>Amount Owing</th>
									<th>Application Date</th>
                                    <th>Period</th>
                                    <th>Total Payment </th>
		                            <th>Repay Date </th>
								
                                    
						 
								</tr> 
								<?php 
                  $sql = "SELECT * FROM loan_applicants JOIN member_information ON member_information.member_id=loan_applicants.member_id";
                  $result= mysqli_query($conn,$sql);
                  if($result){
                  while($row=mysqli_fetch_assoc($result)){
                   $loan_id = $row['loan_id'];
                   $member_id=$row['member_id'];
                   $first_name=$row['first_name'];
                   $middle_name=$row['middle_name'];
				   $phone_number=$row['phone_number'];
                   $requested_amount=$row['requested_amount'];
				   $date_requested=$row['date_requested'];
                   $period = $row['period'];
                   $total_payment=$row['total_payment'];
				   $paying_date=$row['paying_date'];
				   $loan_status =$row['loan_status'];

                  echo '<tr>
                  <td>'.$loan_id.'</td>
                  <td>'.$member_id.'</td>
                  <td> '.$first_name.' '.$middle_name.'</td>
				  <td>'. $phone_number.'</td>
                  <td>'.$requested_amount.'</td>
		          <td> '.$date_requested.'</td>
                  <td>'.$period.'</td>
                  <td>'.$total_payment.'</td>
                  <td>'.$paying_date.'</td>
		      
                 
                  </tr>';
                     }
                   }
				   
?>
				</table>
				<!-- <button onclick="generatePDF()"></button> -->
				<a href="exporttopdf.php"><button class="btn btn-success">Download as PDF</button></a>
			 
				<div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					   <div class="modal-dialog modal-lg">
						   
						</section>
					</div>
				</div>	 
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
		<script src="html2pdf.bundle.min.js"></script>
		</div>
	</body>
</html>

 