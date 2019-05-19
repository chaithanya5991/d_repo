<html lang="zxx">

<head>
    <title>Designer</title>
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
    <link href="<?php echo base_url();?>/templates/nav/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>/templates/nav/css/style.css" type="text/css" rel="stylesheet" media="all">
    <!--jquery-css counter time-->
    <link rel="stylesheet" href="<?php echo base_url();?>/templates/nav/css/jquery.countdown.css" />
    <!--//jquery-css counter time-->
    <link href="<?php echo base_url();?>/templates/nav/css/font-awesome.css" rel="stylesheet">
    <!-- font-awesome icons -->
   <!-- //Custom Theme files -->
    <!-- web-fonts -->
    <link href="<?php echo base_url();?>/templates/nav///fonts.googleapis.com/css?family=Emilys+Candy" rel="stylesheet">
    <link href="<?php echo base_url();?>/templates/nav///fonts.googleapis.com/css?family=Redressed" rel="stylesheet">
    <link href="<?php echo base_url();?>/templates/nav///fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- //web-fonts -->
</head>


<body>
        <!-- header -->
        <!-- Navigation -->
        <nav class="navbar navbar-inverse">
            <div class="main-nav">
                <div class="container">

                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Desire</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <p style="color: Yellow; font-size: 24px; font-style: italic;" >
                        <?php foreach ($designname as $key) {
                            echo $key->dname;
                            }?>
                           <!-- <a class="navbar-brand" href="home.php">Desire</a>-->
                        </p>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse nav-right">
                        <ul class="nav navbar-nav navbar-right cl-effect-15">
                            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                            <li class="hidden">
                                <a class="page-scroll" href="#page-top"></a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/viewdesignpage');?>">Home</a>
                            </li>
                            <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown"  href="#">Designs<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <li><a  href="<?php echo base_url('index.php/designerctrl/de_designs');?>">Sale</a></li>
                            <li ><a  href="<?php echo base_url('index.php/designerctrl/de_rent');?>">Rent</a></li>
                          </ul></li>
                            <li>
                                <a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/de_enquiry');?>">Enquiries</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/de_orders');?>">Orders</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/de_profile');?>">Profile</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/de_contact');?>">Contact/Feedback</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo base_url('index.php/designerctrl/cust_logout');?>">Logout</a>
                            </li>

                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                    <div class="clearfix"></div>
                </div>
                <!-- /.container -->
            </div>
        </nav>
    </div>
