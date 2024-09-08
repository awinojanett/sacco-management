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
		<title>Admin - Nominal list</title>
	</head>
	<body>
	<?php include('../common/commonh.php') ?>
		<?php include('../common/admin-sidebar.php') ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div  class="sub-main"id= "invoice">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Members Nominal Roll </h4>
					
					</div>
						

				</div>
				
		
				<table class="w-100 table-elements mb-3 table-three-tr text-left" cellpadding="10">
								<tr class="table-tr-head table-three text-white ml-0">
									<th>Member ID </th>
									<th>Name</th>
									<th>ID number</th>
									<th>Phone number</th>
                                    <th>KRA PIN</th>
									<th>Gender</th>
									<th>Date of Birth</th>
									<th>Joining Date</th>
									<th>County</th>
                                    <th>Status</th>
						 
								</tr> 
								<?php 
				 
				  $query="SELECT * FROM member_information JOIN login ON login.member_id = member_information.member_id ";
                  $result= mysqli_query($conn,$query);
                  if($result){
                  while($row=mysqli_fetch_assoc($result)){
                   $member_id=$row['member_id'];
                   $first_name=$row['first_name'];
                   $middle_name=$row['middle_name'];
                   $last_name=$row['last_name'];
                   $id_number=$row['id_number'];
				   $phone_number=$row['phone_number'];
                   $kra_pin = $row['kra_pin'];
				   $gender=$row['gender'];
				   $dob=$row['dob'];
				   $joining_date=$row['joining_date'];
				   $county =$row['county'];
				   $account_status =$row['account_status'];
                 
                  echo '<tr>
                  <td>'.$member_id.'</td>
                  <td> '.$first_name.' '.$middle_name.' '.$last_name.'</td>
                  <td>'.$id_number.'</td>
		          <td> '.$phone_number.'</td>
                  <td>'.$kra_pin.'</td>
                  <td>'.$gender.'</td>
                  <td>'.$dob.'</td>
		          <td>'.$joining_date.'</td>
				  <td>'.$county.'</td>
                  <td>'.$account_status.'</td>
                  </tr>';
                     }
                   }
				   
?>
				</table>
				 <!-- <button onclick="generatePDF()">Download as pdf</button>  -->
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
		<script>
			function generatePDF() {
				// Choose the element that our invoice is rendered in.
				const element = document.getElementById('invoice');
				// Choose the element and save the PDF for our user.
				html2pdf().from(element).save();
			}
		</script>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/html2pdf.js"></script>
		<!-- <script src="html2pdf.bundle.min.js"></script> -->
		</div>
	</body>
</html>

 