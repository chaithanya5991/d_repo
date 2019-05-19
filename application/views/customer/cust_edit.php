

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
  <form class="form-horizontal" action="<?php echo base_url('index.php/designerctrl/cust_updateprofile');?>" method="post" enctype="multipart/form-data">
         <?php
                   foreach ($profile as $value) {
                     $fname=$value->cname;
      $a=$value->gender;
      $dob=$value->dob;
      $st=$value->addr;
      $city=$value->city;
      $state=$value->state;
      $pin=$value->pincode;
      $phone=$value->phone;
      $email=$value->email;
     $pass=$value->pass;
                   }
                       ?> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Customer Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo $fname;?>" required="" >
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="gender">Gender:</label>
      <div class="col-sm-10">
          <select name="gender" class="form-control" required="">
              <option value="">--Select Gender--</option>
              <option value="Female">Female</option>
              <option value="Male">Male</option>
          </select>
      </div>
    </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="bob">Date of Birth</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="dob" placeholder="Enter Name" required="" name="dob" value="<?php echo $dob;?>">
      </div>
    </div>
         <div class="form-group">
      <label class="control-label col-sm-2" for="addr">Address: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="addr" required="" placeholder="Enter Name" name="addr" value="<?php echo $st;?>">
      </div>
    </div>
          <div class="form-group">
      <label class="control-label col-sm-2" for="city">City:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="city" required="" placeholder="Enter City" name="city" value="<?php echo $city;?>">
      </div>
    </div>
             <div class="form-group">
      <label class="control-label col-sm-2" for="state">State:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="state" required="" placeholder="Enter State" name="state" value="<?php echo $state;?>">
      </div>
    </div>
              <div class="form-group">
      <label class="control-label col-sm-2" for="pincode">Pincode:</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="pincode" required="" placeholder="Enter Pincode" name="pincode" size="6" minlength="6" maxlength="6" value="<?php echo $pin;?>">
      </div>
    </div>
    
             <div class="form-group">
      <label class="control-label col-sm-2" for="phone">Contact Number</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="phone" required="" placeholder="Enter Pincode" name="phone" size="10" minlength="10" maxlength="10" value="<?php echo $phone;?>">
      </div>
    </div>
    
                                <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email Address</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" required="" placeholder="Email Address" name="email" value="<?php echo $email;?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pass">Password:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pass" placeholder="Enter password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required="" class="lock" type="password" value="<?php echo $pass;?>">
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