<?php
include("includes/header.php");
session_start();
 if(!$_SESSION['email']){
	 header("location:login.php"); 
}
?>
<br>

<div class="container">  
    <h1 class="mt-4 mb-3 text-capitalize">update candidate<medium></medium></h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="add_candidate.php">Add Candidate</a>
    </li>
    <li class="breadcrumb-item active">Update Candidate</li>
</ol>    
</div>

<?php
    require('includes/db.php');
    $select="select * from candidates_db";
    $run=$conn->query($select);
    if($run->num_rows>0){
        while($row=$run->fetch_array()){
            $cname=$row['candidate_name'];
            $pname=$row['party_name'];
            $ename=$row['candidate_name'];
           
        }
    }
?>

<div class="container">
    <div class="row justify-content-center align-content-center">
        <form action="" method="post">
            <div class="form-group">
                <label for="candidName">Candidate Name:</label>
                <input type="text" class="form-control" name="cname" id="cname" value="<?php echo strtoupper($cname);?>">
            </div>
            <div class="form-group">
                <label for="pname">Party Name:</label>
                <input type="text" class="form-control" name="pname" id="pname" value="<?php echo strtoupper($pname);?>">
            </div>
            <div class="form-group">
                <label for="ename">Election Name:</label>
                <input type="text" class="form-control" name="ename" id="ename" value="<?php echo strtoupper($ename);?>">
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
        
        $delete="delete from candidates_db where candidate_name='$cname'";
        $del=$conn->query($delete);
        if($del){
            echo "<script>alert('$cname deleted sucessfully ')</script>";		
            	//if an id is generated then after that id request will be deleted.
            echo "<script>window.location.href='add_candidate.php';</script>";
		}
    }
?>

<?php
    if(isset($_POST['update'])) {
        $candidate_name=$_POST['cname'];
        $party_name=$_POST['pname'];
        $election_name=$_POST['ename'];

        $update="update candidates_db set party_name='$party_name' where candidate_name='$cname'";
        $run1=$conn->query($update);
        if($run1) {
            echo "<script>alert('candidate details updated succcesfully')</script>";
            echo "<script>window.location.href='add_Candidate.php';</script>";
        } else {
            echo "<script>alert('Something went wrong')</script>";
        }

        $update1="update candidates_db set election_name='$election_name' where candidate_name='$cname'";
        $run2=$conn->query($update1);
        if($run2) {
            echo "<script>alert('candidate details updated succcesfully')</script>";
            echo "<script>window.location.href='add_Candidate.php';</script>";
        } else {
            echo "<script>alert('Something went wrong')</script>";
        }

        $update2="update candidates_db set candidate_name='$candidate_name' where candidate_name='$cname'";
        $run3=$conn->query($update2);
        if($run3) {
            echo "<script>alert('candidate details updated succcesfully')</script>";
            echo "<script>window.location.href='add_Candidate.php';</script>";
        } else {
            echo "<script>alert('Something went wrong')</script>";
        }
    }
?>
