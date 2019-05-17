<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Designerctrl extends CI_Controller {
	public function __construct()
	{

		parent::__construct();
    $this->load->model('designermodel');
    $this->load->helper(array('form', 'url'));
    $this->load->library('session');
    $this->load->helper('date');
    $this->load->library('image_lib');
	}

  function index()

  {

	  $sess=$this->session->userdata('userid');
      if($sess!="")
        {
          redirect(ADMIN_PATH.'Designerctrl/home');
        } else {
          $this->load->view('admin/admin_login_head.php');
		      $this->load->view('admin/admin_login.php');
		      $this->load->view('admin/admin_login_footer.php');
	      }

	}

  function login()

  {

		$username=$this->input->post('username');
		$password=$this->input->post('password');
    $logs=array('username'=>$username,'password'=>$password);
    $dats=$this->designermodel->ad_checklogin($logs);
		if($dats!="")
      {
	      foreach ($dats as $value)
        {
			    $id=$value->admin_id;
		    }
		    $this->session->set_userdata('userid',$id);
		    $sess=$this->session->userdata('userid');
		    if($sess!="")
        {
          redirect(ADMIN_PATH.'Designerctrl/home');
	      }
	    }	else{
        $this->session->set_flashdata('error','Incorrect username or password');
			  redirect(ADMIN_PATH,'error');
	  	}

	}

	function forgot()

  {
	  $this->load->view('admin/admin_login_head.php');
		$this->load->view('admin/admin_forget.php');
		$this->load->view('admin/admin_login_footer.php');
	}

	function resetpas()

  {

	  $length = 8;
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    $register_email=$this->input->post('email');
    $email=array('email'=>$register_email);
    if($this->designermodel->ad_checkmail($email))
      {
        $this->load->library("phpmailer/phpmailer");
        $mail = new Phpmailer();
        $mail->IsSMTP();
        $mail->Host = "ftp.byethost8.com";
        $mail->SMTPAuth = true;
        $mail->Username = "@yahoo.com";
        $mail->Password = "";
        $mail->From = "@yahoo.com";
        $mail->FromName ="DWorld";
        $mail->AddAddress($register_email, $register_email);
        $mail->WordWrap = 50;
        $mail->IsHTML(true);
        $mail->Subject = "set password";
        $mail->Body = $password;
      } else{
        $this->session->set_flashdata('error','Invalid E-mail Id');
        redirect(ADMIN_PATH.'Designerctrl/forgot','error');
      }
      if (!$mail->Send()) {
                   $msgMail = 'Message sending failed..';
               } else {
                   $msgMail = 'Message Successfully sent..';
               }
    $this->session->set_flashdata('error',$msgMail);
    redirect(ADMIN_PATH,'error');
	}

	function home()

  {
    $sess=$this->session->userdata('userid');
    if($sess!="")
      {
        $arr=array('admin_id'=>$sess);
        $data['file']=$this->designermodel->ad_getdata($arr);
        $data['designer']=$this->designermodel->ad_countde();
        $data['des']=$this->designermodel->ad_countdemsg();
        $data['cust']=$this->designermodel->ad_countcumsg();

		    $this->load->view('admin/admin_head.php',$data);
        $this->load->view('admin/admin_index.php');
	      $this->load->view('admin/admin_footer.php');
		  } else
		  {
		    $this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');
	    }

  }

  function profile()

  {
    $sess=$this->session->userdata('userid');
		if($sess!="")
		  {
        $arr=array('admin_id'=>$sess);
        $data['file']=$this->designermodel->ad_getdata($arr);
        $this->load->view('admin/admin_head.php',$data);
		    $this->load->view('admin/admin_profile.php');
		    $this->load->view('admin/admin_footer.php');
      } else{
      	$this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');
      }
  }

  function logout()

  {
	  if($this->session->userdata('userid'))
	    {
        $this->session->unset_userdata('userid');
        redirect(ADMIN_PATH);
	    }

	}



  function updateprofile()

  {

    $sess=$this->session->userdata('userid');
    if($sess!="")
      {
        $username=$this->input->post('username');
        $email=$this->input->post('email');
        $config['upload_path'] = "./images";
        $config['allowed_types'] = "png|jpg";
        $this->load->library('upload');
        $this->upload->initialize($config);
        if($this->upload->do_upload('propic'))
          {
            $images = $this->upload->data();
            $userphoto= $images['file_name'];
          }else {
            $userphoto=$this->input->post('img');
              }

        $datas=array('username' =>$username ,'email'=>$email,
                      'image'=>$userphoto );
        $logdata=array('admin_id'=>$sess);
        $this->designermodel->ad_updateprof($datas,$logdata);
        redirect(ADMIN_PATH.'Designerctrl/profile');
          } else
          {
              $this->session->set_flashdata('err',"Please Login");
              redirect(ADMIN_PATH,'err');
          }

       }
       function changepass()
       {

        $sess=$this->session->userdata('userid');
       if($sess!="")
          {
          $curpassword=$this->input->post('password1');
          $newpassword=$this->input->post('password2');

          $pass=array('password'=>$curpassword);
          if($this->designermodel->ad_checkpas($pass))
          {
               $pass1=array('password'=>$newpassword);
               $logdata=array('admin_id'=>$sess);
               $this->designermodel->ad_changepas($pass1,$logdata);
               $this->session->set_flashdata('chpas',"Password Changed");
               redirect(ADMIN_PATH.'Designerctrl/profile','chpas');
          } else {
               $this->session->set_flashdata('chpas',"Incorrect password");
               redirect(ADMIN_PATH.'Designerctrl/profile','chpas');
          }
          } else {
               $this->session->set_flashdata('err',"Please Login");
               redirect(ADMIN_PATH,'err');
          }

       }




	function viewdesigners()

  {
		$sess=$this->session->userdata('userid');
		if($sess!="")
		  {
        $arr=array('admin_id'=>$sess);
        $data['file']=$this->designermodel->ad_getdata($arr);
        $data['designer'] =$this->designermodel->ad_viewde();
		    $this->load->view('admin/admin_head.php',$data);
		    $this->load->view('admin/admin_designers.php');
		    $this->load->view('admin/admin_footer.php');
      } else {
        $this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');
      }
	}

	function designerdetails($id)

  {
		$sess=$this->session->userdata('userid');
		if($sess!="")
		  {
        $arr=array('admin_id'=>$sess);
        $data['file']=$this->designermodel->ad_getdata($arr);
        $val=array('design.did'=>$id)  ;
        $data['designer'] =$this->designermodel->ad_viewdes($val);
		    $this->load->view('admin/admin_head.php',$data);
		    $this->load->view('admin/admin_detailde.php');
		    $this->load->view('admin/admin_footer.php');
      } else {
        $this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');
      }
	}

	function enabledesigner($ids)

  {
		$sess=$this->session->userdata('userid');
		if($sess!="")
		  {
        $arr=array('admin_id'=>$sess);
        $data['file']=$this->designermodel->ad_getdata($arr);
        $val=array('login_id'=>$ids)  ;
        $sts=array('status'=>'1');
        $this->designermodel->ad_enablede($val,$sts);
      //$data['designer'] =$this->designermodel->ad_viewdes($val);
		    redirect(ADMIN_PATH.'/Designerctrl/viewdesigners');
      } else {
        $this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');
      }
	}
	function viewdresstype()

  {

		$sess=$this->session->userdata('userid');
		if($sess!="")
		  {
        $arr=array('admin_id'=>$sess);
        $data['file']=$this->designermodel->ad_getdata($arr);
      //$val=array('design.did'=>$id)  ;
        $data['dtype'] =$this->designermodel->ad_viewtype();
		    $this->load->view('admin/admin_head.php',$data);
		    $this->load->view('admin/admin_dtype.php');
		    $this->load->view('admin/admin_footer.php');
      } else {
        $this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');
      }
	}

  function editdtype($ids)

  {

		$sess=$this->session->userdata('userid');
		if($sess!="")
		  {
        $arr=array('admin_id'=>$sess);
        $data['file']=$this->designermodel->ad_getdata($arr);
        $id=array('dress_id'=>$ids);
        $data['dtype']=$this->designermodel->ad_editdtype($id);
      //$val=array('design.did'=>$id)  ;
        $this->load->view('admin/admin_head.php',$data);
		    $this->load->view('admin/admin_editdtype.php');
		    $this->load->view('admin/admin_footer.php');

		  } else {
        $this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');

	    }

  }

  function dtypeedit()

  {
	  $id=$this->input->post('hide');
	  $name=$this->input->post('dtype');
	  $val=array('dressname'=>$name);
	  $ids=array('dress_id'=>$id);
	  $this->designermodel->ad_updtype($val,$ids);
	  redirect(ADMIN_PATH.'Designerctrl/viewdresstype');

  }

  function addtype()

  {
   	$dname=$this->input->post('dtype');
	  $val=array('dressname'=>$dname);
	  $this->designermodel->ad_adddtype($val);
	  redirect(ADMIN_PATH.'Designerctrl/viewdresstype');
  }

  function viewdefeed()

  {
    $sess=$this->session->userdata('userid');
		if($sess!="")
		{
      $arr=array('admin_id'=>$sess);
      $data['file']=$this->designermodel->ad_getdata($arr);
      $data['feed']=$this->designermodel->ad_getdefeed();
      $this->load->view('admin/admin_head.php',$data);
		  $this->load->view('admin/admin_decontact.php');
		  $this->load->view('admin/admin_footer.php');
    } else {
      $this->session->set_flashdata('err',"Please Login");
      redirect(ADMIN_PATH,'err');
    }
  }

  function viewcustfeed()

  {
	  $sess=$this->session->userdata('userid');
	  if($sess!="")
		  {
        $arr=array('admin_id'=>$sess);
        $data['file']=$this->designermodel->ad_getdata($arr);
        $data['feed']=$this->designermodel->ad_getcustfeed();
        $this->load->view('admin/admin_head.php',$data);
		    $this->load->view('admin/admin_custcontact.php');
		    $this->load->view('admin/admin_footer.php');
      } else {
        $this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');
      }
  }

  function deletefeedcu($id)

  {
	  $sess=$this->session->userdata('userid');
		if($sess!="")
		  {
        $ids=array('contact_id'=>$id);
        $this->designermodel->ad_delfeed($ids);
        redirect(ADMIN_PATH.'Designerctrl/viewcustfeed');
      } else {
        $this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');
      }
  }

  function deletefeedde($id)

  {
	  $sess=$this->session->userdata('userid');
		if($sess!="")
		  {
        $ids=array('contact_id'=>$id);
        $this->designermodel->ad_delfeed($ids);
        redirect(ADMIN_PATH.'Designerctrl/viewdefeed');
      } else {
        $this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');
      }
  }

  function feeddetailscu($id)

  {
	  $sess=$this->session->userdata('userid');
		if($sess!="")
		  {
        $ids=array('admin_contact.contact_id'=>$id);
        $data['feed']=$this->designermodel->ad_getfeeddetcu($ids);
        $arr=array('admin_id'=>$sess);
        $arra=array('contact_id'=>$id);
        $val=array('status'=>'1');
        $this->designermodel->ad_setmsgst($arra,$val);
        $data['file']=$this->designermodel->ad_getdata($arr);
        $this->load->view('admin/admin_head.php',$data);
		    $this->load->view('admin/admin_custconta.php');
		    $this->load->view('admin/admin_footer.php');
    /// redirect(ADMIN_PATH.'Designerctrl/viewdefeed');
      } else {
        $this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');
      }
  }

  function feeddetailsde($id)

  {
 	  $sess=$this->session->userdata('userid');
		if($sess!="")
		  {
		    $arr=array('admin_id'=>$sess);
        $data['file']=$this->designermodel->ad_getdata($arr);
        $arra=array('contact_id'=>$id);
        $val=array('status'=>'1');
        $this->designermodel->ad_setmsgst($arra,$val);
        $ids=array('admin_contact.contact_id'=>$id);
        $data['feed']=$this->designermodel->ad_getfeeddetde($ids);
    /// redirect(ADMIN_PATH.'Designerctrl/viewdefeed');
        $this->load->view('admin/admin_head.php',$data);
		    $this->load->view('admin/admin_deconta.php');
		    $this->load->view('admin/admin_footer.php');
      } else {
        $this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');
      }
  }

  function replycu($ids)

  {
	  $sess=$this->session->userdata('userid');
		if($sess!="")
		  {
		    $arr=array('admin_id'=>$sess);
        $data['file']=$this->designermodel->ad_getdata($arr);
        $id=array('login_id'=>$ids);
        $data['cust']=$this->designermodel->ad_getcname($id);
        $this->load->view('admin/admin_head.php',$data);
		    $this->load->view('admin/admin_replycust.php');
		    $this->load->view('admin/admin_footer.php');
      } else {
        $this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');
      }
  }

  function replyde($ids)

  {
	  $sess=$this->session->userdata('userid');
		if($sess!="")
		  {
		    $arr=array('admin_id'=>$sess);
        $data['file']=$this->designermodel->ad_getdata($arr);
        $id=array('login_id'=>$ids);
        $data['design']=$this->designermodel->ad_getdname($id);
        $this->load->view('admin/admin_head.php',$data);
		    $this->load->view('admin/admin_replyde.php');
		    $this->load->view('admin/admin_footer.php');
      } else {
        $this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');
      }
  }

  function custreplyto()

  {
	  $sess=$this->session->userdata('userid');
		if($sess!="")
		  {
		    $this->load->helper('date');
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Kolkata'));
        $nows= $now->format('d-m-Y H:i:s');
        $id=$this->input->post('hide');
        $sub=$this->input->post('sub');
        $message=$this->input->post('msg');
        $vals=array('to_id'=>$id,'role'=>'1','subject'=>$sub,'message'=>$message,'date'=>$nows);
        if($this->designermodel->ad_replytocust($vals))
          {
            $this->session->set_flashdata('reply','Message Send Successfully');
            redirect(ADMIN_PATH.'Designerctrl/viewcustfeed','reply');
          } else {
            $this->session->set_flashdata('reply','Failed to send Message');
            redirect(ADMIN_PATH.'Designerctrl/viewcustfeed','reply');
          }
      } else {
        $this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');
      }
  }

  function dereplyto()

  {
	  $sess=$this->session->userdata('userid');
		if($sess!="")
		  {
		    $this->load->helper('date');
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Kolkata'));
        $nows= $now->format('d-m-Y H:i:s');
        $id=$this->input->post('hide');
        $sub=$this->input->post('sub');
        $message=$this->input->post('msg');
        $vals=array('to_id'=>$id,'role'=>'2','subject'=>$sub,'message'=>$message,'date'=>$nows);
        if($this->designermodel->ad_replytode($vals))
          {
            $this->session->set_flashdata('reply','Message Send Successfully');
            redirect(ADMIN_PATH.'Designerctrl/viewdefeed','reply');
          }else{
            $this->session->set_flashdata('reply','Failed to send Message');
            redirect(ADMIN_PATH.'Designerctrl/viewdefeed','reply');
          }
      } else {
        $this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');
      }
  }

  function searchdtype()
  {
    $sess=$this->session->userdata('userid');
    if($sess!="")
      {
         $dt=$this->input->post('t1');
        if($dtype=$this->designermodel->ad_getdtype($dt))
        {

?>
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

  </table></section>

  <?php   } else {

       ?> <section class="content container-fluid">
<p style="text-align: center;font-size: 3.5em; position: absolute;top:140%;left: 40%">No Result</p></section>
     <?php
      } } else {
        $this->session->set_flashdata('err',"Please Login");
        redirect(ADMIN_PATH,'err');
      }

  }
}
