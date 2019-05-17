<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Designerctrl extends CI_Controller {
	public function __construct()
	{

		parent::__construct();
    $this->load->model('designermodel');
    $this->load->helper(array('form', 'url'));
    $this->load->library('session');
    $this->load->helper('date','email');
    $this->load->library('image_lib');
	}


	function index()
	{
     $sess=$this->session->userdata('designid');
     $role=$this->session->userdata('role')  ;

         if($sess!="" && $role=='1')
              {
                 redirect('Designerctrl/viewcustpage');
              } else if($sess!="" && $role=='2')
              {
                  redirect('Designerctrl/viewdesignpage');
              } else {
		           $this->load->view('home.php');
              }
	}

	function signup()
	{
		$this->load->view('signup.php');
	}

	function login()
	{
		$this->load->view('login.php');
	}

	function forgot()
	{
		$this->load->view('forgot.php');
	}
    function forget()

  {
    $email=$this->input->post('email');
    $length = 8;
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    $register_email=$this->input->post('email');
    $email=array('email'=>$register_email);
    if($this->designermodel->checkmail($email))
      {
        $this->load->library("phpmailer/phpmailer");
        $mail = new Phpmailer();
        $mail->IsSMTP();
        $mail->Host = "ftp.byethost8.com";
        $mail->SMTPAuth = true;
        $mail->Username = "@yahoo.com";
        $mail->Password = "";
        $mail->From = "@yahoo.com";
        $mail->FromName ="DesignerJunction";
        $mail->AddAddress($register_email, $register_email);
        $mail->WordWrap = 50;
        $mail->IsHTML(true);
        $mail->Subject = "set password";
        $mail->Body = $password;
      } else {
        $this->session->set_flashdata('error','Invalid E-mail Id');
        redirect('Designerctrl/forget');
}
       if (!$mail->Send()) {
                   $msgMail = 'Message sending failed..';
               } else {
                   $msgMail = 'Message Successfully sent..';
               }

    $this->session->set_flashdata('logerr',$msgMail);
    redirect('Designerctrl/login','logerr');
  }

  function custsignup()
  {
    	$name=$this->input->post('name');
      $gender=$this->input->post('gender');
      $dob=$this->input->post('dob');

       $nows=date("Y-m-d", strtotime($dob));

      $address=$this->input->post('addr');
      $city=$this->input->post('city');
      $state=$this->input->post('state');
      $pincode=$this->input->post('pincode');
      $number=$this->input->post('phone');
      $email=$this->input->post('mail');
      $password=$this->input->post('pass');
      $conpassword=$this->input->post('cpass');
     if($password==$conpassword)
     {

        $mail=array('email'=>$email);
        $dat=$this->designermodel->emailcheck($mail);
       if($dat!=""){
            $this->session->set_flashdata('error','email already exist');
            redirect('Designerctrl/signup','error');
       } else {

            $phone=array('phone'=>$number);
            $dats=$this->designermodel->numbercheck($phone);
            if($dats!="")
            {
                $this->session->set_flashdata('error','phone number already exist');
                redirect('Designerctrl/signup','error');
            } else
            {
                $arry=array('email'=>$email,'pass'=>$password,'role'=>'1','status'=>'1');
                $insert_user_data_id=$this->designermodel->registers($arry);
                if($insert_user_data_id!="")
                {
                   $arrys=array('cname'=>$name,'gender'=>$gender,'dob'=>$nows,'addr'=>$address,'city'=>$city,'state'=>$state,'pincode'=>$pincode,'phone'=>$number,'login_id'=>$insert_user_data_id);
                   $this->designermodel->signup($arrys);
                    redirect('Designerctrl/login','error');

                 } else {
                   $this->session->set_flashdata('reger','Registration failed');
                   redirect('Designerctrl/signup','error');
                 }
            }
        }


      }else {
        $this->session->set_flashdata('error','password should match');
                    redirect('Designerctrl/signup','error');
     }


  }

  function designsignup()
  {
      $name=$this->input->post('dname');
      $experience=$this->input->post('exp');
      $desc=$this->input->post('desc');
      $address=$this->input->post('daddr');
      $city=$this->input->post('dcity');
      $state=$this->input->post('dstate');
      $pincode=$this->input->post('dpincode');
      $number=$this->input->post('dphone');
      $email=$this->input->post('demail');
      $password=$this->input->post('dpass');
      $conpassword=$this->input->post('cdpass');
      $web=$this->input->post('web');
      if($password==$conpassword)
      {

        $mail=array('email'=>$email);
        $dat=$this->designermodel->emailcheck($mail);
        if($dat!=""){
            $this->session->set_flashdata('error','email already exist');
            redirect('Designerctrl/signup','error');
        } else {

            $phone=array('phone'=>$number);
            $dats=$this->designermodel->numberchecks($phone);
            if($dats!="")
            {
                  $this->session->set_flashdata('error','phone number already exist');
                  redirect('Designerctrl/signup','error');
            } else
            {
                  $arry=array('email'=>$email,'pass'=>$password,'role'=>'2','status'=>'0');
                  $insert_user_data_id=$this->designermodel->registers($arry);
                 if($insert_user_data_id!="")
                 {
                      $arrys=array('dname'=>$name,'desc'=>$desc,'exp'=>$experience,'addr'=>$address,'city'=>$city,'state'=>$state,'pincode'=>$pincode,'phone'=>$number,'link'=>$web,'login_id'=>$insert_user_data_id);
                      $this->designermodel->signups($arrys);
                      redirect('Designerctrl/login','error');

                 } else {
                      $this->session->set_flashdata('reger','Registration failed');
                      redirect('Designerctrl/signup','error');
                 }
            }
        }


      }else {
         $this->session->set_flashdata('error','password should match');
         redirect('Designerctrl/signup','error');
      }

  }

  function logincheck()
  {
    	$email=$this->input->post('email');
    	$password=$this->input->post('password');
      $log=array('email'=>$email,'pass'=>$password);
      $data=$this->designermodel->checklogin($log);


        if($data!=""){
            foreach ($data as $value)
              {
                          $id=$value->login_id;
                          $role=$value->role;
                          $s=$value->status;
                  }
                  if($s!="1"){
                    $this->session->set_flashdata('logerr','Waiting for Admin Approval......');
                    redirect('Designerctrl/login','logerr');
                  } else {
                  $this->session->set_userdata('designid',$id);
                  $this->session->set_userdata('role',$role);
                  $sess=$this->session->userdata('designid');

                  if($sess!="" && $role=='1')
                  {

                       redirect('Designerctrl/viewcustpage');
                   } else if($sess!="" && $role=='2')
                   {
                       redirect('Designerctrl/viewdesignpage');
                   }
                 }

        }
        else {
           $this->session->set_flashdata('logerr','Incorrect E-mail or password');
           redirect('Designerctrl/login','logerr');
        }
  }


  function viewcustpage()
  {

    $sess=$this->session->userdata('designid');

    if($sess!="")
      {
        $id=array('post.login_id'=>$sess);
        $data['post']=$this->designermodel->cust_getpost($id);
        $data['custname']=$this->designermodel->cust_iden($sess);
        $data['msg']=$this->designermodel->getreplys($sess);
				$data['reply']=$this->designermodel->getdedeply($sess);
        $this->load->view('customer/cust_temp.php',$data);
        $this->load->view('customer/cust_home.php');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }

  }

  function cust_designer()
  {
    $data=$this->designermodel->cust_getdesi();
      ?>

          <label for="sel1"></label>
          <select class="form-control" id="des" name="des">
    <?php
    foreach ($data as $value) {

    ?>
        <option value="<?php echo $value->login_id;?>"><?php echo $value->dname;?></option>
    <?php
           } ?>

        </select>
  <?php
  }

  function cust_contact()
  {
    $sess=$this->session->userdata('designid');

    if($sess!="")
      {

        $data['custname']=$this->designermodel->cust_iden($sess);
        $data['adfeed']=$this->designermodel->getmsg($sess);
        $data['feed']=$this->designermodel->getdefed($sess);
        $this->load->view('customer/cust_temp.php',$data);
        $this->load->view('customer/cust_contact.php');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }
  }

	function despost_more($ids)

	{
		$sess=$this->session->userdata('designid');
		if($sess!="")
			{
		 // $id=array('post.login_id'=>$sess);
		 // $data['post']=$this->designermodel->cust_getpost($id);
		 //print_r($ids);
		 //exit();
				$data['custname']=$this->designermodel->cust_iden($sess);
        $data['msg']=$this->designermodel->getreply($sess,$ids);
				$data['reply']=$this->designermodel->getdedeply($sess);


				$this->load->view('customer/cust_temp.php',$data);
				$this->load->view('customer/cuspost_more.php');
			} else {
				$this->session->set_flashdata('logerr','Please Login  again');
				redirect('Designerctrl/login','logerr');
			}
	}

	function cuspost_more($ids)

	{
		$sess=$this->session->userdata('designid');
		if($sess!="")
			{
		 // $id=array('post.login_id'=>$sess);
		 // $data['post']=$this->designermodel->cust_getpost($id);
		 //print_r($ids);
		 //exit();
				$data['designname']=$this->designermodel->de_getdename($sess);
				$data['app']=$this->designermodel->getcusreply($sess,$ids);


				$this->load->view('designer/design_dtemp.php',$data);
				$this->load->view('designer/despost_more.php');
			} else {
				$this->session->set_flashdata('logerr','Please Login  again');
				redirect('Designerctrl/login','logerr');
			}
	}

  function cust_addtre($id)
  {
    $sess=$this->session->userdata('designid');
    if($sess!="")
    {
      $data['custname']=$this->designermodel->cust_iden($sess);
      $data['adreply']=$this->designermodel->cust_addtre($id);
      $this->load->view('customer/cust_temp.php',$data);
      $this->load->view('customer/cust_message.php');

    } else {
      $this->session->set_flashdata('logerr','Please Login again');
      redirect('Designerctrl/login','logerr');
    }
  }

  function cust_demsg($idd)
  {
    $sess=$this->session->userdata('designid');
    if($sess!="")
    {

      $data['custname']=$this->designermodel->cust_iden($sess);
      $data['demsg']=$this->designermodel->cust_dedtmsg($idd);
      $this->load->view('customer/cust_temp.php',$data);
      $this->load->view('customer/cust_message.php');

    } else {
      $this->session->set_flashdata('logerr','Please Login again');
      redirect('Designerctrl/login','logerr');
    }
  }

  function cust_deleteadmsg($id)
  {
    $idd=array("reply_id"=>$id);
    $this->designermodel->cust_deleteadmsg($idd);
    redirect('Designerctrl/cust_contact');
  }
  function  cust_deletedemsg($id)
  {
    $idd=array("custcnid"=>$id);
    $this->designermodel->cust_deletedemsg($idd);
    redirect('Designerctrl/cust_contact');
  }

  function cust_send()
  {
    $sess=$this->session->userdata('designid');

    if($sess!="")
      {
        $this->load->helper('date');
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Kolkata'));
        $nows= $now->format('d-m-Y H:i:s');
        $subject=$this->input->post('subject');
        $message=$this->input->post('message');
        $val=$this->input->post('sel1');

        if($val=="2")
          {
            $vals=$this->input->post('des');
            $dats=array('from_id'=>$sess,'to_id'=>$vals,'role'=>'2','subject'=>$subject,'message'=>$message,'date'=>$nows);
            if($this->designermodel->cust_sendmes($dats))
              {
                $this->session->set_flashdata('send','Message Send Successfully');
              } else {
                $this->session->set_flashdata('send','Failed To Send Message');
              }
          } else {
            $dats=array('from_id' =>$sess,'role'=>'1','subject'=>$subject,'message'=>$message,'date'=>$nows );
            if($this->designermodel->cust_sendadmes($dats))
              {
                $this->session->set_flashdata('send','Message Send Successfully');
              } else {
                $this->session->set_flashdata('send','Failed To Send Message');
              }
          }

        redirect('Designerctrl/cust_contact','send');
      } else {
          $this->session->set_flashdata('logerr','Please Login  again');
          redirect('Designerctrl/login','logerr');
      }
  }

  function cust_posting()

  {
    $sess=$this->session->userdata('designid');
    if($sess!="")
      {
        $text=$this->input->post('text');
				$text1=$this->input->post('mat');
				$text2=$this->input->post('price');
        $this->load->helper('date');
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Kolkata'));
        $nows= $now->format('d-m-Y H:i:s');
        $config['upload_path'] = "./uploads";
        $config['allowed_types'] = "png|jpg";
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('file'))
          {
            $images = $this->upload->data();
            $userphoto= $images['file_name'];
            $add=array('post'=>$text,'material'=>$text1,'price'=>$text2,'pimage'=>$userphoto,'login_id'=>$sess,'postdate'=>$nows);

            $insert_user_data_id=$this->designermodel->cust_insertpost($add);
            if($insert_user_data_id!="")
              {
                redirect('Designerctrl/viewcustpage');
              } else {
                  $this->session->set_flashdata('custerr',"Failed to Upload");
                  redirect('Designerctrl/viewcustpage','custerr');
              }

          } else {

              $this->session->set_flashdata('custerr',"Failed to upload ,Please try again");
              redirect('Designerctrl/viewcustpage','custerr');

          }
      } else {
          $this->session->set_flashdata('logerr','Please Login  again');
          redirect('Designerctrl/login','logerr');
      }
  }

  function cust_designers()

  {
    $sess=$this->session->userdata('designid');

    if($sess!="")
      {
        $data['custname']=$this->designermodel->cust_iden($sess);
        $data['design']=$this->designermodel->cust_getdesignes();
        $this->load->view('customer/cust_temp.php',$data);
        $this->load->view('customer/cust_designers.php');
      } else {
          $this->session->set_flashdata('logerr','Please Login  again');
          redirect('Designerctrl/login','logerr');
             }
  }

  function cust_viewdesignes($eid)

  {
    $sess=$this->session->userdata('designid');

    if($sess!="")
      {
        $data['custname']=$this->designermodel->cust_iden($sess);
        $id=array('login_id'=>$eid);
        $data['dress']=$this->designermodel->cust_getdress($id);
        $this->load->view('customer/cust_temp.php',$data);
        $this->load->view('customer/cust_styles.php');
      } else {
          $this->session->set_flashdata('logerr','Please Login  again');
          redirect('Designerctrl/login','logerr');
            }
  }

  function cust_item($id)

  {
    $sess=$this->session->userdata('designid');

    if($sess!="")
      {
        $data['custname']=$this->designermodel->cust_iden($sess);
        $val=array('item_id'=>$id);
        $data['item']=$this->designermodel->de_single($val);

        $this->load->view('customer/cust_temp.php',$data);
        $this->load->view('customer/cust_item.php');

      } else {
          $this->session->set_flashdata('logerr','Please Login  again');
          redirect('Designerctrl/login','logerr');
            }
  }

	function cust_rent_item($id)

  {
    $sess=$this->session->userdata('designid');

    if($sess!="")
      {
        $data['custname']=$this->designermodel->cust_iden($sess);
        $val=array('rent_id'=>$id);
        $data['item']=$this->designermodel->de_rentsingle($val);

        $this->load->view('customer/cust_temp.php',$data);
        $this->load->view('customer/cust_rent_item.php');

      } else {
          $this->session->set_flashdata('logerr','Please Login  again');
          redirect('Designerctrl/login','logerr');
            }
  }



  function cust_designs()

  {
    $sess=$this->session->userdata('designid');

    if($sess!="")
      {
        $data['custname']=$this->designermodel->cust_iden($sess);
        $da=array('userid'=>$sess);
    //  $ids=array('dress.item_id'=>$id);
        $data['status']=$this->designermodel->cust_getwishid($da);
        $data['dress']=$this->designermodel->cust_getalldress();
        $data['dtype']=$this->designermodel->cust_dtype();

        $this->load->view('customer/cust_temp.php',$data);
        $this->load->view('customer/cust_gallery.php');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
            }
  }

	function cust_rent()

  {
    $sess=$this->session->userdata('designid');

    if($sess!="")
      {
        $data['custname']=$this->designermodel->cust_iden($sess);
        $da=array('userid'=>$sess);
    //  $ids=array('dress.item_id'=>$id);
        $data['status']=$this->designermodel->cust_getwishid($da);
        $data['dress']=$this->designermodel->cust_getallrentdress();
        $data['dtype']=$this->designermodel->cust_dtype();

        $this->load->view('customer/cust_temp.php',$data);
        $this->load->view('customer/cust_rent.php');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
            }
  }
  function cust_addwish($id)

  {
    $sess=$this->session->userdata('designid');
  //$da=array('userid'=>$sess);
    if($sess!="")
      {
        $ids=array('item_id'=>$id);
        $da=$this->designermodel->cust_getlogid($ids);
        foreach ($da as $value)
          {
            $logid=$value->login_id;
          }
        $this->load->helper('date');
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Kolkata'));
        $nows= $now->format('d-m-Y H:i:s');

        $data=array('itemid'=>$id,'userid'=>$sess,'status'=>"0",'did'=>$logid,'wishdate'=>$nows);

    //  $ids=array('dress.item_id'=>$id);

        $this->designermodel->cust_addtowish($data);
     $this->session->set_flashdata('ws','Added to your wish List');
        redirect('Designerctrl/cust_designs','ws');

      } else {
          $this->session->set_flashdata('logerr','Please Login  again');
          redirect('Designerctrl/login','logerr');
            }
  }

	function cust_rentwish($id)

	{
		$sess=$this->session->userdata('designid');
	//$da=array('userid'=>$sess);
		if($sess!="")
			{
				$ids=array('rent_id'=>$id);
				$da=$this->designermodel->cust_glogid($ids);
				foreach ($da as $value)
					{
						$logid=$value->login_id;
					}
				$this->load->helper('date');
				$now = new DateTime();
				$now->setTimezone(new DateTimezone('Asia/Kolkata'));
				$nows= $now->format('d-m-Y H:i:s');

				$data=array('itemid'=>$id,'userid'=>$sess,'status'=>"0",'did'=>$logid,'wishdate'=>$nows);

		//  $ids=array('dress.item_id'=>$id);

				$this->designermodel->cust_addtowish($data);
		 $this->session->set_flashdata('ws','Added to your wish List');
				redirect('Designerctrl/cust_rent','ws');

			} else {
					$this->session->set_flashdata('logerr','Please Login  again');
					redirect('Designerctrl/login','logerr');
						}
	}


  function cust_wishlist()

  {

    $sess=$this->session->userdata('designid');
    //$da=array('userid'=>$sess);
    if($sess!="")
      {
        $data['custname']=$this->designermodel->cust_iden($sess);
        $ids=array('wish.userid'=>$sess);
        $data['wishes']=$this->designermodel->cust_getwishes($ids);
				$data['wish']=$this->designermodel->cust_getrentwishes($ids);
        $this->load->view('customer/cust_temp.php',$data);
        $this->load->view('customer/cust_wish.php');

      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }

  }

  function cust_orders()

  {
    $sess=$this->session->userdata('designid');
  //$da=array('userid'=>$sess);
    if($sess!="")
      {
        $data['custname']=$this->designermodel->cust_iden($sess);
        $ids=array('order_tbl.user_id'=>$sess);
        $data['orders']=$this->designermodel->cust_getorders($ids);

        $this->load->view('customer/cust_temp.php',$data);
        $this->load->view('customer/cust_order.php');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }
  }

  function cust_purchase($ids)

  {
    $sess=$this->session->userdata('designid');
//$da=array('userid'=>$sess);
    if($sess!="")
    {
      $cnumber=$this->input->post('cnumber');
      $cvc=$this->input->post('cvc');
      $exp=$this->input->post('exp');
      $email=$this->input->post('email');

      $val=array('wish_id'=>$ids);
      $st=array('status'=>'1');
      $this->designermodel->cust_setwish($val,$st);
      $this->session->set_flashdata('or','Successfully placed your order');
      redirect('Designerctrl/cust_wishlist','or');
    } else {
      $this->session->set_flashdata('logerr','Please Login  again');
      redirect('Designerctrl/login','logerr');
    }

  }

  function cust_delwish($ids)

 {
    $sess=$this->session->userdata('designid');
  //$da=array('userid'=>$sess);
    if($sess!="")
      {
        $val=array('wish_id'=>$ids);
      //$st=array('status'=>'1');
        $this->designermodel->cust_delwish($val);
        redirect('Designerctrl/cust_wishlist');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }
  }

	function post_delete($ids)

 {
    $sess=$this->session->userdata('designid');
  //$da=array('userid'=>$sess);
    if($sess!="")
      {
        $val=array('post_id'=>$ids);
      //$st=array('status'=>'1');
        $this->designermodel->post_delete($val);
        redirect('Designerctrl/viewcustpage');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }
  }
