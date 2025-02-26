<?php include('../common/common-header.php') ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<div class="row w-100">
		<button class="show-btn button-show ml-auto">
		<i class="fa fa-bars py-1" aria-hidden="true"></i>
		</button> 
	</div>
		<nav id="sidebarMenu" class="">
			<div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right">
        		<div class="sidebar-header">
					<a class="nav-link text-white" href="../executive/executive-index.php">
					<span class="home"></span>
						<i class="fa fa-home mr-2" aria-hidden="true"></i> Dashboard
					</a>
				</div>
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link" href="../admin/display-executive.php">
						<span data-feather="file"></span>
						<i class="fa fa-user mr-2" aria-hidden="true"></i> Personal Profile
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../../member.php">
						<span data-feather="file"></span>
						<i class="fa fa-info-circle mr-2" aria-hidden="true"></i>Add Member
						</a>
						</li>
					<li class="nav-item">
						<a class="nav-link" href="../executive/executive-personal-information.php">
						<span data-feather="file"></span>
						<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Personal Information
						</a>
						</li>
					<li class="nav-item">
						<a class="nav-link" href="../executive/loans.php">
						<span data-feather="shopping-cart"></span>
						<i class="fa fa-address-book mr-2" aria-hidden="true"></i> Executive Loans
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../executive/student-attendance.php">
						<span data-feather="users"></span>
						<i class="fa fa-check-circle mr-2" aria-hidden="true"></i> Members Attnedance
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../executive/class-result.php">
						<span data-feather="users"></span>
						<i class="fa fa-users mr-2" aria-hidden="true"></i> Class Results
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../executive/executive-password.php">
						<span data-feather="bar-chart-2"></span>
						<i class="fa fa-key mr-2" aria-hidden="true"></i> Change Password
						</a>
					</li>
				</ul>
			</div>
		</nav>
		
		<script>
			const toggleBtn = document.querySelector(".show-btn");
			const sidebar = document.querySelector(".sidebar");
			// undefined
			toggleBtn.addEventListener("click",function(){
				sidebar.classList.toggle("show-sidebar");
			});
			
		</script>