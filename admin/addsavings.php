<?php
require_once "../connection/connection.php";
if (isset($_POST['subm'])) {
	$transaction_id = $_POST['transaction_id'];
	$member_id = $_POST['member_id'];
	$amount_paid = $_POST['amount_paid'];
	$payment_mode = $_POST['payment_mode'];
	if (!empty($transaction_id) && !empty($member_id) && !empty($amount_paid) && !empty($payment_mode)) {
		$que = "INSERT INTO members_savings(transaction_id,member_id,amount_paid,payment_mode) VALUES('$transaction_id','$member_id','$amount_paid','$payment_mode')";
		$result = mysqli_query($conn, $que);
		if ($result) {
			echo "<script>alert('Updated successfully');</script>";
		} else {
			echo "<script>alert('You are using cached page');</script>";
		}
	} else {
		echo "Check the details and try again";
	}
}

?>

<!---------------- Session starts form here ----------------------->
<?php
session_start();
if (!$_SESSION["LoginAdmin"]) {
	header('location:../login/login.php');
}
require_once "../connection/connection.php";
?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">

<head>
    <title>Admin - Members Savings</title>
</head>

<body>
    <?php include('../common/commonh.php') ?>
    <?php include('../common/admin-sidebar.php') ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
        <div class="sub-main">
            <div
                class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                <h4>Members Savings </h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="addsavings.php" method="post">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Enter Member Id:</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control" name="member_id"
                                            placeholder="Enter Member Id">
                                        <input type="submit" name="submit" class="btn btn-primary px-4 ml-4"
                                            value="Press">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 align-items-baseline pt-4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ml-2">
                    <section class="border mt-3">
                        <table class="w-100 table-elements table-three-tr" cellpadding="3">
                            <tr class="table-tr-head table-three text-white">
                                <th>First Name</th>
                                <th>Member Id.</th>
                                <th>Transaction Id</th>
                                <th>Amount (Ksh.)</th>
                                <th>Payment Mode</th>
                                <th>Confirm ID</th>
                            </tr>
                            <?php
							if (isset($_POST['submit'])) {
								$member_id = $_POST['member_id'];
								$que = "SELECT * FROM member_information WHERE member_id = $member_id ";
								$result = mysqli_query($conn, $que);
								if ($result) {
									while ($row = mysqli_fetch_assoc($result)) {
										$member_id = $row['member_id'];
										$first_name = $row['first_name'];


										echo '<tr>
										<form action="addsavings.php" method="POST">
										<td>' . $first_name . '</td>
										<td>' . $member_id . '</td>
							           <td> <input type="text" name="transaction_id" class="form-control" placeholder="Tr Id"> </td>
										<td>
										<input type="text" name="amount_paid" class="form-control" placeholder="Enter Amount"> </td>
										<input type="hidden" name="status" value="Paid">
										<td>  <label for="payment_mode"></label> 
										<select class="browser-default custom-select" name="payment_mode" required>
										<option>Select Payment Mode</option>
										<option value="Cash">Cash</option>
										<option value="Mpesa">Mpesa</option>
										<option value="Bank">Bank</option>
									  </select>
										</td>
										<td>
										<input type="text" name="member_id" class="form-control" placeholder="Confirm ID"> </td>
										<input type="submit" name="subm">
										</form>
										</tr>';
									}
								}
							}

							?>


                        </table>
                        <br>
                        <hr>
                        <table class="w-100 table-elements table-three-tr" cellpadding="3">
                            <tr style="overflow-x:auto;" class="table-tr-head table-three text-white">
                                <th>Member Id.</th>
                                <th>Name.</th>
                                <th>Id number</th>
                                <th>Gender</th>
                                <th>Phone number</th>
                                <th>Amount (Ksh.)</th>
                                <th>Payment Mode</th>
                                <th>payment date</th>
                                <th>Status</th>
                            </tr>
                            <?php
							$query = "SELECT * FROM member_information JOIN members_savings ON members_savings.member_id = member_information.member_id ORDER BY payment_date DESC";
							$result = mysqli_query($conn, $query);
							if ($result) {
								while ($row = mysqli_fetch_assoc($result)) {
									$member_id = $row['member_id'];
									$first_name = $row['first_name'];
									$middle_name = $row['middle_name'];
									$last_name = $row['last_name'];
									$id_number = $row['id_number'];
									$phone_number = $row['phone_number'];
									$gender = $row['gender'];
									$amount_paid = $row['amount_paid'];
									$payment_mode = $row['payment_mode'];
									$payment_date = $row['payment_date'];
									$status = $row['status'];

									echo '<tr>
										<td>' . $member_id . '</td>
								    	<td> ' . $first_name . ' ' . $middle_name . ' ' . $last_name . '</td>
									 	<td>' . $id_number . '</td>
								     	<td>' . $gender . '</td>
										<td> ' . $phone_number . '</td>
										<td> ' . $amount_paid . '</td>
										<td> ' . $payment_mode . '</td>
										<td> ' . $payment_date . '</td>
										<td> ' . $status . '</td>
									 	</tr>';
								}
							}
							$query1 = "SELECT SUM(amount_paid) FROM members_savings";
							$result1 = mysqli_query($conn, $query1);
							$row = mysqli_fetch_array($result1);
							echo 'Total: ' . $row[0];
							?>


                        </table>

                    </section>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>