function sale_delete($id)

 {
    $sess=$this->session->userdata('designid');
  //$da=array('userid'=>$sess);
    if($sess!="")
      {
        $val=array('item_id'=>$id);
      //$st=array('status'=>'1');
        $this->designermodel->sale_delete($val);
        redirect('Designerctrl/de_designs');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }
  }
function rent_delete($id)

 {
    $sess=$this->session->userdata('designid');
  //$da=array('userid'=>$sess);
    if($sess!="")
      {
        $val=array('rent_id'=>$id);
      //$st=array('status'=>'1');
        $this->designermodel->rent_delete($val);
        redirect('Designerctrl/de_rent');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }
  }

	function cust_dereject($idd)

 {
		$sess=$this->session->userdata('designid');
	//$da=array('userid'=>$sess);
		if($sess!="")
			{
				$val=array('re_id'=>$idd);
			//$st=array('status'=>'1');
				$this->designermodel->post_reject($val);
				redirect('Designerctrl/viewcustpage');
			} else {
				$this->session->set_flashdata('logerr','Please Login  again');
				redirect('Designerctrl/login','logerr');
			}
	}

	function despost_delete($ids)

 {
    $sess=$this->session->userdata('designid');
  //$da=array('userid'=>$sess);
    if($sess!="")
      {
        $val=array('post_id'=>$ids);
      //$st=array('status'=>'1');
        $this->designermodel->post_delete($val);
        redirect('Designerctrl/viewdesignpage');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }
  }

  function cust_profile()

  {
    $sess=$this->session->userdata('designid');
  //$da=array('userid'=>$sess);
    if($sess!="")
      {
        $data['custname']=$this->designermodel->cust_iden($sess);
        $ids=array('customer.login_id'=>$sess);
        $data['profile']=$this->designermodel->cust_getprofile($ids);

        $this->load->view('customer/cust_temp.php',$data);
        $this->load->view('customer/cust_profile.php');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }

  }

  function cust_logout()

  {
    if($this->session->userdata('designid'))
    {
      $this->session->unset_userdata('designid');
      $this->session->unset_userdata('role');
      redirect('Designerctrl/index');
    }

    //$da=array('userid'=>$sess);

  }

  function cust_profileedit()

  {
    $sess=$this->session->userdata('designid');
  //$da=array('userid'=>$sess);
    if($sess!="")
      {
        $data['custname']=$this->designermodel->cust_iden($sess);
        $ids=array('customer.login_id'=>$sess);
        $data['profile']=$this->designermodel->cust_getprofile($ids);

        $this->load->view('customer/cust_temp.php',$data);
        $this->load->view('customer/cust_edit.php');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }

  }

  function cust_updateprofile()

  {
    $sess=$this->session->userdata('designid');
  //$da=array('userid'=>$sess);
    if($sess!="")
      {
        $name=$this->input->post('name');
        $gender=$this->input->post('gender');
        $dob=$this->input->post('dob');
        $addr=$this->input->post('addr');
        $city=$this->input->post('city');
        $state=$this->input->post('state');
        $pincode=$this->input->post('pincode');
        $phone=$this->input->post('phone');
        $email=$this->input->post('email');
        $pass=$this->input->post('pass');
     // $name=$this->input->post('name');
        $arr=array('login_id'=>$sess);
        $custup=array('cname'=>$name,'gender'=>$gender,'dob'=>$dob,'addr'=>$addr,'city'=>$city,'state'=>$state,'pincode'=>$pincode,'phone'=>$phone);
        if($this->designermodel->cust_updatecustpro($custup,$arr))
          {
            $log=array('email'=>$email,'pass'=>$pass);

            if($this->designermodel->cust_updatecustlog($log,$arr))
              {
                $this->session->set_flashdata('proerr',' Successfully updated Profile Details');
                redirect('Designerctrl/cust_profile','proerr');
              } else{
                $this->session->set_flashdata('proerr','Failed to Updates');
                redirect('Designerctrl/cust_profile','proerr');
             }
          } else{
                $this->session->set_flashdata('proerr','Failed to  Update');
                redirect('Designerctrl/cust_profile','proerr');
          }

       } else {
          $this->session->set_flashdata('logerr','Please Login  again');
          redirect('Designerctrl/login','logerr');
      }


  }

  function cust_profiledelete()

  {
    $sess=$this->session->userdata('designid');
    if($sess!="")
      {
      //$this->load->view('cust_del.php');
        $this->designermodel->cust_delaccount();
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }

  }



  function viewdesignpage()

  {

    $sess=$this->session->userdata('designid');

    if($sess!="")
      {
				$id=array('post.login_id'=>$sess);
        $data['file']=$this->designermodel->de_getpost($id);
        $data['designname']=$this->designermodel->de_getdename($sess);
        $this->load->view('designer/design_dtemp.php',$data);
        $this->load->view('designer/design_index.php');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }
  }

  function de_designs()

  {
    $sess=$this->session->userdata('designid');
    if($sess!="")
      {
        $data['designname']=$this->designermodel->de_getdename($sess);
        $log=array('login_id'=>$sess);
        $data['dress']=$this->designermodel->de_getdress($log);
        $this->load->view('designer/design_dtemp.php',$data);
        $this->load->view('designer/design_designs.php');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }

  }

	function de_rent()

  {
    $sess=$this->session->userdata('designid');
		if($sess!="")
			{
				$data['designname']=$this->designermodel->de_getdename($sess);
				$ids=array('login_id'=>$sess);
        $data['dress']=$this->designermodel->de_getrentdress($ids);
				$data['dtype']=$this->designermodel->cust_dtype();


				$this->load->view('designer/design_dtemp.php',$data);
				$this->load->view('designer/design_rent.php');
			} else {
				$this->session->set_flashdata('logerr','Please Login  again');
				redirect('Designerctrl/login','logerr');
			}

  }

	function de_addrent()

  {
    $sess=$this->session->userdata('designid');
		if($sess!="")
			{
				$data['designname']=$this->designermodel->de_getdename($sess);
				$ids=array('design.login_id'=>$sess);
				$data['dtype']=$this->designermodel->cust_dtype();


				$this->load->view('designer/design_dtemp.php',$data);
				$this->load->view('designer/design_addrent.php');
			} else {
				$this->session->set_flashdata('logerr','Please Login  again');
				redirect('Designerctrl/login','logerr');
			}

  }

  function de_designer()
  {
    $data=$this->designermodel->de_getdesi();
    ?>

        <label for="sel1"></label>
        <select class="form-control" id="des" name="des">
    <?php
      foreach ($data as $value) {

        ?>
        <option value="<?php echo $value->login_id;?>"><?php echo $value->cname;?></option>
    <?php
        } ?>

        </select>
  <?php
  }

	function de_more($id)

	{
		$sess=$this->session->userdata('designid');
		if($sess!="")
			{
				$data['designname']=$this->designermodel->de_getdename($sess);
				$val=array('item_id'=>$id);
				$data['single']=$this->designermodel->de_getsingle($val);
				$this->load->view('designer/design_dtemp.php',$data);
				$this->load->view('designer/design_more.php');
			} else {
				$this->session->set_flashdata('logerr','Please Login  again');
				redirect('Designerctrl/login','logerr');
			}

	}

	function de_addtomore($id)
  {
		//var_dump($id);
		//print_r($id);
	 //exit();
		$sess=$this->session->userdata('designid');
		if($sess!="")
			{
				//$data['designname']=$this->designermodel->de_getdename($sess);
				//$val=array('item_id'=>$id);

				//$data['single']=$this->designermodel->de_getsingle($val);
				//$i_id=$this->designermodel->de_getsingle($val);
    $this->load->library('upload');
    $dataInfo = array();
    $files = $_FILES;
    $cpt = count($_FILES['userfile']['name']);
    for($i=0; $i<$cpt; $i++)
    {
        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
        $_FILES['userfile']['size']= $files['userfile']['size'][$i];

        $this->upload->initialize($this->set_upload_options());
        $this->upload->do_upload();
        $dataInfo[] = $this->upload->data();
    }

    $data = array(
        'dname' => $this->input->post('dname'),
				'pdesc' => $this->input->post('pdesc'),
        'dimage1' => $dataInfo[0]['file_name'],
        'dimage2' => $dataInfo[1]['file_name'],
        'dimage3' => $dataInfo[2]['file_name'],
				'status' => 1,
				'login_id' => $sess,
				'item_id' =>$id,
        'created_time' => date('Y-m-d H:i:s')
     );
		 //var_dump($data);
		 //print_r($data);
		 //exit();
     $result = $this->designermodel->de_more($data);
		 redirect('Designerctrl/de_designs');
/*
		 if($this->upload->do_upload('dimage1'))
		 if($this->upload->do_upload('dimage2'))
		 if($this->upload->do_upload('dimage3'))
			 {
				 $image=$this->upload->data();
				 $uploadimg=$image['file_name'];
				 $dat=array('dname'=>$dname,'pdesc'=>$pdesc,'dress'=>$uploadimg,'login_id'=>$sess,'status'=>'1');
				 $this->designermodel->de_addtomore($dat);
				 redirect('Designerctrl/de_designs');*/
			 }
			 else{
				$this->session->set_flashdata('aderr','Failed to add,Please try again');
				redirect('Designerctrl/adddesign','aderr');
			}

}
private function set_upload_options()
{
    //upload an image options
    $config = array();
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']      = '0';
    $config['overwrite']     = FALSE;

    return $config;
}



  function de_single($id)

  {
    $sess=$this->session->userdata('designid');
    if($sess!="")
      {
        $data['designname']=$this->designermodel->de_getdename($sess);
        $val=array('item_id'=>$id);
        $data['single']=$this->designermodel->de_single($val);
        $this->load->view('designer/design_dtemp.php',$data);
        $this->load->view('designer/design_single.php');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }

  }

	function de_rentdesign($id)

	{
		$sess=$this->session->userdata('designid');
		if($sess!="")
			{
				$data['designname']=$this->designermodel->de_getdename($sess);
				$val=array('rent_id'=>$id);
				$data['single']=$this->designermodel->de_rentsingle($val);
				$this->load->view('designer/design_dtemp.php',$data);
				$this->load->view('designer/design_rent_single.php');
			} else {
				$this->session->set_flashdata('logerr','Please Login  again');
				redirect('Designerctrl/login','logerr');
			}

	}

