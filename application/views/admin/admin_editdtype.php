
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Dress Type</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                 
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <?php foreach ($dtype as $valu) {
                
                $id=$valu->dress_id;
                $name=$valu->dressname;

                               }
       ?>
<div id="well" class="well">
<form method="post" action="<?php  echo base_url('index.php/'.ADMIN_PATH.'designerctrl/dtypeedit');?>">
      <input type="hidden" name="hide" id="hide" value="<?php echo$id;?>">
    <table class="table table-striped">
     <tr> <td><h4>Dress Type</h4></td>
     <td><input type="text" required="" name="dtype" id="dtype" value="<?php echo $name;?>"></td>
   </tr><br/>
      
      <tr><td></td><td align="right">
       <input type="submit" name="update" id="update" value="UPDATE"/></td>
    </table>
</form>
</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
      