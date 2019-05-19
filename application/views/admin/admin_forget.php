
  <body class="login">
    <div>
     
<?php $er=$this->session->flashdata('error');
if($er)
{
  ?>
  <script type="text/javascript">
    alert('<?php echo $er ;?>');
  </script>
<?php } ?>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          
              <h1>Forget Password</h1>
              <div>
                <form action="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/resetpas');?>" method="post"> 
              <input type="email"  name="email" class="form-control" Placeholder="Email" required=""/>
              <!--<input type="password" class="password" name="Password" Placeholder="Password" required=""/>-->
              <input type="submit" name="f" value="Submit"> 
            </form> 
                
              </div>
             
              <div>
               
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               
                
          
                <div class="clearfix"></div>
                <br />














