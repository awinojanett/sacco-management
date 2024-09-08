 <?php
  include "common/header.php";
  ?>
 <?php
  session_start();
  include_once "config.php";
  $uname = "";
  $password = "";
  if (isset($_POST['login'])) {

    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if (!empty($uname) && !empty($password)) {
      $sql = mysqli_query($conn, "SELECT * FROM users WHERE uname = '{$uname}'");
      if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $user_pass = md5($password);
        $enc_pass = $row['password'];
        if ($user_pass === $enc_pass) {


          if ($sql) {
            header('location: common/user-index.php');
            $_SESSION['unique_id'] = $row['unique_id'];
            echo "success";
          } else {
            echo "Something went wrong. Please try again!";
          }
        } else {
          echo "Email or Password is Incorrect!";
        }
      } else {
        echo "$uname - This username does not exist!";
      }
    } else {
      echo "All input fields are required!";
    }
  }
  ?>
 <!DOCTYPE html>
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
   <section class="vh-100 bg-info">
     <div class="container py-5 h-100">
       <div class="row d-flex justify-content-center align-items-center h-100">
         <div class="col col-xl-10">
           <div class="card" style="border-radius: 1rem;">
             <div class="row g-0">
               <div class="col-md-6 col-lg-5 d-none d-md-block">
                 <img src="login/background.jpg" alt=" " class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
               </div>
               <div class="col-md-6 col-lg-7 d-flex align-items-center">
                 <div class="card-body p-4 p-lg-5 text-black">

                   <form method="POST" action="login.php">
                     <?php
                      $uname = "";
                      $password = "";
                      ?>
                     <div class="d-flex align-items-center mb-3 pb-1">
                       <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                       <span class="h1 fw-bold mb-0">Compassion Alumnis</span>
                     </div>

                     <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your <b class="text-red"> User </b> account</h5>

                     <div class="form-outline mb-4">
                       <input type="text" name="uname" id="form2Example17" class="form-control form-control-lg" value="<?php echo $uname ?>" />
                       <label autocomplete="off" class="form-label" for="form2Example17">Username
                       </label>
                     </div>

                     <div class="form-outline mb-4">
                       <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" value="<?php echo $password ?>" />
                       <label class="form-label" for="form2Example27">Password</label>
                     </div>

                     <div class="pt-1 mb-4">

                       <button class="btn btn-dark btn-lg btn-block" name="login" type="submit">Login</button>
                       <!-- <input type="submit" name="submit" value="Continue to Chat"> -->
                     </div>

                     <a class="small text-muted" href="#!">Forgot password?</a>
                     <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="registration.php" style="color: #393f81;">Register here</a></p>
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

 </html>