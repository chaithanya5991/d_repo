<p class="error">
<?php
$err_msg=$this->session->flashdata('custerr');
if($err_msg){
echo$err_msg;
}?></p>
<br>


<?php foreach ($app as  $value) {
  ?>
<div class="container">
  <div class="col-md-3"></div>
  <div class="col-md-6">
             <div style="background-color: #f5f5f5; padding: 16px;margin-bottom: 10px;  ">

                  
                      <div class="row">
                          <div class="col-md-6">
                            <label>Material:</label></div>
                            <div class="col-md-6">
                              <h4 style="color: #337ab7;padding-bottom: 6px;"><?php echo $value->material;?></h4>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                              <label>Colour:</label></div>
                              <div class="col-md-6">
                                <h4 style="color: #337ab7;padding-bottom: 6px;"><?php echo  $value->colour;?></h4>
                          </div>

                        </div>
                        <div class="row">
                          <div class="col-md-6">
                              <label>Occation:</label></div>
                              <div class="col-md-6">
                                             <h4 style="color: #337ab7;padding-bottom: 6px;"><?php echo  $value->occation;?></h4>
                          </div>

                        </div>

                        <div class="row">
                          <div class="col-md-6">
                          </label>Size:</label></div>
                              <div class="col-md-6">
                                             <h4 style="color: #337ab7;padding-bottom: 6px;"><?php echo  $value->size;?></h4>
                          </div>

                        </div>

                        <div class="row">
                          <div class="col-md-6">
                          </label>Uploaded On:</label></div>
                                  <div class="col-md-6">
                                             <h4 style="color: #337ab7;padding-bottom: 6px;"><?php echo  $value->ap_date;?></h4>
                          </div>

                        </div>

</div>
</div>
</div>
<?php

}

?>
