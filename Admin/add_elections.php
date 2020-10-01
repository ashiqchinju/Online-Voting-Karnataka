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
    <h1 class="mt-4 mb-3 text-capitalize">add elections<medium></medium></h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="home.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Add Election</li>
</ol>    
</div>


		<div class="container">
			<div class="row">
			<div class="col-6">
				
				<br>
				<form method="POST">
					<div class="form-group">
						<label>Add Election Name</label>
						<input type="text" name="election_name" class="form-control">
					</div>
					<div class="form-group">
						<label>Election Start Date:</label>
						<input type="date" name="election_start_date" class="form-control">
					</div>
					<div class="form-group">
						<label>Election End Date:</label>
						<input type="date" name="election_end_date" class="form-control">
					</div>
					<input type="submit" name="add_election" class="btn btn-success">
				</form>
			</div>
			<!-- end of adding -->
			<div class="col-6">
				<h3 class="text-capitalize">Election Lists:</h3>
				<br>
				
				
				
				<table class="display table-active table-condensed table-bordered" width="100%">
					<thead >
						<tr class="text-capitalize ">
							<th>sl.no</th>
							<th>election name</th>
							<th>start date</th>
							<th>end date</th>
							<th>change</th>
						</tr>
					</thead>
					<tbody>
						<?php
							require("includes/db.php");	
							$check="select * from elections_db";
							$ch=$conn->query($check);
							if($ch->num_rows>0){
								$total=0;
								while($row=$ch->fetch_array()){
									$total=$total+1;
									$id=$row['id'];
									?>
									<tr>
										<td><?php echo $total; ?></td>
										<td class="text-uppercase"><?php echo $row['election_name']; ?></td>
										<td><?php echo $row['election_start_date']; ?></td>
										<td><?php echo $row['election_end_date']; ?></td>
										<td><a href="editElection.php?id=<?php echo $id; ?>">Change</a></td>
									</tr>
									<?php
								}
							}
						?>
					</tbody>

				</table>
			</div>

		</div>
		</div>
	</body>
</html>	

<?php
require("includes/db.php");
if(isset($_POST['add_election'])){
	$election_name=$_POST['election_name'];
	$election_start_date=$_POST['election_start_date'];
	$election_end_date=$_POST['election_end_date'];
		  $select="select * from elections_db where election_name='$election_name' and  election_start_date='$election_start_date'"; //this ensures that only one email will be used at a time for registration
	  $exe=$conn->query($select);
	  if($exe->num_rows>0){
		  ?>

		  <p class='text text-center text-danger'>Adhaar can be inserted only once</p>

		  <?php
	  }
	  else {
	$insert="insert into elections_db(election_name,election_start_date,election_end_date) values('$election_name','$election_start_date','$election_end_date')";
	$run=$conn->query($insert);
	if($run){
		echo "<script>alert('New Election Added Succesfully!!')</script>";
	}
	else {
		echo "error";
	}
}
}
?>