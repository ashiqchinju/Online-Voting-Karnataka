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
    <h1 class="mt-4 mb-3 text-capitalize">add candidates<medium></medium></h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="home.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Add Candidates</li>
</ol>    
</div>

	<div class="container">
		<div class="row">
		<div class="col-6">

			<br>
			<form method="GET" action="add_candidate_details.php">
				<div class="form-group">
					<label>Select Election Name</label>
						<select name="election_name" class="form-control">
							<option value="" selected="selected">Select Election</option>
				<?php
				require("includes/db.php");
				$select="select * from elections_db";
				$run=$conn->query($select);
				if($run->num_rows>0){
					while($row=$run->fetch_array()){
						
					
				?>
							<option value="<?php echo $row['election_name'];?>"><?php echo $row['election_name'];?></option>
				<?php
			}
				}
			
				?>	
				</select>	
					<div class="form-group">
						<label>No of Candidates</label>
						<input type="number" name="total_candidates" class="form-control">
					</div>
				</div>
				<br>
				<input type="submit" name="add_election" class="btn btn-success">
			</form>
		</div>
		<div class="col-6">
		<h3 class="text-capitalize">candidate list:</h3>
		<br>


		<table class="display table-active table-condensed table-bordered" width="100%">
		<thead>
			<tr class="text-capitalize ">
				<th>sl.no</th>
				<th class="text-capitalize">candidate name</th>
				<th class="text-capitalize">party name</th>
				<th class="text-capitalize">Election name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				require("includes/db.php");
				$check="select * from candidates_db";
				$ch=$conn->query($check);
				if($ch->num_rows>0){
					$total=0;
					while($row=$ch->fetch_array()){
						$total=$total+1;
						$id=$row['id'];
						?>
							<tr>
								<td><?php echo $total; ?></td>
								<td class="text-uppercase"><?php echo $row['candidate_name']; ?></td>
								<td><?php echo $row['party_name']; ?></td>
								<td><?php echo $row['election_name']; ?></td>
								<td><a href="editCandidate.php?id=<?php echo $id; ?>">Change</a></td>
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
