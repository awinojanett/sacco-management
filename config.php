<?php

// $servername = "127.0.0.1";
// $username ="root";
// $password =" ";
// $dbname ="saccodb";

// try{
//     $conn = new PDO ("mysql: host =$servername,$dbname,$username,$password" );

//     $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//     echo "Connected succesfully";
// }
//     catch(PDOException $e)
//     {
//         echo "Connection failed: ".$e->getMessage();
//     }


?>
<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "saccodb";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>