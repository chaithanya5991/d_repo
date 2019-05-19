
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
  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
         <?php
                    while ($row = $res->fetch_assoc()) {
                       ?> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Designer Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Enter Name" name="name" value="<?php echo $row['dname'];?>">
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="email">Address:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Enter Address" name="addr" value="<?php echo $row['addr'];?>">
      </div>
    </div>
          <div class="form-group">
      <label class="control-label col-sm-2" for="email">City:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Enter City" name="city" value="<?php echo $row['city'];?>">
      </div>
    </div>
             <div class="form-group">
      <label class="control-label col-sm-2" for="email">State:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Enter State" name="state" value="<?php echo $row['state'];?>">
      </div>
    </div>
              <div class="form-group">
      <label class="control-label col-sm-2" for="email">Pincode:</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="email" placeholder="Enter Pincode" name="pincode" size="6" minlength="6" maxlength="6" value="<?php echo $row['pincode'];?>">
      </div>
    </div>
                    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Experience</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Experience" name="exp" value="<?php echo $row['exp'];?>">
      </div>
    </div>
                          <div class="form-group">
      <label class="control-label col-sm-2" for="email">Contact Number</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="email" placeholder="Contact Number" name="phone" size="10" minlength="10" maxlength="10" value="<?php echo $row['phone'];?>">
      </div>
    </div>
                                <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email Address</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Email Address" name="email" value="<?php echo $row['email'];?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pass" value="<?php echo $row['pass'];?>">
      </div>
    </div>
   <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Update Logo</label>
      <div class="col-sm-10">          
          <input type="file" class="form-control"  name="file" accept=".jpg,.png,.gif">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" name="submit" value="Submit" class="btn btn-default">
      </div>
    </div>
      <?php
                    }
  }
                    ?>
  </form>
</div>
<?php
if(isset($_POST['submit']))
{
    $n=$_POST['name'];
    $addr=$_POST['addr'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pin=$_POST['pincode'];
    $exp=$_POST['exp'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $fileName=$_FILES['file']['name'];
$filetmp=$_FILES['file']['tmp_name'];
$filesize=$_FILES['file']['size'];
//$filerror=$_FILES['file']['error'];
//$fileType=$_FILES['file']['type'];
//$fileExit= explode('.',$fileName);
//$directory='';
$target="../uploads/".$fileName;
//$fileActualExit= strtolower(end($fileExit));
//$allowed=array('jpg','jpeg','png','pdf');
//if(in_array($fileActualExit,$allowed))
//{
   // if ($filerror===0)
            if ($filesize>2097152)
               {
                  echo "File size larger than 2MB";
               }
               else
               {
                   move_uploaded_file($filetmp, $target);
                   $up="UPDATE design INNER JOIN login ON design.lid=login.id SET design.dname = '$n', design.addr= '$addr', design.city = '$city', design.state = '$state', design.pincode= '$pin', design.exp = '$exp', design.phone = '$phone', design.dimage = '$fileName', login.email='$email',login.pass='$pass' where design.lid ='$did'";
                       // $up="UPDATE design INNER JOIN login ON design.lid=login.id SET design.dname = '$n', design.addr= '$addr', design.city = '$city', design.state = '$state', design.pincode= '$pin', design.exp = '$exp', design.phone = '$phone', design.dimage = '$fileName',login.email='$email',login.pass='$pass' where login.id='$did";
               }           
    if($con->query($up)===TRUE)
{
     echo "<script> alert('Updated successfully') </script>";
     header("location: dprofile.php");
 
}
               
else
{
   echo "Error:".$up.$con->error;
}

    
    
}
}
else
{
    header("location: ../index.php");
}
?>
</body>
</html>