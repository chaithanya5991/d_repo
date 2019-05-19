
<html>
	<head>
		<title>Designs
                </title>
                <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>templates/gallery/images/pageicon.png" />
                <link href="<?php echo base_url();?>templates/gallery/css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Videostube iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
                <link href='<?php echo base_url();?>templates/gallery///fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>

								<style>
                    #pr{
                        font-size: 20px;
                        color: #009688;

                    }
                </style>
	</head>
	<body style="background-color: #FFF0F5;">

		<!----start-wrap---->
		<div class="wrap">
			<!----start-Header---->
			<div class="header">
				<!----start-Logo---->
	                        <!--
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" title="logo" /></a>
				</div>-->
				<!----End-Logo---->
				<!----start-top-nav---->
				<!--<div class="top-nav">
					<ul>
						<li><a href="index.html">Home</a><p>My Frontpage</p></li>
						<li><a href="#">About</a><p>About this blog</p></li>
						<li><a href="categories.html">Categories</a><p>Be Ur Self</p></li>
						<li><a href="#">Economics</a><p>Human Needs</p></li>
						<li><a href="#">Health</a><p>Take A Trip</p></li>
						<li><a href="contact.html">Contact</a><p>Leave Messages</p></li>
					</ul>
				</div>
				<div class="clear"> </div>
				<!----End-top-nav---->
			</div>
			<!----End-Header---->
			<div class="clear"> </div>

					<div class="container">
						<div class="row">
							<div class="col-md-6">
									<br><br><br><br>

					<div id="myCarousel" class="carousel slide" data-ride="carousel" >
					<!-- Indicators -->
					<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" style="height:720px;">
					<div class="item active">
					<?php
					foreach ($item as $value) {
					?>
					<img src="<?php echo base_url();?>/uploads/<?php echo $value->dimage1;?> " alt ="<?php echo $value->dimage1;?>" width='100%' height='100%'>
					</div>
					<?php } ?>
					<div class="item">
					<?php
					foreach ($item as $value) {
					?>
					<img src="<?php echo base_url();?>/uploads/<?php echo $value->dimage2;?> " alt ="<?php echo $value->dimage2;?>" width='100%' height='100%'>
					</div>
					<?php } ?>
					<div class="item">
					<?php
					foreach ($item as $value) {
					?>
					<img src="<?php echo base_url();?>/uploads/<?php echo $value->dimage3;?> " alt ="<?php echo $value->dimage3;?>" width='100%' height='100%'>
					</div>
					<?php } ?>
					</div>

					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
					</a>
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
								</div>
							</div>
						<div class="col-md-6">
					<div class="title">
						<br><br><br><br>
	                                    <?php
	                                   foreach ($item as $value) {


	                                    ?>
						<h2 style="color:black"><?php echo $value->dname;?></h2>
						<ul>
	                                            <!--
							<li><h4>By:</h4></li>
							<li><a href="#">Author</a></li>
							<li><a href="#"><img src="images/sub.png" title="subscribe" />subscribe</a></li>-->
						</ul>

					</div>
					<div class="video-details">
						<ul>
							<h4><p>Uploaded on <?php echo $value->created_time;?></p></h4>

							<!--<li><span>Description: <?php //echo $row['pdesc'];?></span></li>-->
						</ul>
						<ul class="other-links">
																							<h3>Description: <?php echo $value->pdesc;?></h3>

						</ul>
					</div>
				</div>
		</div>
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
	  ?>
	</body>
</html>
