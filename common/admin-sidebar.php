<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <div class="row w-100">
    <button class="show-btn button-show ml-auto">
      <i class="fa fa-bars py-1" aria-hidden="true"></i>
    </button> 
  </div>
    <nav id="sidebarMenu" class="">
			<div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right">
        <div class="sidebar-header">
          <div class="nav-item">
              <a class="nav-link text-white" href="../admin/admin-index.php">
                <span class="home"></span>
                  <i class="fa fa-home mr-2" aria-hidden="true"></i> Dashboard 
              </a>
          </div>
        </div>   
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="../admin/member.php">
              <span data-feather="file"></span>
              <i class="fa fa-user-plus" aria-hidden="true"></i> Register Member
            </a>
		      </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/addsavings.php">
              <span data-feather="shopping-cart"></span>
              <i class="fa fa-university" aria-hidden="true"></i> Total Savings
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/add-loanstatus.php">
              <span data-feather="users"></span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
  <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
  <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
</svg></i> Member loans status
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/new-applicants.php">
              <span data-feather="bar-chart-2"></span>
              <i class="fa fa-user-plus" aria-hidden="true"></i> New Applicants
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="../admin/defaulters.php">
              <span data-feather="layers"></span>
              <i class="fa fa-user-circle" aria-hidden="true"></i> Defaulters
            </a>
		  </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/loanapplicants.php">
              <span data-feather="layers"></span>
              <i class="fa fa-users mr-2" aria-hidden="true"></i> Loan Applicants
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/sacco-activities.php">
              <span data-feather="layers"></span>
              <i class="fa fa-calendar" aria-hidden="true"></i> Sacco Activities
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/nominalroll.php">
              <span data-feather="layers"></span>
             <i class="fa fa-users" aria-hidden="true"></i></i> Sacco Members
            </a>
            <li class="nav-item">
            <a class="nav-link" href="../admin/peloans.php">
              <span data-feather="layers"></span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
  <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
</svg></i> Repayed loans.
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/manage-account.php">
              <span data-feather="layers"></span>
              <i class="fa fa-wrench" aria-hidden="true"></i> Manage Accounts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/changepassword.php">
              <span data-feather="layers"></span>
              <i class="fa fa-cogs" aria-hidden="true"></i></i> Settings
            </a>
          </li> 
          
          <li>
          <script language="javascript" type="text/javascript">
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</script>	
<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
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