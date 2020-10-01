<title>Welcome</title>
<?php
session_start();

if(!$_SESSION['email']){
	 header("location:login.php"); 
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
            <li class="breadcrumb-item active">Election</li>
        </ol>
		<div class="row justify-content-center align-items-center">
		<form method="post">
	 <div class="form-group">
	     <label for="id">Your ID:</label>
		 <input type="text" class="form-control" id="id" name="id" placeholder="Enter your ID" required value="">
	 </div>
	 <div class="form-group">
	     <label for="password">Password:</label>
		 <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required value="">
	 </div>	 
      <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" name="login">Enter Voting Area</button>
      </div>
  
  </form>
		
		</div>
   </div>
   <?php
	require("includes/db.php");
	if(isset($_POST['login'])){
		$user_id=$_POST['id'];
		$user_password=$_POST['password'];
		$select="select * from users_db where password='$user_password' and id_generated='$user_id'";
		$run=$conn->query($select);
			 if($run->num_rows>0){
				while($row=$run->fetch_array()){
					$_SESSION['id_generated']=$row['id_generated'];
			 }
				header("location:vote.php");
			 }	 
			 else{
				 echo "Your ID or Password is invalid!!";
			 }
	}
	
	
   ?>
   