/*function de_edit($id)
  {
    $sess=$this->session->userdata('designid');
    if($sess!="")
      {
        $data['wish']=$this->designermodel->de_getwishid();
        $data['designname']=$this->designermodel->de_getdename($sess);
        $val=array('item_id'=>$id);
        $data['single']=$this->designermodel->de_getsingle($val);
        $this->load->view('design_dtemp.php',$data);
        $this->load->view('design_edit.php');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }
  }*/

  function de_enquiry()

  {
    $sess=$this->session->userdata('designid');

    if($sess!="")
      {
        $data['designname']=$this->designermodel->de_getdename($sess);
        $val=array('wish.did'=>$sess);
        $data['wish']=$this->designermodel->de_getwish($val);

        $this->load->view('designer/design_dtemp',$data);
        $this->load->view('designer/design_user');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }


  }

  function de_orders()

  {

    $sess=$this->session->userdata('designid');

    if($sess!="")
      {
        $data['designname']=$this->designermodel->de_getdename($sess);
        $val=array('order_tbl.did'=>$sess);
        $data['orders']=$this->designermodel->de_getorders($val);

        $this->load->view('designer/design_dtemp',$data);
        $this->load->view('designer/design_order');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }
  }

  function de_deliver($ids)

  {
    $sess=$this->session->userdata('designid');

    if($sess!="")
      {
        $val=array('wish_id'=>$ids);
      //$id=array('status'=>'0');
        $this->load->helper('date');
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Kolkata'));
        $nows= $now->format('d-m-Y H:i:s');
        $uid=$this->designermodel->getuserid($val);
        foreach ($uid as $key) {
          $urid=$key->userid;
          $iid=$key->itemid;
          $de=$key->did;
        }

        $vals=array('item_id'=>$iid,'user_id'=>$urid,'status'=>'0','did'=>$de,'date'=>$nows);
        $this->designermodel->de_order($vals);
        $this->designermodel->de_delwish($val);
        redirect('Designerctrl/de_enquiry');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
            }

  }

  function de_profile()

  {

    $sess=$this->session->userdata('designid');
  //$da=array('userid'=>$sess);
    if($sess!="")
      {
        $data['designname']=$this->designermodel->de_getdename($sess);
        $ids=array('design.login_id'=>$sess);
        $data['profile']=$this->designermodel->de_getprofile($ids);

        $this->load->view('designer/design_dtemp.php',$data);
        $this->load->view('designer/design_dprofile.php');

      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
            }
  }

  function de_editpro()

  {
    $sess=$this->session->userdata('designid');
  //$da=array('userid'=>$sess);
    if($sess!="")
      {

        $data['designname']=$this->designermodel->de_getdename($sess);
        $ids=array('design.login_id'=>$sess);
        $data['profile']=$this->designermodel->de_getprofile($ids);

        $this->load->view('designer/design_dtemp.php',$data);
        $this->load->view('designer/design_dedit.php');

      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
            }

  }

  function de_updatepro()

  {
    $sess=$this->session->userdata('designid');
  //$da=array('userid'=>$sess);
    if($sess!="")
      {
        $id=array('login_id'=>$sess);
        $name=$this->input->post('name');
        $addr=$this->input->post('addr');
        $city=$this->input->post('city');
        $state=$this->input->post('state');
        $pincode=$this->input->post('pincode');
        $exp=$this->input->post('exp');
        $phone=$this->input->post('phone');
        $email=$this->input->post('email');
        $pass=$this->input->post('pass');
        $config['upload_path']='./uploads';
        $config['allowed_types']='png|jpg';
        $this->load->library('upload');
        $this->upload->initialize($config);
        if($this->upload->do_upload('image'))
          {
            $image=$this->upload->data();
            $proimg=$image['file_name'];
          } else {
            $proimg=$this->input->post('img');
          }
        $val=array('dname'=>$name,'addr'=>$addr,'city'=>$city,'state'=>$state,'pincode'=>$pincode,'exp'=>$exp,'phone'=>$phone,'dimage'=>$proimg);
        if($this->designermodel->de_updatepro($val,$id))
          {
            $log=array('email'=>$email,'pass'=>$pass);
            if($this->designermodel->de_updateprolog($log,$id))
              {
                $this->session->set_flashdata('proerr',' Successfully updated Profile Details');
                redirect('Designerctrl/de_profile','proerr');
              } else{
                $this->session->set_flashdata('proerr','Failed to Updates');
                redirect('Designerctrl/de_profile','proerr');
              }
          } else{
            $this->session->set_flashdata('proerr','Failed to Updates');
            redirect('Designerctrl/de_profile','proerr');
          }

      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }
  }

  function de_contact()

  {
    $sess=$this->session->userdata('designid');
    if($sess!="")
      {
     // $id=array('post.login_id'=>$sess);
     // $data['post']=$this->designermodel->cust_getpost($id);
        $data['designname']=$this->designermodel->de_getdename($sess);
        $data['feed']=$this->designermodel->getmsg($sess);
        $data['custfeed']=$this->designermodel->getcufed($sess);


        $this->load->view('designer/design_dtemp.php',$data);
        $this->load->view('designer/design_contact.php');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }
  }



  function de_getdtad($id)
  {
        $sess=$this->session->userdata('designid');
    if($sess!="")
      {
        $data['designname']=$this->designermodel->de_getdename($sess);
        $data['adreply']=$this->designermodel->de_getredt($id);
        $this->load->view('designer/design_dtemp.php',$data);
        $this->load->view('designer/design_message.php');

      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }

  }

  function de_dtcust($idd)
  {
    $sess=$this->session->userdata('designid');
    if($sess!="")
    {
      $data['designname']=$this->designermodel->de_getdename($sess);
      $data['cumsg']=$this->designermodel->de_getcumsg($idd);

      $this->load->view('designer/design_dtemp.php',$data);
      $this->load->view('designer/design_message.php');

    } else {
      $this->session->set_flashdata('logerr','Please Login again');
      redirect('Designerctrl/login','logerr');
    }

  }
  function de_deleteadmsg($id)
  {
    $idd=array('reply_id'=>$id);
    $this->designermodel->de_deleteadmsg($idd);
   redirect('Designerctrl/de_contact');
  }
  function de_deletecumsg($id)
  {
    $idd=array('decnid'=>$id);
    $this->designermodel->de_deletecumsg($idd);
   redirect('Designerctrl/de_contact');
  }

  function de_send()

  {
    $sess=$this->session->userdata('designid');
    if($sess!="")
      {
        $this->load->helper('date');
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Kolkata'));
        $nows= $now->format('d-m-Y H:i:s');
        $subject=$this->input->post('subject');
        $message=$this->input->post('message');
        $val=$this->input->post('sel1');

        if($val=="2")
          {
            $vals=$this->input->post('des');
            $dats=array('from_id'=>$sess,'to_id'=>$vals,'role'=>'2','subject'=>$subject,'message'=>$message,'date'=>$nows);
            if($this->designermodel->de_sendmes($dats))
              {
                $this->session->set_flashdata('send','Message send Successfully');
              } else {
                $this->session->set_flashdata('send','Failed To send Message');
              }
          } else {
              $dats=array('from_id' =>$sess,'role'=>'2','subject'=>$subject,'message'=>$message,'date'=>$nows);
              if($this->designermodel->de_sendadmes($dats))
                {
                  $this->session->set_flashdata('send','Message send Successfully');
                } else {
                  $this->session->set_flashdata('send','Failed To send Message');
                }
          }

        redirect('Designerctrl/de_contact','send');
      } else {
         $this->session->set_flashdata('logerr','Please Login  again');
         redirect('Designerctrl/login','logerr');
      }
  }

	function despost_reply($ids,$id)

  {
    $sess=$this->session->userdata('designid');
    if($sess!="")
      {
        $this->load->helper('date');
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Kolkata'));
        $nows= $now->format('d-m-Y H:i:s');
				$vals=$id;
				$val=$ids;
        $subject=$this->input->post('subject');
        $message=$this->input->post('msg');
				$price=$this->input->post('price');
            $dats=array('from_id'=>$sess,'to_id'=>$vals,'subject'=>$subject,'message'=>$message,'re_date'=>$nows,'post_id'=>$ids,'price'=>$price);
            if($this->designermodel->de_sendreply($dats))
              {
                $this->session->set_flashdata('send','Message send Successfully');
              } else {
                $this->session->set_flashdata('send','Failed To send Message');
              }

        redirect('Designerctrl/viewdesignpage','send');
      } else {
         $this->session->set_flashdata('logerr','Please Login  again');
         redirect('Designerctrl/login','logerr');
      }
  }

	function cust_deapprove($id,$p_id)

  {
    $sess=$this->session->userdata('designid');
    if($sess!="")
      {
        $this->load->helper('date');
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Kolkata'));
        $nows= $now->format('d-m-Y H:i:s');
				$vals=$id;
				$val=$p_id;
        $mat=$this->input->post('mat');
        $colour=$this->input->post('colour');
				$occ=$this->input->post('occ');
				$size=$this->input->post('size');
            $dats=array('from_id'=>$sess,'to_id'=>$vals,'material'=>$mat,'colour'=>$colour,'ap_date'=>$nows,'post_id'=>$val,'occation'=>$occ,'size'=>$size);
            if($this->designermodel->de_sendapp($dats))
              {
                $this->session->set_flashdata('send','Message send Successfully');
              } else {
                $this->session->set_flashdata('send','Failed To send Message');
              }

        redirect('Designerctrl/viewcustpage','send');
      } else {
         $this->session->set_flashdata('logerr','Please Login  again');
         redirect('Designerctrl/login','logerr');
      }
  }

  function searchde()

  {

    $sess=$this->session->userdata('designid');
    $dsname=$this->input->post('srde');

    if($sess!="")
      {
        $da=array('userid'=>$sess);
    //  $ids=array('dress.item_id'=>$id);
        $status=$this->designermodel->cust_getwishid($da);
        if($data=$this->designermodel->cust_getalldresses($dsname))
          {

            foreach($data as $value) {
              $id=$value->item_id;
            ?>


              <div class="grid">

                   <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>"><img src="<?php echo base_url();?>/uploads/<?php echo $value->dress;?> " alt ="<?php echo $value->dress;?>" width='650' height='400'></a>
                  <h3><?php echo $value->dressname;?></h3>
              <!--<div class="time">
                  <span>00:10</span>
                  </div>-->
              <div class="grid-info">
                  <!--
             <div class="video-share">
                <ul>
                  <li><a href="#"><img src="images/likes.png" title="links" /></a></li>
                  <li><a href="#"><img src="images/link.png" title="Link" /></a></li>
                  <li><a href="#"><img src="images/views.png" title="Views" /></a></li>
                </ul>
              </div>-->
                <div class="video-watch">
                  <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>">More Info</a>
               </div>
               <div class="clear"> </div>
               <div class="lables">
                  <p id="pr">Price: <?php echo $value->price;?> INR</p><br>
                  <?php if(!empty($status)){
                            foreach ($status as $key) {
                                $statuses[]=$key->itemid;
                            }

                            if(in_array($id, $statuses)){
                  ?>

                                   <button type="button" class="btn btn-block btn-primary disabled">Added to Wishlist</button>

                  <?php
                                }else{
                  ?>



                                   <a href="<?php echo base_url('index.php/designerctrl/cust_addwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                <!--<p>Labels:<a href="categories.html">Lorem</a></p>-->
                                                          <?php
                                      }
                            } else {?>
                              <a href="<?php echo base_url('index.php/designerctrl/cust_addwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                        <?php }
                           ?>
                  </div>
               </div>
            </div>
                                    <?php

                    }







      } else {

       ?><p style="text-align: center;font-size: 3.5em; position: absolute;top:40%;left: 40%">No Result</p>
     <?php
      }


      }

  }

  function searchdree()

  {
 // $dname=$this->input->post('dname');


    $sess=$this->session->userdata('designid');
    $dname=$this->input->post('dtype');
    $dsname=$this->input->post('srde');
    $dprice=$this->input->post('dprice');

    $da=array('userid'=>$sess);

    if($dname!="" && $dsname!="" && $dprice=="low")
      {
         $data=$this->designermodel->cust_getall($dname,$dsname);
      } else if($dname!="" && $dsname!="" && $dprice=="high")
      {
         $data=$this->designermodel->cust_getallh($dname,$dsname);
      } else if ($dname!="" && $dsname!="" && $dprice==""){
         $data=$this->designermodel->cust_getalloutp($dname,$dsname);
      } else if($dname!="" && $dsname=="" && $dprice=="low")
      {
         $data=$this->designermodel->cust_getalloutds($dname);
      } else if($dname!=""&&$dsname==""&&$dprice=="high")
      {
         $data=$this->designermodel->cust_getalloutdsh($dname);
      }else if($dname!=""&&$dsname==""&&$dprice=="")
      {

         $data=$this->designermodel->cust_getdressbyn($dname);
      } else if($dname=="" && $dsname!="" && $dprice=="low")
      {
         $data=$this->designermodel->cust_getdressoutdn($dsname);
      }else if($dname=="" && $dsname!="" && $dprice=="high")
      {
         $data=$this->designermodel->cust_getdressoutdnh($dsname);
      }else if($dname=="" && $dsname=="" && $dprice=="low")
      {
         $data=$this->designermodel->cust_getdressbypl();

      } else if($dname=="" && $dsname=="" && $dprice=="high")
      {
         $data=$this->designermodel->cust_getdressbyph();
      } else if($dname=="" && $dsname!="" && $dprice=="")
      {
         $data=$this->designermodel->cust_getalldresses($dsname);
      } else{
         $status=$this->designermodel->cust_getwishid($da);
         $data=$this->designermodel->cust_getalldress();


         foreach($data as $value) {
              $id=$value->item_id;
 ?>


         <div class="grid">


              <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>"><img src="<?php echo base_url();?>/uploads/<?php echo $value->dress;?> " alt ="<?php echo $value->dress;?>" width='650' height='400'></a>
               <h3><?php echo $value->dressname;?></h3>
                                                <!--<div class="time">
              <span>00:10</span>
            </div>-->
               <div class="grid-info">
                                                    <!--
              <div class="video-share">
                <ul>
                  <li><a href="#"><img src="images/likes.png" title="links" /></a></li>
                  <li><a href="#"><img src="images/link.png" title="Link" /></a></li>
                  <li><a href="#"><img src="images/views.png" title="Views" /></a></li>
                </ul>
              </div>-->
                    <div class="video-watch">
                      <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>">More Info</a>
                    </div>
                    <div class="clear"> </div>
                <div class="lables">
                    <p id="pr">Price: <?php echo $value->price;?> INR</p><br>
                 <?php if(!empty($status))
                         {
                              foreach ($status as $key) {
                              $statuses[]=$key->itemid;
                             }

                             if(in_array($id, $statuses)){
                                                                                         ?>

                          <button type="button" class="btn btn-block btn-primary disabled">Added to Wishlist</button>

                                            <?php
                                 }else{
                                                ?>



                             <a href="<?php echo base_url('index.php/designerctrl/cust_addwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                <!--<p>Labels:<a href="categories.html">Lorem</a></p>-->
                                                          <?php
                                          }
                            } else {?>
                                   <a href="<?php echo base_url('index.php/designerctrl/cust_addwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                      <?php }
                        ?>
              </div>
            </div>
          </div>
                                    <?php

  }
    }
          //  $ids=array('dress.item_id'=>$id);


   if($data)
   {

                               $status=$this->designermodel->cust_getwishid($da);
                                               foreach($data as $value) {
                                                $id=$value->item_id;
                                                    ?>


          <div class="grid">


                                            <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>"><img src="<?php echo base_url();?>/uploads/<?php echo $value->dress;?> " alt ="<?php echo $value->dress;?>" width='650' height='400'></a>
            <h3><?php echo $value->dressname;?></h3>
                                                <!--<div class="time">
              <span>00:10</span>
            </div>-->
            <div class="grid-info">
                                                    <!--
              <div class="video-share">
                <ul>
                  <li><a href="#"><img src="images/likes.png" title="links" /></a></li>
                  <li><a href="#"><img src="images/link.png" title="Link" /></a></li>
                  <li><a href="#"><img src="images/views.png" title="Views" /></a></li>
                </ul>
              </div>-->
                                                    <div class="video-watch">
                <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>">More Info</a>
              </div>
              <div class="clear"> </div>
              <div class="lables">
                                                            <p id="pr">Price: <?php echo $value->price;?> INR</p>
                                                            <br>
                                                            <?php if(!empty($status)){ foreach ($status as $key) {
                                                            $statuses[]=$key->itemid;
                                                            }

                                                     if(in_array($id, $statuses)){
                                                                                         ?>

                                                            <button type="button" class="btn btn-block btn-primary disabled">Added to Wishlist</button>

                                            <?php
                                            }else{
                                                ?>



                                                            <a href="<?php echo base_url('index.php/designerctrl/cust_addwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                <!--<p>Labels:<a href="categories.html">Lorem</a></p>-->
                                                          <?php
                                            }} else {?>
                                              <a href="<?php echo base_url('index.php/designerctrl/cust_addwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                                           <?php }
                                            ?>
              </div>
            </div>
          </div>
                                    <?php

  }







   } else {

    ?><p style="text-align: center;font-size: 3.5em; position: absolute;top:40%;left: 40%">No Result</p>
<?php
   }


}

function searchrentdree()

{
// $dname=$this->input->post('dname');


	$sess=$this->session->userdata('designid');
	$dname=$this->input->post('dtype');
	$dsname=$this->input->post('srde');
	$dprice=$this->input->post('dprice');

	$da=array('userid'=>$sess);

	if($dname!="" && $dsname!="" && $dprice=="low")
		{
			 $data=$this->designermodel->cust_getrentall($dname,$dsname);
		} else if($dname!="" && $dsname!="" && $dprice=="high")
		{
			 $data=$this->designermodel->cust_getrentallh($dname,$dsname);
		} else if ($dname!="" && $dsname!="" && $dprice==""){
			 $data=$this->designermodel->cust_getrentalloutp($dname,$dsname);
		} else if($dname!="" && $dsname=="" && $dprice=="low")
		{
			 $data=$this->designermodel->cust_getrentalloutds($dname);
		} else if($dname!=""&&$dsname==""&&$dprice=="high")
		{
			 $data=$this->designermodel->cust_getrentalloutdsh($dname);
		}else if($dname!=""&&$dsname==""&&$dprice=="")
		{

			 $data=$this->designermodel->cust_getrentbyn($dname);
		} else if($dname=="" && $dsname!="" && $dprice=="low")
		{
			 $data=$this->designermodel->cust_getrentoutdn($dsname);
		}else if($dname=="" && $dsname!="" && $dprice=="high")
		{
			 $data=$this->designermodel->cust_getrentoutdnh($dsname);
		}else if($dname=="" && $dsname=="" && $dprice=="low")
		{
			 $data=$this->designermodel->cust_getrentbypl();

		} else if($dname=="" && $dsname=="" && $dprice=="high")
		{
			 $data=$this->designermodel->cust_getrentbyph();
		} else if($dname=="" && $dsname!="" && $dprice=="")
		{
			 $data=$this->designermodel->cust_getallrent($dsname);
		} else{
			 $status=$this->designermodel->cust_getwishid($da);
			 $data=$this->designermodel->cust_getallrentdress();


			 foreach($data as $value) {
						$id=$value->rent_id;
?>


			 <div class="grid">


						<a href="<?php echo base_url('index.php/designerctrl/cust_rent_item/'.$id);?>"><img src="<?php echo base_url();?>/uploads/<?php echo $value->dimage1;?> " alt ="<?php echo $value->dimage1;?>" width='650' height='400'></a>
						 <h3><?php echo $value->dressname;?></h3>
																							<!--<div class="time">
						<span>00:10</span>
					</div>-->
						 <div class="grid-info">
																									<!--
						<div class="video-share">
							<ul>
								<li><a href="#"><img src="images/likes.png" title="links" /></a></li>
								<li><a href="#"><img src="images/link.png" title="Link" /></a></li>
								<li><a href="#"><img src="images/views.png" title="Views" /></a></li>
							</ul>
						</div>-->
									<div class="video-watch">
										<a href="<?php echo base_url('index.php/designerctrl/cust_rent_item/'.$id);?>">More Info</a>
									</div>
									<div class="clear"> </div>
							<div class="lables">
									<p id="pr">Price: <?php echo $value->price;?> INR</p><br>
							 <?php if(!empty($status))
											 {
														foreach ($status as $key) {
														$statuses[]=$key->itemid;
													 }

													 if(in_array($id, $statuses)){
																																											 ?>

												<button type="button" class="btn btn-block btn-primary disabled">Added to Wishlist</button>

																					<?php
															 }else{
																							?>



													 <a href="<?php echo base_url('index.php/designerctrl/cust_rentwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
							<!--<p>Labels:<a href="categories.html">Lorem</a></p>-->
																												<?php
																				}
													} else {?>
																 <a href="<?php echo base_url('index.php/designerctrl/cust_rentwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
										<?php }
											?>
						</div>
					</div>
				</div>
																	<?php

}
	}
				//  $ids=array('dress.item_id'=>$id);


 if($data)
 {

														 $status=$this->designermodel->cust_getwishid($da);
																						 foreach($data as $value) {
																							$id=$value->rent_id;
																									?>


				<div class="grid">


																					<a href="<?php echo base_url('index.php/designerctrl/cust_rent_item/'.$id);?>"><img src="<?php echo base_url();?>/uploads/<?php echo $value->dimage1;?> " alt ="<?php echo $value->dimage1;?>" width='650' height='400'></a>
					<h3><?php echo $value->dressname;?></h3>
																							<!--<div class="time">
						<span>00:10</span>
					</div>-->
					<div class="grid-info">
																									<!--
						<div class="video-share">
							<ul>
								<li><a href="#"><img src="images/likes.png" title="links" /></a></li>
								<li><a href="#"><img src="images/link.png" title="Link" /></a></li>
								<li><a href="#"><img src="images/views.png" title="Views" /></a></li>
							</ul>
						</div>-->
																									<div class="video-watch">
							<a href="<?php echo base_url('index.php/designerctrl/cust_rent_item/'.$id);?>">More Info</a>
						</div>
						<div class="clear"> </div>
						<div class="lables">
																													<p id="pr">Price: <?php echo $value->price;?> INR</p>
																													<br>
																													<?php if(!empty($status)){ foreach ($status as $key) {
																													$statuses[]=$key->itemid;
																													}

																									 if(in_array($id, $statuses)){
																																											 ?>

																													<button type="button" class="btn btn-block btn-primary disabled">Added to Wishlist</button>

																					<?php
																					}else{
																							?>



																													<a href="<?php echo base_url('index.php/designerctrl/cust_rentwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
							<!--<p>Labels:<a href="categories.html">Lorem</a></p>-->
																												<?php
																					}} else {?>
																						<a href="<?php echo base_url('index.php/designerctrl/cust_rentwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
																				 <?php }
																					?>
						</div>
					</div>
				</div>
																	<?php

}







 } else {

	?><p style="text-align: center;font-size: 3.5em; position: absolute;top:40%;left: 40%">No Result</p>
<?php
 }


}

function searchdre()
{
 // $dname=$this->input->post('dname');


  $sess=$this->session->userdata('designid');
       $dname=$this->input->post('dtype');

          if($sess!="")
          {
            $da=array('userid'=>$sess);
            if($dname){



          //  $ids=array('dress.item_id'=>$id);
            $status=$this->designermodel->cust_getwishid($da);
   if($data=$this->designermodel->cust_getdressbyn($dname))
   {


                                               foreach($data as $value) {
                                                $id=$value->item_id;
                                                    ?>


          <div class="grid">


                                            <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>"><img src="<?php echo base_url();?>/uploads/<?php echo $value->dress;?> " alt ="<?php echo $value->dress;?>" width='650' height='400'></a>
            <h3><?php echo $value->dressname;?></h3>
                                                <!--<div class="time">
              <span>00:10</span>
            </div>-->
            <div class="grid-info">
                                                    <!--
              <div class="video-share">
                <ul>
                  <li><a href="#"><img src="images/likes.png" title="links" /></a></li>
                  <li><a href="#"><img src="images/link.png" title="Link" /></a></li>
                  <li><a href="#"><img src="images/views.png" title="Views" /></a></li>
                </ul>
              </div>-->
                                                    <div class="video-watch">
                <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>">More Info</a>
              </div>
              <div class="clear"> </div>
              <div class="lables">
                                                            <p id="pr">Price: <?php echo $value->price;?> INR</p>
                                                            <br>
                                                            <?php if(!empty($status)){ foreach ($status as $key) {
                                                            $statuses[]=$key->itemid;
                                                            }

                                                     if(in_array($id, $statuses)){
                                                                                         ?>

                                                            <button type="button" class="btn btn-block btn-primary disabled">Added to Wishlist</button>

                                            <?php
                                            }else{
                                                ?>



                                                            <a href="<?php echo base_url('index.php/designerctrl/cust_addwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                <!--<p>Labels:<a href="categories.html">Lorem</a></p>-->
                                                          <?php
                                            }} else {?>
                                              <a href="<?php echo base_url('index.php/designerctrl/cust_addwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                                           <?php }
                                            ?>
              </div>
            </div>
          </div>
                                    <?php

  }







   } else {

    ?><p style="text-align: center;font-size: 3.5em; position: absolute;top:40%;left: 40%">No Result</p>
<?php
   }

} else{
  //redirect('Designerctrl/cust_designs');
              $status=$this->designermodel->cust_getwishid($da);
  $data=$this->designermodel->cust_getalldress();


                                               foreach($data as $value) {
                                                $id=$value->item_id;
                                                    ?>


          <div class="grid">


                                            <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>"><img src="<?php echo base_url();?>/uploads/<?php echo $value->dress;?> " alt ="<?php echo $value->dress;?>" width='650' height='400'></a>
            <h3><?php echo $value->dressname;?></h3>
                                                <!--<div class="time">
              <span>00:10</span>
            </div>-->
            <div class="grid-info">
                                                    <!--
              <div class="video-share">
                <ul>
                  <li><a href="#"><img src="images/likes.png" title="links" /></a></li>
                  <li><a href="#"><img src="images/link.png" title="Link" /></a></li>
                  <li><a href="#"><img src="images/views.png" title="Views" /></a></li>
                </ul>
              </div>-->
                                                    <div class="video-watch">
                <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>">More Info</a>
              </div>
              <div class="clear"> </div>
              <div class="lables">
                                                            <p id="pr">Price: <?php echo $value->price;?> INR</p>
                                                            <br>
                                                            <?php if(!empty($status)){ foreach ($status as $key) {
                                                            $statuses[]=$key->itemid;
                                                            }

                                                     if(in_array($id, $statuses)){
                                                                                         ?>

                                                            <button type="button" class="btn btn-block btn-primary disabled">Added to Wishlist</button>

                                            <?php
                                            }else{
                                                ?>



                                                            <a href="<?php echo base_url('index.php/designerctrl/cust_addwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                <!--<p>Labels:<a href="categories.html">Lorem</a></p>-->
                                                          <?php
                                            }} else {?>
                                              <a href="<?php echo base_url('index.php/designerctrl/cust_addwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                                           <?php }
                                            ?>
              </div>
            </div>
          </div>
                                    <?php

  }
}
}
}

function searchprice()
{
  $sess=$this->session->userdata('designid');
       $price=$this->input->post('dprice');

          if($sess!="")
          {
            $da=array('userid'=>$sess);
            if($price){
$status=$this->designermodel->cust_getwishid($da);
       if($price=="low"){
        $data=$this->designermodel->cust_getdressbypl();
       } else if($price=="high"){
        $data=$this->designermodel->cust_getdressbyph();
       }

          //  $ids=array('dress.item_id'=>$id);

   if($data)
   {


                                               foreach($data as $value) {
                                                $id=$value->item_id;
                                                    ?>


          <div class="grid">


                                            <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>"><img src="<?php echo base_url();?>/uploads/<?php echo $value->dress;?> " alt ="<?php echo $value->dress;?>" width='650' height='400'></a>
            <h3><?php echo $value->dressname;?></h3>
                                                <!--<div class="time">
              <span>00:10</span>
            </div>-->
            <div class="grid-info">
                                                    <!--
              <div class="video-share">
                <ul>
                  <li><a href="#"><img src="images/likes.png" title="links" /></a></li>
                  <li><a href="#"><img src="images/link.png" title="Link" /></a></li>
                  <li><a href="#"><img src="images/views.png" title="Views" /></a></li>
                </ul>
              </div>-->
                                                    <div class="video-watch">
                <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>">More Info</a>
              </div>
              <div class="clear"> </div>
              <div class="lables">
                                                            <p id="pr">Price: <?php echo $value->price;?> INR</p>
                                                            <br>
                                                            <?php if(!empty($status)){ foreach ($status as $key) {
                                                            $statuses[]=$key->itemid;
                                                            }

                                                     if(in_array($id, $statuses)){
                                                                                         ?>

                                                            <button type="button" class="btn btn-block btn-primary disabled">Added to Wishlist</button>

                                            <?php
                                            }else{
                                                ?>



                                                            <a href="<?php echo base_url('index.php/designerctrl/cust_addwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                <!--<p>Labels:<a href="categories.html">Lorem</a></p>-->
                                                          <?php
                                            }} else {?>
                                              <a href="<?php echo base_url('index.php/designerctrl/cust_addwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                                           <?php }
                                            ?>
              </div>
            </div>
          </div>
                                    <?php

  }







   } else {

    ?><p style="text-align: center;font-size: 3.5em; position: absolute;top:40%;left: 40%">No Result</p>
<?php
   }

} else{
  //redirect('Designerctrl/cust_designs');
              $status=$this->designermodel->cust_getwishid($da);
  $data=$this->designermodel->cust_getalldress();


                                               foreach($data as $value) {
                                                $id=$value->item_id;
                                                    ?>


          <div class="grid">


                                            <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>"><img src="<?php echo base_url();?>/uploads/<?php echo $value->dress;?> " alt ="<?php echo $value->dress;?>" width='650' height='400'></a>
            <h3><?php echo $value->dressname;?></h3>
                                                <!--<div class="time">
              <span>00:10</span>
            </div>-->
            <div class="grid-info">
                                                    <!--
              <div class="video-share">
                <ul>
                  <li><a href="#"><img src="images/likes.png" title="links" /></a></li>
                  <li><a href="#"><img src="images/link.png" title="Link" /></a></li>
                  <li><a href="#"><img src="images/views.png" title="Views" /></a></li>
                </ul>
              </div>-->
                                                    <div class="video-watch">
                <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>">More Info</a>
              </div>
              <div class="clear"> </div>
              <div class="lables">
                                                            <p id="pr">Price: <?php echo $value->price;?> INR</p>
                                                            <br>
                                                            <?php if(!empty($status)){ foreach ($status as $key) {
                                                            $statuses[]=$key->itemid;
                                                            }

                                                     if(in_array($id, $statuses)){
                                                                                         ?>

                                                            <button type="button" class="btn btn-block btn-primary disabled">Added to Wishlist</button>

                                            <?php
                                            }else{
                                                ?>



                                                            <a href="<?php echo base_url('index.php/designerctrl/cust_addwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                <!--<p>Labels:<a href="categories.html">Lorem</a></p>-->
                                                          <?php
                                            }} else {?>
                                              <a href="<?php echo base_url('index.php/designerctrl/cust_addwish/'.$id);?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                                           <?php }
                                            ?>
              </div>
            </div>
          </div>
                                    <?php

  }
}
}
}


function de_searchde()
{
  $sess=$this->session->userdata('designid');
  $dname=$this->input->post('dname');

  if($sess!="")
    {
      //$log=array('login_id'=>$sess);
      if($dress=$this->designermodel->de_getdresses($sess,$dname))

{
                          foreach ($dress as $value) {
                            $id=$value->item_id;
                                                    ?>

          <div class="grid">


                                            <a href="<?php echo base_url('index.php/designerctrl/de_single/'.$id);?>"><img src="<?php echo base_url();?>/uploads/<?php echo $value->dress;?> " alt ="<?php echo $value->dress;?>" width='650' height='400'></a>
            <h3 id="h3"><?php echo $value->dressname;?></h3>
                                                <!--<div class="time">
              <span>00:10</span>
            </div>-->
            <div class="grid-info">
                                                    <!--
              <div class="video-share">
                <ul>
                  <li><a href="#"><img src="images/likes.png" title="links" /></a></li>
                  <li><a href="#"><img src="images/link.png" title="Link" /></a></li>
                  <li><a href="#"><img src="images/views.png" title="Views" /></a></li>
                </ul>
              </div>-->
                                                    <div class="video-watch">
                <a href="<?php echo base_url('index.php/designerctrl/de_single/'.$id);?>">More Info</a>
              </div>
              <div class="clear"> </div>
              <div class="lables">
                                                            <p id="pr">Price: <?php echo $value->price;?></p>
                <!--<p>Labels:<a href="categories.html">Lorem</a></p>-->
              </div>
            </div>
          </div>
                                    <?php

  }



 } else {

    ?><p style="text-align: center;font-size: 3.5em; position: absolute;top:40%;left: 40%">No Result</p><?php
    }
  }

  }

	function de_searchrent()
	{
	  $sess=$this->session->userdata('designid');
	  $dname=$this->input->post('dname');

	  if($sess!="")
	    {
	      //$log=array('login_id'=>$sess);
	      if($dress=$this->designermodel->de_getrentdress($sess,$dname))

	{
	                          foreach ($dress as $value) {
	                            $id=$value->rent_id;
	                                                    ?>

	          <div class="grid">


	                                            <a href="<?php echo base_url('index.php/designerctrl/de_rent_single/'.$id);?>"><img src="<?php echo base_url();?>/uploads/<?php echo $value->dimage1;?> " alt ="<?php echo $value->dimage1;?>" width='650' height='400'></a>
	            <h3 id="h3"><?php echo $value->dressname;?></h3>
	                                                <!--<div class="time">
	              <span>00:10</span>
	            </div>-->
	            <div class="grid-info">
	                                                    <!--
	              <div class="video-share">
	                <ul>
	                  <li><a href="#"><img src="images/likes.png" title="links" /></a></li>
	                  <li><a href="#"><img src="images/link.png" title="Link" /></a></li>
	                  <li><a href="#"><img src="images/views.png" title="Views" /></a></li>
	                </ul>
	              </div>-->
	                                                    <div class="video-watch">
	                <a href="<?php echo base_url('index.php/designerctrl/de_rent_single/'.$id);?>">More Info</a>
	              </div>
	              <div class="clear"> </div>
	              <div class="lables">
	                                                            <p id="pr">Price: <?php echo $value->price;?></p>
	                <!--<p>Labels:<a href="categories.html">Lorem</a></p>-->
	              </div>
	            </div>
	          </div>
	                                    <?php

	  }



	 } else {

	    ?><p style="text-align: center;font-size: 3.5em; position: absolute;top:40%;left: 40%">No Result</p><?php
	    }
	  }

	  }


  function adddesign()

  {
    $sess=$this->session->userdata('designid');
  //$da=array('userid'=>$sess);
    if($sess!="")
      {
        $data['designname']=$this->designermodel->de_getdename($sess);
        $ids=array('design.login_id'=>$sess);
        $data['dtype']=$this->designermodel->cust_dtype();


        $this->load->view('designer/design_dtemp.php',$data);
        $this->load->view('designer/design_adddesign.php');
      } else {
        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }
  }

  function de_addtodesign()

  {
    $sess=$this->session->userdata('designid');
  //$da=array('userid'=>$sess);
    if($sess!="")
      {
        $dname=$this->input->post('dname');
        $dtype=$this->input->post('dtype');
        $pdesc=$this->input->post('pdesc');
        $material=$this->input->post('material');
        $colour=$this->input->post('colour');
        $occ=$this->input->post('occ');
        $price=$this->input->post('price');
        $dimage=$this->input->post('dimage');
        $this->load->helper('date');
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Kolkata'));
        $nows= $now->format('d-m-Y H:i:s');
        $config['upload_path']='./uploads';
        $config['allowed_types']='png|jpg|jpeg';
        $this->load->library('upload');
        $this->upload->initialize($config);
        if($this->upload->do_upload('dimage'))
          {
            $image=$this->upload->data();
            $uploadimg=$image['file_name'];
            $dat=array('dressname'=>$dname,'dtype'=>$dtype,'pdesc'=>$pdesc,'material'=>$material,'colour'=>$colour,'occation'=>$occ,'price'=>$price,'dress'=>$uploadimg,'cdate'=>$nows,'login_id'=>$sess,'status'=>'1');
            $this->designermodel->de_addtodesign($dat);
            redirect('Designerctrl/de_designs');
          }  else{
            $this->session->set_flashdata('aderr','Failed to add,Please try again');
            redirect('Designerctrl/adddesign','aderr');
          }
      }else {

        $this->session->set_flashdata('logerr','Please Login  again');
        redirect('Designerctrl/login','logerr');
      }
  }


	function de_addtorent()

  {
		//var_dump($id);
		//print_r($id);
	 //exit();
		$sess=$this->session->userdata('designid');
		if($sess!="")
			{
				//$data['designname']=$this->designermodel->de_getdename($sess);
				//$val=array('item_id'=>$id);

				//$data['single']=$this->designermodel->de_getsingle($val);
				//$i_id=$this->designermodel->de_getsingle($val);
				$dname=$this->input->post('dname');
        $dtype=$this->input->post('dtype');
        $pdesc=$this->input->post('pdesc');
        $material=$this->input->post('material');
        $colour=$this->input->post('colour');
        $occ=$this->input->post('occ');
				$size=$this->input->post('size');
        $price=$this->input->post('price');
		$sdate=$this->input->post('start_date');
		$edate=$this->input->post('end_date');
        $this->load->helper('date');
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Kolkata'));
        $nows= $now->format('d-m-Y H:i:s');
    $this->load->library('upload');
    $dataInfo = array();
    $files = $_FILES;
    $cpt = count($_FILES['userfile']['name']);
    for($i=0; $i<$cpt; $i++)
    {
        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
        $_FILES['userfile']['size']= $files['userfile']['size'][$i];

        $this->upload->initialize($this->set_upload_options());
        $this->upload->do_upload();
        $dataInfo[] = $this->upload->data();
    }
		$data=array('dressname'=>$dname,'dtype'=>$dtype,'pdesc'=>$pdesc,'material'=>$material,'colour'=>$colour,'occation'=>$occ,'size'=>$size,'price'=>$price,'start_date'=>$sdate,'end_date'=>$edate,'cdate'=>$nows,'login_id'=>$sess,'status'=>'1','dimage1' => $dataInfo[0]['file_name'],
		'dimage2' => $dataInfo[1]['file_name'],'dimage3' => $dataInfo[2]['file_name']);
		 //var_dump($data);
		 //print_r($data);
		 //exit();
     $result = $this->designermodel->de_addrent($data);
		 redirect('Designerctrl/de_rent');
/*
		 if($this->upload->do_upload('dimage1'))
		 if($this->upload->do_upload('dimage2'))
		 if($this->upload->do_upload('dimage3'))
			 {
				 $image=$this->upload->data();
				 $uploadimg=$image['file_name'];
				 $dat=array('dname'=>$dname,'pdesc'=>$pdesc,'dress'=>$uploadimg,'login_id'=>$sess,'status'=>'1');
				 $this->designermodel->de_addtomore($dat);
				 redirect('Designerctrl/de_designs');*/
			 }
			 else{
				$this->session->set_flashdata('aderr','Failed to add,Please try again');
				redirect('Designerctrl/adddesign','aderr');
			}
		}

  function searchdgn()

  {
    $sess=$this->session->userdata('designid');
  //$da=array('userid'=>$sess);

    if($sess!="")
      {
        $ids=$this->input->post('idd');
        $dname=$this->input->post('sear');

      //$idd=array('login_id'=>$ids);
        if($dress=$this->designermodel->cust_getdresbnm($ids,$dname))
          {


            foreach ($dress as $value) {
              $id=$value->item_id;

                                                    ?>
                                                    <input type="hidden" name="ids" id="ids" value="<?php echo $value->login_id;?>" />

          <div class="grid">


                                            <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>"><img src="<?php echo base_url();?>/uploads/<?php echo $value->dress;?> " alt ="<?php echo $value->dress;?>" width='650' height='400'></a>
                                            <h3 id="h3"><?php echo $value->dressname;?></h3>
                                                <!--<div class="time">
              <span>00:10</span>
            </div>-->
            <data></data>iv class="grid-info">
                                                    <!--
              <div class="video-share">
                <ul>
                  <li><a href="#"><img src="images/likes.png" title="links" /></a></li>
                  <li><a href="#"><img src="images/link.png" title="Link" /></a></li>
                  <li><a href="#"><img src="images/views.png" title="Views" /></a></li>
                </ul>
              </div>-->
                                                    <div class="video-watch">
                 <a href="<?php echo base_url('index.php/designerctrl/cust_item/'.$id);?>">More Info</a>
              </div>
              <div class="clear"> </div>
              <div class="lables">
                                                            <p id="pr">Price: <?php echo $value->price;?> INR</p>
                <!--<p>Labels:<a href="categories.html">Lorem</a></p>-->
              </div>
            </div>
          </div>
                                    <?php

            }


          } else{
         ?><p style="text-align: center;font-size: 3.5em; position: absolute;top:40%;left: 40%">No Result</p><?php
           }

     }
  }

  function message()

  {
    $message=$this->input->post('message');
    $name=$this->input->post('name');
    $email=$this->input->post('email');
  }

  function newsletter()

  {
	  $name=$this->input->post('name');
	  $email=$this->input->post('email');
  }


/*function cust_message()
{

}
function de_message()
{

}*/
}
