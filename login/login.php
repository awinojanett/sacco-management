<!-- PHP Starts Here -->
<?php  
	session_start();
	// if (!$_SESSION["unique_id"])
	// {
	// 	header('location:../login.php');
	// }
		require_once "../connection/connection.php";
	?>

<?php 
// session_start();
    require_once "../connection/connection.php"; 
    $message="Your Username or password is incorrect";
    if(isset($_POST["btnlogin"]))
    {
        $username=$_POST["email"];
        $password=$_POST["password"];

        $query="SELECT * FROM login WHERE member_id='$username' and password='$password' ";
        $result=mysqli_query($conn,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
                if ($row["role"]=="Admin" and $row["account_status"]=="Active")
                {
                    $_SESSION['LoginAdmin']=$row["member_id"];
                    header('Location: ../admin/admin-index.php');
                }
                else if ($row["role"]=="executive" and $row["account_status"]=="Active")
                {
                    $_SESSION['LoginExecutive']=$row["member_id"];
                    header('Location: ../executive/Executive-index.php');
                }
                else if ($row["role"]=="Member" and $row["account_status"]=="Active")
                {
                    $_SESSION['LoginMember']=$row['member_id'];
                    header('Location: ../member/member-index.php');
                }
            }
        }
        else
        { 
            header("location: login.php");
        }
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
    body {
        font: 14px sans-serif;
    }

    .wrapper {
        width: 360px;
        padding: 20px;
    }

    body {
        background-image: url("background.jpg");
        background-size: cover;
    }

    .wrapper {
        position: relative;
    }
    </style>
</head>

<body>

    <?php include('../common/commonh.php') ?>
    <section class="vh-100 bg-info">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <!-- <a class="nav-link" href="../profile.php">Back<span class="sr-only">(current)</span></a> -->
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="background.jpg" alt=" " class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="POST" action="login.php">
                                        <?php
                 $uname = "";
                 $password = "";
                 ?>

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <!-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> -->
                                            <span class="h1 fw-bold mb-0">Sacco Login</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                            <strong>Sacco </strong> account
                                        </h5>
                                        <div class="form-outline mb-4">
                                            <input type="text" name="email" id="form2Example17"
                                                class="form-control form-control-lg" />
                                            <label autocomplete="off" class="form-label" for="form2Example17">User
                                                Id</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" name="password" id="form2Example27"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>

                                        <div class="pt-1 mb-4">

                                            <button class="btn btn-dark btn-lg btn-block" name="btnlogin"
                                                type="submit">Login</button>

                                        </div>

                                        <a class="small text-muted" href="#!">Forgot password?</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                                href="registerform.php" style="color: #393f81;">Register</a></p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<p class="footer-bottom-text">Copy Rights ©2023 Oritech Solutions</p>