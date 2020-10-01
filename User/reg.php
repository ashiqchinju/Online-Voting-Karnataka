<head>
<link rel="stylesheet "href="css/bootstrap.min.css" />
<script src="js/all.js"></script>

<script>
    function random_function(){
        let a = document.getElementById('district').value;
        if ( a === 'Bagalkote' ) {
            var arr = ['select taluk','Bagalkote','Jamkhandi','Mudhol','Badami','Bilahi','Hunagunda','Ilkal','Rabkavi Banhatti','Gulegudda','Terdala'];
        }
        else if ( a === 'Bangalore Rural ') {
            var arr = ['select taluk','Nelamangala','Doddballapura','Devanapura','Hosakote'];
        } else if (a === 'Bangalore Urban'){
            var arr = ['select taluk','Bengaluru','Kengeri','Krishnarajapura','Yelahanka'];
        }
        else if (a === 'Belagavi'){
            var arr = ['select taluk','athani','belagavi','bailhongal','chikkodi','gokak','khanapura','mudalgi','nippani','raybag','savdatti','ramadurga','kagawada','hukkeri','kitturu','yargatti'];
        }
        else if (a === 'Bellary'){
            var arr = ['select taluk','bellary','hagoribommanahalli','harappanahalli','hoovina hadagali','hosapete','kudligi','sanduru','siraguppa'];
        }
        else if (a === 'Bidar'){
            var arr = ['select taluk','aurad','basavaklayana','balkij','bidar','chitgoppa','hulsoor','humnabad','kamalnagar'];
        }
        else if (a === 'Bijapur'){
            var arr = ['select taluk','bijapur','indi','basavana bagevadi','sindgi','muddebihalli','talikote','devara hipparagi','chadchan','tikota','bableshwar','nidagundi','kolhar','almel'];
        }
        else if (a === 'Chamarajanagar'){
            var arr = ['select taluk','chamarajanagar','kollegala','gundlupete','yelanduru','hanur','rampura'];
        }
        else if (a === 'Chikballapura'){
            var arr = ['select taluk','chikballapura','bagepalli','chintamani','gauribidanur','gudibanda','sidhlaghatta','chelur'];
        }
        else if (a === 'Chikmagaluru'){
            var arr = ['select taluk','chikmagaluru','kadur','tarikere','koppa','sringeri','mudigere','ajjampura','narasimharajapura','kalasa'];
        }
        else if (a === 'Chitradurga'){
            var arr = ['select taluk','chitradurga','challakere','hiriyur','holalkere','hosadurga','molakalmuru'];
        }
        else if (a === 'Dakshina Kannada'){
            var arr = ['select taluk','mangaluru','ullal','mulki','moodbidri','bantwala','beltangadi','puttur','sulya','kadaba'];
        }
        else if (a === 'Davanagere'){
            var arr = ['select taluk','davanagere','harihara','honnalli','nyamathi','jagaluru'];
        }
        else if (a === 'Dharwad'){
            var arr = ['select taluk','kalghatghi','dharwad','hubballi rural','hubballi urban','kundgol','navalgund','alnavara','annigeri'];
        }
        else if (a === 'Gadag'){
            var arr = ['select taluk','gadag','nargund','mundargi','ron','shirhatti'];
        }
        else if (a === 'Gulbarga'){
            var arr = ['select taluk','gulbarga','afzalpura','alanda','chincholi','chitapura','jevargi','sedam','shahbad'];
        }
        else if (a === 'Hassan'){
            var arr = ['select taluk','hassan','arasikere','channarayapattana','holenarsipura','sakleshpura','aluru','arakalgudu','beluru'];
        }
        else if (a === 'Haveri'){
            var arr = ['select taluk','ranibennuru','byadagi','hangal','haveri','savaruru','hirekeruru','shiggavi','rattihalli'];
        }
        else if (a === 'Kodagu'){
            var arr = ['select taluk','madikeri','somwarpete','virajapete'];
        }
        else if (a === 'Kolar'){
            var arr = ['select taluk','kolara','bangarapete','maluru','mulabagilu','srinivasapura','kolar gold fields'];
        }
        else if (a === 'Koppal'){
            var arr = ['select taluk','gangavati','koppala','kushtagi','yalaburga','kanakagiri','karatagi','kukanoor'];
        }
        else if (a === 'Mandya'){
            var arr = ['select taluk','mandya','maddur','malavvalli','srirangapattana','krishnarajapete','nagamangala','pandavapura'];
        }
        else if (a === 'Mysore'){
            var arr = ['select taluk','mysore','hunasur','krishnarajanagara','nanjangudu','heggadadevanakote','piriyapattana','t narasipura','saragur','saligrama'];
        }
        else if (a === 'Raichur'){
            var arr = ['select taluk','raichur','manvi','sindhnur','devadurga','lingsugur','sirawara','maski'];
        }
        else if (a === 'Ramanagara'){
            var arr = ['select taluk','ramanagara','magadi','kanakapura','channapatna','harohalli'];
        }
        else if (a === 'Shimoga'){
            var arr = ['select taluk','shimoga','bhadravati','shikaripura','soraba','thirthalli','sagara','hosanagara'];
        }
        else if (a === 'Tumkur'){
            var arr = ['select taluk','tumkur','chikkanayakanahalli','kunigal','madugiri','sira','tiptur','gubbi','koratagere','pavagada','turuvekere'];
        }
        else if (a === 'Udupi'){
            var arr = ['select taluk','Udupi','Kaup','Brahmavara','Karkala','Kundapura','Hebri','Byndoor'];
        }
        else if (a === 'Uttar Kannada'){
            var arr = ['select taluk','Karawara','Sirsi','Joida','dandeli','bhatkal','kumta','ankola','haliyal','honnavar','mundgod','siddapura','yellapura'];
        }
        else if (a === 'Yadagiri'){
            var arr = ['select taluk','yadagiri','shahpura','surapura','gurmitkal','vadagera','hunsagi'];
        } else {
            var arr = [''];
        }

        let string = '';
        for( i=0;i<arr.length;i++ ){
            string = string + "<option value=" + arr[i] + ">" + arr[i] + "</option>";
        }

        document.getElementById('taluk').innerHTML=string;
    }
