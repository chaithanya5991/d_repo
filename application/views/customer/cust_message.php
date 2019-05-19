<?php if(isset($adreply)) {
foreach ($adreply as $value) {
 $subject=$value->subject;
 $message=$value->message;
 $id=$value->reply_id;
 $date=$value->date;
 $from="Designer Junction";
}
} else {
	foreach ($demsg as $value) {
		$subject=$value->subject;
 $message=$value->message;
 $id=$value->custcnid;
 $date=$value->date;
 $from=$value->dname;
	}
}?>
<div class="container" style="padding: 50px;">
	<div class="col-sm-2">
		
	</div>
	<div class="col-sm-8">
		<div class="" style="    border: 2px solid #eee;padding: 30px 20px;">
			<div class="row">
				<div class="col-sm-8">
					
				</div>
				<div class="col-sm-4">
					<?php if(isset($adreply)){
						?>
					
					<a href="<?php echo base_url('index.php/designerctrl/cust_deleteadmsg/'.$id);?>" style="float: right;"><span class="fa fa-trash" style="padding: 10px;" ></span></a><?php } else {
						?>
						<a href="<?php echo base_url('index.php/designerctrl/cust_deletedemsg/'.$id);?>" style="float: right;"><span class="fa fa-trash" style="padding: 10px;" ></span></a>
				<?php	}?>
				</div>
				<h3 style="padding: 0px 0px;"><?php echo $subject;?></h3>
					<hr>
			</div>
			<div class="row">
				<div class="col-sm-6">
					
					<p style="padding: 0px 0px;"> <i class="fa fa-user" style="font-size: 25px;
    margin-right: 10px;"></i><?php echo $from;?></p>
					<p style="padding: 10px 28px"> <?php echo $date;?></p>
					<p style="padding: 0px 28px;">to me:</p>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12" style="padding: 50px;">
					<?php echo $message;?>

				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-2">
		
	</div>
</div>