
<div style="background-image: url('<?php echo base_url();?>/templates/nav/images/contact2.jpg');background-repeat: no-repeat;background-size: cover;    height: 100%;">

  <div class="container" style="padding-top: 90px;">

<div>

<div class="col-sm-3">
   <div class="">
         <div class="row">

          <?php foreach ($feed as  $value) {
       // $id=$value->did;

        $id=$value->reply_id;
      //  $ids=$value->from_id;?>
           <div class="col-sm-12">
            <div style="background-color: #f5f5f5;
    padding: 16px;margin-bottom: 20px;
">
             <div class="row">
               <div class="col-sm-6">
                 <h4 style="color: #337ab7;padding-bottom: 6px;"><?php echo $value->subject;?></h4>
               </div>
               <div class="col-sm-6">

               </div>
             </div>
             <div class="row">
               <div class="col-sm-6">
                 <p style="    color: #030404;"><span>Designer Junction</span></p>
                                  <p style=""><?php echo  $value->date;?></p>
               </div>

               <div class="col-sm-6">

               </div>
             </div>
             <div class="row">
               <a type="button" class="btn btn-primary" style="float: right;padding: 6px;margin-right: 10px;" href="<?php echo base_url('index.php/designerctrl/de_getdtad/'.$id);?>">more..</a>
             </div>

           </div>
         </div><?php } ?>
         </div>
       </div>

</div>
<?php $cnt=$this->session->flashdata('send');
if($cnt)
{
  ?>
  <script type="text/javascript">
    alert('<?php echo $cnt;?>');

  </script>
<?php } ?>
<div class="col-sm-6">
  <div class="" style="padding: 40px;    background-color: #477ba596; ">
      <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/designerctrl/de_send');?>">
        <div class="form-group">
          <label for="sel1"></label>
          <select class="form-control" id="sel1" name="sel1" required="">
            <option value="">TO</option>
            <option value="1">Designer Junction</option>
            <option value="2">Customer</option>

          </select>

        </div>
        <div id="tf" class="form-group">

          </div>
    <div class="form-group">
      <label class="control-label" for="subject"></label>
      <div class="">
        <input type="text" class="form-control" required="" id="subject" placeholder="Subject" name="subject">
      </div>
    </div>
    <div class="form-group">
      <label for="comment"></label>
      <textarea class="form-control" required="" name="message" rows="5" id="comment" placeholder="Type message here"></textarea>
    </div>


    <div class="form-group">
      <div class="">
        <button type="submit" class="btn btn-default btn-block">Submit</button>
      </div>
    </div>
  </form>
  </div>
<h2></h2>

</div>
<div class="col-sm-3">
   <div class="">
         <div class="row">

          <?php foreach ($custfeed as  $value) {
       // $id=$value->did;

        $idd=$value->decnid;
        $ids=$value->from_id;?>
           <div class="col-sm-12">
            <div style="background-color: #f5f5f5;
    padding: 16px;margin-bottom: 20px;
">
             <div class="row">
               <div class="col-sm-6">
                 <h4 style="color: #337ab7;padding-bottom: 6px;"><?php echo $value->subject;?></h4>
               </div>
               <div class="col-sm-6">

               </div>
             </div>
             <div class="row">
               <div class="col-sm-6">
                 <p style="    color: #030404;"><span><?php echo $value->cname;?></span></p>
                                  <p style=""><?php echo  $value->date;?></p>
               </div>

               <div class="col-sm-6">

               </div>
             </div>
             <div class="row">
               <a type="button" href="<?php echo base_url('index.php/designerctrl/de_dtcust/'.$idd);?>" class="btn btn-primary" style="float: right;padding: 6px;margin-right: 10px;">more..</a>
             </div>

           </div>
         </div><?php } ?>
         </div>
       </div>

</div>
</div>

</div>
</div>
<style type="text/css">
  .form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    background-color: #ffffff05;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
</style> <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
//alert("hai");
  $('#sel1').change(function()
  {
   // alert("hai");
   var dname=$(this).val();
   //alert(dname);

    if(dname=="2"){

    $.ajax({
         type: "POST",
         url:  '<?php echo base_url('index.php/designerctrl/de_designer')?>',
         data:  'dname='+dname,
         success:
              function(data){

                $('#tf').html(data);
                $('#tf').show();
                            }
             });

} else {
  $('#tf').hide();
}
});
})
</script>
