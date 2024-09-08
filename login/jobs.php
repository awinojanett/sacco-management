
<?php  
	session_start();
	
	if ($_SESSION["unique_id"])
	{
		$unique_id=$_GET['unique_id'] ?? $_SESSION['unique_id'];
	}
	else if(!$_SESSION["unique_id"] && $_SESSION['unique_id']){
		$uniue_id=$_SESSION['unique_id'];
	}
	else{ ?>
		<script> alert("Your Are Not Authorize Person For This link");</script>
	<?php
		header('location:../login.php');
	}
	require_once "../connection/connection.php";
	?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Compassion Aluminis</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="../css2/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="../css2/slick.css"/>
		<link type="text/css" rel="stylesheet" href="../css2/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="../css2/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="../css2/style.css"/>
		<link type="text/css" rel="stylesheet" href="../css2/accountbtn.css"/>
		
		
		
         
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
        #navigation {
          background: #FF4E50;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #F9D423, #FF4E50);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #F9D423, #FF4E50); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

          
        }
        #header {
  
            background: #780206;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #061161, #780206);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #061161, #780206); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

  
        }
        #top-header {
              
  
            background: #870000;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #190A05, #870000);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #190A05, #870000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        }
         


    
        .mainn-raised {
            
            margin: -7px 0px 0px;
            border-radius: 6px;
            box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);

        }
       
        .glyphicon{
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    }
    .glyphicon-chevron-left:before{
        content:"\f053"
    }
    .glyphicon-chevron-right:before{
        content:"\f054"
    }
        

       
        
        </style>

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->

			<?php
	$query="SELECT * from users where unique_id='$unique_id'";
	
	$run=mysqli_query($conn,$query);
	while ($row=mysqli_fetch_array($run)) {
		?>

			
			

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						
						<div class="col-md-6">
							
							<div class="header-logo">
						
								<a href="#" class="logo">
								
								<font style="font-style:normal; font-size: 33px;color: aliceblue;font-family: serif">
								<h3>Compassion Alumni </h3>
								<?php
	         $query="SELECT * from users where unique_id='$unique_id'";
	
	        $run=mysqli_query($conn,$query);
	        while ($row=mysqli_fetch_array($run)) {
		                          ?>
				   <img  style="border-radius:50px; text-align:center; height: 50px; width: 50px; display: inline-block;" src="../images/<?php echo $row['image']; ?>" alt="">
								<?php echo $row['uname']  ?>
								
                                    </font>
									
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						
						<!-- ACCOUNT -->
						<div class="header-links pull-right">
							<div class="header-ctn">
								

								<!-- Cart -->
								<div class="dropdown header-links pull-right">
									<a class="header-links pull-right" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-envelope" aria-hidden="true"></i>
										<span>Inbox</span>
										<div class="badge qty">0</div>
									</a>
									<div class="cart-dropdown"  >
										<div class="cart-list" id="cart_product">
										
											
										</div>
										
										<div class="cart-btns">
												<a href="cart.php" style="width:100%;"><i class="fa fa-edit"></i>  Read messages</a>
											
										</div>
									</div>
										
									</div>
							
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<?php } ?>
			
			<!-- /MAIN HEADER -->

            	<?php
	         $query="SELECT * from users where unique_id='$unique_id'";
	
	        $run=mysqli_query($conn,$query);
	        while ($row=mysqli_fetch_array($run)) {
		          ?>
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i><?php echo $row['phone_number']  ?></a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> <?php echo $row['email_address']  ?></a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i><?php echo $row['current_residence']  ?></a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="../login/login.php"><i class="fa fa-users" aria-hidden="true"></i>Sacco</a></li>
						<li><a href="../login/jobs.php"><i class="fa fa-envelope" aria-hidden="true"></i>Jobs</a></li> 
						<li><a href="../login/tenders.php"><i class="fa fa-users" aria-hidden="true"></i>Tenders</a></li>
						 <li><a href="../common/user-index.php">Back</a></li>			
					</ul>
					
				</div>
				<?php } ?>
			</div>
			<!-- /TOP HEADER -->
			<?php } ?>
		</header>
		<!-- /HEADER -->

		
		
					

		<nav id='navigation'>
			<!-- container -->
            <div class="container" id="get_category_home">
                
            </div>
				<!-- responsive-nav -->
				
			<!-- /container -->
		</nav>
            

		<!-- NAVIGATION -->
		
		<div class="col-md-6">
			<!-- SEARCH BAR -->
			<br>
							<!-- <div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">Nearby Friends</option>
										<option value="1">Current Jobs</option>
										<option value="1">New Tenders </option>
									</select>
									<input class="input" id="search" type="text" placeholder="Search here">
									<button type="submit" id="search_btn" class="search-btn">Search</button>
								</form>
							</div>
						</div> -->

					
							<!-- /SEARCH BAR -->
		<!-- <div class="modal fade" id="Modal_login" role="dialog">
                        <div class="modal-dialog"> -->
													
                          <!-- Modal content-->
                          <!-- <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              
                            </div>
                            <div class="modal-body"> -->
                            <div> <h2> Available Jobs</h2></div>
                            </div>
                           
                          </div>
						 						
                        </div>
                      </div>
					 
                <div class="modal fade" id="Modal_register" role="dialog">
                        <div class="modal-dialog" style="">
						
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              
                            </div>
						
                          
                          
         
                            </div>
                            
                          </div>

                        </div>
                      </div>
		
                      <div class="container">
					
					<ul class="header-links">
                        <h2>
					   <li><a href="../login/available-jobs.php"><i class=" -users" aria-hidden="true"></i></i>Available Jobs</a></li> 
						<li><a href="../login/add-jobs.php"><i class=" -users" aria-hidden="true"></i></i>Post Jobs</a></li>
						<li><a href="../login/tender.php"><i class=" -users" aria-hidden="true"></i></i>Expired Jobs</a></li>
						 <li><a href="../common/user-index.php">Back</a></li>	
                         </h2>		
					</ul>
					
				</div>
			 