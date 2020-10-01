


	<?php include('includes/header.php');
	session_start();
	 if(!$_SESSION['email']){
	 header("location:login.php"); 
}
	?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Admin Manage Queries   </title>

</head>

<body>

<div class="container">  
<h1 class="mt-4 mb-3 text-capitalize">query manage<medium></medium></h1>
<ol class="breadcrumb">
<li class="breadcrumb-item">
	<a href="home.php">Home</a>
</li>
<li class="breadcrumb-item active text-capitalize">query manage</li>
</ol>    
</div>

<form method="GET">
	<div class="ts-main-content">
		
		<div class="content-wrapper">
			<div class="container">

				<div class="row">
					<div class="col-md-12">
						<br>



						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<!-- <div class="panel-heading">User queries</div> -->
							<div class="panel-body">
							
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Name</th>
											<th>Voter ID</th>
											<th>Email Id</th>
											
											<th>Adhaar No</th>
											<th>Message</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
											<th>Name</th>
											<th>Voter ID</th>
											<th>Email Id</th>
										
											<th>Adhaar No</th>
											<th>Message</th>
											<th>Action</th>
										</tr>
										</tr>
									</tfoot>
									<tbody>

								<?php
				require("includes/db.php");
				$select="select * from contact_db";
				 $run=$conn->query($select);
				if($run->num_rows>0){
					$total=0;
					while($row=$run->fetch_array()){
					$total=$total+1;
					$id=$row['id'];
					?>
						<tr>
							<td><?php echo $total;?></td>
							<td><?php echo $row['name'];?></td>  
							<td><?php echo $row['voter_id'];?></td>  
						
							<td><?php echo $row['email'];?></td> 
						
							<td><?php echo $row['adhaar'];?></td>
							<td><?php echo $row['message'];?></td>
							<td><a href="queryUpdate.php?id=<?php echo $id; ?>">Update</a></td>	
						</tr><?php
										}
									}
										?>
										</tr>
										
										
									</tbody>
								</table>

						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>
	</form>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>

