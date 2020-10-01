<?php
session_start();
?>
<link rel="stylesheet "href="css/bootstrap.min.css" />
<script src="js/all.js"></script>
<?php
require("includes/db.php");
$error="";
$success="";


if(isset($_POST['chpass']))
{
	 $user_email=$_POST['email'];
     $user_id=$_POST['email'];
     $user_vid=$_POST['voter_id'];
	 $user_password=$_POST['password'];
	 $user_adhaar=$_POST['adhaar'];

		$select="select * from users_db where email='$user_email' or id_generated='$user_id' and adhaar='$user_adhaar' and voter_id='$user_vid'";
		 //checks the database for email and password
	    	$run=$conn->query($select);
		  	if($run->num_rows>0){
				
				
 
            
            $update2="update users_db set password='$user_password' where email='$user_email' or id_generated='$user_id'";
            $run2 = $conn->query($update2);
            if($run2){
                echo "<script>alert('Password Changed')</script>";		
                
                echo "<script>window.location.href='login.php'</script>";
                
           
		} 
    } else {
		echo "<script>alert('either adhaar or Id or email is incorrect')</script>";
	}

}
    

?>

<?php
	if(isset($_POST['chkpass'])){
		$user_email=$_POST['email'];
		$user_id=$_POST['email'];

		$user_password=$_POST['password'];
		$user_adhaar=$_POST['adhaar'];
	
		   $select="select * from users_db where email='$user_email' or id_generated='$user_id' and adhaar='$user_adhaar'";
		   $run=$conn->query($select);
				  if($run->num_rows>0){
	
					$check="select * from users_db where password='$user_password'";
					$run=$conn->query($check);
					if($run){
						echo "<script>alert('your password is same as old password')</script>";
					} else {
						echo "<script>alert('your new password is not same as your old password')</script>";
					}
	}
}
?>

<div class="container">
        <nav class="navbar bg-dark navbar-expand-sm navbar-fixed-top"> <!default navigation bar with proper allignment>
		    <div class="container-fluid"> <!the body starts with no indent if we use fluid>
			   <div class="navbar-header"> <!alligning in the header of the nav bar>
			   <a href="index.php" class="navbar-brand">ONLINE VOTING SYSTEM</a>
  	 		   </div>
			   <ul class="nav navbar-nav">
			   <li class="active-nav">
			   <li class="active px-5"><a href="index.php"><span class="fas fa-home" ></span> Home</a></li> <!as we have no links therefore we use '@' in the href section>
			   <li class="active px-5"><a href="reg.php"><span class="fas fa-user-circle" ></span> Sign Up</a></li>
			   <li class="active px-5"><a href="login.php"><span class="fas fa-user-secret" ></span> Log In</a></li>
			   <li class="active px-5"><a href="about.php"><span class="fas fa-comment"></span> Help</a></li>					  			  
			   </ul>
			   <br>
     </div>	 
	 </nav>

	        <h1 class="mt-4 mb-3">Change <medium>Password</medium></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active"><a href="login.php">Login</a></li>
            <li class="breadcrumb-item active">Forgot Password</li>
        </ol>
	 <div class="row align-content-center justify-content-center">	 
	    <div class="col-sm-8 col-sm-offset-2 bg-transparent alert alert-primary" style="box-shadow:2px 2px 2px 2px gray;">
		<h4 class="text text-center alert bg-primary" style="color:white">Forgot Password</h4>
		<h5 class="text text-center text-danger"><?php
		if($error!=""){
			echo $error;
		}
		?></h5>
		<h5 class="text text-center text-success"><?php
		if($success!=""){
			echo $success;
		}
		
		?></h5>
		<form method="post">

	 <div class="form-group">
	     <label for="email">Email address / ID:</label>
		 <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email or ID" required value="">
	 </div>

	 <div class="form-group">
	     <label for="voterid">Voter ID:</label>
		 <input type="text" class="form-control" id="vid" name="vid" placeholder="Enter Your Voter ID">
     </div>	 

	 <div class="form-group">
	     <label for="adhaar">Adhaar:</label>
		 <input type="text" class="form-control" id="adhaar" name="adhaar" placeholder="Enter Your Adhaar Number" minlength="12" maxlength="12" size="12">
     </div>	 
     <div class="form-group">
	     <label for="password">Password:</label>
		 <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password(small letter,capital letter and a number ex: Abc101,aaBcd1 etc)" required value="" minlength="6" maxlength="10" size="10" pattern="[A-Za-z0-9@!#$%^&*()_-=-+./,'\[]{}]{6,10}]{6,10}">

		 <input type="checkbox" onclick="myFunction()"> <span class="fas fa-eye"></span>
			 
     </div> 


      <div class="form-group">
        <button type="submit" class="btn btn-warning btn-block" name="chkpass">Check Password</button>
      </div>
	 
      <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" name="chpass">Change Password</button>
      </div>
  
  </div>
  </form>

<!-- very important -->
  <script>
	  function myFunction() {
		  let x = document.getElementById('password');
		  if ( x.type === "password") {
			  x.type = "text";
		  } else {
			  x.type = "password";
		  }
	  }
  </script>



</body>
</html>
