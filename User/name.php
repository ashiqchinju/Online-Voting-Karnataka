<!DOCTYPE html>
<html>
<head>
	<title>user info</title>

</head>
<body>




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
				        <li class="active px-2"><a href="welcome.php"><span class="fas fa-home" ></span> Home</a></li>
							
								<li class="active px-2"><a href="idgenerate.php"><span class="fas fa-user-secret" ></span> ID Generate</a></li>
									<li class="active px-2"><a href="elections.php"><span class="fas fa-list-ol" ></span> Election</a></li>
										<li class="active px-2"><a href="result.php"><span class="fas fa-star" ></span> Result</a></li>
											<li class="active px-2"><a href="vote.php"><span class="fas fa-thumbs-up" ></span> Vote</a></li>
												<li class="active px-2"><a href="logout.php"><span class="fas fa-power-off" ></span> Log Out</a></li>
												<li class="active px-2"><a href="contact.php"><span class="fas fa-inbox" ></span> Support</a></li>
												<li class="active px-2"><a href="name.php"><span class="fas fa-eye" ></span> your details</a></li>
													
				</ul>
			</div>
		</nav>
		<br>



        						        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="welcome.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Your info</li>
        </ol>
	<?php
	session_start();
	$user_email=$_SESSION['email'];
	require("includes/db.php");
	 
			   $select="select * from users_db where email='$user_email' ";
	   $run=$conn->query($select);
	   if($run->num_rows>0){
		   while($row=$run->fetch_array()){
			   $user_name=$row['name'];
			   $user_email=$row['email'];
			   $user_vid=$row['voter_id'];
			   $user_adhaar=$row['adhaar'];
			   $user_gender=$row['gender']; 
			   $user_dob=$row['dob'];
			   $user_district=$row['district'];
			   $user_taluk=$row['taluk'];
			   $user_id=$row['id_generated'];
		   }
	   }
	
		   ?>



		   <br>

		   <div class="row justify-content-center align-content-center">
		   	<div class="col-sm-6 col-sm-offset-3 bg-secondary alert">
				<form method="post">
					<div class="text text-center"> <h3><label><u>Your Details</u></label></h3></div>
	 <div class="form-group">
	     <label for="name">Username:</label>
		 <input type="text" class="form-control" id="name" name="name"  required value="<?php echo $user_name; ?>" readonly>
	 </div>			
	 <div class="form-group">
	     <label for="email">Email address:</label>
		 <input type="email" class="form-control" id="email" name="email"  required value="<?php echo $user_email; ?>" readonly>
	 </div> 
	 <div class="form-group">
	     <label for="voterid">Voter ID:</label>
		 <input type="text" class="form-control" id="vid" name="vid"  required value="<?php echo $user_vid; ?>" readonly>
	 </div> 
	 	 <div class="form-group">
	     <label for="adhaar">Adhaar Number:</label>
		 <input type="number" class="form-control" id="adhaar" name="adhaar"  required value="<?php echo $user_adhaar; ?>" readonly>
	 </div>
	 <div class="form-group">
	     <label for="Gender">gender:</label>
		 <input type="text" class="form-control" id="gender" name="gender"  required value="<?php echo $user_gender; ?>" readonly>
	 </div>
	 <div class="form-group">
	     <label for="dob">DOB:</label>
		 <input type="date" class="form-control" id="dob" name="dob"  required value="<?php echo $user_dob; ?>" readonly>
	 </div>
	 <div class="form-group">
	     <label for="district">District:</label>
		 <input type="text" class="form-control" id="district" name="district"  required value="<?php echo $user_district; ?>" readonly>
	 </div>
	 <div class="form-group">
	     <label for="taluk">Taluk:</label>
		 <input type="text" class="form-control" id="taluk" name="taluk"  required value="<?php echo $user_taluk; ?>" readonly>
	 </div>
	 <div class="form-group">
	     <label for="id">ID:</label>
		 <input type="text" class="form-control" id="id" name="id"  required value="<?php echo $user_id; ?>" readonly>
	 </div>

  </form>
</div>
  </div>
</div>
	
</body>
</html>