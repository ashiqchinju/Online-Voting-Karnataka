<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- all of the above mentioned files are very important for carousel -->



<?php
session_start();
include("includes/header.php");
if(!$_SESSION['email']){
    header("location:login.php"); 
}
?>
<br>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: 50vh;">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="row justify-content-center align-content-center">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="images/pic1.jpeg" alt="First slide"  height="56%">
            <div class="carousel-caption d-none d-md-block">
                <h5>My Caption Title (1st Image)</h5>
                <p>The whole caption will only show up if the screen is at least medium size.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="images/pic2.jpg" alt="Second slide" height="50%">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="images/pic3.jpg" alt="Third slide"  height="50%">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>