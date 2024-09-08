<?php
session_start();
include_once "config.php";

$first_name = '';
$middle_name = '';
$last_name = '';
$phone_number = '';
$email_address = '';
$ke_name = '';
$ke_number = '';
$cluster = '';
$sub_cluster = '';
$beneficiary_number = '';
$job_title = '';
$company = '';
$current_residence = '';
$parmanent_address = '';
$position = '';
$home_county = '';
$uname = '';
if (isset($_POST['register'])) {
	$title = ($_POST['title']);
	$first_name = ($_POST['first_name']);
	$middle_name = ($_POST['middle_name']);
	$last_name = ($_POST['last_name']);
	$phone_number = ($_POST['phone_number']);
	$email_address = ($_POST['email_address']);
	$ke_name = ($_POST['ke_name']);
	$ke_number = ($_POST['ke_number']);
	$cluster = ($_POST['cluster']);
	$sub_cluster = ($_POST['sub_cluster']);
	$beneficiary_number = ($_POST['beneficiary_number']);
	$depature_date = ($_POST['depature_date']);
	$job_title = ($_POST['job_title']);
	$company = ($_POST['company']);
	$current_residence = ($_POST['current_residence']);
	$parmanent_address = ($_POST['parmanent_address']);
	$position = ($_POST['position']);
	$home_county = ($_POST['home_county']);
	$uname = ($_POST['uname']);
	$password = ($_POST['password']);


	// $confirmpassword = ($conn, $_POST['confirm_password']);
	// $profile_pic = ($conn, $_POST['profile_pic']);
	if (!empty($title) && !empty($first_name) && !empty($last_name) && !empty($phone_number) && !empty($email_address) && !empty($ke_name) && !empty($ke_number) && !empty($cluster) && !empty($sub_cluster) && !empty($beneficiary_number) && !empty($depature_date)) {
		if (filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
			$sql = mysqli_query($conn, "SELECT * FROM users WHERE email_address = '{$email_address}'");
			if (mysqli_num_rows($sql) > 0) {
				echo "$email_address - This email already exist!";
			} else {
				if (isset($_FILES['image'])) {
					$img_name = $_FILES['image']['name'];
					$img_type = $_FILES['image']['type'];
					$tmp_name = $_FILES['image']['tmp_name'];

					$img_explode = explode('.', $img_name);
					$img_ext = end($img_explode);

					$extensions = ["jpeg", "png", "jpg"];
					if (in_array($img_ext, $extensions) === true) {
						$types = ["image/jpeg", "image/jpg", "image/png"];
						if (in_array($img_type, $types) === true) {
							$time = time();
							$new_img_name = $time . $img_name;
							if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {

								$ran_id = rand(time(), 1000000000);
								$encrypt_pass = md5($password);
								$insert_query = "INSERT INTO users (unique_id,title,first_name,middle_name,last_name,phone_number,email_address,ke_name,ke_number,cluster,sub_cluster,beneficiary_number,date_of_depature,job_title,company,current_residence,permanent_address, position, home_county, uname, password, image)

                                VALUES ('$ran_id', '$title','$first_name', '$middle_name','$last_name','$phone_number','$email_address','$ke_name','$ke_number', '$cluster','$sub_cluster','$beneficiary_number','$depature_date','$job_title','$company','$current_residence','$parmanent_address','$position','$home_county','$uname','$encrypt_pass','$new_img_name')";
								$run = mysqli_query($conn, $insert_query);
								if ($run) {
									$select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email_address = '{$email_address}'");
									if (mysqli_num_rows($select_sql2) > 0) {
										$result = mysqli_fetch_assoc($select_sql2);
										header('location: common/user-index.php');
										$_SESSION['unique_id'] = $result['unique_id'];
										echo "success";
									} else {
										echo "This email address not Exist!";
									}
								} else {
									echo "Something went wrong. Please try again!";
								}
							}
						} else {
							echo "Please upload an image file - jpeg, png, jpg";
						}
					} else {
						echo "Please upload an image file - jpeg, png, jpg";
					}
				}
			}
		} else {
			echo "$email is not a valid email!";
		}
	} else {
		echo "All input fields are required!";
	}
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
}
?>
<?php include "common/header.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Compassion Aluminis</title>
	<link rel="stylesheet" href="style.css">
	<style>
		body {
			font: 16px sans-serif;
		}

		.wrapper {
			width: 100%;
			padding: 20px;
		}
	</style>
