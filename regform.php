<?php
require_once "connection/connection.php";
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



<?php include('common/commonh.php') ?>
<!-- <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100"> -->
<div class="container">
    <br>
    <div class="sub-main">

        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h4 class=" text-center">Become a new member</h4>
                </div>
            </div>
            <div class="modal-body">

                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> First Name: </label>
                            <input type="text" autocomplete="off" name="first_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1"> Middle Name:</label>
                            <input type="text" name="middle_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1" required> Last Name:</label>
                            <input type="text" autocomplete="off" name="last_name" class="form-control" required>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Member Id:</label>
                            <input type="text" autocomplete="off" name="member_id" class="form-control" maxlength=4
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">ID number:</label>
                            <input type="number" name="id_number" class="form-control" maxlength=8 required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Member Email:</label>
                            <input type="email" name="member_email" class="form-control"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                        </div>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Gender </label>
                            <select class="browser-default custom-select" name="gender" required>
                                <option>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1"> Joining Date:</label>
                            <input type="Date" name="joining_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1" required> PWD:</label>
                            <select class="browser-default custom-select" name="dissability" required>
                                <option>Select One</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Phone Number: </label>
                            <input type="text" name="phone_number" class="form-control" maxlength=10 required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1"> Date of Birth:</label>
                            <input type="Date" name="dob" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1" required> KRA PIN:</label>
                            <input type="text" name="kra_pin" class="form-control" required>
                        </div>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> County: </label>
                            <input type="text" name="county" class="form-control" maxlength=10 required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1"> Subcounty:</label>
                            <input type="text" name="subcounty" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1" required> Ward:</label>
                            <input type="text" name="ward" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Parmanent Address: </label>
                            <input type="text" name="parmanent_address" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1"> Next Of Kin:</label>
                            <input type="text" name="next_of_kin" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1" required> Spause Name:</label>
                            <input type="text" name="spause_name" class="form-control">
                        </div>
                    </div>
                </div>



                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Profile picture: </label>
                            <input type="file" name="profile_pic" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1"> ID front:</label>
                            <input type="file" name="id_front" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1" required> ID back: </label>
                            <input type="file" name="id_back" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- _________________________________________________________________________________
								  											Hidden Values are here
								  		_________________________________________________________________________________ -->
                <div>
                    <input type="hidden" name="password" value="$id_number">
                    <input type="hidden" name="role" value="Member">
                </div>
                <!-- _________________________________________________________________________________
								  											Hidden Values are end here
								  		_________________________________________________________________________________ -->

            </div>

            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" name="register">
            </div>





    </div>
</div>
</form>
</div>