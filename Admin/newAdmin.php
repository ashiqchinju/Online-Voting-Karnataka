<?php
session_start();
include("includes/header.php");
if(!$_SESSION['email']){
    header("location:login.php"); 
}
?>



<?php
require("includes/db.php");
$adhaarError="";
$usernameError="";
$accountSuccess="";
$passwordError = "";
if(isset($_POST['submit']))
{
	 $user_name=$_POST['name'];
     $user_email=$_POST['email'];
     $user_vid=$_POST['vid'];
	 $user_adhaar=$_POST['adhaar'];
	 $user_gender=$_POST['gender'];
	 $user_password=$_POST['password'];



	


      $select="select * from admin where adhaar='$user_adhaar' and voter_id='$user_vid' and email='$user_email'"; //this ensures that only one email will be used at a time for registration
	  $exe=$conn->query($select);
	  if($exe->num_rows>0){
		  $adhaarError="<p class='text text-center text-danger'>Adhaar,voter id,Email  can be inserted only once</p>";
      }
      $select2="select * from admin where name='$user_name'";
      $run2=$conn->query($select2);
      if($run2->num_rows>0){
         $usernameError="<p class='text text-center text-warning'>Username already exists</p>";
      }



	  else {

		$insert="insert into admin (name,email,voter_id,adhaar,gender,password) values ('$user_name','$user_email','$user_vid','$user_adhaar','$user_gender','$user_password')";
	  $run=$conn->query($insert);
	   if($run)
		{
		  $accountSuccess="<p class='text text-center text-success'>Account Created Successfully</p>";
	    }
	    else
	    {
		  echo "error";
	    }  
	  }
	}


?>

<div class="container">
    
    <h1 class="mt-4 mb-3 text-capitalize">add new admin<medium></medium></h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Admin Details</a>
    </li>
    <li class="breadcrumb-item active">Add Admin</li>
</ol>

    
</div>

<div class="container">
<div class="row justify-content-center align-content-center">
    <form action="" method="post">
        <div class="text-center">
            <h3><label><u>Admin Details</u></label></h3>
        </div>

        <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="name" id="name" class="form-control text-uppercase" required value="">
        </div>
        <div class="form-group">
	     <label for="email">Email address:</label>
		 <input type="email" class="form-control" id="email" name="email"  required value="" >
	    </div> 
        <div class="form-group">
	     <label for="voterid">Voter ID:</label>
		 <input type="text" class="form-control" id="vid" name="vid"  pattern="?{2}/\d{2}/?\d{3}/?\d{6}"  required value="" >
	    </div> 
	 	 <div class="form-group">
	     <label for="adhaar">Adhaar Number:</label>
		 <input type="text" class="form-control" id="adhaar" name="adhaar" pattern="\d*" minlength="12" size="12" maxlength="12" required value="" >
	    </div>
        <div class="form-group">
	     <label for="Gender">Gender:</label>
	     <select class="form-control" name="gender" required value="">
	           <option value="">Select</option>
			   <option value="Male">Male</option>
	           <option value="Female">Female</option>
	           <option value="Transgender">Transgender</option>
	     </select>
	     </div>
        <div class="form-group">
	     <label for="password">Password:</label>
		 <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password(small letter,capital letter and a number ex: Abc101,aaBcd1 etc)" required value="" minlength="6" maxlength="10" size="10" pattern="[A-Za-z0-9@!#$%^&*()_-=-+./,'\[]{}]{6,10}]{6,10}">
		 
		 <input type="checkbox" onclick="myFunction()"><span class="fas fa-eye"></span>
			 
        </div> 
        <br>
        <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
        </div>
  

    </form>
</div>
</div>


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


<?php

        if($usernameError!=""){
            echo $usernameError;
        }
		if($adhaarError!=""){
			echo $adhaarError;
		}
		if($accountSuccess!=""){
			echo $accountSuccess;
		}
		if($passwordError!=""){
			echo $passwordError;
		}

?>
