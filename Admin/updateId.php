<?php
include("includes/header.php");
session_start();
if(!$_SESSION['email']){
	 header("location:login.php"); }
?>

<!DOCTYPE html>
<html>
  <head>
	<title>Update Id Request</title>
		<link rel="stylesheet "href="css/bootstrap.min.css" />	
		<link rel="stylesheet "href="css/fonts.css" />

  </head>

  <div class="container">  
<h1 class="mt-4 mb-3 text-capitalize">update id<medium></medium></h1>
<ol class="breadcrumb">
<li class="breadcrumb-item">
	<a href="home.php">Home</a>
</li>
<li class="breadcrumb-item">
	<a href="idrequest.php">Id Requests</a>
</li>
<li class="breadcrumb-item active">Update ID</li>
</ol>    
</div>
	<body>
		<div class="container">
			<div class="row justify-content-center align-content-center">
				<?php

				$postfix="";
				$prefix="";
				$id_generated="";
					require("includes/db.php");
					$id=$_GET['id'];
					$select="select * from id_request_db where id='$id'";		
					$run=$conn->query($select);
					if($run->num_rows>0){
						while($row=$run->fetch_array()){
							$user_email=$row['email'];
							$user_vid=$row['voter_id'];
							$user_adhaar=$row['adhaar'];
							$user_district=$row['district'];
							$user_taluk=$row['taluk'];
						}
						switch($user_district){
							case 'Bagalkote':
								$prefix="BE"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Bangalore Rural':
								$prefix="BR"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Bangalore Urban':
								$prefix="BU"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Belagavi':
								$prefix="BV"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Bellary':
								$prefix="BY"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Bidar':
								$prefix="BD"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Bijapur':
								$prefix="GJ"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Chamarajanagar':
								$prefix="CR"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Chikmagaluru':
								$prefix="CK"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Chitradurga':
								$prefix="CT"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Dakshina Kannada':
								$prefix="DK"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Davanagere':
								$prefix="DV"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Dharwad':
								$prefix="DW"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Gadag':
								$prefix="GG"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Gulbarga':
								$prefix="GB"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Hassan':
								$prefix="HA"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Haveri':
								$prefix="HV"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Kodagu':
								$prefix="KG"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Kolar':
								$prefix="KL"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Koppal':
								$prefix="KP"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Mandya':
								$prefix="MN"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Mysore':
								$prefix="MY"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Raichur':
								$prefix="RC"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Shimoga':
								$prefix="SG"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Tumkur':
								$prefix="TR"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Udupi':
								$prefix="UP"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
							case 'Uttar Kannada':
								$prefix="UK"; 
								$rand=rand(9999999,1234567); //random variable to generate random numbers
								$postfix="KA";
								$id_generated=$prefix.$rand.$postfix; //combination of prefix rand and postfix. In php '.' is used for concatenation.
								break;
								
							default:
								
								break;	
						}
				?>
				<br>
						
					<form method="post">
						<div class="form-group" >
							<label for="email">Email address:</label>
							<input type="email" class="form-control" id="email" name="email"  required  readonly value="<?php echo $user_email; ?>">
						</div> 
						<div class="form-group">
							<label for="voterid">Voter ID:</label>
							<input type="vid" class="form-control" id="vid" name="vid"  required  readonly value="<?php echo $user_vid; ?>">
						</div> 
						<div class="form-group">
							<label for="adhaar">Adhaar:</label>
							<input type="text" class="form-control" id="adhaar" name="adhaar"  required  readonly value="<?php echo $user_adhaar; ?>">
						</div>					
						<div class="form-group">
							<label for="district">district:</label>
							<input type="text" class="form-control" id="district" name="district"  required  readonly value="<?php echo $user_district; ?>">
						</div>
						<div class="form-group">
							<label for="taluk">taluk:</label>
							<input type="text" class="form-control" id="taluk" name="taluk"  required  readonly value="<?php echo $user_taluk; ?>">
						</div>
						<div class="form-group">
							<label for="idgen">ID Generated by System:</label>
							<input type="text" class="form-control" id="idgen" name="idgen"  required  readonly value="<?php echo strtoupper($id_generated);?>">
						</div>	
						<div class="form-group">
							<input type="submit" name="update" value="Update ID" class="form-control btn btn-success">
						</div>
						<div class="form-group">
							<input type="submit" name="delete" value="delete ID" class="form-control btn btn-danger">
						</div>

					</form>
						
					<?php
					}
					else {
						echo "<p class='text text-center alert text-danger'>Record Not Found!!</p>";
						
					}
				?>	
			</div>
			<div class="col-sm-6">
			
			</div>
		</div>
	</body>	
</html>	
<?php
if(isset($_POST['update'])){
	$user_email=$_POST['email'];
	$id_generated=$_POST['idgen'];
	$update="update users_db set id_generated='$id_generated' where email='$user_email'";
	$run=$conn->query($update);
	if($run){


		$delete="delete from id_request_db where email='$user_email'";
		$del=$conn->query($delete);
		if($del){
			echo "<script>alert('updated sucessfully and deleted')</script>";			//if an id is generated then after that id request will be deleted.
			echo "<script>window.location.href='idrequest.php'</script>";
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
	$delete="delete from id_request_db where email='$user_email' and adhaar='$adhaar'";
	$exe=$conn->query($delete);
	if($exe){
			echo "<script>alert('Id request deleted succesfully')</script>";
			echo "<script>window.location.href='idrequest.php'</script>";	
		}
	else {
		echo "<script>alert('Something went wrong')</script>";
	}
}
?>

