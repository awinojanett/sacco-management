<?php include('../common/commonh.php') ?>
<?php include('../common/admin-sidebar.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add activity</title>
</head>

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

                    <form action="sacco-activities.php" method="POST">
                        <!-- <div class="modal-content"> -->
                        <div
                            class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                            <div class="d-flex">
                                <h4 class="mr-5">Add activity </h4>
                                <a href="sacco-activities.php"
                                    class="text-center d-flex flex-wrap flex-md-nowrap  pb-2 mb-3 text- admin-dashboard">Back</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        </div>
        <div class="modal-body">

            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Id: </label>
                        <input type="text" autocomplete="off" name="id" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Activity name:</label>
                        <input type="text" name="activity_name" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1" required> Expected Activity:</label>
                        <input type="text" autocomplete="off" name="expected_activity" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Start Date:</label>
                        <input type="Date" autocomplete="off" name="start_date" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">End date:</label>
                        <input type="Date" name="end_date" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <input type="text" name="status" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" name="submit">
            </div>





        </div>
        </div>
        </form>


</body>

</html>