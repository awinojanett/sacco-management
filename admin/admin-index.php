 <!---------------- Session starts form here ----------------------->
 <?php
    session_start();
    if (!$_SESSION["LoginAdmin"]) {
        header('location:../login/login.php');
    }
    require_once "../connection/connection.php";
    ?>
 <!---------------- Session Ends form here ------------------------>
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>Admin - Sacco </title>

 <?php include('../common/commonh.php') ?>
 <?php include('../common/admin-sidebar.php') ?>
 <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
     <div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
         <h4>Admin Dashboard </h4>
         <a> <i class="icon-calendar icon-large"></i>
             <?php
                $Today = date('y:m:d', time());
                $new = date('l, F d, Y', strtotime($Today));
                echo $new;
                ?>

         </a>
     </div>

     <div class="row">
         <div class=" col-lg-6 col-md-12 col-sm-12 ">
             <div>
                 <section class="mt-3">
                     <div class="btn btn-block table-one text-light d-flex">
                         <span class="font-weight-bold"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i> Website
                             overview</span>
                         <a href="" class="ml-auto" data-toggle="collapse" data-target="#collapseOne"><i
                                 class="fa fa-plus text-light" aria-hidden="true"></i></a>

                     </div>
                     <div class="collapse show mt-2" id="collapseOne">
                         <table class="w-100 table-elements table-one-tr" cellpadding="2">
                             <tr class="pt-5 table-one text-white" style="height: 32px;">
                                 <th>Total Members</th>
                                 <th> New Users</th>
                                 <th>Day</th>
                                 <th>Logs</th>
                                 <th>Micelenious</th>
                             </tr>
                             <?php

                                $query1 = "SELECT COUNT(member_id) FROM member_information";
                                $result1 = mysqli_query($conn, $query1);
                                $row = mysqli_fetch_array($result1);
                                //   echo 'Total: '. $row[0];
                                {
                                    echo "<tr>";

                                    echo "<td>" . $row[0] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                         </table>
                     </div>
                 </section>
             </div>
         </div>
         <div class=" col-lg-6 col-md-12 col-sm-12">
             <div>
                 <section class="mt-3">
                     <div class="btn btn-block table-two text-light d-flex">
                         <span class="font-weight-bold"><i class="fa fa-list-alt mr-2" aria-hidden="true"></i> Sacco
                             Activities</span>
                         <a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsetwo"><i
                                 class="fa fa-plus text-light" aria-hidden="true"></i></a>

                     </div>
                     <div class="collapse show mt-2" id="collapsetwo">
                         <table class="w-100 table-elements table-two-tr" cellpadding="2">
                             <tr class="pt-5 table-two text-white" style="height: 32px;">
                                 <th>Start Date</th>
                                 <th>End Date</th>
                                 <th>Planned activities</th>
                                 <th>Status</th>
                             </tr>

                             <?php
                                $query = "SELECT * FROM sacco_activites";
                                $run = mysqli_query($conn, $query);
                                if ($run) {
                                    while ($row = mysqli_fetch_array($run)) {

                                        $start_date = $row['start_date'];
                                        $end_date = $row['end_date'];
                                        $activity_name = $row['activity_name'];
                                        $status = $row['status'];
                                        echo '<tr>
											<td> ' . $start_date . '</td>
											<td>' . $end_date . '</td>
											<td> ' . $activity_name . '</td>
											<td>' . $status . '</td>
											</tr>';
                                    }
                                }
                                ?>
                         </table>
                     </div>
                 </section>
             </div>
         </div>

         </table>
     </div>
     </section>
     </div>
     </div>
     </div>
 </main>

 <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
 <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

 </body>

 </html>