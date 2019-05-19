
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
              <?php $re=$this->session->flashdata('reply');
                 if($re){
                     ?>
               <script type="text/javascript">
                 alert('<?php echo $re;?>');
               </script>
              <?php 
              } ?>

            <div class="clearfix"></div>

                        <div class="x_content">
                     
                   
   

       

  
  <table class="table" >
   
      <?php foreach ($feed as  $value) {
       // $id=$value->did;

        $id=$value->contact_id;
        $ids=$value->from_id;
        if($value->status=="0"){
     ?><tr style="background-color:  Aquamarine ;"><td ><a style="color: #16B7B7; text-decoration: underline;"  href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/feeddetailsde/'.$id);?>" ><?php echo $value->dname;?></a></td>
    
      <td>
     <?php echo $value->subject;?>
     </td><td><?php echo $value->date;?></td>
      <td><a style="color: #16B7B7; text-decoration: underline;" class="fa fa-trash" href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/deletefeedde/'.$id);?>" ></a></td><td><a style="color: #16B7B7; text-decoration: underline;" class="fa fa-reply" href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/replyde/'.$ids);?>" ></a></td>
    </tr>
    <?php } else {?>
   <tr><td ><a style="color: #16B7B7; text-decoration: underline;"  href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/feeddetailsde/'.$id);?>" ><?php echo $value->dname;?></a></td>
    
      <td>
     <?php echo $value->subject;?>
     </td><td><?php echo $value->date;?></td>
      <td><a style="color: #16B7B7; text-decoration: underline;" class="fa fa-trash" href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/deletefeedde/'.$id);?>" ></a></td><td><a style="color: #16B7B7; text-decoration: underline;" class="fa fa-reply" href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/replyde/'.$ids);?>" ></a></td>
    </tr>
   <?php } }?>
    
  </table>
   
   
    
 
                 </div> 
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
      