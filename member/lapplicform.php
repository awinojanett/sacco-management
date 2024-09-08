<?php
session_start();
if (!$_SESSION["LoginMember"]) {
	header('location:../login/login.php');
}
require_once "../connection/connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Application</title>
</head>
<?php include('../common/member-sidebar.php') ?>

<body>
    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
        <div class="sub-main">
            <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                <div class="d-flex">
                    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
                    <link rel="stylesheet" type="text/css" href="../css/footer.css">
                    <link rel="stylesheet" type="text/css" href="../css/style.css">
                    <link rel="stylesheet"
                        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


                    <!-- <div class="modal-content"> -->
                    <div
                        class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                        <div class="d-flex">
                            <h4 class="mr-5">Loan Application window </h4>
                            <a href="myloans-information.php"
                                class="text-center d-flex flex-wrap flex-md-nowrap  pb-2 mb-3 text- admin-dashboard">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
        <form action="lapplicform.php" method="POST">
            <div class="modal-body">

                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Requested Amount </label>
                            <input type="text" autocomplete="off" name="requested_amount" id="requested_amount"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1"> Time:</label>
                            <select class="browser-default custom-select" name="duration" required>
                                <option>Select Time</option>
                                <option value="30">30 Days</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <!-- <label for="exampleInputPassword1" required> Repayment Date:</label> -->
                            <?php

							$Today = date('y:m:d', time());
							$new = date('l, F d, Y', strtotime($Today));
							$Date = $new;

							$newDate = date('Y-m-d', strtotime($Date . ' + 30 days'));
							// Add days to date and display it


							?>

                            <div class="form-group">
                                <fieldset disabled>
                                    <label for="exampleInputPassword1">Repayment Date</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder=" <?php echo $newDate; ?>">
                            </div>
                            </fieldset>

                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <fieldset disabled>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Interest rate</label>
                            <input type="text" id="disabledTextInput" name="intrest" value="15%" class="form-control"
                                placeholder="15%">
                        </div>
                    </fieldset>

                    <div class="col-md-4">


                        <fieldset disabled>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Total Payment:</label>

                                <?php
								$request_amount = ($_POST["requested_amount"]);
								$total_payments = $request_amount * 1.15;


								?>
                                <!-- <input type="number" name="total_payment" class="form-control"   required> -->
                                <!-- <input type="text" id="disabledTextInput" class="form-control" <?php echo $total_payments ?>  name= "$total_payments">  -->
                            </div>

                        </fieldset>



                        <br><br>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" name="submit">
                        </div>
                    </div>
                </div>
        </form>


</body>

</html>

<?php
if (isset($_POST['submit'])) {

	$member_id = $_SESSION['LoginMember'];
	$requested_amount = $_POST['requested_amount'];
	$period = $_POST['duration'];
	$paying_date = $_POST[$newDate];
	$intrest = $_POST['intrest'];
	$total_payments = $_POST[$total_payments];
	$loan_status = $_POST['loan_status'];

	$que = "INSERT INTO loan_applicants(member_id,requested_amount,duration)
	VALUES('$member_id','$requested_amount','$period')";
	$result = mysqli_query($conn, $que);

	if ($result) {
		header('location: sacco/member/myloans-information.php');
	} else {
		echo " Your Application encoutered an error. Please try again later";
	}
}

?>