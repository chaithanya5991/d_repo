
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 style="text-decoration: underline;">Designer Details</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                 
                  </div>
                </div>
              </div>
            </div>

         

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                
                  
                  
                     <section class="content container-fluid">

      <?php foreach ($designer as $valu) {
  $id=$valu->did;
  $ids=$valu->login_id;
  $dname=$valu->dname;
  $addr=$valu->addr;
  $city=$valu->city;
   $state=$valu->state;
   //$statename=$valu->statename;
  $pincode=$valu->pincode;
   $exp=$valu->exp;
  $phone=$valu->phone;
  $dimage=$valu->dimage;
  $email=$valu->email;
  $desc=$valu->desc;
  $link=$valu->link;




}?>


      
<input type="hidden" name="hide" id="hide" value="<?php echo$id;?>">
        <table class="table table-striped">

          <tr> <th>Designer Name</th><td width="70%"><?php echo$dname;?></td></tr>
          <tr><th>Designer Id</th><td><?php echo $id;?> </td></tr><br/>
            <tr> <th>Profile Picture</th><td><img src="<?php echo base_url();?>uploads/<?php echo$dimage;?>" style="width: 150px; height: 150px;" id="im"/></td></tr>
          
           <tr><th>Address</th><td><?php echo $addr;?> </td></tr><br/>
           <tr><th>City</th><td><?php echo $city;?></td>
</tr>
<tr><th>State</th><td><?php echo $state;?></td>
</tr>
<tr><th>E-mail</th><td><?php echo $email;?></td>
</tr>
       <tr><th>Pincode</th>
<td><?php echo $pincode;?> </td></tr>
<br/>
<tr><th>Experience</th></td>
<td>
       <?php echo $exp;?> </td></tr>
<br/>

<tr><th>Contact Number</th></td>
<td>
       <?php echo $phone;?> </td></tr>
<br/>
<tr><th>About Designer</th></td>
<td>
       <?php echo $desc;?> </td></tr>
<br/>
<tr><th>Website Link</th></td>
<td>
       <?php if($link==""){
        echo "No Website";
       } else {
        echo $link;
      }?> </td></tr>
<br/>
</table>


    


    </section>

  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
      