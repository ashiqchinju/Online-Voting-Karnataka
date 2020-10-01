<?php 
session_start();	
 if(!$_SESSION['email']){
	 header("location:login.php"); 
}
 ?>

<!DOCTYPE html>
<html>
  <head>
	<title>Update  Queries</title>
		<link rel="stylesheet "href="css/bootstrap.min.css" />	
	
		<script src="js/all.js"></script>
  </head>

	<body>
		<form method="GET">
		<div class="container "> <!the body starts with indent>
        <nav class="navbar navbar-expand-sm bg-dark navbar-top"> <!default navigation bar with proper allignment>
		    <div class="container-fluid"> <!the body starts with no indent if we use fluid>
			   <div class="navbar-header"> <!alligning in the header of the nav bar>
			   <a href="index.php" class="navbar-brand">ONLINE VOTING SYSTEM</a>
  	 		   </div>
			   <ul class="nav navbar-nav">
			   <li class="active-nav">
			   <li class="active px-3"><a href="home.php"><span class="fas fa-home"></span> Home</a></li>
			   <li class="active px-3"><a href="add_candidate.php"><span class="fas fa-add-user" ></span> add candidates</a></li> <!as we have no links therefore we use '@' in the href section>
			   <li class="active px-3"><a href="add_elections.php"><span class="fas fa-user" ></span> add elections</a></li>
			   <li class="active px-3"><a href="idrequest.php"><span class="fas fa-request" ></span> id request</a></li>
			   <li class="active px-3"><a href="logout.php"><span class="fas fa-hand"></span> logout</a></li>				  			  
			   <li class="active px-3"><a href="querymanage.php"><span class="fas fa-comment"></span> querymanage</a></li>

			   </ul>
			   <br>
			   </div>
			   </div>
			</nav>

	 
<div class="container">  
<h1 class="mt-4 mb-3 text-capitalize">update query<medium></medium></h1>
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="home.php">Home</a>
</li>
<li class="breadcrumb-item">
<a href="querymanage.php">Manage Queries</a>
</li>
<li class="breadcrumb-item active">Update Query</li>
</ol>    
</div>

	 <div class="container">
						<div class="row align-align-content-center justify-content-center">	
				
				<?php			
					require("includes/db.php");	

					$select="select * from contact_db";		
					$run=$conn->query($select);
					if($run->num_rows>0){
						while($row=$run->fetch_array()){
							$user_name=$row['name'];
							$user_vid=$row['voter_id'];
 							$user_email=$row['email'];
							$user_adhaar=$row['adhaar'];
							$user_message=$row['message'];
						}
						?>

						</form>
				<br>

					<form method="post">
						<div class="form-group">
							<label for="name">Full Name:</label>
							<input type="text" class="form-control" id="name" name="name"  required   value="<?php echo strtoupper($user_name); ?>" readonly>
						</div>

						

						<div class="form-group">
							<label for="email">Email address:</label>
							<input type="email" class="form-control" id="email" name="email"  required   value="<?php echo $user_email; ?>" readonly>
						</div> 


						<div class="form-group">
							<label for="voterid">Voter ID:</label>
							<input type="text" class="form-control" id="vid" name="vid"  required   value="<?php echo $user_vid; ?>" readonly>
						</div> 
					

						<div class="form-group">
							<label for="adhaar">adhaar:</label>
							<input type="text" class="form-control" id="adhaar" name="adhaar"  required   value="<?php echo $user_adhaar; ?>">
						</div>
						
						<div class="form-group">
							<label for="message">Messasge:</label>
							<input type="text" class="form-control" id="message" name="message"  required   value="<?php echo $user_message;?>" readonly>
						</div>

						<div class="form-group">
							<input type="submit" name="update" value="Update ID" class="form-control btn btn-success">
						</div>

						<div class="form-group">
							<input type="submit" name="delete" value="Delete ID" class="form-control btn btn-danger">
						</div>
						
					</form>
						
						
						
					<?php
					}
					else {
						echo "<p class='text text-center alert text-danger'>Record Not Found!!</p>";
						
					}
				?>
						</div>
					</div>
					
			</div>
			<div class="col-sm-6">			
			</div>
		</div>
	</body>	
</html>	


<?php
if(isset($_POST['update'])){
	$user_email=$_POST['email'];
	$user_adhaar=$_POST['adhaar'];
	$update="update users_db set adhaar='$user_adhaar' where email='$user_email'";
	$run=$conn->query($update);
	if($run){		
		$delete="delete from contact_db where email='$user_email'";
		$del=$conn->query($delete);
		if($del){
			echo "<script>alert('$user_email adhaar updated sucessfully and deleted')</script>";			//if an id is generated then after that id request will be deleted.
			echo "<script>window.location.href='index.php'</script>";
		}
	}
	else {
		echo "<script>alert('Something went wrong')</script>";
	}
}
?>

<?php
if(isset($_POST['delete'])){
	$user_email=$_POST['email'];
	$adhaar=$_POST['adhaar'];
	$delete="delete from contact_db where email='$user_email' and adhaar='$adhaar'";
	$exe=$conn->query($delete);
	if($exe){
			echo "<script>alert('$user_email query request deleted succesfully')</script>";
			echo "<script>window.location.href='querymanage.php'</script>";	
		}
	else {
		echo "<script>alert('Something went wrong')</script>";
	}
}
?>


