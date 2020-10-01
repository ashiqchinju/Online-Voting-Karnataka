<?php
include("includes/header.php");
session_start();
 if(!$_SESSION['email']){
	 header("location:login.php"); 
}
?>

<!DOCTYPE html>
<html>
  <head>
	<title>voting system</title>
		<link rel="stylesheet "href="css/bootstrap.min.css" />	
		<link rel="stylesheet "href="css/fonts.css" />

  </head>
	<body>

	<div class="container">  
    <h1 class="mt-4 mb-3 text-capitalize">add candidate's details<medium></medium></h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="home.php">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="add_candidate.php">Add Candidate</a>
    </li>
    <li class="breadcrumb-item active">Add Candidate's details</li>
</ol>    
</div>


		<div class="container">
			<div class="col-sm-6">
				<h3>Add Candidates</h3>
				<form method="POST">
						<?php
						require("includes/db.php");
						$election_name=$_GET['election_name'];
						$total_candidates=$_GET['total_candidates'];
						
						
						?>
							<label>Election Name:</label>
							<input type="text" name="election_name" value="<?php echo $election_name; ?>" class="form-control" >
						
						<?php
						for($i=1;$i<=$total_candidates;$i++){
							
							?>
							
							<div class="form-group">
								<label>Candidate Name <?php echo $i;?>:</label>
								<input type="text" name="candidate_name<?php echo $i;?>" class="form-control">
							</div>

							<div class="form-group">
								<label>Candidate <?php echo $i;?> Party Name :</label>
								<input type="text" name="party_name<?php echo $i;?>" class="form-control">
							</div>
							<?php
						}
						?>
						<br>
						<input type="submit" name="candidate_detail" class="btn btn-success">
				</form>
			</div>
		</div>
	</body>
</html>	
<?php
if(isset($_POST['candidate_detail'])){
	$total_candidates=$_GET['total_candidates'];
	$election_name=$_POST['election_name'];
	// $party_name=$_POST['party_name'];
	for($i=1;$i<=$total_candidates;$i++){  
	$candidate_name[]=$_POST['candidate_name'.$i];
	$party_name[]=$_POST['party_name'.$i];
	}
	for($i=0;$i<$total_candidates;$i++){
		$insert="insert into candidates_db(candidate_name,party_name,election_name) values('$candidate_name[$i]','$party_name[$i]','$election_name')";
		$run=$conn->query($insert);
	}
		if($run){
			echo "<script>alert('New Candidates Added Succesfully!!')</script>";
			echo "<script>window.location.href='add_candidate.php'</script>";
		
			
		}
		else {
			echo "error";
		}
	}

?>
