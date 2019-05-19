
<?php
ob_start();
session_start();
if(isset($_SESSION['login_id']))
{
    $did=$_SESSION['login_id'];
   require_once("../customer/temp.php");
require_once("../connect.php");
?>

<html>
	<head>
		<title>Designs
                </title>
                <link rel="shortcut icon" type="image/x-icon" href="../templates/gallery/images/pageicon.png" />
                <link href="../templates/gallery/css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Videostube iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
                <link href='../templates/gallery///fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
                <style>
                    #pr{
                        font-size: 20px;
                        color: #009688;
                            
                    }
                </style>
	</head>
	<body>
             <?php
             $id=$_GET['id'];
   $sel="select * from dress INNER JOIN design ON dress.lid=design.lid where dress.id='$id'";
    $res=$con->query($sel);
  if($res->num_rows>0)
  {    ?>
	<!----start-wrap---->
	<div class="wrap">
		<!----start-Header---->
		<div class="header">
			
		</div>
		<!----End-Header---->
		<div class="clear"> </div>
		<div class="content">
			<div class="inner-page">
				<div class="searchbar">
					<div class="search-left">
						<p>Designs</p>
					</div>
					<div class="search-right">
						<form>
							<input type="text"><input type="submit" value="" />
						</form>
					</div>
					<div class="clear"> </div>
				</div>
				<div class="title">
                                    <?php
                                    while ($row = $res->fetch_assoc()) {
                                    ?>
					<h3><?php echo $row['dressname'];?></h3>
					<ul>
                                            <!--
						<li><h4>By:</h4></li>
						<li><a href="#">Author</a></li>
						<li><a href="#"><img src="images/sub.png" title="subscribe" />subscribe</a></li>-->
					</ul>
      
				</div>
				<div class="video-inner">
					<a href="#"><img src="../uploads/<?php echo $row['dress'];?> " alt ="<?php echo $row['dress'];?>" width='100%' height='100%'></a>
				</div>
				<div class="viwes">
					<div class="view-links">
						<!--<ul>
							<li><h4>Share on:</h4></li>
							<li><a href="#"><img src="images/f1.png" title="facebook" /></a></li>
							<li><a href="#"><img src="images/t1.png" title="Twitter" /></a></li>
							<li><a href="#"><img src="images/s1.png" title="Google+" /></a></li>
						</ul>
						<ul class="comment1">
							<li><a href="#">Comment(1)</a></li>
							<li><a href="#"><img src="images/re.png" title="report" /><span>Report</span></a></li>
						</ul>
					</div>
					<div class="views-count">
						<p><span>2,500</span> Views</p>
					</div>
					<div class="clear"> </div>-->
				</div>
				<div class="clear"> </div>
				<div class="video-details">
					<ul>
						<li><p>Uploaded on <?php echo $row['cdate'];?> by <?php echo $row['dname'];?></a></p></li>
                                                
						<!--<li><span>Description: <?php //echo $row['pdesc'];?></span></li>-->
					</ul>
					<ul class="other-links">
                                            <li>Description: <?php echo $row['pdesc'];?></li>
                                              <li>Type: <?php echo $row['dtype'];?></li>
						<li>Material: <?php echo $row['material'];?></li>
						<li>Colour: <?php echo $row['colour'];?></li>
                                                <li>Occasion: <?php echo $row['occation'];?></li>
                                                <li><p id='pr'>Price: <?php echo $row['price'];?><span id='pr'> INR</span></p></li>
						<!--<li><a href="#">Twitter.com/videos-tube</a></li>-->
					</ul>
				</div>
				<div class="clear"> </div>
				<div class="tags">
					<ul><!--
						<li><h3>Tags:</h3></li>
						<li><a href="#">Games</a> ,</li>
						<li><a href="#">HD-Videos</a></li>-->
					</ul>
				</div>
				<div class="clear"> </div>
                                                                  <?php
                                    }
  }
  ?>
				
	<!----End-wrap---->
         <div class="footer-cpy">
                <div class="footer-social">
                    <center>    
                <div class="cpy-right">
                    
                    <p style="text-align:center;">© 2018 All rights reserved </p>
                </div>
                    </center>
                <div class="clearfix"></div>
            </div>
           </div>
        
	</body>
</html>
<?php
}
else
{
    header("location: ../index.php");
}
?>
