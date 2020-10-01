<?php
include("includes/header.php");
session_start();
 if(!$_SESSION['email']){
	 header("location:login.php"); 
}
?>
<br>

<div class="container">  
    <h1 class="mt-4 mb-3 text-capitalize">update elections<medium></medium></h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="add_elections.php">Add Elections</a>
    </li>
    <li class="breadcrumb-item active">Update Election</li>
</ol>    
</div>

<?php
    require('includes/db.php');
    $select="select * from elections_db";
    $run=$conn->query($select);
    if($run->num_rows>0){
        while($row=$run->fetch_array()){
            $elec_name1=$row['election_name'];
            $elec_start=$row['election_start_date'];
            $elec_end=$row['election_end_date'];
        }
    }
?>

<div class="container">
    <div class="row justify-content-center align-content-center">
        <form action="" method="post">
            <div class="form-group">
                <label for="elecName">Election Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo strtoupper($elec_name1);?>">
            </div>
            <div class="form-group">
                <label for="elecStartDate">Start Date:</label>
                <input type="date" class="form-control" name="start" id="start" value="<?php echo ($elec_start);?>">
            </div>
            <div class="form-group">
                <label for="elecEndDate">End Date:</label>
                <input type="date" class="form-control" name="end" id="end" value="<?php echo ($elec_end);?>">
            </div>
            <div class="form-group">
                <input type="submit" value="update" class="form-control btn-success" name="update">
            </div>
            <div class="form-group">
                <input type="submit" value="delete" class="form-control btn-danger" name="delete">
            </div>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['delete'])){
        $delete="delete from elections_db where election_name='$elec_name'";
        $del=$conn->query($delete);
        if($del){
			echo "<script>alert('$elec_name deleted sucessfully ')</script>";			//if an id is generated then after that id request will be deleted.
            echo "<script>window.location.href='add_elections.php';</script>";
		}

    }
?>

<?php
    if(isset($_POST['update'])) {
        $elec_name=$_POST['name'];
        $elec_start=$_POST['start'];
        $elec_end=$_POST['end'];

        $update="update elections_db set election_start_date='$elec_start' where election_name='$elec_name1'";
        $run1=$conn->query($update);
        if($run1) {
            echo "<script>alert('election details updated succcesfully')</script>";
            echo "<script>window.location.href='add_elections.php';</script>";
        } else {
            echo "<script>alert('Something went wrong')</script>";
        }

        $update1="update elections_db set election_end_date='$elec_end' where election_name='$elec_name1'";
        $run2=$conn->query($update1);
        if($run2) {
            echo "<script>alert('election details updated succcesfully')</script>";
            echo "<script>window.location.href='add_elections.php';</script>";
        } else {
            echo "<script>alert('Something went wrong')</script>";
        }

        $update2="update elections_db set election_name='$elec_name' where election_name='$elec_name1'";
        $run3=$conn->query($update2);
        if($run3) {
            echo "<script>alert('election details updated succcesfully')</script>";
            echo "<script>window.location.href='add_elections.php';</script>";
        } else {
            echo "<script>alert('Something went wrong')</script>";
        }
    }
?>