</head>

<body>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<div class="wrapper">
		<h2 class="text-center">Sign Up page</h2>
		<!-- <h2>Please fill this form to create an account and see some of your friends.</h2> -->
		<form style action="registration.php" method="POST" enctype="multipart/form-data">
			<div class="modal-body">
				<h3 class="modal-header bg-info text-white">Personal Details</h3>
				<div class="row mt-3">
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1"> Title: </label>
							<select class="browser-default custom-select" name="title" value="<?php echo $title ?>" required>
								<option>Select Title</option>
								<option value="Mr.">Mr</option>
								<option value="Mrs">Mrs</option>
								<option value="Miss">Miss</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputPassword1"> First Name:</label>
							<input type="text" name="first_name" class="form-control" required value="<?php echo $first_name ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputPassword1" required> Middle Name:</label>
							<input type="text" autocomplete="on" name="middle_name" class="form-control" required value="<?php echo $middle_name ?>">
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Last Name:</label>
							<input type="text" autocomplete="on" name="last_name" class="form-control" required value="<?php echo $last_name ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputPassword1">Phone Number :</label>
							<input type="number" name="phone_number" class="form-control" maxlength=10 required value="<?php echo $phone_number ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputPassword1">Email Address:</label>
							<input type="email" name="email_address" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required value="<?php echo $email_address ?>">
						</div>
					</div>
				</div>
				<br>
				<br>
				<br>
				<h3 class="modal-header bg-info text-white">Compassion details</h3>
				<div class="row mt-3">
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1"> KE Name </label>
							<input type="text" name="ke_name" class="form-control" maxlength=20 required value="<?php echo $ke_name ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputPassword1"> KE number</label>
							<input type="text" name="ke_number" class="form-control" required value="<?php echo $ke_number ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputPassword1">Cluster:</label>
							<select class="browser-default custom-select" name="cluster" value="<?php echo $cluster ?>" required>
								<option>Select Cluster</option>
								<option value="Busia">Busia</option>
								<option value="Embu">Embu</option>
								<option value="Kajiado">Kajiado</option>
								<option value="Kajiado Machakos">Kajiado Machakos</option>
								<option value="Kakamega">Kakamega</option>
								<option value="Kiambu Murang'a">Kiambu Murang'a</option>
								<option value="Kiambu Nairobi">Kiambu Nairobi</option>
								<option value="Kilifi">Kilifi</option>
								<option value="Kilifi-Ganze -Kaloleni">Kilifi Ganze Kaloleni</option>
								<option value="Kitui">Kitui</option>
								<option value="Kitui Machakos">Kitui Machakos</option>
								<option value="Kwale">Kwale</option>
								<option value="Laikipia">Laikipia</option>
								<option value="Makueni">Makueni</option>
								<option value="Meru">Meru</option>
								<option value="Migori-Narok">Migori-Narok</option>
								<option value="Mombasa-Kilifi">Mombasa-Kilifi</option>
								<option value="Nairobi">Nairobi</option>
								<option value="Narok">Narok</option>
								<option value="Nakuru">Nakuru</option>
								<option value="Narok-kaiado">Narok Kajiado</option>
								<option value="Samburu-Isiolo">Samburu-Isiolo</option>
								<option value="Siaya-Kisumu">Siaya-Kisumu</option>
								<option value="Taita Taveta">Taita Taveta</option>
								<option value="Tharaka Nithi-Embu">Tharaka Nithi-Embu</option>
								<option value="Vihiga Nandi Kisumu">Vihiga Nandi Kisumu</option>
							</select>
						</div>
					</div>
				</div>


				<div class="row mt-3">
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1"> Sub Cluster: </label>
							<input type="text" name="sub_cluster" class="form-control" maxlength=10 value="<?php echo $sub_cluster ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputPassword1"> Beneficiary number:</label>
							<input type="text" name="beneficiary_number" class="form-control" value="<?php echo $beneficiary_number ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputPassword1"> Date of Departure:</label>
							<input type="Date" name="depature_date" class="form-control" value="<?php echo $depaturedate_date ?>">
						</div>
					</div>
				</div>
				<br><br><br>

				<h3 class="modal-header bg-info text-white">Current job details</h3>

				<div class="row mt-3">
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1"> Job title: </label>
							<input type="text" name="job_title" class="form-control" maxlength=10 value="<?php echo $job_title ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputPassword1"> Company:</label>
							<input type="text" name="company" class="form-control" value="<?php echo $company ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputPassword1"> Position:</label>
							<input type="text" name="position" class="form-control" value="<?php echo $position ?>">

						</div>
					</div>
				</div>


				<div class="row mt-3">
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1"> Parmanent Address: </label>
							<input type="text" name="parmanent_address" class="form-control" value="<?php echo $parmanent_address ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputPassword1" required> Current residence:</label>
							<input type="text" name="current_residence" class="form-control" value="<?php echo $current_residence ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputPassword1" required> Home County:</label>
							<select class="browser-default custom-select" name="home_county" value="<?php echo $home_county ?>">
								<option>Select County</option>
								<option value="Mombasa">Mombasa</option>
								<option value="Kwale">Kwale</option>
								<option value="Kilifi">Kilifi</option>
								<option value="Tana River">Tana River</option>
								<option value="Lamu">Lamu</option>
								<option value="Taita/Taveta">Taita/Taveta</option>
								<option value="Garissa">Garissa</option>
								<option value="Wajir">Wajir</option>
								<option value="Mandera">Mandera</option>
								<option value="Marsabit">Marsabit</option>
								<option value="Isiolo">Isiolo</option>
								<option value="Meru">Meru</option>
								<option value="Tharaka-Nithi">Tharaka-Nithi</option>
								<option value="Embu">Embu</option>
								<option value="Kitui">Kitui</option>
								<option value="Machakos">Machakos</option>
								<option value="Makueni">Makueni</option>
								<option value="Nyandarua">Nyandarua</option>
								<option value="Nyeri">Nyeri</option>
								<option value="Kirinyaga">Kirinyaga</option>
								<option value="Murang'a">Murang'a</option>
								<option value="Kiambu">Kiambu</option>
								<option value="Turkana">Turkana</option>
								<option value="West Pokot">West Pokot</option>
								<option value="Samburu">Samburu</option>
								<option value="Trans Nzoia">Trans Nzoia</option>
								<option value="Uasin Gishu">Uasin Gishu</option>
								<option value="Elgeyo Marakwet">Elgeyo Marakwet</option>
								<option value="Nandi">Nandi</option>
								<option value="Baringo">Baringo</option>
								<option value="Laikipia">Laikipia</option>
								<option value="Nakuru">Nakuru</option>
								<option value="Narok">Narok</option>
								<option value="Kajiado">Kajiado</option>
								<option value="Kericho">Kericho</option>
								<option value="Bomet">Bomet</option>
								<option value="Kakamega">Kakamega</option>
								<option value="Vihiga">Vihiga</option>
								<option value="Bungoma">Bungoma</option>
								<option value="Busia">Busia</option>
								<option value="Siaya">Siaya</option>
								<option value="Kisumu">Kisumu</option>
								<option value="Homa Bay">Homa Bay</option>
								<option value="Migori">Migori</option>
								<option value="Kisii">Kisii</option>
								<option value="Nyamira">Nyamira</option>
								<option value="Nairobi">Nairobi</option>
							</select>
						</div>
					</div>
				</div>

				<br>
				<br>
				<br>
				<h3 class="modal-header bg-info text-white">Loging in details</h3>
				<div class="row mt-3">
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Preffered Username: </label>
							<input type="text" name="uname" class="form-control" required value="<?php echo $uname ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputPassword1"> Password:</label>
							<input type="password" name="password" class="form-control" required value="<?php echo $password ?>">
						</div>
					</div>
					<!-- <div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1" required> Repeat Password: </label>
												    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirmpassword ?>" >
											    </div>
											</div> -->
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputPassword1" required> Preffered photo: </label>
							<input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" class="form-control" required>
						</div>
					</div>
				</div>


			</div>

			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" name="register">
			</div>

	</div>

	</div>
	<p>Already have an account? <a href="login.php">Login here</a>.</p>
	</form>
	</div>
</body>
<p class="footer-bottom-text mt-auto">Copy Rights ©2023 Oritech Solutions</p>

</html>