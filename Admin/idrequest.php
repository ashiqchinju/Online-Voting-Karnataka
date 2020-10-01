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

		<link rel="stylesheet "href="css/bootstrap.min.css" />	
		<link rel="stylesheet "href="css/fonts.css" />

  </head>
	<body>

<div class="container">  
<h1 class="mt-4 mb-3 text-capitalize">id requests<medium></medium></h1>
<ol class="breadcrumb">
<li class="breadcrumb-item">
	<a href="home.php">Home</a>
</li>
<li class="breadcrumb-item active">ID Requests</li>
</ol>    
</div>

		<div class="container">
			<div class="row justify-content-center align-content-center">
	

				<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<tr>
					<th>#</th>
					<th>User Email</th>
					<th>User Voter ID</th>
					<th>User Adhaar</th>
					<th>User district</th>
					<th>User Taluk</th>
					<th>Action</th>
				
				</tr>
				<?php
				require("includes/db.php");
				$select="select * from id_request_db";
				$run=$conn->query($select);
				if($run->num_rows>0){
					$total=0;
					while($row=$run->fetch_array()){
					$total=$total+1;
					$id=$row['id'];
					?>
						<tr>
							<td><?php echo $total;?></td>  
							<td><?php echo $row['email'];?></td> 
							<td><?php echo $row['voter_id'];?>  <a href="search.php"><span  class="fas fa-search"></span></a></td> 
							<td><?php echo $row['adhaar'];?></td>
							<td><?php echo $row['district'];?></td>
							<td><?php echo $row['taluk'];?></td>
							<td><a href="updateId.php?id=<?php echo $id; ?>">Update/Delete</a></td>	
							
						</tr>
					
					<?php
					}
				}	
				else{
					
					?>
					
						<tr>
							<td colspan="5" class=" text text-center">RECORD NOT FOUND!!!</td>
						</tr>
					<?php
				}
				?>
			</table>
			</div>
		</div>

	
	</body>
</html>	