</script>


</head>
<?php
require("includes/db.php");
$adhaarError="";
$accountSuccess="";
$passwordError = "";
if(isset($_POST['submit']))
{
	 $user_name=$_POST['name'];
	 $user_email=$_POST['email'];
	 $user_adhaar=$_POST['adhaar'];
	 $user_gender=$_POST['gender'];
	 $user_district=$_POST['district'];
	 $user_taluk=$_POST['taluk'];
	 $user_password=$_POST['password'];
	 $user_dob=$_POST['dob'];
	 $user_vid=$_POST['voterid'];



	


	  $select="select * from users_db where adhaar='$user_adhaar' and voter_id='$user_vid'"; //this ensures that only one email will be used at a time for registration
	  $exe=$conn->query($select);
	  if($exe->num_rows>0){
		  $adhaarError="<p class='text text-center text-danger'>Adhaar or voter id can be inserted only once</p>";
	  } 
	

	  else {

		$insert="insert into users_db (name,email,adhaar,gender,dob,voter_id,district,taluk,password) values ('$user_name','$user_email','$user_adhaar','$user_gender','$user_dob','$user_vid','$user_district','$user_taluk','$user_password')";
	  $run=$conn->query($insert);
	   if($run)
		{
		  $accountSuccess="<p class='text text-center text-success'>Account Created Successfully</p>";
	    }
	    else
	    {
		  echo "error";
	    }  
	  }
	}




