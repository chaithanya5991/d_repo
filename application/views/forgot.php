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

<!-- //Custom Theme files -->
<!-- web font -->
<link href="<?php echo base_url();?>templates/login///fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<?php $er=$this->session->flashdata('error');
	if($er){
		?>
		<script type="text/javascript">
			alert('<?php echo $er ;?>');

		</script>
	<?php } ?>
	<!-- main -->
	<div class="main">
		<h1>Forgot Password</h1>
		<div class="main-w3lsrow">
			<!-- login form -->
			<div class="login-form login-form-left">
				<div class="agile-row">
					<h2>Enter Email </h2>
					<span class="fa fa-lock"></span>
					<div class="clear"></div>
					<div class="login-agileits-top">
						<form action="<?php echo base_url('index.php/designerctrl/forget');?>" method="post">
							<input type="email" class="name" name="email" Placeholder="Email" required=""/>
							<!--<input type="password" class="password" name="Password" Placeholder="Password" required=""/>-->
							<input type="submit" name="f" value="Submit">
						</form>
					</div>
					<div class="login-agileits-bottom">
                                            <h6><a href="<?php echo base_url('index.php/designerctrl/login');?>">Login</a></h6>
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
<?php

require_once("./connect.php");
if(isset($_POST['f']))
{


    $email=$_POST["email"];
		echo $email;
    //$val="select Login_ID from login where username='$user'";
    $val=mysqli_query($con,"select *  from login where email ='$email'");
    //$res=  mysqli_query($conn, $val);
$row=mysqli_fetch_array($val);
$num_rows= mysqli_num_rows($val);

 if($num_rows>0)
 {
     $lid=$row['login_id'];

 $query=  mysqli_query($con,"select * from login where login_id='$lid'");
 $row1=mysqli_fetch_array($query);
$num_rows1= mysqli_num_rows($query);
 if($num_rows1>0)
 {
     $eid=$row1['email'];

if($eid==$email)
{
   $ins=mysqli_query($con,"select * from login where `login_id`='$lid'");
    $row2=mysqli_fetch_array($ins);
    $pass=$row2['pass'];
    echo "<script>alert('Your password is '+'$pass');</script>";
}

else {
   echo "<script>alert('Invalid Credentials');</script>";
 }
}
 }
}

?> -->
