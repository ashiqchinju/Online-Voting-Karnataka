<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- all of the above mentioned files are very important for carousel -->


<title>Welcome</title>
<?php
session_start();
include("includes/loginheader.php");
if(!$_SESSION['email']){
	 header("location:login.php"); 
}
?>
<br>
<br>
<br>



	
<div class="container">
	<div class="row justify-content-center align-content-center">
		<div class="col-sm-6">
		<h4 class="text text-center text-warning alert bg-secondary">How To Cast Your Vote<i><i>?</i></i></h4>
		<ul>
		  <li><i>First, select<b>"ID Generate"</b>from navigation bar</i>
			</li>
		  <li><i>Then send request to <b>Admin</b>to generate your ID</i>
			</li>
		  <li><i>Click on the<b>"Election"</b>on the navigation bar</i>
		    </li>
		  <li><i>Select avaialable election</i>
			</li>
		  <li>
			<i>The secrecy of your ballot is maintained under the high security standards adhered by Indian
			online voting software.</i>
		  <li>
			<i>Your vote remains anonymous as our system architecture strictly seperates your personal data from the election ballot.</i>
			</li>
		</ul>
		</div>
		<br>
		<div class="col-sm-6">
			<img src="images\product-2.jpeg" class="img img-responsive img-thumbnail">
		</div>
   </div>
   <br>
   <br>
   <br>


</div>

<?php
	include("includes/footer1.php");
?>