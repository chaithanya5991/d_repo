<html lang="en">
<head>
    <head>
        <!-- <script type="text/javascript">
   setTimeout(function(){
       location.reload();
   },10000);
</script>-->
		<title>Styles</title>
                <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>/gallery/images/pageicon.png" />
                <link href="<?php echo base_url();?>templates/gallery/css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Videostube iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
                <link href='<?php echo base_url();?>templates/gallery///fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
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
	<div class="container">
    <h1 style="font-size:50px;text-align:center">Orders Delivered</h1>
		<div class="row" style="margin-top: 45px;">
			<?php
            if(empty($orders)){
                ?> <p style="text-align: center;font-size: 3.5em;"> Empty OrderList</p><?php }
             foreach ($orders as $value) {

			?>
			<div class="col-md-4">
				<div class="" style="padding: 5px;border: 1px solid #b5b2b2;height: 600px;">
					<img src="<?php echo base_url();?>uploads/<?php echo $value->dress;?>" class="img-responisive" style="width: 100%;height: 500px;">
					<div style="padding: 15px;">
                        <p> Order On :<?php echo $value->date;?></p>
						<p><?php echo $value->dressname;?></p>
						<p style="text-align: center;padding: 10px;">INR: <?php echo $value->price;?></p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	</body>
</html>


<!--
<div class="container">

<a href="addesigns.php">

<button type="button" class="btn btn-default">Add Designs</button></a></div>-->


<!--asc-->

<!-- //asc -->

</body>
</html>