?>

  <div class="container">
  		        <nav class="navbar navbar-expand-sm bg-dark navbar-top">
		    <div class="container-fluid">
			   <div class="navbar-header">
			   <a href="#" class="navbar-brand text-primary">ONLINE VOTING SYSTEM</a>
  	 		   </div>
			   <ul class="nav navbar-nav">
			   <li class="active-nav">
			   <li class="active px-5"><a href="index.php"><span class="fas fa-home" ></span> Home</a></li> 
			   <li class="active px-5"><a href="reg.php"><span class="fas fa-user-circle" ></span> Sign Up</a></li>
			   <li class="active px-5"><a href="login.php"><span class="fas fa-user-secret" ></span> Log In</a></li>
			   <li class="active px-5"><a href="about.php"><span class="fas fa-comment"></span> Help</a></li>					  			  
			   </ul>
			   <br>
     </div>	 
	 </nav>

	 			
			
        <h1 class="mt-4 mb-3">Register <medium></medium></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Sign Up</li>
        </ol>

  
	 <!-- <div class="row align-items-center justify-content-center">	

	    <div class="col-sm-8 col-sm-offset-2 bg-transparent" style="box-shadow:2px 2px 2px 2px gray;">
		<h4 class="text text-center alert bg-primary" style="color:white">User Registratioin</h4> -->

		 <div class="row align-items-center justify-content-center">	 
	    <div class="col-sm-8 col-sm-offset-2 bg-transparent  alert-success" style="box-shadow:2px 2px 2px 2px gray;">
		<h4 class="text text-center alert bg-primary" style="color:white">User Registratioin</h4>

		<?php
		if($adhaarError!=""){
			echo $adhaarError;
		}
		if($accountSuccess!=""){
			echo $accountSuccess;
		}
		if($passwordError!=""){
			echo $passwordError;
		}

		?>
		<form method="post" onsubmit="return check();">
	 	 <div class="form-group">
	     <label for="name">Full Name:</label>
	     <input type="text" class="form-control text-uppercase" id="name" name="name" placeholder="Enter Full Name" required value="">
     </div>
	 <div class="form-group">
	     <label for="email">Email address:</label>
		 <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required value="">
	 </div>
	 <div class="form-group">
	       <label for="adhaar">Adhaar Number:</label>
		   <input type="text" class="form-control" id="adhaar" name="adhaar" placeholder="Enter Adhaar Number" pattern="\d*" required value="" minlength="12" maxlength="12" size="12"> 
	 </div>	
	 <div class="form-group">
	     <label for="Gender">Gender:</label>
	     <select class="form-control" name="gender" required value="">
	           <option value="">Select</option>
			   <option value="Male">Male</option>
	           <option value="Female">Female</option>
	           <option value="Transgender">Transgender</option>
	     </select>
	 </div>
	 <div class="form-group">
		 <label for="dob">DOB</label>
		 <input type="date" class="form-control" id="dob" name="dob" required value="">
	 </div>
	 <div class="form-group">
		 <label for="voter id">Voter ID:</label>
		 <input type="text" name="voterid" id="voterid" class="form-control" placeholder="Enter your voting ID" required value="" pattern="?{2}/\d{2}/?\d{3}/?\d{6}" minlength="16" maxlength="16" size="16">
	 </div>
	 <div class="form-group">
	      <label for="district">district</label>
		 <select class="form-control" name="district" id="district" required value=""  onchange="random_function()">
			<option value=" "> Select district</option>	
			<option value="Bagalkote">Bagalkote</option>	
		    <option value="Bangalore Rural">Bangalore Rural</option>
		    <option value="Bangalore Urban">Bangalore Urban</option>
		    <option value="Belagavi">Belagavi</option>
		    <option value="Bellary">Bellary</option>
		    <option value="Bidar">Bidar</option>
		    <option value="Bijapur">Bijapur</option>
		    <option value="Chamarajanagar">Chamarajanagar</option>
		    <option  value="Chikmagaluru">Chikballapura</option>
		    <option  value="Chikmagaluru">Chikmagaluru</option>
		    <option  value="Chitradurga">Chitradurga</option>
		    <option  value="Dakshina Kannada">Dakshina Kannada</option>
		    <option  value="Davanagere">Davanagere</option>
		    <option  value="Dharwad">Dharwad</option>
		    <option  value="Gadag">Gadag</option>
		    <option  value="Gulbarga">Gulbarga</option>
		    <option  value="Hassan">Hassan</option>
		    <option  value="Haveri">Haveri</option>
		    <option  value="Kodagu">Kodagu</option>
		    <option  value="Kolar">Kolar</option>
		    <option  value="Koppal">Koppal</option>
		    <option  value="Mandya">Mandya</option>
		    <option  value="Mysore">Mysore</option>
		    <option  value="Raichur">Raichur</option>
		    <option  value="Raichur">Ramanagara</option>
		    <option  value="Shimoga">Shimoga</option>
		    <option  value="Tumkur">Tumkur</option>
		    <option  value="Udupi">Udupi</option>
		    <option  value="Uttar Karnataka">Uttar Karnataka</option>
		    <option  value="Yadagiri">Yadagiri</option>
		    
		 </select>
  
     
    
         <label for="taluk">Taluk</label>
         <select name="taluk" id="taluk" class="form-control text-capitalize" required value="" onchange="random_function1()">

         </select>
     </div> 
	 		
	 <div class="form-group">
	     <label for="password">Password:</label>
		 <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password(small letter,capital letter and a number ex: Abc101,aaBcd1 etc)" required value="" minlength="6" maxlength="16" size="16" pattern="[A-Za-z0-9@!#$%^&*()_-=-+./,'\[]{}]{6,10}]" >
		 <input type="checkbox" onclick="myFunction()"><span class="fas fa-eye"></span>
	 </div>	 

	 <div class="form-group">
		<label for="confirm password">Confirm Password:</label>
		<input type="password" name="cpass" id="cpass" placeholder="Confirm your password" class="form-control">
	 </div>




		<br>
      <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
      </div>
  
  </div>
  </form>
</div>

<script>
	function myFunction() {
		let x = document.getElementById('password');
		if ( x.type === 'password' ) {
			x.type = 'text';
		} else {
			x.type = 'password';
		}
	}

	function check() {
		if (document.getElementById('password').value != document.getElementById('cpass').value) {
			alert("confirm password doesn't match");
			document.getElementById('cpass').focus();
			return false;
		}
		if(document.form1.email.value=="")
  		{
    	alert("Plese Enter your Email Address");
		document.form1.email.focus();
		return false;
  		}
 	 	e=document.form1.email.value;
		f1=e.indexOf('@');
		f2=e.indexOf('@',f1+1);
		e1=e.indexOf('.');
		e2=e.indexOf('.',e1+1);
		n=e.length;

		if(!(f1>0 && f2==-1 && e1>0 && e2==-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
		{
			alert("Please Enter valid Email");
			document.form1.email.focus();
			return false;
		}
		return true;
	}

</script>

</body>
</html>
