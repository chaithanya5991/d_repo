


<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
      h2{
          text-align: center;
          margin-top: 100px;
      }
      </style>
</head>
 <?php
              $err_msg=$this->session->flashdata('aderr');
              if($err_msg){
              ?>
              <script type="text/javascript">
                alert('<?php echo $err_msg;?>');
              </script><?php
}?>
<body>

<div class="container">
  <h2>Add Rent Details</h2>
  <form class="form-horizontal" action="<?php echo base_url('index.php/designerctrl/de_addtorent');?>" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label class="control-label col-sm-2" for="dname"> Dress Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="dname" required="" placeholder="Enter Name" name="dname" >
      </div>
    </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="dtype"> Dress type:</label>
       <div class="col-sm-10">
      <select name="dtype" class="form-control" id="dtype" required="">
              <option value="" >--Select Dress Type--</option>
              <?php foreach ($dtype as $value) {
              ?>

                        <option value="<?php echo $value->dressname;?>"><?php echo $value->dressname;?></option>
                            <?php }?>
          </select>
       </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="pdesc">Product details</label>
      <div class="col-sm-10">
          <textarea class="form-control" required="" id="pdesc" placeholder="Product description" name="pdesc" ></textarea>
      </div>
    </div>
          <div class="form-group">
      <label class="control-label col-sm-2" for="material">Material</label>
      <div class="col-sm-10">
        <input type="text" required="" class="form-control" id="material" placeholder="Material Type" name="material" >
      </div>
    </div>
             <div class="form-group">
      <label class="control-label col-sm-2" for="colour">Colour </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" required="" id="colour" placeholder="Colour" name="colour" >
      </div>
    </div>
              <div class="form-group">
      <label class="control-label col-sm-2" for="occ">Occassion</label>
      <div class="col-sm-10">
          <select name="occ" id="occ" required="" class="form-control">
              <option value="" >--Select Occassion--</option>
              <option value="Party"> Party</option>
                            <option value="Casual"> Casual</option>
							<option value="Traditional">Traditional</option>
          </select>
      </div>
    </div>
    <div class="form-group">
<label class="control-label col-sm-2" for="size">Size</label>
<div class="col-sm-10">
<select name="size" id="size" required="" class="form-control">
    <option value="" >--Select Size--</option>
    <option value="XS(Extra small)"> Extra small</option>
    <option value="S(Small)"> Small</option>
    <option value="M(Medium)"> Medium</option>
    <option value="L(Large)"> Large</option>
    <option value="XL(Extra Large)"> Extra Large</option>
</select>
</div>
</div>
              <div class="form-group">
      <label class="control-label col-sm-2" for="price">Price</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="price" required="" placeholder="Enter Price" name="price" >
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="date">Starting Date</label>
      <div class="col-sm-10">
          <input type="date" class="form-control" id="date1" required="" placeholder="Select starting date" name="start_date" >
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="date">Ending Date</label>
      <div class="col-sm-10">
          <input type="date" class="form-control" id="date2" required="" placeholder="Select ending date" name="end_date" >
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="dimage">Update Photo</label>
        <div class="col-sm-10">
 <!--<input type="file" required="" class="form-control" id="dimage"  name="dimage1" accept=".jpg,.png,.gif">-->
          <input type="file" name="userfile[]" multiple="multiple">
        </div>
    </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="dimage">Add More</label>
          <div class="col-sm-10">
 <!--<input type="file" required="" class="form-control" id="dimage"  name="dimage2" accept=".jpg,.png,.gif">-->
            <input type="file" name="userfile[]" multiple="multiple">
          </div>
      </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="dimage">Add More</label>
            <div class="col-sm-10">
 <!--  <input type="file" required="" class="form-control" id="dimage"  name="dimage3" accept=".jpg,.png,.gif">-->
              <input type="file" name="userfile[]" multiple="multiple">
            </div>
        </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" name="submit" value="Submit" class="btn btn-default">
      </div>
    </div>

  </form>
</div>

</body>
</html>
