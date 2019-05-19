   
   <div class="right_col" role="main" >
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>ADMIN PROFILE</h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                 
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

                  <div class="x_content">

 <section class="content container-fluid">
      <?php foreach ($file as  $value) {
       $username=$value->username;
       $password=$value->password;
       $email=$value->email;
       $image=$value->image;
      }?>
 
 <div class="well" id="well">
    <p class="error" align="center">
<?php 
              $err_msg=$this->session->flashdata('chpas');
              if(isset($err_msg)){
             
               echo $err_msg;
            
             
              
}?></p>

 <table><thead><tr><th width="45%"></th><th width="15%"></th></tr></thead>
  <tbody><tr>
    <td><h3>Profile Picture </h3></td><td><img src="<?php echo base_url();?>images/<?php echo $image;?>" id="im" />  </td>
  </tr>
  <tr>
    <td align="left"><h3> Username  </h3></td><td><h4><?php echo $username;?></h4></td>
  </tr>
  
  <tr>
    <td> <h3>E-Mail </h3></td><td><h4><?php echo $email;?></h4></td>
  </tr>
   <tr>
    <td> <h3>Password</h3></td><td><button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myMod">Change Password</button></td>
    
  </tr>
</tbody>

</table>

       <form action="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/updateprofile');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div align="right"><button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Edit</button></div>
        

            

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editing your profile</h4>
      </div>
      <div class="modal-body">

        <p>       
      <div class="field-wrap">
      <label for="username">Username</label>
      <input type="text" class="form-control" name="username" id="username" required="" value="<?php echo $username;?>" />

</div>
 <div class="field-wrap">
      <label for="email">Email</label>
      <input type="text" name="email" class="form-control" id="email" required="" value="<?php echo $email;?>" />
      
</div>
 
 <div class="field-wrap">
      <label for="propic">Profile Picture</label>
      <img src="<?php echo base_url();?>images/<?php echo $image;?>" id="im" />
      <input type="file" name="propic" id="propic" />
      <input type="hidden" name="img" id="img" value="<?php echo $image;?>">
      
</div>
 
</p>
      </div>
      <div class="modal-footer">

<input class="btn btn-info btn-md" type="submit" name="update" id="update" value="UPDATE"/>

        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
</div>
  </div>
</div>


</form>
 <form action="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/changepass');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div align="right"></div>
        </div>  

            

<!-- Modal -->
<div id="myMod" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Your Password</h4>
      </div>
      <div class="modal-body">

        <p>       
      <div class="field-wrap">
      <label for="username">Current Password</label>
      <input type="text" class="form-control" name="password1" id="password1" required=""  />

</div>
 <div class="field-wrap">
      <label for="email">New Password</label>
      <input type="text" name="password2" class="form-control" id="password2" required="" />
      
</div>
 

 

      </div>
      <div class="modal-footer">

<input type="submit" class="btn btn-info btn-md" name="update" id="update" value="UPDATE"/>

        <button type="button" class="btn  btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


</form>

    </section></div></div></div>

   