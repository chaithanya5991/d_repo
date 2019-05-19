
<html lang="en">
<head>
    <head>
		<title>Videostube Website Template | Home :: W3layouts</title>
                <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>/templates/gallery/images/pageicon.png" />
                <link href="<?php echo base_url();?>/templates/gallery/css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Videostube iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
                <link href="<?php echo base_url();?>/templates/gallery///fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	</head>
    <style>
        #con{
                margin-top: 99px;
                    margin-bottom: 21px;
        }
        #pr{
            color: #009688;
        }
          #h3{
            font-weight: bold;
            text-transform: inherit;


        }

    </style>

</head>
<body style="background-color: #FFF0F5">
    <div id="con" class="container">
    <a href="<?php echo base_url('index.php/designerctrl/de_addrent');?>" type="button" class="btn btn-md" style="background-color: magenta;color: white;">Add design</a>
    					<div class="search-right" style="background-color:magenta">
						<form method="post" >
						<input type="text"  style="padding: 14px;
    border: 1px solid magenta;" id="srre" name="srre" >	<i class="fa fa-search" ></i>
						</form>
					</div>
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
			<div class="inner-page">
				<div class="">
					<div class="">
						<p style="text-align: center;font-size: 40px;color:black">Designs</p>
					</div>

					<div class="clear"> </div>
				</div>
				<div class="box">


				<div class="grids" id="tf">
                                     <?php
                                                foreach ($dress as $value) {
                                                 	$id=$value->rent_id;
                                                    ?>

					<div class="grid">


                                            <a href="<?php echo base_url('index.php/designerctrl/de_rentdesign/'.$id);?>"><img src="<?php echo base_url();?>/uploads/<?php echo $value->dimage1;?> " alt ="<?php echo $value->dimage1;?>" width='650' height='400'></a>
						<h3 id="h3"><?php echo $value->dressname;?></h3>
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
								<a href="<?php echo base_url('index.php/designerctrl/de_rentdesign/'.$id);?>"><u>More Info</u></a><br/><br/>
								<!--<a href="<?php echo base_url('index.php/designerctrl/de_edit/'.$id);?>"><button class="btn btn-md" style="background-color: green; color: black;">EDIT</button></a>-->
							</div>
							<div class="clear"> </div>
							<div class="lables">
                                                            <p id="pr">Price: <?php echo $value->price;?></p>
								<!--<p>Labels:<a href="categories.html">Lorem</a></p>-->
								<center><a href="<?php echo base_url('index.php/designerctrl/rent_delete/'.$id);?>" type="button"  class="glyphicon glyphicon-trash" style="color:red;font-size:20px " onclick="return confirm
                                ('Are you sure you want to Delete ?')"></a></center>
							</div>
						</div>
					</div>
                                    <?php

  }
  ?>

			</div>
			<div class="clear"> </div>
			<!--<ul class="dc_pagination dc_paginationA dc_paginationA03">
						  <li><a href="#" class="first">First</a></li>
						  <li><a href="#" class="previous">Previous</a></li>
						  <li><a href="#"  class="current">1</a></li>
						  <li><a href="#">2</a></li>
						  <li><a href="#">3</a></li>
						  <li><a href="#">4</a></li>
						  <li><a href="#">5</a></li>
						  <li><a href="#" class="next">Next</a></li>
						  <li><a href="#" class="last">Last</a></li>

						</ul>-->
			<div class="clear"> </div>
		</div>


			<div class="clear"> </div>

	</div>
		<script type="text/javascript">
$(document).ready(function(){

	$('#srre').keyup(function()
	{
   var dname=$(this).val();
		//alert("hai");
    $.ajax({
         type: "POST",
         url:  '<?php echo base_url('index.php/designerctrl/de_searchrent')?>',
         data:  'dname='+dname,
         success:
              function(data){

                $('#tf').html(data);
                            }
             });
	});
})
</script>

	<!----End-wrap---->
	</body>
</html>
