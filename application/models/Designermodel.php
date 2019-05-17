<?php
class Designermodel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    function checkmail($email)
   {
    $this->db->select('login_id');
    $this->db->from('login');
    $this->db->where($email);
    $dat=$this->db->get();
    return $dat->result();
   }

function ad_checklogin($logs)

    {

       $this->db->select('admin_id');
       $this->db->from('admin');
       $this->db->where($logs);
       $dat=$this->db->get();
       if($dat->num_rows()==1)
        {
          return $dat->result();
        }

       return false;
    }

     function ad_checkpas($pass)
    {
      $this->db->select('admin_id');
        $this->db->from('admin');
        $this->db->where($pass);
        $dat=$this->db->get();
        if($dat->num_rows()==1)
        {
            return true;
        } else {
            return false;
        }
    }
    function ad_setmsgst($arra,$val)
    {
      $this->db->where($arra);
      $this->db->update('admin_contact',$val);
    }

    function ad_changepas($pass1,$logdata)
    {

      $this->db->where($logdata);
        $this->db->update('admin',$pass1);
    }

    function ad_updateprof($datas,$logdata)
    {
      $this->db->where($logdata);
      $this->db->update('admin',$datas);
    }
    function ad_getdata($arr)
    {
      $this->db->select('username,password,email,image');
      $this->db->from('admin');
      $this->db->where($arr);
      $dat=$this->db->get();
      return $dat->result();
    }
    function ad_viewde()
    {
    $this->db->select('design.did,design.dname,login.login_id,login.status');
    $this->db->from('design');
     $this->db->join('login','design.login_id=login.login_id');
     $this->db->order_by('design.did','desc');
    $dat=$this->db->get();
    return $dat->result();
}

  function ad_countde()
  {
    $dat=$this->db->query("select login_id from login where role='2' and status='0'");
    return $dat->num_rows();

  }

  function ad_countdemsg()
  {
    $dat=$this->db->query("select contact_id from admin_contact where role='2' and status='0'");
    return $dat->num_rows();
  }

  function ad_countcumsg()
  {
    $dat=$this->db->query("select contact_id from admin_contact where role='1' and status='0'");
    return $dat->num_rows();
  }
    function ad_viewdes($val)
    {
      $this->db->select('design.did,design.dname,design.addr,design.city,design.state,design.pincode,design.exp,design.phone,design.dimage,design.desc,design.link,design.login_id,login.email,login.status');
      $this->db->from('design');
      $this->db->join('login','design.login_id=login.login_id');
      $this->db->where($val);
      $dat=$this->db->get();
      return $dat->result();
    }
    function ad_enablede($val,$sts)
    {
      $this->db->where($val);
      $this->db->update('login',$sts);
    }
    function ad_viewtype()
    {
      $this->db->select('dressname,dress_id');
      $this->db->from('dresstype_tbl');
      $dat=$this->db->get();
      return $dat->result();
    }

    function ad_editdtype($id)
    {

      $this->db->select('dressname,dress_id');
      $this->db->from('dresstype_tbl');
    $this->db->where($id);
    $dat=$this->db->get();
      return $dat->result();
      $this->db->where($id);
    }

    function ad_updtype($val,$ids)
    {
      $this->db->where($ids);
      $this->db->update('dresstype_tbl',$val);
    }
    function ad_adddtype($val)
    {
      $this->db->insert('dresstype_tbl',$val);

    }

    function ad_getcustfeed()
   {
    $this->db->select('admin_contact.contact_id,admin_contact.status,admin_contact.subject,admin_contact.date,customer.cname,admin_contact.from_id');
    $this->db->from('admin_contact');
    $this->db->join('customer','admin_contact.from_id=customer.login_id');
    $this->db->where("admin_contact.role='1'");
    $this->db->order_by('admin_contact.contact_id','desc');
    $dat=$this->db->get();
    return $dat->result();
    }
      function ad_getdefeed()
   {
    $this->db->select('admin_contact.contact_id,admin_contact.status,admin_contact.subject,admin_contact.date,design.dname,admin_contact.from_id');
    $this->db->from('admin_contact');
    $this->db->join('design','admin_contact.from_id=design.login_id');
    $this->db->where("admin_contact.role='2'");
    $this->db->order_by('admin_contact.contact_id','desc');
    $dat=$this->db->get();
    return $dat->result();
    }

    function ad_delfeed($ids)
    {
      $this->db->where($ids);
      $this->db->delete('admin_contact');
    }


    function ad_getfeeddetcu($ids)
    {
      $this->db->select('admin_contact.contact_id,admin_contact.subject,admin_contact.message,customer.cname,admin_contact.date,admin_contact.from_id');
      $this->db->from('admin_contact');
      $this->db->join('customer','admin_contact.from_id=customer.login_id');
      $this->db->where($ids);
      $dat=$this->db->get();
      return $dat->result();
    }
    function ad_getfeeddetde($ids)
    {
      $this->db->select('admin_contact.contact_id,admin_contact.subject,admin_contact.message,design.dname,admin_contact.date,admin_contact.from_id');
      $this->db->from('admin_contact');
      $this->db->join('design','admin_contact.from_id=design.login_id');
      $this->db->where($ids);
      $dat=$this->db->get();
      return $dat->result();
    }

    function ad_getcname($id)
    {
      $this->db->select('login_id,cname');
      $this->db->from('customer');
      $this->db->where($id);
      $dat=$this->db->get();
      return $dat->result();

    }

    function ad_getdname($id)
    {
      $this->db->select('login_id,dname');
      $this->db->from('design');
      $this->db->where($id);
      $dat=$this->db->get();
      return $dat->result();

    }

    function ad_replytocust($vals)
    {
      $this->db->insert('admin_reply',$vals);
      $da=$this->db->insert_id();
      if($da){
        return true;
      }
    }

    function ad_replytode($vals)
    {
      $this->db->insert('admin_reply',$vals);
      $da=$this->db->insert_id();
      if($da){
        return true;
      }
    }

    function ad_getdtype($dt)
    {
      $dat=$this->db->query("select * from dresstype_tbl where dressname like '%$dt%'");
      return $dat->result();
    }

    function emailcheck($mail)
    {
    	$this->db->select('login_id');
    	$this->db->from('login');
    	$this->db->where($mail);
    	$dat=$this->db->get();
    	if($dat->num_rows()>0)
    	{
    		return $dat->result();

    	} else {
    		return false;
    	}
    }

    function numbercheck($phone)
    {
    	$this->db->select('cust_id');
    	$this->db->from('customer');
    	$this->db->where($phone);
    	$dat=$this->db->get();
    	if($dat->num_rows()>0)
    	{
    		return $dat->result();

    	} else {
    		return false;
    	}
    }
        function numberchecks($phone)
    {
    	$this->db->select('did');
    	$this->db->from('design');
    	$this->db->where($phone);
    	$dat=$this->db->get();
    	if($dat->num_rows()>0)
    	{
    		return $dat->result();

    	} else {
    		return false;
    	}
    }
    function registers($arry)
    {
      $this->db->insert('login',$arry);
        $data=$this->db->insert_id();
    return $data;

    }

    function signup($arrys)
    {
    	$this->db->insert('customer',$arrys);
    }

     function signups($arrys)
    {
    	$this->db->insert('design',$arrys);
    }

    function checklogin($log)
   {
    $this->db->select('login_id,role,status');
    $this->db->from('login');
    $this->db->where($log);
    $dat=$this->db->get();
    if($dat->num_rows()=='1'){
      return $dat->result();
    } else {
      return false;
    }
   }

   function ad_checkmail($email)
   {
    $this->db->select('admin_id');
    $this->db->from('admin');
    $this->db->where($email);
    $dat=$this->db->get();
    return $dat->result();

   }

   function cust_iden($sess)
   {
    $dat=$this->db->query("select cname from customer where login_id='$sess'");
    return $dat->result();
   }

   function de_getdename($sess)
   {
    $dat=$this->db->query("select dname from design where login_id='$sess'");
    return $dat->result();
   }

   function cust_getpost($id)
   {
   	$this->db->select('post.post_id,post.post,post.pimage,post.likes,customer.cname,post.postdate');
   	$this->db->from('post');
   	$this->db->join('customer','post.login_id=customer.login_id');
   	$this->db->where($id);
    $this->db->order_by('post.post_id','desc');
    $this->db->limit(10);
   	$dat=$this->db->get();
   	return $dat->result();
   }

   function cust_insertpost($add)
   {
    $this->db->insert('post',$add);
    $data=$this->db->insert_id();
    return $data;

   }

   function cust_getdesignes()
   {
    $this->db->select('did,dname,addr,city,state,pincode,exp,phone,dimage,desc,link,login_id');
    $this->db->from('design');
    $dat=$this->db->get();
    return $dat->result();
   }
   function cust_getdesi()
   {
    $this->db->select('login_id,dname');
    $this->db->from('design');
    $dat=$this->db->get();
    return $dat->result();
   }

   function de_getdesi()
   {
    $this->db->select('login_id,cname');
    $this->db->from('customer');
    $dat=$this->db->get();
    return $dat->result();
   }

   function cust_getdress($id)
   {
    $this->db->select('item_id,dressname,dtype,pdesc,material,colour,occation,price,dress,cdate,login_id,status');
    $this->db->from('dress');
    $this->db->where($id);
    $dat=$this->db->get();
    return $dat->result();
   }

   function cust_getitem($ids)
   {
    $this->db->select('dress.item_id,dress.dressname,dress.dtype,dress.pdesc,dress.material,dress.colour,dress.occation,dress.price,dress.dress,dress.cdate,dress.login_id,dress.status,design.dname');
    $this->db->from('dress');
    $this->db->join('design','dress.login_id=design.login_id');
    $this->db->where($ids);
    //$this->db->join('design','dress.login_id=design.login_id');

    $dat=$this->db->get();
    return $dat->result();
   }

   function cust_sendmes($dats)
   {
    $this->db->insert('cust_contact',$dats);
    $dat=$this->db->insert_id();
    return $dat;
   }
   function cust_sendadmes($dats)
   {
    $this->db->insert('admin_contact',$dats);
    $dat=$this->db->insert_id();
    return $dat;
   }
   function de_sendmes($dats)
   {
    $this->db->insert('de_contact',$dats);
    $dat=$this->db->insert_id();
    return $dat;
   }
   function de_sendreply($dats)
   {
    $this->db->insert('de_reply',$dats);
    $dat=$this->db->insert_id();
    return $dat;
   }

   function de_sendapp($dats)
   {
    $this->db->insert('approval',$dats);
    $dat=$this->db->insert_id();
    return $dat;
   }
   function de_sendadmes($dats)
   {
    $this->db->insert('admin_contact',$dats);
    $dat=$this->db->insert_id();
    return $dat;
   }
   function getmsg($sess)
   {
    $dat=$this->db->query("select * from admin_reply where to_id='$sess'");
    return $dat->result();
   }
   function getreply($sess,$ids)
   {
    $dat=$this->db->query("select * from de_reply where to_id='$sess' and post_id='$ids'");
    return $dat->result();
   }
   function getreplys($sess)
   {
    $dat=$this->db->query("select * from de_reply where to_id='$sess'");
    return $dat->result();
   }

   function getcusreply($sess,$ids)
   {
    $dat=$this->db->query("select * from approval where to_id='$sess' and post_id='$ids'");
    return $dat->result();
   }

   function getdedeply($sess)
   {
    //$dat=$this->db->query("select * from cust_contact where to_id='$sess'");
    $this->db->select('*');
    $this->db->from('de_reply');
    $this->db->join('design','de_reply.from_id=design.login_id');
    $this->db->where('to_id',$sess);
  //  $this->db->where('post_id',$ids);
    $dat=$this->db->get();
    return $dat->result();
   }

   function getcufed($sess)
   {
    //$dat=$this->db->query("select * from cust_contact where to_id='$sess'");
    $this->db->select('cust_contact.decnid,cust_contact.from_id,cust_contact.subject,cust_contact.message,cust_contact.date,customer.cname');
    $this->db->from('cust_contact');
    $this->db->join('customer','cust_contact.from_id=customer.login_id');
    $this->db->where('to_id',$sess);
    $dat=$this->db->get();
    return $dat->result();
   }
   function getdefed($sess)
   {
    //$dat=$this->db->query("select * from de_contact where to_id='$sess'");
    $this->db->select('de_contact.custcnid,de_contact.from_id,de_contact.subject,de_contact.message,de_contact.date,design.dname');
    $this->db->from('de_contact');
    $this->db->join('design','de_contact.from_id=design.login_id');
    $this->db->where('to_id',$sess);
    $dat=$this->db->get();
    return $dat->result();
   }


   function cust_getalldress()
   {
      $this->db->select('item_id,dressname,dtype,pdesc,material,colour,occation,price,dress,cdate,status,login_id');
    $this->db->from('dress');
    $this->db->order_by('item_id','desc');
    $dat=$this->db->get();
    return $dat->result();

   }
   function cust_getallrentdress()
   {
      $this->db->select('*');
    $this->db->from('rent');
    $this->db->order_by('rent_id','desc');
    $dat=$this->db->get();
    return $dat->result();

   }

   function cust_dtype()
   {
    $this->db->select('dressname');
    $this->db->from('dresstype_tbl');
    $dat=$this->db->get();
    return $dat->result();
   }

   function cust_getwishid($da)
   {
    $this->db->select('itemid');
    $this->db->from('wish');
    $this->db->where($da);
    $dat=$this->db->get();
    return $dat->result();
   }
   function cust_getlogid($ids)
   {
    $this->db->select('login_id');
    $this->db->from('dress');
    $this->db->where($ids);
    $dat=$this->db->get();
    return $dat->result();
   }
   function cust_glogid($ids)
   {
    $this->db->select('login_id');
    $this->db->from('rent');
    $this->db->where($ids);
    $dat=$this->db->get();
    return $dat->result();
   }

   function cust_addtowish($data)
   {
    $this->db->insert('wish',$data);
   }

   function cust_getwishes($ids)
   {
    $this->db->select('wish.wish_id,wish.itemid,wish.userid,wish.status,wish.did,wish.wishdate,dress.dress,dress.dressname,dress.price');
    $this->db->from('wish');
    $this->db->join('dress','wish.itemid=dress.item_id');
    $this->db->where($ids);
    $dat=$this->db->get();
    return $dat->result();
   }

   function cust_getrentwishes($ids)
   {
    $this->db->select('wish.wish_id,wish.itemid,wish.userid,wish.status,wish.did,wish.wishdate,rent.dimage1,rent.dressname,rent.price');
    $this->db->from('wish');
    $this->db->join('rent','wish.itemid=rent.rent_id');
    $this->db->where($ids);
    $dat=$this->db->get();
    return $dat->result();
   }

   function cust_getorders($ids)
   {
    $this->db->select('order_tbl.order_id,order_tbl.date,order_tbl.item_id,order_tbl.user_id,order_tbl.status,order_tbl.did,dress.dress,dress.dressname,dress.price');
    $this->db->from('order_tbl');
    $this->db->join('dress','order_tbl.item_id=dress.item_id');
	 $this->db->order_by('order_tbl.order_id','desc');
    $this->db->where($ids);
    $dat=$this->db->get();
    return $dat->result();
   }

   function cust_setwish($val,$st)
   {
    $this->db->where($val);
    $this->db->update('wish',$st);
   }

   function cust_delwish($val)
   {
    $this->db->where($val);
    $this->db->delete('wish');
   }

   function post_delete($val)
   {
    $this->db->where($val);
    $this->db->delete('post');
   }

   function sale_delete($val)
   {
    $this->db->where($val);
    $this->db->delete('dress');
   }
   
   function rent_delete($val)
   {
    $this->db->where($val);
    $this->db->delete('rent');
   }


   function post_reject($val)
   {
    $this->db->where($val);
    $this->db->delete('de_reply');
   }

   function cust_getprofile($ids)
   {
    $this->db->select('customer.cust_id,customer.cname,customer.gender,customer.dob,customer.addr,customer.city,customer.state,customer.pincode,customer.phone,login.email,login.login_id,login.pass');
    $this->db->from('customer');
    $this->db->join('login','customer.login_id=login.login_id');
    $this->db->where($ids);
    $dat=$this->db->get();
    return $dat->result();
   }


   function cust_updatecustpro($custup,$arr)
   {
    $this->db->where($arr);
    $this->db->update('customer',$custup);

      return true;

   }
   function cust_updatecustlog($log,$arr)
   {
    $this->db->where($arr);
    $this->db->update('login',$log);

      return true;

   }
   function de_getpost()
   {
    $this->db->select('post.post_id,post.post,post.material,post.price,post.pimage,customer.cname,post.postdate,post.login_id');
    $this->db->from('post');
    $this->db->join('customer','customer.login_id=post.login_id');
    $this->db->order_by('post.post_id','desc');
    $this->db->limit(10);
    $dat=$this->db->get();
    return $dat->result();
   }

   function de_getdress($log)
   {
    $this->db->select('item_id,dressname,dtype,pdesc,material,colour,occation,price,dress,cdate');
    $this->db->from('dress');
    $this->db->where($log);
	$this->db->order_by('dress','desc');
    $dat=$this->db->get();
    return $dat->result();
   }
   function de_getrentdress($log)
   {
    $this->db->select('*');
    $this->db->from('rent');
    $this->db->where($log);
	$this->db->order_by('rent_id','desc');
    $dat=$this->db->get();
    return $dat->result();
   }

   function de_getdresses($sess,$dname)
   {
    $dat=$this->db->query("select * from dress where login_id='$sess' AND dressname like '%$dname%' ");
    return $dat->result();
   }

   function de_getsingle($val)
   {
    $this->db->select('*');
    $this->db->from('dress');
    $this->db->where($val);
    $dat=$this->db->get();
    return $dat->result();
   }
   function de_single($val)
   {
    $this->db->select('*');
    $this->db->from('dresses');
    $this->db->where($val);
    $dat=$this->db->get();
    return $dat->result();
   }
   function de_rentsingle($val)
   {
    $this->db->select('*');
    $this->db->from('rent');
    $this->db->where($val);
    $dat=$this->db->get();
    return $dat->result();
   }

   function de_getwish($val)
   {
    $this->db->select('wish.wish_id,wish.status,wish.wishdate,dress.dressname,customer.cname,customer.phone,login.email');
    $this->db->from('wish');

    $this->db->join('dress','wish.itemid=dress.item_id');
    $this->db->join('customer','wish.userid=customer.login_id');
    $this->db->join('login','wish.userid=login.login_id');
        $this->db->where($val);
        $this->db->where('wish.status>"0"');

    $dat=$this->db->get();
    return $dat->result();
   }

   function de_getorders($val)
   {
     $this->db->select('order_tbl.order_id,order_tbl.date,order_tbl.status,dress.dressname,customer.cname,customer.phone,login.email');
    $this->db->from('order_tbl');

    $this->db->join('dress','order_tbl.item_id=dress.item_id');
    $this->db->join('customer','order_tbl.user_id=customer.login_id');
    $this->db->join('login','order_tbl.user_id=login.login_id');
        $this->db->where($val);
        //$this->db->where('wish.status>"0"');

    $dat=$this->db->get();
    return $dat->result();
   }
   function de_setwish($val,$id)
   {
    $this->db->where($val);
    $this->db->update('wish',$id);
   }

   function de_delwish($val)
   {
    $this->db->where($val);
    $this->db->delete('wish');
   }

   function de_order($vals)
   {
    $this->db->insert('order_tbl',$vals);
   }
   function de_more($vals)
   {
    $this->db->insert('dresses',$vals);
   }

   function de_getprofile($ids)
   {
    $this->db->select('design.did,design.dname,design.addr,design.city,design.state,design.pincode,design.exp,,design.phone,design.dimage,design.desc,design.link,login.email,login.pass');
    $this->db->from('design');
    $this->db->join('login','design.login_id=login.login_id');
    $this->db->where($ids);
    $dat=$this->db->get();
    return $dat->result();
   }

   function de_updatepro($val,$id)
   {
    $this->db->where($id);
    $this->db->update('design',$val);
    return true;
   }

   function de_updateprolog($log,$id)
   {
    $this->db->where($id);
    $this->db->update('login',$log);
    return true;
   }
   function getuserid($val)
   {
    $this->db->select('userid,itemid,did');
    $this->db->from('wish');
    $this->db->where($val);
    $dat=$this->db->get();
    return $dat->result();
   }
   function cust_getalldresses($dsname)
   {
    $dat=$this->db->query("select * from dress where dressname like '%$dsname%'");
    return $dat->result();
   }
   function cust_getallrent($dsname)
   {
    $dat=$this->db->query("select * from rent where dressname like '%$dsname%'");
    return $dat->result();
   }
   function cust_getdressbyn($dname)
   {
    $dat=$this->db->query("select * from dress where dtype like '%$dname%'");
    return $dat->result();
   }
   function cust_getrentbyn($dname)
   {
    $dat=$this->db->query("select * from rent where dtype like '%$dname%'");
    return $dat->result();
   }
   function cust_getdressbypl()
   {
    $this->db->select('item_id,dressname,dtype,pdesc,material,colour,occation,price,dress,cdate');
    $this->db->from('dress');
    $this->db->order_by('price','asc');
    $dat=$this->db->get();
    return $dat->result();
   }
   function cust_getrentbypl()
   {
    $this->db->select('*');
    $this->db->from('rent');
    $this->db->order_by('price','asc');
    $dat=$this->db->get();
    return $dat->result();
   }
   function cust_getdressbyph()
   {
    $this->db->select('item_id,dressname,dtype,pdesc,material,colour,occation,price,dress,cdate');
    $this->db->from('dress');
    $this->db->order_by('price','desc');
    $dat=$this->db->get();
    return $dat->result();
   }
   function cust_getrentbyph()
   {
    $this->db->select('*');
    $this->db->from('rent');
    $this->db->order_by('price','desc');
    $dat=$this->db->get();
    return $dat->result();
   }
   function cust_getdresbnm($ids,$dname)
   {
    $dat=$this->db->query("select * from dress where login_id='$ids' and dressname like '%$dname%'");
    return $dat->result();
   }

   function de_addtodesign($dat)
   {
    $this->db->insert('dress',$dat);
   }
   function de_addrent($dat)
   {
    $this->db->insert('rent',$dat);
   }
   function de_getredt($id)
   {
    $dat=$this->db->query("select * from admin_reply where reply_id='$id'");
    return $dat->result();
   }

   function de_getcumsg($idd)
   {

    $dat=$this->db->query("select * from cust_contact INNER JOIN customer ON cust_contact.from_id=customer.login_id where cust_contact.decnid='$idd'");
    return $dat->result();
   }
   function de_deleteadmsg($idd)
   {
    $this->db->where($idd);
    $this->db->delete('admin_reply');
   }

   function de_deletecumsg($idd)
   {
    $this->db->where($idd);
    $this->db->delete('cust_contact');
   }
   function cust_deleteadmsg($idd)
   {
    $this->db->where($idd);
    $this->db->delete('admin_reply');

   }

   function cust_deletedemsg($idd)
   {
    $this->db->where($idd);
    $this->db->delete('de_contact');
   }

   function cust_getall($dname,$dsname)
   {
    $dat=$this->db->query("select * from dress where dressname like '%$dsname%' and dtype='$dname' order by price asc");
    return $dat->result();
   }
   function cust_getrentall($dname,$dsname)
   {
    $dat=$this->db->query("select * from rent where dressname like '%$dsname%' and dtype='$dname' order by price asc");
    return $dat->result();
   }
   function cust_getallh($dname,$dsname)
   {
    $dat=$this->db->query("select * from dress where dressname like '%$dsname%' and dtype='$dname' order by price desc");
    return $dat->result();
   }
   function cust_getrentallh($dname,$dsname)
   {
    $dat=$this->db->query("select * from rent where dressname like '%$dsname%' and dtype='$dname' order by price desc");
    return $dat->result();
   }
   function cust_getalloutp($dname,$dsname)
   {
    $dat=$this->db->query("select * from dress where dressname like '%$dsname%' and dtype='$dname'");
    return $dat->result();
   }
   function cust_getrentalloutp($dname,$dsname)
   {
    $dat=$this->db->query("select * from rent where dressname like '%$dsname%' and dtype='$dname'");
    return $dat->result();
   }
   function cust_getalloutds($dname)
   {
    $dat=$this->db->query("select * from dress where dtype='$dname' order by price asc");
    return $dat->result();
   }
   function cust_getrentalloutds($dname)
   {
    $dat=$this->db->query("select * from rent where dtype='$dname' order by price asc");
    return $dat->result();
   }
   function cust_getalloutdsh($dname)
   {
    $dat=$this->db->query("select * from dress where dtype='$dname' order by price desc");
    return $dat->result();
   }
   function cust_getrentalloutdsh($dname)
   {
    $dat=$this->db->query("select * from rent where dtype='$dname' order by price desc");
    return $dat->result();
   }
   function cust_getdressoutdn($dsname)
   {
    $dat=$this->db->query("select * from dress where dressname like'%dsname%' order by price asc");
    return $dat->result();
   }
   function cust_getrentoutdn($dsname)
   {
    $dat=$this->db->query("select * from rent where dressname like'%dsname%' order by price asc");
    return $dat->result();
   }
   function cust_getdressoutdnh($dsname)
   {
    $dat=$this->db->query("select * from dress where dressname like'%dsname%' order by price desc");
    return $dat->result();
   }
   function cust_getrentoutdnh($dsname)
   {
    $dat=$this->db->query("select * from rent where dressname like'%dsname%' order by price desc");
    return $dat->result();
   }
   function cust_dedtmsg($idd)
   {

    $dat=$this->db->query("select * from de_contact INNER JOIN design ON de_contact.from_id=design.login_id where de_contact.custcnid='$idd'");
    return $dat->result();
   }

   function cust_addtre($id)
   {
    $dat=$this->db->query("select * from admin_reply where reply_id='$id'");
    return $dat->result();
   }
}
