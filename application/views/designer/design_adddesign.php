


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
  <h2>Add  Details</h2>
  <form class="form-horizontal" action="<?php echo base_url('index.php/designerctrl/de_addtodesign');?>" method="post" enctype="multipart/form-data">

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
      <label class="control-label col-sm-2" for="occ">Occation</label>
      <div class="col-sm-10">
          <select name="occ" id="occ" required="" class="form-control">
              <option value="" >--Select--</option>
              <option value="Party"> Party</option>
                            <option value="Casual"> Casual</option>
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
      <label class="control-label col-sm-2" for="dimage">Update Photo</label>
      <div class="col-sm-10">
          <input type="file" required="" class="form-control" id="dimage"  name="dimage" accept=".jpg,.png,.gif">
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
