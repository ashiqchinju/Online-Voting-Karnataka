<?php
error_reporting(0);
session_start();
include('includes/db.php');
if(!$_SESSION['email']){
     header("location:login.php"); 
     }
if(isset($_POST['submit']))
{
     $user_name=$_POST['name'];
     $user_vid=$_POST['vid']
;     $user_email=$_POST['email'];
     $user_adhaar=$_POST['adhaar'];
     $user_message=$_POST['message'];
        $insert="insert into contact_db (name,voter_id,email,adhaar,message) values ('$user_name','$user_vid','$user_email','$user_adhaar','$user_message')";
        $run=$conn->query($insert);
      if($run)
        {
            $msg="Your info submitted successfully";
            }
        else 
        {
            $error="Something went wrong. Please try again";
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online voting system</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
        <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>


</head>

<body>
 

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
    <!-- Page Content -->
    <div class="container">

<?php
     $user_email=$_SESSION['email'];
               $select="select * from users_db where email='$user_email'";
       $run=$conn->query($select);
       if($run->num_rows>0){
           while($row=$run->fetch_array()){
               $user_name=$row['name'];
               $user_email=$row['email'];
               $user_vid=$row['voter_id'];
               $user_adhaar=$row['adhaar'];
               $user_district=$row['district'];
               $user_gender=$row['gender'];
               $id_generated=$row['id_generated'];
           }
       }
?>
        <!-- Page Heading/Breadcrumbs -->
       

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Support</li>
        </ol>
          


            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- Content Row -->


        <form name="voting" method="POST">
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Full Name<span style="color:green">*</span></div>
<div><input type="text" name="name" class="form-control" required value="<?php echo $user_name; ?>" readonly></div>
</div>


<div class="col-lg-4 mb-4">
<div class="font-italic">Email Id<span style="color:green">*</span></div>
<div><input type="email" name="email" class="form-control" required value="<?php echo $user_email; ?>" readonly></div>
</div>

<div class="col-lg-4 mb-4">
<div class="font-italic">Voter Id<span style="color:green">*</span></div>
<div><input type="text" name="vid" class="form-control" required value="<?php echo $user_vid; ?>" readonly></div>
</div>

<div class="col-lg-4 mb-4">
<div class="font-italic">Adhaar<span style="color:green">*</span></div>
<div><input type="text" name="adhaar" class="form-control" required value="<?php echo $user_adhaar; ?>" readonly></div>
</div>


<div class="col-lg-4 mb-4">
<div class="font-italic">Message<span style="color:red">*</span></div>
<div><input type="text" name="message" class="form-control" placeholder="Enter your message" required></textarea></div>
</div>
</div>

<br>

<div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
</div>
</div>

</div>
        <!-- /.row -->
</div>

        <!-- /.row -->
</form>   

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
