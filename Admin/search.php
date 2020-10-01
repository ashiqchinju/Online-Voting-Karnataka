<?php
session_start();
include("includes/header.php");
if(!$_SESSION['email']){
    header("location:login.php"); 
}
?>

<div class="container">  
<h1 class="mt-4 mb-3 text-capitalize">search user<medium></medium></h1>
<ol class="breadcrumb">
<li class="breadcrumb-item">
	<a href="home.php">Home</a>
</li>
<li class="breadcrumb-item active text-capitalize">search user</li>
</ol>    
</div>

<div class="container">
    <div class="row justify-content-center align-content-center">
        <form action="" method="POST">
            <div class="form-group">
                <label for="voter id">Enter Voter ID:</label>
                <input type="text" name="voterid" id="voterid" class="form-control" placeholder="Enter your voting ID" required value="" pattern="?{2}/\d{2}/?\d{3}/?\d{6}" >
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
            </div>
        </form>
    </div>



    <div class="row justify-content-center align-content-center">
    <table class="display table-active table-dark table-bordered" width="100%">
		<thead>
			<tr class="text-capitalize ">
				<th>sl.no</th>
				<th class="text-capitalize">name</th>
                <th class="text-capitalize">email id</th>
                <th class="text-capitalize">voter id</th>
				<th class="text-capitalize">adhaar</th>
				<th class="text-capitalize">district</th>
				<th class="text-capitalize">gender</th>
				<th class="text-capitalize">id generated</th>
			</tr>
		</thead>
		<tbody>
<?php 
require("includes/db.php");
if(isset($_POST['submit'])){
$search=$_POST['voterid'];

$select="select * from users_db where voter_id='$search'";
$run=$conn->query($select);
if($run->num_rows>0){


$check="select * from users_db where voter_id='$search'";
$ch=$conn->query($check);
if($ch->num_rows>0){
$total=0;
while($row=$ch->fetch_array()){
$total=$total+1;

?>
<tr>
<td><?php echo $total; ?></td>
<td class="text-uppercase"><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['voter_id']; ?></td>
<td><?php echo $row['adhaar'];?></td>
<td><?php echo $row['district'];?></td>
<td><?php echo $row['gender'];?></td>
<td><?php echo $row['id_generated'];?></td>

</tr>
<?php
}
}
}
}
?>
		</tbody>
    </table>



       
    </div>



    </div>
</div>