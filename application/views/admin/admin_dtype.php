
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Dress Type </h3>
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
                       <h3> <small>
Add new DressType  Click Here.......

<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal" >Add</button></small>
      </h3><br/><br/><br/>
      <form action="" method="post" id="form1">
                      <label class="fa fa-search">Search </label>
                     
             
                       <input type="text" placeholder="Dress Type" name="t1" id="t1"/>
                       </form>
      
      <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Inserting into Dress Type</h4>
      </div>

      <div class="modal-body col-md-offset-1">
         <form method="post" id="post" action="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/addtype/');?>">
        <div class="controls">
      <div class="row"><div class="col-md-6">      
      <div class="form-group">
      <label for="dtype" id="dt">Dress Type</label>
      <input type="text" class="form-control" name="dtype" id="dtype"/>

</div>
 
</div></div></div>
      </div>
      <div class="modal-footer">
<div class="btn-pst text-center">
<input type="submit" name="insert" class="btn btn-primary btn-md" id="insert"  value="Add" onclick="return myFunction();"/>
 </div>  
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
       </div>
 </form>
       </div>

  </div>
</div>

<br/><br/>

    <!-- Main content -->
     <div  id="tf">
                     
    <section class="content container-fluid">

        

  <table class="table table-striped">
    <tr><th width="2%">Dress Type</th><th width="1%">Action</th>
    </tr><?php foreach($dtype as $res ){ 
                 $ids=$res->dress_id;
      ?>
             <tr>
              <td><?php echo$res->dressname;?>  </td>
             
                <td align="center"><a href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/editdtype/'.$ids);?>" class="fa fa-pencil" ></a><!--<br/><br/><a href="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/deletecountry/'.$ids);?>"  onclick="return confirm
                  ('Are you sure  to Delete  <?php echo$res->countryname;?>?')" class="fa fa-trash"></a>--></td></tr>  <?php     }?>
    
  </table></section></div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
  function myFunction() {
 var dtype=document.getElementById('dtype').value;
 if(dtype==""){
  document.getElementById('dt').innerHTML="Please Enter a Type name";
  document.getElementById('dt').className="error";
  return false;
 } else {
  document.getElementById('dt').className="";
  return true;
 }

 
 
}
</script>
<script type="text/javascript">
  $(document).ready(function(){   

    $("#t1").keyup(function()
    {
           
     $.ajax({
         type: "POST",
         url:  '<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/searchdtype');?>', 
         data:  $("#form1").serialize(),
         success: 
              function(data){
                
                $('#tf').html(data);
                            }
             });
     return false;
     }); 
});
</script>
        <!-- /page content -->

        <!-- footer content -->
      