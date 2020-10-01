<title>Welcome</title>
<?php
session_start();
if(!$_SESSION['email']){
	 header("location:login.php"); //this is used here because user cannot go directly to idgenerate link without logging in just by pasting the address..
}
?>
<link rel="stylesheet "href="css/bootstrap.min.css" />
	<script src="js/all.js"></script>
	<link rel="stylesheet "href="css/fonts.css" />
<div class="container">
	 <nav class="navbar navbar-expand-sm bg-dark navbar-fixed-top">
		   <div class="container-fluid">
			   <div class="navbar-header">
				<a href="" class="navbar-brand">Online Voting System</a>
				</div>
				<ul class="nav navbar-nav">
				        <li class="active px-3"><a href="welcome.php"><span class="fas fa-home" ></span> Home</a></li>
							
								<li class="active px-3"><a href="idgenerate.php"><span class="fas fa-user-secret" ></span> ID Generate</a></li>
									<li class="active px-3"><a href="elections.php"><span class="fas fa-list-ol" ></span> Election</a></li>
										<li class="active px-3"><a href="result.php"><span class="fas fa-star" ></span> Result</a></li>
											<li class="active px-3"><a href="vote.php"><span class="fas fa-thumbs-up" ></span> Vote</a></li>
												<li class="active px-3"><a href="logout.php"><span class="fas fa-power-off" ></span> Log Out</a></li>
												<li class="active px-3"><a href="contact.php"><span class="fas fa-inbox" ></span> Support</a></li>
												<li class="active px-3"><a href="name.php"><span class="fas fa-eye" ></span> <?php echo strtoupper($_SESSION['name']);?></a></li>
													
				</ul>
			</div>
		</nav>
		<br>
		

			       
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="welcome.php">Home</a>
            </li>
            <li class="breadcrumb-item active">ID Genereate</li>
        </ol>
	<?php
	require("includes/db.php");
	   $user_email=$_SESSION['email'];
		$select="select * from id_request_db where email='$user_email'"; //this ensures that only one email will be used at a time for registration
		$exe=$conn->query($select);
		if($exe->num_rows>0){
			
			?>
			<div class="row justify-content-center align-content-center">
				<h4>Your request already submitted</h4>
				</div>
				<?php
	}
	else {
		
		
		?>
		<?php
			   $select="select * from users_db where email='$user_email'";
	   $run=$conn->query($select);
	   if($run->num_rows>0){
		   while($row=$run->fetch_array()){
			   $user_name=$row['name'];
			   $user_email=$row['email'];
			   $user_vid=$row['voter_id'];
			   $user_adhaar=$row['adhaar'];
			   $user_district=$row['district'];
			   $user_taluk=$row['taluk'];
			   $id_generated=$row['id_generated'];
		   }
	   }
	   if($id_generated!=""){  //if generated id is not equal to null then the id will be generated to the user.
		   
		   ?>
		   	<div class="row justify-content-center ">
				<h4>Your ID is:"<span class="text text-danger"><?php echo $id_generated; ?></span>"</h4>
				
				<p class=" py-5" ><b>Note:</b>Use this with your login password to cast your vote</p>
			</div>
		   <?php
	   }
	   else {
		   ?>
		  
		   
		   	<div class="row justify-content-center align-content-center">
				<form method="post">
	 <div class="form-group">
	     <label for="name">Username:</label>
		 <input type="text" class="form-control text-uppercase" id="name" name="name"  required value="<?php echo $user_name ?>" readonly>
	 </div>			
	 <div class="form-group">
	     <label for="email">Email address:</label>
		 <input type="email" class="form-control" id="email" name="email"  required value="<?php echo $user_email ?>" readonly>
	 </div> 
	 <div class="form-group">
	     <label for="voterid">Voter ID:</label>
		 <input type="text" class="form-control" id="vid" name="vid"  required value="<?php echo $user_vid ?>" readonly>
	 </div> 
	 <div class="form-group">
	     <label for="adhaar">Adhaar Number:</label>
		 <input type="number" class="form-control" id="adhaar" name="adhaar"  required value="<?php echo $user_adhaar ?>" readonly>
	 </div>
	 <div class="form-group">
	     <label for="district">District:</label>
		 <input type="text" class="form-control" id="district" name="district"  required value="<?php echo $user_district ?>" readonly>
	 </div>
	 <div class="form-group">
	     <label for="taluk">Taluk:</label>
		 <input type="text" class="form-control" id="taluk" name="taluk"  required value="<?php echo $user_taluk ?>" readonly>
	 </div>

      <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" name="idrequest">ID  Request</button> 
      </div>
  
  </div>
  </form>
		</div>
   </div>
	   

	<?php 
	}
	}
	?>
	

	<?php
	if(isset($_POST['idrequest']))
{
	require("includes/db.php");
	 $user_email=$_POST['email'];
	 $user_vid=$_POST['vid'];
	 $user_adhaar=$_POST['adhaar'];
	 $user_district=$_POST['district'];

	  

		$insert="insert into id_request_db(email,voter_id,adhaar,district,taluk) values('$user_email','$user_vid','$user_adhaar','$user_district','$user_taluk')";
	  $run=$conn->query($insert);
	   if($run)
		{
		  echo "<script>alert('Your request has been submitted succesfully')</script>";
		  header("location:idgenerate.php"); //headers are the pre-defined keywords in php
	    }
	    else
	    {
		  echo "error";
	    }  
	  
	    
}

?>

