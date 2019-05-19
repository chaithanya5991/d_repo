
  <body class="login">
    <div>


      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="<?php echo base_url('index.php/'.ADMIN_PATH.'designerctrl/login');?>" id="frm1">
              <h1>Login Form</h1><p class="error">
              <?php
              $err_msg=$this->session->flashdata('error');
              if($err_msg){
              echo$err_msg;
}?></p>
              <div>
                <input type="text" id="username" name="username" class="form-control" required="" placeholder="Username" />
              </div>
              <div>
                <input type="password" id="password" name="password" class="form-control" required="" placeholder="Password" />
              </div>
              <div>
                <input type="submit" name="submit" value="Log In" class="btn btn-default submit"/>
                <!--<a class="reset_pass" href="<?php// echo base_url('index.php/'.ADMIN_PATH.'designerctrl/forgot');?>">Lost your password?</a>-->
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />
