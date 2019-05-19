
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Reply to Customer</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                 
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            

            <?php foreach ($cust as $value) {
              $id=$value->login_id;
              $name=$value->cname;
            }?>
<div class="container" style="padding-top: 102px;padding-left: 115px;">
  
  <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/custreplyto');?>">
   <div class="form-group">
      <label class="control-label col-sm-2" for="tos">TO:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" required="" id="tos" placeholder="" name="tos" value="<?php echo $name;?>" readonly><input type="hidden" name="hide" value="<?php echo $id;?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="sub">Subject:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" required="" id="sub" placeholder="Enter Subject" name="sub">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="msg">Message:</label>
      <div class="col-sm-10">          
        <textarea class="form-control" required="" id="msg" placeholder="Write Your Message" name="msg"></textarea>
      </div>
    </div>
   
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Send</button>
      </div>
    </div>
  </form>
</div>


          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
      