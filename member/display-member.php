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
		<title>Admin - Members Information</title>
	</head>
	<body>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<?php include('../common/member-sidebar.php') ?> 
<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
 <div class="sub-main ">
	<?php
	$query="SELECT * from member_information where member_id='$member_id'";
	
	$run=mysqli_query($conn,$query);
	while ($row=mysqli_fetch_array($run)) {
		?>
		<div class="container  mt-1 border  mb-1">
			<div class="row text-white bg-secondary pt-5">
			
			<div class="col-md-4">
					<?php  $profile_pic = $row["profile_pic"] ?>
					<img class="ml-5 mb-5" height='250px' width='250px' src = <?php echo " images/$profile_pic"  ?> >
				</div>
				<div class="col-md-8">
					<h3 class="ml-5"><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></h3><br>
					<div class="row">
						<div class="col-md-6">
							<h5>Member Id:</h5> <?php echo $row['member_id']  ?><br><br>
							<h5>Date of Birth:</h5> <?php echo $row['dob']  ?><br><br>
							<h5>Gender:</h5> <?php echo $row['gender']  ?><br><br>
							
							
						</div>
						<div class="col-md-6">
						    <h5>Email:</h5> <?php echo $row['member_email']  ?><br><br>
							<h5>KRA PIN:</h5> <?php echo $row['kra_pin']  ?><br><br>
							<h5>Contact:</h5> <?php echo $row['phone_number']  ?><br><br>
						</div>		
					</div>
				</div>
				<hr>
			</div>
			<div class="row pt-3">
			    <div class="col-md-4"><h5>Dissability:</h5> <?php echo $row['dissability']  ?><br><br></div>
				<div class="col-md-4"><h5>Joining Date:</h5> <?php echo $row['joining_date']  ?></div>
				<div class="col-md-4"><h5>Id number:</h5> <?php echo $row['id_number']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>County:</h5> <?php echo $row['county']  ?></div>
				<div class="col-md-4"><h5>Sub County:</h5> <?php echo $row['subcounty']  ?></div>
				<div class="col-md-4"><h5>ward:</h5> <?php echo $row['ward']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Parmanent Address:</h5> <?php echo $row['parmanent_address']  ?></div>
				<div class="col-md-4"><h5>Next of kin:</h5> <?php echo $row['next_of_kin']  ?></div>
				<div class="col-md-4"><h5>Spause Name:</h5> <?php echo $row['spause_name']  ?></div>
			</div>
			 
		</div>
	<?php } ?>

	</div>
	</main>
</body>
</html>
