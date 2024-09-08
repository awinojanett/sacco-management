<!---------------- Session starts form here ----------------------->
<?php
session_start();

?>
<!---------------- Session Ends form here ------------------------>


<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php
if (isset($_POST['register'])) {
	$first_name = test_input($_POST["first_name"]);
	$middle_name = test_input($_POST["middle_name"]);
	$last_name = test_input($_POST["last_name"]);
	$member_id = test_input($_POST["member_id"]);
	if (preg_match("/^[a-zA-Z ]*$/", $member_id)) {
		$nameErr = "Only letters and white space allowed";
	}
	$id_number = test_input($_POST["id_number"]);
	$member_email = test_input($_POST["member_email"]);
	$gender = test_input($_POST["gender"]);
	$joining_date = test_input($_POST['joining_date']);
	$dissability = test_input($_POST['dissability']);
	$phone_number = test_input($_POST["phone_number"]);
	$dob = test_input($_POST["dob"]);
	$kra_pin = test_input($_POST["kra_pin"]);
	$county = test_input($_POST["county"]);
	$subcounty = test_input($_POST["subcounty"]);
	$ward = test_input($_POST["ward"]);
	$parmanent_address = test_input($_POST["parmanent_address"]);
	$next_of_kin = test_input($_POST["next_of_kin"]);
	$spause_name = test_input($_POST["spause_name"]);
	$profile_pic = isset($_POST["profile_pic"]) ? test_input($_POST["profile_pic"]) : "";
	$id_front = isset($_POST["id_front"]) ? test_input($_POST["id_front"]) : "";
	$id_back = isset($_POST["id_back"]) ? test_input($_POST["id_back"]) : "";
	$date = date("d-m-y");
	$password = $_POST['password'];
	$role = $_POST['role'];




	// *****************************************Images upload code starts here********************************************************** 
	$profile_pic = $_FILES['profile_pic']['name'];
	$tmp_name = $_FILES['profile_pic']['tmp_name'];
	$path = "images/" . $profile_pic;
	move_uploaded_file($tmp_name, $path);

	$id_front = $_FILES['id_front']['name'];
	$tmp_name = $_FILES['id_front']['tmp_name'];
	$path = "images/" . $id_front;
	move_uploaded_file($tmp_name, $path);

	$id_back = $_FILES['id_back']['name'];
	$tmp_name = $_FILES['id_back']['tmp_name'];
	$path = "images/" . $id_back;
	move_uploaded_file($tmp_name, $path);

	// *****************************************Images upload code end here********************************************************** 

	$query = "INSERT INTO member_information(first_name,middle_name,last_name,member_id,id_number,member_email,gender,joining_date,dissability,phone_number,dob,kra_pin,county,subcounty,ward,parmanent_address,next_of_kin,spause_name,profile_pic,id_front, id_back)
         VALUES('$first_name','$middle_name','$last_name','$member_id','$id_number','$member_email','$gender','$joining_date','$dissability','$phone_number','$dob','$kra_pin','$county','$subcounty','$ward','$parmanent_address','$next_of_kin','$spause_name','$profile_pic','$id_front','$id_back')";
	$run = mysqli_query($conn, $query);
	if ($run) {
		header('location: http://localhost/sacco/login/login.php');
	} else {
		echo "There was a problem when processing your data";
	}
	$query2 = "INSERT INTO login(member_id,password,Role)values('$member_id','$password','$role')";
	$run2 = mysqli_query($conn, $query2);
	if ($run2) {
		echo "Your Data has been submitted into login";
	} else {
		echo "Your Data has not been submitted into login";
	}
}
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>