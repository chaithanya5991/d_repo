<html lang="en">
<head>
    <head>
    	<!-- <script type="text/javascript">
   setTimeout(function(){
       location.reload();
   },10000);
</script>-->
		<title>Styles</title>
                <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>templates/gallery/images/pageicon.png" />
                <link href="<?php echo base_url();?>templates/gallery/css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Videostube iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
                <link href='<?php echo base_url();?>templates/gallery///fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	</head>
    <style>
        #con{

                    margin-bottom: 21px;
        }
        #pr{
            color: #009688;
        }
        .dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px white;
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #ddd}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
#filter{
    float: right;
}
    </style>

</head>
<body style="background-color: #FFF0F5;">
	<?php
              $err_msg=$this->session->flashdata('ws');
              if($err_msg){?>
              	<script type="text/javascript">
              		alert('<?php echo$err_msg; ?>');

              	</script>
    <?php
}?>
    <div id="con" class="">
        <!--
    <a href="adddesign.php">Add design</a>-->

<!----start-wrap---->
	<div class="wrap">
		<!----start-Header---->
		<!--<div class="header">-->
			<!----start-Logo---->
			<!--<div class="logo">
                            <a href="index.html"><img src="../templates/gallery/images/logo.png" title="logo" /></a>
			</div>-->
			<!----End-Logo---->
			<!----start-top-nav---->
		<!--	<div class="top-nav">
				<ul>
					<li><a href="index.html">Home</a><p>My Frontpage</p></li>
					<li><a href="#">About</a><p>About this blog</p></li>
					<li><a href="categories.html">Categories</a><p>Be Ur Self</p></li>
					<li><a href="#">Economics</a><p>Human Needs</p></li>
					<li><a href="#">Health</a><p>Take A Trip</p></li>
					<li><a href="contact.html">Contact</a><p>Leave Messages</p></li>
				</ul>
			</div>
			<div class="clear"> </div>-->
			<!----End-top-nav---->
		</div>
		<!----End-Header---->
		<div class="clear"> </div>
		<div class="content">

			<form id="form1" method="post" name="form1">
			<div class="inner-page">
				<div class="searchbar">
					<div class="search-left">

 <select name="dtype" id="dtype"  class="form-control" style="background-color:magenta;color:black;">
              <option value="">Categories</option>
             <?php foreach ($dtype as $value) { ?>
                 <option value="<?php echo $value->dressname;?>"><?php echo $value->dressname;?></option>
             <?php }?>-->
            </select>


</div>

						<!--<p>Designs</p>-->
					</div>
					   <div  id="filter" class="dropdown">
					   	<select name="dprice" id="dprice" required="" class="form-control" style="background-color:magenta;color:black;">
					   		<option value="">Filter by price</option>
					   		<option value="low">Low-High</option>
					   		<option value="high">High-Low</option>
					   	</select>

  </div>
</div>
					<div class="search-right" style="background-color:magenta">
<i class="fa fa-search" ></i>
							<input type="text" placeholder="Search by Dress Name" id="srde" name="srde" style="padding: 14px; border: 1px solid magenta;">
						</form>
					</div><h1 style="font-size:50px;text-align:center" margin-top:20px;>Designs</h1>
					<div class="clear"> </div>

				</div>


                            </div>
                </div>

