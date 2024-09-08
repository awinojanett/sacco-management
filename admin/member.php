<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
		$_SESSION["LoginMember"]="";

		if(isset($_GET['member_id']))
{
       $member_id=$_GET['member_id'];
       $msg=mysqli_query($con,"delete from users where id='$member_id'");
       if($msg)
     {
       echo "<script>alert('Data deleted');</script>";
      }
        }
	?>
<!---------------- Session Ends form here ------------------------>

 
<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Register Member</title>
	</head>
	<body>
		
    	<?php include('../common/commonh.php') ?>
		<?php include('../common/admin-sidebar.php') ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Members Management System </h4>
						<a href="regform.php"> <button type="button" class="btn btn-primary ml-5" > Add Member</button> </a>
					
					</div>
						

				</div>
				       <div class="col-md-6">
				           <form action="search_member.php" method="post">
										<div class="form-group">
											<label for="exampleInputPassword1"><h5>Search:</h5></label>
											<div class="d-flex">
												<input type="text" name="search" id="search" class="form form-control" placeholder="Member ID">
												<input class="btn btn-primary px-4 ml-4" type="submit" name="btnSearch" value="Search">
											</div>
										</div>
					          
							</form>
							</div>
				<table class="w-100 table-elements mb-3 table-three-tr text-left" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
									<th>Member ID</th>
									<th>Name</th>
									<th>ID number</th>
									<th>Phone number</th>
									<th>Gender</th>
									<th>Date of Birth</th>
									<th>Joining Date</th>
									<th>County</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
								<?php 
                  $sql = "SELECT * FROM member_information ORDER BY member_id DESC";
                  $result= mysqli_query($conn,$sql);
                  if($result){
                  while($row=mysqli_fetch_assoc($result)){
                   $member_id=$row['member_id'];
                   $first_name=$row['first_name'];
                   $middle_name=$row['middle_name'];
                   $last_name=$row['last_name'];
                   $id_number=$row['id_number'];
				   $phone_number=$row['phone_number'];
				   $gender=$row['gender'];
				   $dob=$row['dob'];
				   $joining_date=$row['joining_date'];
				   $county =$row['county'];
                 
                  echo '<tr>
                  <td>'.$member_id.'</td>
                  <td> '.$first_name.' '.$middle_name.' '.$last_name.'</td>
                  <td>'.$id_number.'</td>
				  <td> '.$phone_number.'</td>
				  <td> '.$gender.' </td>
                  <td>'.$dob.'</td>
                
		          <td>'.$joining_date.'</td>
				  <td>'.$county.'</td>
				  <td><a href="member.php?member_id =<?php echo '.$member_id.' ?>";><button type="button" name = "btn_update" class="btn btn-danger">Delete</button></a></td>
				 <td><a href="member.php"><button type="button" class="btn btn-success">Edit</button></a>   </td>
				  </td>
				  
                  </tr>';
                     }
                   }
				   
?>
   <a href="update-profile.php?uid=<?php echo $row['member_id'];?>"> 
				</table>	
					
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
		
	</body>
</html>

 