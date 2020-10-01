<?php
session_start();
include("includes/header.php");
if(!$_SESSION['email']){
    header("location:login.php"); 
}
?>


<?php
$email=$_SESSION['email'];
require('includes/db.php');

    $select="select * from admin  where email='$email'";
    $run=$conn->query($select);
    if($run->num_rows>0){
        while($row=$run->fetch_array()){
            $user_name=$row['name'];
            $user_email=$row['email'];
            $user_vid=$row['voter_id'];
            $user_adhaar=$row['adhaar'];
            $user_gender=$row['gender'];
        }
    }

?>


<div class="container">  
<h1 class="mt-4 mb-3 text-capitalize">admin details<medium></medium></h1>
<ol class="breadcrumb">
<li class="breadcrumb-item">
	<a href="home.php">Home</a>
</li>
<li class="breadcrumb-item active text-capitalize">admin details</li>
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
            <input type="text" name="name" id="name" class="form-control" required value="<?php echo $user_name?>" readonly>
        </div>
        <div class="form-group">
	     <label for="email">Email address:</label>
		 <input type="email" class="form-control" id="email" name="email"  required value="<?php echo $user_email; ?>" readonly>
	    </div> 
        <div class="form-group">
	     <label for="voterid">Voter ID:</label>
		 <input type="text" class="form-control" id="vid" name="vid"  pattern="?{2}/\d{2}/?\d{3}/?\d{6}"  required value="<?php echo $user_vid; ?>" readonly>
	    </div> 
	 	 <div class="form-group">
	     <label for="adhaar">Adhaar Number:</label>
		 <input type="number" class="form-control" id="adhaar" name="adhaar"  required value="<?php echo $user_adhaar; ?>" readonly>
	    </div>
	    <div class="form-group">
	     <label for="Gender">gender:</label>
		 <input type="text" class="form-control" id="gender" name="gender"  required value="<?php echo $user_gender; ?>" readonly>
        </div>
        <button class="btn btn-block  bg-info"><a class="text-dark" href="change.php">Change Password</a></button>
        <br>
        <button class="btn btn-block bg-warning"><a class="text-dark" href="newAdmin.php">Add New Admin</a></button>

    </form>
</div>
</div>
