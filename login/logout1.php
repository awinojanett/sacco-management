<?php
session_start();
unset($_SESSION['unique_id']);
session_destroy();
header("location:../index.php");
?>