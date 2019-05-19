
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

           <h3 id="h3"> Account Details</h3>
<table class="table">
    <tr>
        <?php
        foreach ($profile as $value) {
        $photo=$value->dimage;
         $fname=$value->dname;
         $a=$value->addr;
   $city=$value->city;
   $st=$value->state;
   $pincode=$value->pincode;
   $exp=$value->exp;
   $p=$value->phone;
   $e=$value->email;
    $pwd=$value->pass;
        }
        //$photo=$get['dimage'];

        ?>
<td colspan="2"> <img style="border-radius: 50%;"  src="<?php echo base_url();?>/uploads/<?php echo $photo;?> " alt ="<?php echo $photo;?>" width='60px' height='60px'></td></tr>

    <tr>
       <!-- <td> Id   : </td><td>  <?php //$fid=$get['sid']; echo $fid;?></td></tr>-->

        <td> Name   : </td><td>  <?php echo $fname;?></td></tr>
 <tr>  <td>Address: </td><td>  <?php    echo $a;?></td></tr>
  <tr>  <td>City: </td><td>  <?php echo $city;    ?></td></tr>
      <tr>  <td>State: </td><td>  <?php    echo $st;?></td></tr>
         <tr>  <td>Phone: </td><td>  <?php echo $p;   ?></td></tr>
         <tr>  <td>Experience: </td><td>  <?php echo $exp;    ?></td></tr>
         <tr>  <td>Pincode: </td><td>  <?php echo $pincode;    ?></td></tr>

      <td>Email: </td><td>  <?php    echo $e;?></td></tr>
<tr>
    <td>Password: </td><td>  <?php    echo $pwd;?></td></tr>



<tr> <td><!--<a href="dedit.php"><button>Update</button></a>--></td>
    <td><a href="<?php echo base_url('index.php/designerctrl/de_editpro');?>" ><button>Update</button></a></td></tr>

    </table>
</div>

    </body>



</html>
