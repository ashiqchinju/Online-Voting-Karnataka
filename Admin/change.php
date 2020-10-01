<?php
session_start();
include("includes/header.php");
if(!$_SESSION['email']){
    header("location:login.php"); 
}
?>



<?php
    require('includes/db.php');
    $email=$_SESSION['email'];
    $error='';
    $success='';



    if(isset($_POST['chpass'])) {
        $pass1=$_POST['password'];



        $select="select * from admin where email='$email'";
        $run=$conn->query($select);
        if($run->num_rows>0){
            $update="update admin set password='$pass1'";
            $run1=$conn->query($update);
            if($run1) {
                echo "<script>alert('Password Changed Succesfuly')</script>";
                echo "<script>window.location.href='index.php'</script>";
            } else {
                echo "<script>alert('Either your email and adhaar is incorrect')</script>";
            }
        }
}


    
?>

<div class="container">  
<h1 class="mt-4 mb-3 text-capitalize">change password<medium></medium></h1>
<ol class="breadcrumb">
<li class="breadcrumb-item">
	<a href="home.php">Home</a>
</li>
<li class="breadcrumb-item">
	<a href="index.php">Admin Details</a>
</li>
<li class="breadcrumb-item active text-capitalize">change password</li>
</ol>    
</div>

<div class="container">
    <div class="row align-content-center justify-content-center">
<form method="post" onsubmit="return validate()">

	 
     <div class="form-group">
	     <label for="password">Password:</label>
		 <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password(small letter,capital letter and a number ex: Abc101,aaBcd1 etc)" required value="" minlength="6" maxlength="10" size="10" pattern="[A-Za-z0-9@!#$%^&*()_-=-+./,'\[]{}]{6,10}]{6,10}">
		 
		 <input type="checkbox" onclick="myFunction()"><span class="fas fa-eye"></span>
			 
     </div> 
      <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" name="chpass">Change Password</button>
      </div>
        
</form>
  </div>

 

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
</div>
