
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="icon" href="<?php echo base_url();?>images/favicon.ico" type="image/ico" />-->

    <title>Designer Junction! | </title>
<link href="<?php echo base_url();?>assets/apple-icon-180x180.png" rel="apple-touch-icon">
  <link href="<?php echo base_url();?>assets/favicon.ico" rel="icon">
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url();?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url();?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url();?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url();?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>/build/css/custom.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <style type="text/css">
        #well{
            margin-left:250px;

            width: 500px;
            margin-top: 100px;
            margin-bottom: 75px;
          
           
        }
      .form-control{
            width: 450px;
            
        }
        .nav_menu{
            background-color:  #54D2F9;
        }
       .field-wrap{
            position: relative;
  margin-bottom: 40px;
          }
          #imm{
      
            width:120px;
            height:120px;
          }
          .error{
            color: red;
          }
    </style>


  </head>


  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"> <span>Designer Junction!</span></a>
            </div>

            <div class="clearfix"></div>
            <?php foreach($file as $res)
            {
             $username=$res->username;
            $image=$res->image;
            }?>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url();?>images/<?php echo$image;?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $username;?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a ><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/home');?>"><i class="fa fa-tachometer pull-right"></i>Dashboard</a></li>
                       <li><a href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/viewdesigners');?>"><i class="fa fa-street-view pull-right"></i>Designers</a></li>
                      <li><a href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/viewdresstype');?>"><i class="fa fa-keyboard-o pull-right"></i>Dress Type</a></li>
                      <li><a href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/viewdefeed');?>"><i class="fa fa-commenting-o pull-right"></i>Feedback from Designers</a></li>
                      <li><a href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/viewcustfeed');?>"><i class="fa fa-comment-o pull-right"></i>Feedback from customers</a></li>
                     <!-- <li><a href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/viewpublic');?>">Public users</a></li>
                       <li><a href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/viewad');?>">Advertisements</a></li>-->
                    
                    </ul>
                  </li>
                  
                
                 
      
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
             
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url();?>images/<?php echo $image;?>" alt=""><?php echo $username;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/profile/');?>"><i class="fa fa-user pull-right"></i> Profile</a></li>
                    
               
                    <li><a href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/logout/');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

               
              </ul>
            </nav>
          </div>
        </div>