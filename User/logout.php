<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['name']);
unset($_SESSION['id_generated']); //on resubmission of page multiple votes are not casted because of using this!
session_destroy();
header("location:index.php");
?>