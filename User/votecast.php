<title>Welcome</title>
<?php
session_start();
include("includes/loginheader.php");
if(!$_SESSION['id_generated']){
	 header("location:elections.php"); 
	 exit();
}
?>
<br>
<div class="container">
		<div class="col-sm-6 col-md-offset-3">
			<form method="post">
				<?php
					require("includes/db.php");
					$election_name=$_GET['election_name'];
					$election_name=str_replace('-',' ',$election_name);
					?>
					
						<div class="form-group">
							<input type="text" value="<?php echo $election_name; ?>"  class="form-control" readonly />
						</div>
					
					<?php
					
					$select="select * from candidates_db where election_name='$election_name'";
					$run=$conn->query($select);
					if($run->num_rows>0){
						while($row=$run->fetch_array()){
							
							?> 
								<div class="form-group">
								<input type="radio" name="candidate_name" class="list=group" value="<?php echo $row['candidate_name'];?>">
								<label><b><u><?php echo $row['party_name'];?></u></b> = <i><?php echo $row['candidate_name'];?> </i></label>
								</div>
								
							
							<?php
						}
					}
						
				?>
				<input type="submit" name="vote_cast" class="btn btn-success" value="Now Cast Your Vote">
			</form>
		</div>
   </div>
	<?php
	
	if(isset($_POST['vote_cast'])){
		$candidate_name=$_POST['candidate_name'];
		$user_email= $_SESSION['email'];



		$select1="select * from users_db where email='$user_email'";
		$run1=$conn->query($select1);
		if ( $run1->num_rows>0) {
			while($row=$run1->fetch_array()){
				$user_vid=$row['voter_id'];
			}
		}


		
		$select="select * from result_db where user_email='$user_email' and election_name='$election_name'";
		$exe1=$conn->query($select);
		if($exe1->num_rows>0){
			echo "<h3 class='text text-center text-danger'>you've already casted your vote against"."-".$election_name. "</h3>";
		}
		else {
		$insert="insert into result_db (user_email,voter_id,candidate_name,election_name) values('$user_email','$user_vid','$candidate_name','$election_name')";
		$run=$conn->query($insert);
		if($run){
			$update="update candidates_db set total_votes=`total_votes`+'1' where candidate_name='$candidate_name' and election_name='$election_name'";
			$exe=$conn->query($update);
			if($exe){
				echo "<h3 class='text text-center text-success'>you've succesfully casted your vote"."-".$election_name. "</h3>";
			}
			else {
				echo "you haven't casted your vote";
			}
			
		}
		else
		{
			echo "error";
		}
		}
	}
	
	?>
	<script type="text/javascript" src="js/bootstrap.js" />
<script type="text/javascript" src="js/jquery.js" />


