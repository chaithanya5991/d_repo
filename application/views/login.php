
<html>
<head>
<title> Login Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fashion Login Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="<?php echo base_url();?>templates/login/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url();?>templates/login/css/font-awesome.css" rel="stylesheet"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- //Custom Theme files -->
<!-- web font -->
<link href="<?php echo base_url();?>templates/login///fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<!-- //web font -->
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="<?php echo base_url('/templates/nav/images/logo.png'); ?>" width="40" height="40"  alt=""></a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">
      	<li><a href="<?php echo base_url('index.php/designerctrl/');?>"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="<?php echo base_url('index.php/designerctrl/signup');?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="<?php echo base_url('index.php/designerctrl/login');?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
	<!-- main -->
	<div class="main">
		<h1 style="color: white;">Sign In</h1>
		<p style=" color: red;">
              <?php
              $err_msg=$this->session->flashdata('logerr');
              if($err_msg){
              echo$err_msg;
}?></p>
		<div class="main-w3lsrow" style="background:gray">
			<!-- login form -->
			<div class="login-form login-form-left">
				<div class="agile-row">
					<h2>Login to your site</h2>
					<span class="fa fa-lock"></span>
					<div class="clear"></div>
					<div class="login-agileits-top">
						<form action="<?php echo base_url('index.php/designerctrl/logincheck');?>" method="post">
							<input type="email" class="name" name="email" Placeholder="Email" required=""/>
							<input type="password" class="password" name="password" Placeholder="Password" required=""/>
							<input type="submit" name="login" value="Login">
						</form>
					</div>
					<div class="login-agileits-bottom">
                                           <h6><a href="<?php echo base_url('index.php/designerctrl/forgot');?>">Forgot password?</a></h6>
					</div>

				</div>
			</div>
		</div>
		<div class="copyright">
			<p> © Login Form. All rights reserved</p>
		</div>
		<!-- //copyright -->
	</div>
	<!-- //main -->
</body>
</html><!--
