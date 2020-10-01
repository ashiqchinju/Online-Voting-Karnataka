<?php
session_start();
unset($_SESSION['email']);
//on resubmission of page multiple votes are not casted because of using this!
session_destroy();
header("location:login.php");
?>