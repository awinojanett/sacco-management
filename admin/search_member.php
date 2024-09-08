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



<!---------------- Search member form here ------------------------>

<?php
	if(isset($_POST["search"]))
    {
		$member_id = $_POST['search'];
        $query="SELECT * from member_information where member_id='$member_id' ";
        $result=mysqli_query($conn,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
				echo $_SESSION['LoginMember']=$row['member_id'];
				header('Location: ../Member/member-index.php');
            }
        }
        else
        { 
            header("Location:member.php");
        }
	}
	
?>

<!---------------- Search member form here ------------------------>