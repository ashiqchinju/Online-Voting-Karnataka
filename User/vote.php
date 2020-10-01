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
						        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="welcome.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Vote</li>
		</ol>
		<div class="row justify-content-center align-content-center">
		<div class="col-sm-6 col-md-offset-3">
			<form method="post">
				<label>Election Name:</label>
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
				<br>
				<input type="submit" name="search_candidate" class="btn btn-success col-sm-offset-4" value="Search Candidate">
			</form>
		</div>
   </div>
   <?php
	date_default_timezone_set("Asia/Kolkata");
	if(isset($_POST['search_candidate'])){
		$election_name=$_POST['election_name'];
		$select="select * from elections_db where election_name='$election_name'";
		$run=$conn->query($select);
		if($run->num_rows>0){
			while($row=$run->fetch_array()){
				$election_start_date=$row['election_start_date'];
				$election_end_date=$row['election_end_date'];
			}
		}
		$current_ts=time(); //time() is the predefined function which displays current time
		$election_start_date_ts=strtotime($election_start_date); //strtotime assigns the time value to a string;
		$election_end_date_ts=strtotime($election_end_date);
		if($election_start_date_ts>$current_ts){
		?>	<h1 style="text-align: center; color: blue">Election has not started yet. Please wait</h1>
		<?php }
		else if($current_ts>$election_end_date_ts){
		?>	<h1 style="text-align: center; color:red">Election has been finished!!!</h1>
		<?php }
		else{
			
			?>
				<div class="text  text-success alert text-center">
				<a href="votecast.php?election_name=<?php echo str_replace(' ','-',$election_name);?>">Click here</a> <!--replaces the garbage value in the addresss bar.. i.e., wherever space is there hyphen replaces it-->  
				</div>
			
			<?php
		}
	}
   
   ?>
  
</div>


