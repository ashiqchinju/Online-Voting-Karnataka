<title>Welcome</title>
<?php
session_start();

if(!$_SESSION['id_generated']){
	 header("location:elections.php"); 
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
            <li class="breadcrumb-item active">Result</li>
		</ol>
		<div class="row justify-content-center align-content-center">
		<div class="col-sm-6 col-md-offset-3">
			<h3 class="text text-info text-center"><u><b>Result Portion</b></u></h3>
			<p class="text text-danger"><i>In this section,you'll see the results of closed or date expired</i></p>
			<form method="post" action="">
				<div class="form-group">
					<select class="form-control" name="election_name">
					<option  selected="selected" value="">Select Election</option>
					<?php
					$current_ts=time();
					require("includes/db.php");
					$select="select * from elections_db";
					$run=$conn->query($select);
					if($run->num_rows>0){
						while($row=$run->fetch_array()){
						$election_name=$row['election_name'];
						$election_start_date=$row['election_start_date'];
						$election_end_date=$row['election_end_date'];
						?>
						<?php 
						$election_end_date_ts=strtotime($election_end_date);  //using this will only shows those election whose dates are finished or expired
						if($election_end_date_ts<$current_ts){
							
						
						?>
							<option value="<?php echo $election_name; ?>"><?php echo $election_name;?></option>
						<?php	
						}
						}
					}
					
					?>
				</select>	
				<br>
				<div class="form-group">
					<input type="submit" name="search_results" class="btn btn-success" value="search result">
				</div>
				</div>
			</form>
			<table class="table table-responsive table-hover table-bordered text-center">
				<tr>
					<td>#</td>
					<td>Candidate Name</td>
					<td>Party Name</td>
					<td>Obtained Votes</td>
					<td>Winning Status</td>
				</tr>
					<?php
				if(isset($_POST['search_results'])){
					$election_name=$_POST['election_name'];
					$select="select * from result_db where election_name='$election_name'";
					$run=$conn->query($select);
					if($run->num_rows>0){
						$total_election_votes=0;
						while($row=$run->fetch_array()){ //this loop is used to get candidates total votes
							$total_election_votes=$total_election_votes+1;
						}
					}
					$select1="select * from candidates_db where election_name='$election_name'";
					$run1=$conn->query($select1);
					if($run1->num_rows>0){
						$total=0;
						while($row=$run1->fetch_array()){ //this loop is used to get candidates those who're related with that/certain election
							$total=$total+1;
							$party_name=$row['party_name'];
							$candidate_name=$row['candidate_name'];
							$total_votes=$row['total_votes'];
							$percentage=(($total_votes/$total_election_votes)*100);
							?>
							<tr>

								<td><?php echo $total;?></td>
								<td><?php echo $candidate_name;?></td>
								<td><?php echo $party_name; ?></td>
								<td><?php echo $total_votes;?></td>
								<td>
								<?php
									if($percentage>50){
										?>
										<div class="progress">
											<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="<?php echo $percentage; ?>" style="width: <?php echo $percentage;?>%">
												<?php echo $percentage;?>								
											</div>
										</div>
										<?php
									}
									else if($percentage>40){
										?>
										<div class="progress">
											<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="<?php echo $percentage; ?>" style="width: <?php echo $percentage;?>%">
												<?php echo $percentage;?>								
											</div>
										</div>
										<?php
									}
								else{
									?>
									<div class="progress">
											<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="<?php echo $percentage; ?>" style="width: <?php echo $percentage;?>%">
												<?php echo $percentage;?>								
											</div>
										</div>
									<?php
								}	
								?>
							</td>
							</tr>
							
							<?php
						}
						?>
							<tr>
								<td colspan="3">Total Votes</td>
								<td ><?php echo $total_election_votes; ?></td>
								<td></td>
							
							</tr>
						<?php
					}
					else {
						?>
							<tr>
							<td colspan="4">Record Not Found</td>
						</tr>
						
						<?php
					
					}
				
				}
			?>
			</table>	
			</div>
			</div>
		</div>
   
   


