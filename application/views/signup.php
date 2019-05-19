
<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<link href="<?php echo base_url();?>templates/signup/css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Alley Signup & Signin Form Tab Form,Login Forms,Sign up Forms,Registration Forms,News letter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="<?php echo base_url();?>templates/signup/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>templates/signup/js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default', //Types: default, vertical, accordion
							width: 'auto', //auto or any width like 600px
							fit: true   // 100% fit in a container
						});
					});
				   </script>
                                   <style>
                                   .error{
                                   	color:red;
                                   }
                                                                     </style>
                                                                <!--      <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
  jQuery(function ($) {
$( "#form1" ).validate({
  rules: {

    pass:{
      required:true,
        minlength:8
    },
    cpass:{
      required:true,
        minlength:8,
        equalTo:"#pass"
    },


},
    messages:{


        pass:{
        required:"Please Enter a Password"
       },
        cpass:{
        equalTo:"Password should be same"
       }

  },

});
$( "#form2" ).validate({
  rules: {

    dpass:{
      required:true,
        minlength:8
    },
    cdpass:{
      required:true,
        minlength:8,
        equalTo:"#dpass"
    },


},
    messages:{


        dpass:{
        required:"Please Enter a Password"
       },
        cdpass:{
        equalTo:"Password should be same"
       }

  },

});
});
</script>-->
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

	<h1 style="color: white;"> Sign Up  </h1>
			<p class="error">
              <?php
               $this->load->helper('form');
              $err_msg=$this->session->flashdata('error');
              if($err_msg){
              echo$err_msg;
}?></p>
<div class="main-content">
	<div class="sap_tabs">

		<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">

			  <ul>
			  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Customer</span></li>
				  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Designer</span></li>

			  </ul>
			  <!---->

			<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
				<div class="facts">
					<!--login1-->
					<div class="register">
						<form action="<?php echo base_url('index.php/designerctrl/custsignup');?>" method="post" name="form1" id="form1" >
							<input placeholder="Full Name" name="name" type="text" required="">
                                                        <select name="gender" class="" required="">
						<option value="">Gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
                                                        <input  name="dob" type="text" placeholder="DOB"  onfocus="this.type = 'date';" onblur="if (this.type = 'text') {this.type = 'text';}"  required="">
                                                        <!--
                                                        <textarea name="addr" placeholder="Address..."> ghtghth</textarea>-->
                                                        <textarea name="addr" placeholder="Address"  required></textarea>

                                                        <input type="text" name="city" placeholder="City" required="">
                                                          <input type="text" name="state" placeholder="State" required="">
							<input type="text" name="pincode" size="6" minlength="6" maxlength="6" placeholder="Pincode" required="">
                                                          <input placeholder="Phone" name="phone" type="text" size="10" minlength="10" maxlength="10" required="">
                                                          <input data-validation="email" placeholder="Email" name="mail" type="email" required="" pattern="[[a-z]*0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                            							<input placeholder="Password" type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 characters" placeholder="Password"  required="">
							<input placeholder="Confirm Password" name="cpass" type="password" required="">
								<div class="sign-up">
									<input type="submit" name="cus" value="Create Account"/>
								</div>
						</form>

					</div>
				</div>
			</div>

			<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
				<div class="facts">
					<div class="register">
                                            <form action="<?php echo base_url('index.php/designerctrl/designsignup');?>" method="post" name="form2" id="form2">
                                                <input placeholder="Company Name/Designer Name" name="dname" class="mail" type="text" required="">
                                                 <textarea name="daddr" placeholder="Address" ></textarea>
                                                 <!--
                                                 <textarea name="daddr" placeholder="Address..."> </textarea>-->

                                                <input placeholder="City" name="dcity" class="mail" type="text" required="">
                                                <input placeholder="State" name="dstate" class="mail" type="text" required="">
                                                <input placeholder="Pincode" name="dpincode" size="6" maxlength="6" minlength="6" class="mail" type="text" required="">
                                                  <input placeholder="Experience" name="exp" class="mail" type="text" required="">
                                                  <input placeholder="Phone" name="dphone" type="text" size="10" minlength="10" maxlength="10" required="">
							<input data-validation="email" placeholder="Email" name="demail" class="mail" type="email" required="">
							<input placeholder="Password" name="dpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" class="lock" type="password" required="">
                                                        <input placeholder="Confirm Password" name="cdpass" type="password" required="">
                                                        <textarea name="desc" placeholder="Description" required="" ></textarea>
                                                    <input placeholder="Webpage(If any)" name="web" class="mail" type="text" >
							<div class="sign-up">
								<input type="submit" name="des" value="Create Account"/>

							</div>
						</form>

					</div>
				</div>
			</div>

		</div>

	</div>
</div>
	 <!--start-copyright-->
   		<div class="copy-right">
   			<div class="wrap">
				<p>&copy; Signup Form.  All Rights  Reserved </p>
			</div>
		</div>
	<!--//end-copyright-->

</body>


</html><!--
