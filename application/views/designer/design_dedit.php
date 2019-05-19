
<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      h2{
          text-align: center;
          margin-top: 100px;
      }
      </style>
</head>

<body>
<div class="container">
  <h2>Edit Details</h2>
  <form class="form-horizontal" action="<?php echo base_url('index.php/designerctrl/de_updatepro');?>" method="post" enctype="multipart/form-data">
         <?php
                    foreach ($profile as $value) {
                     ?>
           <div class="form-group">
      <label class="control-label col-sm-2" for="name">Profile Image:</label>
      <div class="col-sm-10">
         <img src="<?php echo base_url();?>/uploads/<?php echo $value->dimage;?> " alt ="<?php echo $value->dimage;?>" width='260px' height='260px'>
        <input type="file" class="form-control"  id="image"  name="image">
        <input type="text" hidden="" name="img" value="<?php echo $value->dimage;?>">
      </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Designer Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" required="" id="name" placeholder="Enter Name" name="name" value="<?php echo $value->dname;?>">
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="addr">Address:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" required="" id="addr" placeholder="Enter Address" name="addr" value="<?php echo $value->addr;?>">
      </div>
    </div>
          <div class="form-group">
      <label class="control-label col-sm-2" for="city">City:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" required="" id="city" placeholder="Enter City" name="city" value="<?php echo $value->city;?>">
      </div>
    </div>
             <div class="form-group">
      <label class="control-label col-sm-2" for="state">State:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" required="" id="state" placeholder="Enter State" name="state" value="<?php echo $value->state;?>">
      </div>
    </div>
              <div class="form-group">
      <label class="control-label col-sm-2" for="pincode">Pincode:</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" required="" id="pincode" placeholder="Enter Pincode" name="pincode" size="6" minlength="6" maxlength="6" value="<?php echo $value->pincode;?>">
      </div>
    </div>
                    <div class="form-group">
      <label class="control-label col-sm-2" for="exp">Experience</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" required="" id="exp" placeholder="Experience" name="exp" value="<?php echo $value->exp;?>">
      </div>
    </div>
                          <div class="form-group">
      <label class="control-label col-sm-2" for="phone">Contact Number</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="phone" placeholder="Contact Number" name="phone" size="10" minlength="10" maxlength="10" value="<?php echo $value->phone;?>">
      </div>
    </div>
                                <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email Address</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Email Address" name="email" value="<?php echo $value->email;?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pass">Password:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pass" placeholder="Enter password" name="pass" value="<?php echo $value->pass;?>">
      </div>
    </div>
 
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" name="submit" value="Submit" class="btn btn-default">
      </div>
    </div>
      <?php
                    
  }
                    ?>
  </form>
</div>


</body>
</html>