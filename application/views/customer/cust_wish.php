<html lang="en">
<head>
    <head>
		<title>Styles</title>
                <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>/gallery/images/pageicon.png" />
                <link href="<?php echo base_url();?>templates/gallery/css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Videostube iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
                <link href='<?php echo base_url();?>templates/gallery/fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
                <script type="text/javascript" src="<?php echo base_url();?>vendors/jquery/dist/jquery.min.js"></script>
                <link href="<?php echo base_url();?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"  media="all" />
                <script type="text/javascript" src="<?php echo base_url();?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>
    <style>
        #con{
                margin-top: 99px;
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
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
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
<body style="background-color:#FFF0F5">
  <?php
              $err_msg=$this->session->flashdata('or');
              if($err_msg){
                ?>
                <script type="text/javascript">
                  alert('<?php echo$err_msg; ?>');

                </script>

    <?php
}?>

<h1 style="font-size:50px;text-align:center">Wishlist</h1>
    <div id="con" class="container" style="margin-top: 0px;">

        <!--
    <a href="adddesign.php">Add design</a>
  -->
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
				<div class="searchbar">
					<div class="search-left">

</div>
						<!--<p>Designs</p>-->
					</div>

					<div class="clear"> </div>
				</div>

                            </div>



				<div class="box">


				<div class="grids">
                                     <?php if(empty($wish)&&empty($wishes)){
                                     	?>
                                     	<p style="text-align: center;font-size: 3.5em;">No Data </p><?php
                                     }
                                                foreach ($wishes as $value) {
                                            $id=$value->itemid;
                                                 $ids=$value->wish_id;
                                                    ?>


					<div class="grid" style="height:580px;">


                                            <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>"><img src="<?php echo base_url();?>/uploads/<?php echo $value->dress;?> " alt ="<?php echo $value->dress;?>" width='650' height='400'></a>
						<h3><?php echo $value->dressname;?></h3>
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
                                                            <?php if($value->status==0)
                                                            {?>
      <a href="<?php echo base_url('index.php/designerctrl/cust_purchase/'.$ids);?>" type="button" class="fa fa-rupee" onclick="return confirm ('Are you sure  to purchase ?,Once confirmed You cannot cancel this purchase.')" title="Cash on delivery" style="font-size:20px"></a>
      <div class="col-md-2">
      <a href="#"  class="glyphicon glyphicon-shopping-cart" data-toggle="modal" data-target="#myModal-<?=$id?>" title="Online Purchase" style="font-size:20px"> </a></div>
      <a href="<?php echo base_url('index.php/designerctrl/cust_delwish/'.$ids);?>" type="button"  class="btn btn-primary btn-primary" style="position: absolute;right: 9px; " onclick="return confirm
                  ('Are you sure  to Delete ?')">Delete</a>

                           <!-- Modal -->
<div id="myModal-<?=$id?>" class="modal fade" role="dialog" aria-hidden="true" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
         <form method="post" id="post" action="<?php echo base_url('index.php/designerctrl/cust_purchase/'.$ids);?>">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Enter Your card details</h4>
      </div>

      <div class="modal-body col-md-offset-1">

        <div class="controls">
      <div class="row"><div class="col-md-6">
      <div class="form-group">
      <label for="cats" id="cats">Card Number</label>
      <input type="text" class="form-control" name="cnumber" id="cnumber" required="" />



</div>
   <div class="form-group">
      <label for="cats" id="cats">CVC</label>
      <input type="text" class="form-control" name="cvc" id="cvc" required="" />
</div>
   <div class="form-group">
      <label for="cats" id="cats">Expirary</label>
      <input type="text" class="form-control" name="exp" id="exp" required="" />



</div>
   <div class="form-group">
      <label for="cats" id="cats">E-Mail</label>
      <input type="text" class="form-control" name="email" id="email" required="" />



</div>

</div></div></div>
      </div>
      <div class="modal-footer">
<div class="btn-pst text-center">
<input type="submit" name="insert" class="btn btn-primary btn-md" id="insert"  value="Pay" />
 </div>
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
       </div>
 </form>
       </div>

  </div>
</div>

                  <?php } else {?>
      <button  type="button" class="btn btn-primary btn-primary disabled" onclick="return confirm ('Are you sure  to purchase ?,Once confirmed You cannot cancel this purchase.')">Purchased</buttton>

        <?php }?>

			</div>

						</div>
					</div>
                                    <?php

  }
  ?>

			</div>

      <div class="grids">
                                   <?php 
                                              foreach ($wish as $value) {
                                          $id=$value->itemid;
                                               $ids=$value->wish_id;
                                                  ?>


        <div class="grid" style="height:580px;">


                                          <a href="<?php echo base_url('index.php/designerctrl/cust_rent_item/'.$id);?>"><img src="<?php echo base_url();?>/uploads/<?php echo $value->dimage1;?> " alt ="<?php echo $value->dimage1;?>" width='650' height='400'></a>
          <h3><?php echo $value->dressname;?></h3>
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
              <a href="<?php echo base_url('index.php/designerctrl/cust_rent_item/'.$id);?>">More Info</a>
            </div>
            <div class="clear"> </div>
            <div class="lables">
                                                          <p id="pr">Price: <?php echo $value->price;?> INR</p>
                                                          <br>
                                                          <?php if($value->status==0)
                                                          {?>
    <a href="<?php echo base_url('index.php/designerctrl/cust_purchase/'.$ids);?>" type="button" class="fa fa-rupee" onclick="return confirm ('Are you sure  to purchase ?,Once confirmed You cannot cancel this purchase.')" title="Cash on delivery" style="font-size:20px"></a>
    <div class="col-md-2">
    <a href="#"  class="glyphicon glyphicon-shopping-cart" data-toggle="modal" data-target="#myModal-<?=$id?>" title="Online Purchase" style="font-size:20px"> </a></div>
    <a href="<?php echo base_url('index.php/designerctrl/cust_delwish/'.$ids);?>" type="button"  class="btn btn-primary btn-primary" style="position: absolute;right: 9px; " onclick="return confirm
                ('Are you sure  to Delete ?')">Delete</a>

                         <!-- Modal -->
<div id="myModal-<?=$id?>" class="modal fade" role="dialog" aria-hidden="true" >
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
       <form method="post" id="post" action="<?php echo base_url('index.php/designerctrl/cust_purchase/'.$ids);?>">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Enter Your card details</h4>
    </div>

    <div class="modal-body col-md-offset-1">

      <div class="controls">
    <div class="row"><div class="col-md-6">
    <div class="form-group">
    <label for="cats" id="cats">Card Number</label>
    <input type="text" class="form-control" name="cnumber" id="cnumber" required="" />



</div>
 <div class="form-group">
    <label for="cats" id="cats">CVC</label>
    <input type="text" class="form-control" name="cvc" id="cvc" required="" />



</div>
 <div class="form-group">
    <label for="cats" id="cats">Expirary</label>
    <input type="text" class="form-control" name="exp" id="exp" required="" />



</div>
 <div class="form-group">
    <label for="cats" id="cats">E-Mail</label>
    <input type="text" class="form-control" name="email" id="email" required="" />



</div>

</div></div></div>
    </div>
    <div class="modal-footer">
<div class="btn-pst text-center">
<input type="submit" name="insert" class="btn btn-primary btn-md" id="insert"  value="Pay" />
</div>
      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
     </div>
</form>
     </div>

</div>
</div>

                <?php } else {?>
    <button  type="button" class="btn btn-primary btn-primary disabled" onclick="return confirm ('Are you sure  to purchase ?,Once confirmed You cannot cancel this purchase.')">Purchased</buttton>

      <?php }?>

    </div>

          </div>
        </div>
                                  <?php

}
?>

    </div>
			<div class="clear"> </div>

	</div>
    </div>


	<!----End-wrap---->
	</body>
</html>
