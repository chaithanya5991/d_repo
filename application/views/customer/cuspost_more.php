<p class="error">
<?php
$err_msg=$this->session->flashdata('custerr');
if($err_msg){
echo$err_msg;
}?></p>
<br>
<div class="container">
  <div class="col-md-3"></div>
  <div class="col-md-6">
  
                <div class="row" style="text-align:center">
                    <?php foreach ($reply as  $value) {

                      ?>
                    <h4 style="color:magenta;"><b><span><?php echo $value->dname;?></span></b></h4>
					
        </div>
             <div style="background-color: #f5f5f5;padding: 16px;margin-bottom: 10px;">

					<?php


                    foreach ($msg as  $value) {
                      $idd=$value->re_id;
                      $id=$value->from_id;
                      $pid=$value->post_id;
                      ?>
                      
                          <div class="col-md-6">
                            <h4 style="color: #337ab7;padding-bottom: 6px;"><?php echo $value->subject;?></h4>
                          </div>

                        <div class="row">
                          <div class="col-md-6">

                                             <p style=""><?php echo  $value->message;?></p>
                          </div>

                        </div>
                        <div class="row">
                          <div class="col-md-6">

                                             <p style=""><?php echo  $value->re_date;?></p>
                          </div>

                        </div>
                        <div class="row">

                          <a type="button" href="<?php echo base_url('index.php/designerctrl/cust_dereject/'.$idd);?>" class="btn btn-primary" style="float: right;padding: 6px;margin-right: 50px;">Reject</a>
                          <a type="button" href="#" data-toggle="modal" data-target="#myModal-<?=$id?><?=$pid?>" class="btn btn-primary" style="float: right;padding: 6px;margin-right: 10px;">Approve</a>
                          <!-- Modal -->
<div id="myModal-<?=$id?><?=$pid?>" class="modal fade" role="dialog" aria-hidden="true" >
 <div class="modal-dialog">

   <!-- Modal content-->
   <div class="modal-content">
        <form method="post" id="post" action="<?php echo base_url('index.php/designerctrl/cust_deapprove/'.$id.'/'.$pid);?>">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>

     <div class="modal-body col-md-offset-1">

       <div class="controls">
     <div class="row">
       <div class="col-md-12">
     <div class="form-group">
     <label for="cats" id="cats">Material: </label>
     <input type="text" class="form-control" name="mat" id="mat" required="" />
</div>
<div class="form-group">
<label for="cats" id="cats">Colour: </label>
<input type="text" class="form-control" required="" id="colour"  name="colour" >
</div>
 <div class="form-group">
<label for="cats" id="cats">Occation: </label>
<select name="occ" id="occ" required="" class="form-control">
 <option value="" >--Select Occation--</option>
 <option value="Party"> Party</option>
               <option value="Casual"> Casual</option>
</select>
</div>
<div class="form-group">
<label for="cats" id="cats">Size:</label>
<select name="size" id="size" required="" class="form-control">
<option value="" >--Select Size--</option>
<option value="XS(Extra small)"> Extra small</option>
<option value="S(Small)"> Small</option>
<option value="M(Medium)"> Medium</option>
<option value="L(Large)"> Large</option>
<option value="XL(Extra Large)"> Extra Large</option>
</select>
</div>
     <div class="modal-footer">
<div class="btn-pst text-center">
<input type="submit" name="insert" class="btn btn-primary btn-md" id="insert"  value="Send" />
</div>
       <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="float:right">Close</button>
      </div>
</form>
      </div>

 </div>
</div>
</div>

                        </div>
                      </div>


                      </div>

</div>
<?php

}
					}
?>
</div>
</div>

<div class="col-md-3"></div>
</div>

