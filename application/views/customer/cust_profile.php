
<html>
    <head>
<?php                $err_msg=$this->session->flashdata('proerr');
              if($err_msg){
              ?>
              <script type="text/javascript">
                alert('<?php echo $err_msg;?>');
              </script><?php
} ?>
        <style>
            img{
               height: 200px;
               width: 200px;
            }
            h3{
                    padding-top: 40px;
            }
            h1{
                text-align: center;
                color:  #006666;
            }
            p{
                font-size: 35px;
                text-align: center;
                color:  #cc3300;

            }
            #h3{
                margin-top: 50px;
            }
            h3{
                text-align: center;
            }
            td{
                text-align: center;
            }
        </style>
    </head>
    <body style="background-color:#FFF0F5">
   <div class="container">
    <?php foreach ($profile as $value) {
      $fname=$value->cname;
      $a=$value->gender;
      $dob=$value->dob;
      $st=$value->addr;
      $city=$value->city;
      $state=$value->state;
      $pin=$value->pincode;
      $phone=$value->phone;
      $email=$value->email;
     // $pass=$value->pass;
    }?>
           <h3 id="h3"> Account Details</h3>
<table class="table table-bordered">
    <tr>


    <tr>
       <!-- <td> Id   : </td><td>  <?php //$fid=$get['sid']; echo $fid;?></td></tr>-->

        <td> Name   : </td><td>  <?php echo $fname;?></td></tr>
 <tr>  <td>Gender: </td><td>  <?php echo $a;?></td></tr>
  <tr>  <td>Date of Birth: </td><td>  <?php echo $dob;    ?></td></tr>
      <tr>  <td>Address: </td><td>  <?php  echo $st;?></td></tr>
        <tr>  <td>City: </td><td>  <?php echo $city;?></td></tr>
          <tr>  <td>State: </td><td>  <?php echo $state;    ?></td></tr>
         <tr>  <td>Phone: </td><td>  <?php echo $pin;   ?></td></tr>

       <tr>  <td>Phone: </td><td>  <?php echo  $phone ;?></td></tr>
      <td>Email: </td><td>  <?php echo $email;?></td></tr>



<tr> <td></td><td><a href="<?php echo base_url('index.php/designerctrl/cust_profileedit');?>"><button>Update</button></a></td>
    <!--<td><a href="<?php echo base_url('index.php/designerctrl/cust_profiledelete');?>" ><button>Delete</button></a></td>--></tr>

    </table>
</div>
    </body>



</html>
