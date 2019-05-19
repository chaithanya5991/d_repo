
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Designer Feedbacks</h3>
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
                           <?php foreach ($feed as  $value) {
       // $id=$value->did;

        $id=$value->contact_id;
        $ids=$value->from_id;?>
                     
       <div class="container">
         <div class="row">
           <div class="col-sm-7 col-md-offset-3 " style=" margin-top: 18px; background-color: white;padding: 10px 15px;min-height: 450px;">
             <div class="row" >
               <div class="col-sm-6" style="padding: 10px 14px;">
                 <h3><?php echo $value->subject;?></h3>
               </div>
               <div class="col-sm-6">
                 <a href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/replyde/'.$ids);?>" style="float: right;"><span class="fa fa-mail-reply" style="padding: 10px;background-color: grey;color: white;" ></span></a>
                 <a href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/deletefeedde/'.$id);?>" style="float: right;"><span class="fa fa-trash" style="padding: 10px;background-color: grey;color: white;" ></span></a>
               </div>
             </div>
             <div class="row">
               <div class="col-sm-6">
                 <p style="padding: 10px;">from:<span><b><?php echo $value->dname;?></b></span></p>
                 <p style="padding: 10px;"><?php echo  $value->date;?></p>
               </div>
            
               <div class="col-sm-6">
                 
               </div>
             </div>
             <div class="row">
               <div class="col-xs-10">
                <p style="padding-left: 10px;">to me:</p>
                 <p style="padding: 40px;"><?php echo $value->message;?></p>
               </div>
             </div>
           </div>
         </div>
       </div>            
   

       

 <!-- <table>
      <?php foreach ($feed as  $value) {
       // $id=$value->did;

        $id=$value->contact_id;
        $ids=$value->from_id;?>
        <tr>
          <td>
              <h2><?php echo $value->subject;?></h2>
         </td>
          <td>
              <a style="color: #16B7B7; text-decoration: underline;" class="fa fa-trash" href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/deletefeedde/'.$id);?>" ></a>
          </td>
          <td width="2%">
              <a style="color: #16B7B7; text-decoration: underline;" class="fa fa-mail-reply" href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/replyde/'.$ids);?>" >
              </a>
          </td>
       </tr>
       <tr>
          <td>From:
            <h4 style="font-size: 16px;font-style: italic;color: blue;">
                <?php echo $value->dname;?>
            </h4>
          </td>
        </tr>
        <tr>
            <td>To: me</td>
        </tr>
<tr>
      <td><?php echo $value->message;?></td>
    </tr>
    <?php }?>
   
   
    
  </table>--><?php }?>
                 </div> 
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
      