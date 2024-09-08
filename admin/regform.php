<?php include('../common/commonh.php') ?>
<?php include('../common/admin-sidebar.php') ?>
<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
    <div class="sub-main">

        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/footer.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Nema Sacco</title>
        <form action="process.php" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <!-- <form class="row g-3"> -->
                    <h4 class=" text-center">Add New Member</h4>
                    <a href="member.php" class="row g-6">Go back</a>
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