<div class="container" >

				<div class="box" >


				<div class="grids" id="tf">

                                     <?php
                                               foreach($dress as $value) {
                                               	$id=$value->item_id;
                                                    ?>


					<div class="grid">


                                            <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>"><img src="<?php echo base_url();?>/uploads/<?php echo $value->dress;?> " alt ="<?php echo $value->dress;?>" width='650' height='400'></a>
						<h3 style="color: yellowgreen;"><?php echo $value->dressname;?></h3>
                                                <!--<div class="time">
							<span>00:10</span>
						</div>-->
						<div class="grid-info">
                                                    <!--
							<div class="video-share">
								<ul>
									<li><a href="#"><img src="images/likes.png" title="links" /></a></li>
									<li><a href="#"><img src="images/link.png" title="Link" /></a></li>
									<li><a href="#"><img src="images/views.png" title="Views" /></a></li>
								</ul>
							</div>-->
                                                    <div class="video-watch">
								<a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>">More Info</a>
							</div>
							<div class="clear"> </div>
							<div class="lables">
                                                            <p id="pr">Price: <?php echo $value->price;?> INR</p>
                                                            <br>
                                                            <?php if(!empty($status)){ foreach ($status as $key) {
                                                            $statuses[]=$key->itemid;
                                                            }

                                                     if(in_array($id, $statuses)){
                                                                                         ?>

                                                            <button type="button" class="btn btn-block btn-primary disabled">Added to Wishlist</button>

                                            <?php
                                            }else{
                                                ?>



                                                            <a href="<?php echo base_url('index.php/designerctrl/cust_addwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
								<!--<p>Labels:<a href="categories.html">Lorem</a></p>-->
                                                          <?php
                                            }} else {?>
                                            	<a href="<?php echo base_url('index.php/designerctrl/cust_addwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                                           <?php }
                                            ?>
							</div>

						</div>
					</div>
                                    <?php

  }
  ?>

			</div>
			<div class="clear"> </div>
                        <!--
			<ul class="dc_pagination dc_paginationA dc_paginationA03">
						  <li><a href="#" class="first">First</a></li>
						  <li><a href="#" class="previous">Previous</a></li>
						  <li><a href="#"  class="current">1</a></li>
						  <li><a href="#">2</a></li>
						  <li><a href="#">3</a></li>
						  <li><a href="#">4</a></li>
						  <li><a href="#">5</a></li>
						  <li><a href="#" class="next">Next</a></li>
						  <li><a href="#" class="last">Last</a></li>

						</ul>
			<div class="clear"> </div>
		</div>
		<div class="right-content">
			<div class="popular">
				<h3>Popular Videos</h3>
                                <p><img src="../templates/gallSery/images/l1.png" title="likes" /> 10,000</p>
				<div class="clear"> </div>
			</div>
			<div class="grid1">
						<h3>Consectetur adipisicing elit</h3>
						<a href="#"><img src="images/g7.jpg" title="video-name" /></a>
						<div class="time1">
							<span>2:50</span>
						</div>

						<div class="grid-info">
							<div class="video-share">
								<ul>
									<li><a href="#"><img src="images/likes.png" title="links" /></a></li>
									<li><a href="#"><img src="images/link.png" title="Link" /></a></li>
									<li><a href="#"><img src="images/views.png" title="Views" /></a></li>
								</ul>
							</div>
							<div class="video-watch">
								<a href="#">Watch Now</a>
							</div>
							<div class="clear"> </div>
							<div class="lables">
								<p>Labels:<a href="#">Lorem</a></p>
							</div>
						</div>
					</div>
					<div class="clear"> </div>
					<div class="Recent-Vodeos">
						<h3>Recent-Videos</h3>
						<div class="video1">
							<img src="images/r1.jpg" title="video2" />
							<span>Lorem ipsum dolor sit amet,</span>
							<p>s consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
							<div class="clear"> </div>
						</div>
						<div class="video1 video2">
							<img src="images/r2.jpg" title="video2" />
							<span>Lorem ipsum dolor sit amet,</span>
							<p>s consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
							<div class="clear"> </div>
						</div>
						<div class="r-all">
							<a href="#">View All</a>
						</div>
					</div>
		</div>
		<div class="clear"> </div>
		</div>
		<div class="clear"> </div>
		</div>
		<div class="footer">
				<div class="wrap">
				<div class="box1">
				<h4>Ur's Account</h4>
						<ul>
							<li><a href="#">My Channel</a></li>
							<li><a href="#">Subscription</a></li>
							<li><a href="#">Locations</a></li>
							<li><a href="#">Favourites</a></li>
							<li><a href="#">Add</a></li>
							<li><a href="#">Ur-specials</a></li>
							<li><a href="#">Submission Rules</a></li>
						</ul>
				</div>
				<div class="box1">
				<h4>Policy & Terms</h4>
						<ul>
							<li><a href="#">Terms & Conditions</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Submission Rules</a></li>
							<li><a href="#">Company Buzz</a></li>
							<li><a href="#">My Staff</a></li>
							<li><a href="#">Moodle Hosting</a></li>
							<li><a href="#">OpenCart Hosting</a></li>
						</ul>
				</div>
				<div class="box1">
				<h4>Community</h4>
						<ul>
							<li><a href="#">Standard Support</a></li>
							<li><a href="#">Premier Support</a></li>
							<li><a href="#">Support Center</a></li>
							<li><a href="#">Host Affiliate</a></li>
							<li><a href="#">Infographics</a></li>
							<li><a href="#">indian Hosting</a></li>
							<li><a href="#">Green Web Hosting</a></li>
						</ul>
				</div>
				<div class="box1">
					<div class="hide-box">
				<h4>About Us</h4>
						<ul>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Terms of Service</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">Guarantee</a></li>
							<li><a href="#">Link to Us</a></li>
							<li><a href="#">We're Hiring</a></li>
						</ul>
				</div>
					</div>
				<div class="box1">
				<h4>Stay in touch on</h4>
						<ul class="social">
							<li><img src="images/facebook.png" title="facebook"><a href="#">Facebook</a></li>
							<li><img src="images/twitter.png" title="twitter"><a href="#">Twitter</a></li>
							<li><img src="images/gplus.png" title="google+"><a href="#">Google+</a></li>
						</ul>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
			<div class="clear"> </div>
			<div class="copy-right">
			<p>&#169 2013 Videostube. All Rights Reserved | Design by &nbsp;<a href="http://w3layouts.com">W3Layouts</a></p>
		</div>[-->
</div>
  </div>
	<!----End-wrap---->


	<script type="text/javascript">
$(document).ready(function(){

	$('#srde').keyup(function()
	{

		//alert("hai");
    $.ajax({
         type: "POST",
         url:  '<?php echo base_url('index.php/designerctrl/searchdree')?>',
         data:  $("#form1").serialize(),
         success:
              function(data){

                $('#tf').html(data);
                            }
             });
	});

	$('#dtype').on('change',function()
	{

		var dname=$(this).val();
		//alert(dname);

		$.ajax({
         type: "POST",
         url:  '<?php echo base_url('index.php/designerctrl/searchdree')?>',
         data:  $("#form1").serialize(),
         success:
              function(data){

                $('#tf').html(data);
                            }
             });

	});
	$('#dprice').on('change',function()
	{

		var price=$(this).val();
		//alert(dname);

		$.ajax({
         type: "POST",
         url:  '<?php echo base_url('index.php/designerctrl/searchdree')?>',
         data: $("#form1").serialize(),
         success:
              function(data){

                $('#tf').html(data);
                            }
             });

	});
});
</script>

	</body>

</html>


<!--
<div class="container">

<a href="addesigns.php">

<button type="button" class="btn btn-default">Add Designs</button></a></div>-->




</body>
</html>
