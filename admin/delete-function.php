<?php  
// session_start();
// if (!$_SESSION["LoginAdmin"])
// {
// 	header('location:../login/login.php');
// }
	require_once "../connection/connection.php";
?>
	<?php 
	if (isset($_GET['member_id'])) {
		$member_id=$_GET['member_id'];
		$query1="DELETE FROM member_information WHERE member_information.member_id= '$member_id'";
		$run1=mysqli_query($con,$query1);
		if ($run1) {
			header('Location: member.php');
		}
		else{
			echo "Record not deleted. Frist of all delete record  from the child table then you can delete from here ";
			// header('Refresh: 5; url=member.php');
		}
	}
	?>
 