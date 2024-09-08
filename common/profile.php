<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	
	if ($_SESSION["unique_id"])
	{
		$unique_id=$_GET['unique_id'] ?? $_SESSION['unique_id'];
	}
	else if(!$_SESSION["unique_id"] && $_SESSION['unique_id']){
		$uniue_id=$_SESSION['unique_id'];
	}
	else{ ?>
		<script> alert("Your Are Not Authorize Person For This link");</script>
	<?php
		header('location:../login.php');
	}
	require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>
<?php include('../common/pcommonh.php') ?>
<!doctype html>
<html lang="en">
	<head>
		<title> Compassion Aluminis</title>
	</head>
	<body>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

	<style>
		img{
			border-radius: 50%;
		}
	</style>
<!-- <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100"> -->
 <div class="sub-main ">
	<?php
	$query="SELECT * from users where unique_id='$unique_id'";
	
	$run=mysqli_query($conn,$query);
	while ($row=mysqli_fetch_array($run)) {
		?>
		<div class="container  mt-1 border  mb-1">
			<div class="row text-white bg-secondary pt-5">
			
			<div class="col-md-4">
			<img class="ml-5 mb-5" height='250px' width='250px' src="../images/<?php echo $row['image']; ?>" alt="">
				 
					<!-- <img  height='150px' width='150px' src=<?php echo $row['image'];  ?> > -->
				</div>
				<div class="col-md-8">
					<h3 class="ml-2"> Welcome:<?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></h3><br>
					<div class="row">
						<div class="col-md-6">
							<h5>Username:</h5> <?php echo $row['uname']  ?> 
							<br><br>
							<h5>Date of Departure:</h5> <?php echo $row['date_of_depature']  ?><br><br>
							<!-- <h5>KE name:</h5> <?php echo $row['ke_name']  ?><br><br> -->
							
							
						</div>
						<div class="col-md-6">
						    <h5>Email:</h5> <?php echo $row['email_address']  ?><br><br>
							<!-- <h5>Cluster:</h5> <?php echo $row['cluster']  ?><br><br> -->
							<h5>Contact:</h5> <?php echo $row['phone_number']  ?><br><br>
						</div>		
					</div>
				</div>
				<hr>
			</div>
			<div class="row pt-3">
			    <div class="col-md-4"><h5>Job title:</h5> <?php echo $row['job_title']  ?><br><br></div>
				<div class="col-md-4"><h5>Company:</h5> <?php echo $row['company']  ?></div>
				<div class="col-md-4"><h5>Position:</h5> <?php echo $row['position']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Parmanent Address:</h5> <?php echo $row['permanent_address']  ?></div>
				<div class="col-md-4"><h5>Current Residence:</h5> <?php echo $row['current_residence']  ?></div>
				<div class="col-md-4"><h5>Home County:</h5> <?php echo $row['home_county']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>KE name:</h5> <?php echo $row['ke_name']  ?></div>
				<div class="col-md-4"><h5>Cluster:</h5> <?php echo $row['cluster']  ?></div>
				<div class="col-md-4"><h5>Sub Cluster:</h5> <?php echo $row['sub_cluster']  ?></div>
			</div>
			<div class = "align-right">
			<a href="edit.php"><button class="btn btn-success align-right">Edit</button></a> 
			</div>

		</div>
	
		
	<?php } ?>

	</div>
	</main>
</body>

<br><br> <br> <br><br>
<p class="footer-bottom-text">Copy Rights ©2022 GillOritech Solutions</p>
</html>
