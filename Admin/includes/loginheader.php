<link rel="stylesheet "href="css/bootstrap.css" />
	
	<link rel="stylesheet "href="css/fonts.css" />
<div class="container">
	 <nav class="navbar navbar-inverse navbar-top">
		   <div class="container-fluid">
			   <div class="navbar-header">
				<a href="" class="navbar-brand">Online Voting System</a>
				</div>
				<ul class="nav navbar-nav">
				        <li><a href="welcome.php"><span class="glyphicon glyphicon-home" ></span> Home</a></li>
							
								<li><a href="idgenerate.php"><span class="glyphicon glyphicon-thumbs-up" ></span> ID Generate</a></li>
									<li><a href="elections.php"><span class="glyphicon glyphicon-file" ></span> Election</a></li>
										<li><a href="result.php"><span class="glyphicon glyphicon-star" ></span> Result</a></li>
											<li><a href="vote.php"><span class="glyphicon glyphicon-lis-alt" ></span> Vote</a></li>
												<li><a href="logout.php"><span class="glyphicon glyphicon-off" ></span> Log Out</a></li>
												<li><a href="contact.php"><span class="glyphicon glyphicon-comment" ></span> Support</a></li>
												<li><a href="name.php"><span class="glyphicon glyphicon-star" ></span> <?php echo strtoupper($_SESSION['name']);?></a></li>
													
				</ul>
			</div>
		</nav>
