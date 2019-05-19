<html lang="zxx">

<head>
    <title>Customer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Desire Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
              <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>templates/face/ust.css" />
    <link href="<?php echo base_url();?>templates/nav/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>templates/nav/css/style.css" type="text/css" rel="stylesheet" media="all">
    <!--jquery-css counter time-->
    <link rel="stylesheet" href="<?php echo base_url();?>templates/nav/css/jquery.countdown.css" />
    <!--//jquery-css counter time-->
    <link href="<?php echo base_url();?>templates/nav/css/font-awesome.css" rel="stylesheet">
    <!-- font-awesome icons -->
   <!-- //Custom Theme files -->
    <!-- web-fonts -->
    <link href="<?php echo base_url();?>templates/nav/fonts.googleapis.com/css?family=Emilys+Candy" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/nav/fonts.googleapis.com/css?family=Redressed" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/nav/fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- //web-fonts -->
</head>


<body>
     <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <p style="color: Yellow; font-size: 24px; font-style: italic;" >
                        <?php foreach ($custname as $key) {
                            echo $key->cname;
                            }?>
                           <!-- <a class="navbar-brand" href="home.php">Desire</a>-->
                        </p>
      <a class="navbar-brand" href="#"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">
        <li> <a  href="<?php echo base_url('index.php/designerctrl/viewcustpage');?>">Home</a></li>
        <li><a  href="<?php echo base_url('index.php/designerctrl/cust_designers');?>">Designers</a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown"  href="#">Designs<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a  href="<?php echo base_url('index.php/designerctrl/cust_designs');?>">Sale</a></li>
        <li ><a  href="<?php echo base_url('index.php/designerctrl/cust_rent');?>">Rent</a></li>
      </ul></li>
        <li><a  href="<?php echo base_url('index.php/designerctrl/cust_wishlist');?>">Wishlist</a></li>
        <li><a  href="<?php echo base_url('index.php/designerctrl/cust_orders');?>">Orders</a></li>
        <li><a  href="<?php echo base_url('index.php/designerctrl/cust_profile');?>">Profile</a></li>
        <li><a  href="<?php echo base_url('index.php/designerctrl/cust_contact');?>">Contact</a></li>
        <li><a  href="<?php echo base_url('index.php/designerctrl/cust_logout');?>">Logout</a></li>
      </ul>
    </div>
  </div>

</nav> <!--
        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li> <a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/viewcustpage');?>">Home</a></li>
        <li><a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/designers');?>">Designers</a></li>
        <li><a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/designs');?>">designs</a></li>
        <li><a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/wishlist');?>">Wishlist</a></li>
        <li><a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/profile');?>">Profile</a></li>
        <li> <a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/logout');?>">Logout</a></li>
      </ul>

    </div>
  </div>
</nav>-->

        <!--
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="main-nav">
                <div class="container">

                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Desire</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1>
                           <!-- <a class="navbar-brand" href="home.php">Desire</a>--><!--
                        </h1>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling --><!--
                    <div class="collapse navbar-collapse navbar-ex1-collapse nav-right">
                        <ul class="nav navbar-nav navbar-right cl-effect-15">
                            <!-- Hidden li included to remove active class from about link when scrolled up past about section --><!--
                            <li class="hidden">
                                <a class="page-scroll" href="#page-top"></a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/viewcustpage');?>">Home</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/designers');?>">Designers</a>
                            </li>
                            <!--><!--
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">Sub Menu
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#models" class="scroll">our</a>
                                    </li>
                                    <li>
                                        <a href="#team" class="scroll">our team</a>
                                    </li>
                                </ul>
                            </li>--><!--

                            <li>
                                <a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/designs');?>">designs</a>
                            </li>
                              <li>
                                <a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/wishlist');?>">Wishlist</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/profile');?>">Profile</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/logout');?>">Logout</a>
                            </li>

                        </ul>
                    </div>
                    <!-- /.navbar-collapse --><!--
                    <div class="clearfix"></div>
                </div>
                <!-- /.container --><!--
            </div>
        </nav>-->

    </div>
