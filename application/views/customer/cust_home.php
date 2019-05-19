<div class="body">


<div style="padding: 90px 0px;background-image: url('../images/body1.jpg');
background-repeat: no-repeat;">
            <div   class="container">
             <div  class="row">
              <div class="col-md-3"></div>
          <div class="col-md-6" style="background-color:#e7eaa461;
    padding: 10px 50px;">
            <div class="" style="">
              <div class="">
                <h3 class="heading" style="color:black">Add Details </h3>

                <p class="error">
              <?php
              $err_msg=$this->session->flashdata('custerr');
              if($err_msg){
              echo$err_msg;
}?></p>
              </div>
<div class="">
<div class="">
                  <form action="<?php echo base_url('index.php/designerctrl/cust_posting');?>" method="post" enctype="multipart/form-data">
    <div class="form-group" >

        <textarea class="form-controltext" style="border:black solid 1px;background:white" id="email" placeholder="Write Something" name="text" required=""></textarea>
    </div>
    <div class="form-group" >

        <input type="text" class="form-controltext" style="border:black solid 1px;background:white" id="material" placeholder="Mention your material type" name="mat" required="">
    </div>
    <div class="form-group" >

        <input type="text" class="form-controltext" style="border:black solid 1px;background:white" id="price" placeholder="Mention your price range like (1000-2000)" name="price" required="">
    </div>
   <div class="form-group">
      <input type="file" style="border:black solid 1px;background:white" name="file" accept="image/*"  id="fileToUpload" required="" />
    </div>
    <div class="col-md-4"></div>
<div class="col-md-4">
   <center><input type="submit" name="post" class="btn btn-block"  style="border:black solid 2px;background:white" value="Submit" ></center>
</div>
<div class="col-md-4"></div>

                     </form>
                      <br>

                  </div>

</div>
        </div>
          </div></div></div>
        </div>
<div class="banner-bg-agileits">
            <!-- banner-text --
            <div class="banner-text">
                <!--counter--

                <div class="days-coming">
                    <div class="container">
                       <!-- <h2 class="title tittle">fashion week</h2>--

                        <div class="timer_wrap">
                            <div id="counter"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!--//counter-->
          <!--  </div>-->
        <!--</div>-->

     <div style="padding: 80px 0px;
    background-color: #e7eaa461" class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4"> <h1 style="text-align: center;color: black;font-size: 3em;">Your Posts</h1>
      <hr>
  </div>
    <div class="col-md-4"></div>

     </div>
     <div style="background-color: #000000b5;" >


                  <div class="container" >

        <div class="row">

  <?php foreach ($post as $value) {
    $ids=$value->post_id;
   ?>
            <div class="col-md-6">
                <div class="polaroid">
                  <a href="<?php echo base_url('index.php/designerctrl/despost_more/'.$ids);?>"><img class=" img-responsivee " id="p" src="<?php echo base_url();?>uploads/<?php echo $value->pimage;?> " alt ="<?php echo $value->pimage;?>" ></a>
                  <div class="middle">
                      <div class="t">  <a style="color:white" href="<?php echo base_url('index.php/designerctrl/despost_more/'.$ids);?>">Click Here to View Reply..!</a></div>
                    </div>
                  <div class="" style="padding: 30px 0px;">
                    <p style="color:white;"> Posted on :<?php echo $value->postdate;?></p>
                    <br>
                    <p style="color: pink;"><?php echo $value->post;?></p>

                    <p style="text-align:right;color:white;"><?php echo $value->cname;?></p>
                    <a href="<?php echo base_url('index.php/designerctrl/post_delete/'.$ids);?>" type="button"  class="glyphicon glyphicon-trash" style="color:red;font-size:20px " onclick="return confirm
                                ('Are you sure  to Delete ?')"></a>


                  </div>


                </div>
            </div>
            <?php } ?>

            </div>
        <!--

  <?php foreach ($post as $value) {
   ?>        <div class="container" style="border:1px solid #ddd;background-color: white;">
<table class="table">
    <tr>
        <td>
        <!--<td> <img src="../uploads/<?php //echo $getf['pimage'];?> " style="width: 50px; height: 50px;" class="img-circle img-responsive " alt ="<?php //echo $getf['fimage'];?>">-->
    <!--   <?php echo $value->cname;?></td></tr>
    <tr><td>

            <p> <?php echo $value->post;?></p>
            <hr>
           <p>

             <img class=" img-responsive " id="p" src="<?php echo base_url();?>uploads/<?php echo $value->pimage;?> " alt ="<?php echo $value->pimage;?>" >    </p>
<!--
     <a href="like.php?like=<?php// echo $getf['id'];?>"><span class="glyphicon glyphicon-thumbs-up"></span></a>
         <?php// echo $getf['like'];?> </td></tr>
 </td>
</tr>




</table>-
</div>

        <br>
        <?php
      }
      ?>-->

    <div class="footer-cpy">
                <div class="footer-social">

                <div class="cpy-right">
                    <p>© 2018 All rights reserved </p>
                </div>
                <div class="clearfix"></div>
            </div>
           </div>
</div>
</div>
</div>
        <!-- //banner -->
</body>
 <style type="text/css">


            #fr{
                text-align: center;
            }



          .heading{
              text-align: center;
color: white;
text-transform: uppercase;
padding: 26px 0px;
font-size: 2.3em;
          }
            body{
              background: #d5d5d5;
            }
            #r{
                    margin-top: 132px;
            }

            img {
              opacity: 1;
              display: block;
              width: 100%;
              height: auto;
              transition: .5s ease;
              backface-visibility: hidden;
            }

            .middle {
              transition: .5s ease;
              opacity: 0;
              position: absolute;
              top: 40%;
              left: 50%;
              transform: translate(-50%, -50%);
              -ms-transform: translate(-50%, -50%);
              text-align: center;
            }

            .polaroid:hover .img-responsivee {
  opacity: 0.3;
}

.polaroid:hover .middle {
  opacity: 1;
}

.t {
  background-color: #2f83c7;;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
               </style>

</html>
