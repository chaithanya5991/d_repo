
<html lang="zxx">

<head>
	<title>Wellness a Beauty Category Flat Bootstrap Responsive Website Template| Home :: w3layouts</title>

	<!--meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Wellness Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//meta tags ends here-->
	<!--booststrap-->
        <link href="<?php echo base_url();?>templates/dgrid/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<!--//booststrap end-->
	<!-- font-awesome icons -->
        <link href="<?php echo base_url();?>templates/dgrid/css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons -->
        <link rel="stylesheet" href="<?php echo base_url();?>templates/dgrid/css/lightbox.css">
	<!--gallery-->

	<!--stylesheets-->
        <link href="<?php echo base_url();?>templates/dgrid/css/style.css" rel='stylesheet' type='text/css' media="all">
	<!--//stylesheets-->
        <link href="<?php echo base_url();?>templates/dgrid///fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">
        <style>
            .title{
                margin-top: 59px;
            }
            .navbar {
    position: relative;
    min-height: 50px;
    margin-bottom: 0px;
    border: 1px solid transparent;
}
            </style>


</head>
<body>

	<div style="background-color:#FFF0F5;">
		<div class="headd"  style="">
			<div style="    background-color: #0000009c;padding: 90px 0px;">
				<h1 style="color: white;text-align: center;font-size: 3em;">Gallery</h1>
			</div>

		</div>


			<div class="gallery-imges">
			<div class="container" style="">
				<div class="row" style="padding: 90px 0px;">
					  <?php foreach ($design as $value) {
                                                    	$eid=$value->login_id;
                                                    ?>
					<div class="col-md-4">

						 <a href="<?php echo base_url('index.php/designerctrl/cust_viewdesignes/'.$eid);?>" class="gallery-box" data-lightbox="example-set" data-title="">
					<!--<a href="../uploads/<?php echo $row['dimage'];?>" class="gallery-box" data-lightbox="example-set" data-title="">-->
                                            <img src="<?php echo base_url();?>/uploads/<?php echo $value->dimage;?> " alt ="<?php echo $value->dimage;?>" width='100%' height='100?%' class="img-responsive zoom-img">
					<!--<img src="images/g1.jpg" alt="" class="img-responsive zoom-img">-->
				</a>
				<div class="gallery-info">
				<h4><?php echo $value->dname;?></h4>
				<p><?php echo $value->desc;?></p>
				</div>
				<br><br>
					</div>

				 <?php
                                                }

                            ?>
                        </div>
			</div>

			<!--=	<div class="col-md-3 col-sm-6 col-xs-6 gallery-grids">
                                    <a href="<?php echo base_url('index.php/designerctrl/cust_viewdesignes/'.$eid);?>" class="gallery-box" data-lightbox="example-set" data-title="">
					<!--<a href="../uploads/<?php echo $row['dimage'];?>" class="gallery-box" data-lightbox="example-set" data-title="">-->
                                          <!--=  <img src="<?php echo base_url();?>/uploads/<?php echo $value->dimage;?> " alt ="<?php echo $value->dimage;?>" width='100%' height='100?%' class="img-responsive zoom-img">
					<!--<img src="images/g1.jpg" alt="" class="img-responsive zoom-img">-->
				<!--=</a>
				<div class="gallery-info">
				<h4><?php echo $value->dname;?></h4>
				<p><?php echo $value->desc;?></p>
				</div>-->
				</div>

				<!--<div class="col-md-3 col-sm-6 col-xs-6 gallery-grids">
					<a href="images/g2.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
					<img src="images/g2.jpg" alt="" class="img-responsive zoom-img">
				</a>
								<div class="gallery-info">
				<h4>Oil Massage</h4>
				<p>Lorem ipsum</p>
				</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 gallery-grids">
					<a href="images/g3.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
					<img src="images/g3.jpg" alt="" class="img-responsive zoom-img">
				</a>
								<div class="gallery-info">
				<h4>Style Look</h4>
				<p>Lorem ipsum</p>
				</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 gallery-grids">
					<a href="images/g4.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
					<img src="images/g4.jpg" alt="" class="img-responsive zoom-img">
				</a>
								<div class="gallery-info">
				<h4>Nail Art</h4>
				<p>Lorem ipsum</p>
				</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 gallery-grids grid-mdl">
					<a href="images/g5.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
					<img src="images/g5.jpg" alt="" class="img-responsive zoom-img">
				</a>
								<div class="gallery-info">
				<h4>Hair style</h4>
				<p>Lorem ipsum</p>
				</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 gallery-grids  grid-mdl">
					<a href="images/g6.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
					<img src="images/g6.jpg" alt="" class="img-responsive zoom-img">
				</a>
								<div class="gallery-info">
				<h4>Hair color</h4>
				<p>Lorem ipsum</p>
				</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 gallery-grids  grid-mdl">
					<a href="images/g7.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
					<img src="images/g7.jpg" alt="" class="img-responsive zoom-img">
				</a>
								<div class="gallery-info">
				<h4>Facial</h4>
				<p>Lorem ipsum</p>
				</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 gallery-grids  grid-mdl">
					<a href="images/g8.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
					<img src="images/g8.jpg" alt="" class="img-responsive zoom-img">
				</a>
								<div class="gallery-info">
				<h4>Shaving</h4>
				<p>Lorem ipsum</p>
				</div>
				</div>
				<div class="clearfix"> </div>-->
		</div>
	</div>


</body>
</html>
