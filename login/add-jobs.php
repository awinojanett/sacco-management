
<?php 
include "jobs.php";
require_once "../connection/connection.php";

if (isset($_POST['add-job'])){
  $title =$_POST['title'];
  $descriptions =$_POST['descriptions'];
  $place =$_POST['place'];
  $job_type =$_POST['job_type'];
  $job_status = $_POST['job_status'];
  // $query="SELECT * from users where unique_id='$unique_id'";

  $posted_by = ($_SESSION['unique_id']);

  $que="INSERT INTO jobs(title, descriptions, place, job_type, job_status,posted_by)
   VALUES('$title','$descriptions','$place','$job_type','$job_status','$posted_by')";

   $result = mysqli_query($conn,$que);

    if ($result){
      // header('location: jobs.php');
      echo "Succes";
    }
    else{
      echo "There was an error while processing your request";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compassion alumni</title>
</head>

<style>
form{
    padding-left: 20px;
    padding-right: 40px
}

</style>
<body>
    
<form method="POST" action ="add-jobs.php">
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Job title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="title" placeholder="Title" maxlength="10">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Short decription</label>
    <div class="col-sm-10">
        <textarea class="form-control" name="descriptions" rows="3"></textarea>
      <!-- <input type="text" class="form-control" name="inputEmail3" placeholder="Short description"> -->
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Place/Location</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="place" placeholder="Job location">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Job type</legend>
      <div class="col-sm-10" >
        <div class="form-check">
          <input class="form-check-input" type="radio" name="job_type" value="parmanent">
          <label class="form-check-label" for="gridRadios1">
            Parmanent
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="job_type" value="temporary">
          <label class="form-check-label" for="gridRadios2">
            Temporary
          </label>
        </div>
        <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="job_type" value="not-sure" >
          <label class="form-check-label" for="gridRadios3">
           Not sure
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <div class="col-sm-2">Job availability</div>
    <div class="col-sm-10">
      <div class="form-check">
        <select class="browser-default custom-select" name="job_status" required >
						<option>Select Current availabilty status</option>
						<option value="Available">Available</option>
						<option value="Not available">Unavailabe</option>
					</select>
        </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name ="add-job" class="btn btn-primary">Post</button>
    </div>
  </div>
</form>
</body>
</html>

<?php



?>