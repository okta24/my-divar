<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myform extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
    }
	
	public function index()
	{
        // $this->load->view('all', array('error' => ' ' ));
	/*	$this->load->helper('form');
		$this->load->library('form_validation');*/
		
		/*$myform_errors=array(
		'required'=>'%s نمیتواند خالی باشد',
		'valid_email'=>'%s باید شکل صحیح یک ایمیل باشد ',
		'matches'=>'%s باید با فیلد ایمیل یکسان باشد'
		);
		
		//rules
		$this->form_validation->set_rules('user_name','نام کاربری','required',$myform_errors);
		$this->form_validation->set_rules('email','ایمیل','required|valid_email',$myform_errors);
		$this->form_validation->set_rules('re_email','تکرار ایمیل','required|valid_email|matches[email]',$myform_errors);
		$this->form_validation->set_rules('password','رمز عبور','required',$myform_errors);
		
		if($this->form_validation->run()==true)
		{
				$username = $this->input->post('user_name',TRUE);
				$email = $this->input->post('email',TRUE);
				$password = $this->input->post('password',TRUE);
				
				
				$this->load->view('form/success');
		}else
		{
				$this->load->view('form/myform');	
		}*/
        
		
	}
    
    public function do_upload(){
        $imagename='default.jpg';
        $error='';
         $image1='pic';
        $config['upload_path']='assets/upload/';
        $config['allowed_types']='gif|jpg|png';
        $config['max_size'] = '300';
         $config['encrypt_name'] = TRUE;

        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload($image1))
        {
            $data = array('upload_data' => $this->upload->data());
            $imagename= $data['upload_data']['file_name'];   
           //  $data2["res"] =array("result" => $imagename , "code"=>"3");
            
            
        }
        else {
            $error=  $this->upload->display_errors();
            
            // $data2["res"] =array("result" => $error , "code"=>"2");
            
            
            $imagename='default.jpg';
        }
        
        
        $myform_errors=array(
		'required'=>'%s نمیتواند خالی باشد',
		'valid_email'=>'%s باید شکل صحیح یک ایمیل باشد ',
		'regex_match'=>'%s صحیح نمیباشد ',
            'xss_clean'=>'کاراکتر های غیر مجاز',
            'strip_tags'=>'کاراکتر هایhtml غیر مجاز'
		);
		
		//rules
		$this->form_validation->set_rules('title','عنوان','required|trim|xss_clean|strip_tags',$myform_errors);
		$this->form_validation->set_rules('email','ایمیل','valid_email|trim|xss_clean|strip_tags',$myform_errors);
		$this->form_validation->set_rules('phone','شماره تماس','required|regex_match[/^[0-9]{11}$/]|strip_tags|xss_clean',$myform_errors);
		$this->form_validation->set_rules('description','توضیحات','required|trim|xss_clean|strip_tags',$myform_errors);
        
        
       
        
 if($this->form_validation->run()==true)
		{
           
                $name = $this->input->post('title');
                $email = $this->input->post('email');
                $category_id = $this->input->post('category_id');
                $phone = $this->input->post('phone');
                $description = $this->input->post('description');
                $city_id=$this->input->post('city');    
               $this->load->model('Adv_model','',TRUE);
               $data["res"] = $this->Adv_model->my_add_adv($name,$description,$email,$phone,$city_id,$category_id,$imagename);   
      			
		}else
		{
				//validation fails
             $data["res"] =array("result"=>validation_errors(),"code"=>"2");
            
		}
         echo json_encode  ($data["res"]);
        
         
     }
    //=================================
     public function do_edit(){
        $imagename=$this->input->post('hiddenimg');
         $accept="0";
         $id=$this->input->post('hiddenValue2');
        $error='';
         $image1='pic';
        $config['upload_path']='assets/upload/';
        $config['allowed_types']='gif|jpg|png';
        $config['max_size'] = '300';
         $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload($image1))
        {
            $data = array('upload_data' => $this->upload->data());
            $imagename= $data['upload_data']['file_name'];   
        }
        else {
            $error=  $this->upload->display_errors();
         //  $imagename='default.jpg';
        }
        
        
        $myform_errors=array(
		'required'=>'%s نمیتواند خالی باشد',
		'valid_email'=>'%s باید شکل صحیح یک ایمیل باشد ',
		'regex_match'=>'%s صحیح نمیباشد ',
            'xss_clean'=>'کاراکتر های غیر مجاز',
            'strip_tags'=>'کاراکتر هایhtml غیر مجاز'
		);
		
		//rules
		$this->form_validation->set_rules('title2','عنوان','required|trim|xss_clean|strip_tags',$myform_errors);
		$this->form_validation->set_rules('email3','ایمیل','valid_email|trim|xss_clean|strip_tags',$myform_errors);
		$this->form_validation->set_rules('phone3','شماره تماس','required|regex_match[/^[0-9]{11}$/]|strip_tags|xss_clean',$myform_errors);
		$this->form_validation->set_rules('description2','توضیحات','required|trim|xss_clean|strip_tags',$myform_errors);
        
        
       
        
 if($this->form_validation->run()==true)
		{
           
                $name = $this->input->post('title2');
                $email = $this->input->post('email3');
                $category_id = $this->input->post('category_id2');
                $phone = $this->input->post('phone3');
                $description = $this->input->post('description2');
                $city_id=$this->input->post('city2');    
               $this->load->model('Adv_model','',TRUE);
               $data["res"] = $this->Adv_model->my_edit_adv($name,$description,$email,$phone,$city_id,$category_id,$imagename,$accept,$id);   
      			
		}else
		{
				//validation fails
             $data["res"] =array("result"=>validation_errors(),"code"=>"2");
            
		}
         echo json_encode  ($data["res"]);
        
         
     }
    //========================================================
     public function phone_login()                 
     {
         
		$myform_errors=array(
		'required'=>'%s نمیتواند خالی باشد',
		'regex_match'=>'%s صحیح نمیباشد ',
            'xss_clean'=>'کاراکتر های غیر مجاز',
            'strip_tags'=>'کاراکتر هایhtml غیر مجاز'
		);
         
		$this->form_validation->set_rules('phone','شماره تماس','required|regex_match[/^[0-9]{11}$/]|strip_tags|xss_clean',$myform_errors);
		
		
		if($this->form_validation->run()==true)
        {
              $phone = $this->input->post('phone');
            
            $this->load->model('Show_model','',TRUE);
            
                 $data = $this->Show_model->my_adv_by_phone($phone);
 $elementCount  = count( $data["result"]);
                        if( ($elementCount>0) &&($data["code"]=="1")){
                            
                            ///set session
                             $this->load->library('session'); 
                            $this->session->set_userdata('user_phone', $phone);
                            
                            //==============
            
             foreach($data["result"] as &$value)
              {  
                  $value->date = strtotime($value->date);
        
                  $value->date=$this->time_elapsed_string3($value->date);
              } 
                        }     
        }
         else
             
             $data =array("result"=>validation_errors(),"code"=>"2");
         
           echo json_encode  ($data);
     }
     //========================================================
     public function email_login()                 
     {
         
		$myform_errors=array(
		'required'=>'%s نمیتواند خالی باشد',
		'valid_email'=>'%s باید شکل صحیح یک ایمیل باشد ',
            'xss_clean'=>'کاراکتر های غیر مجاز',
            'strip_tags'=>'کاراکتر هایhtml غیر مجاز'
		);
         
		$this->form_validation->set_rules('email','ایمیل','required|valid_email|trim|xss_clean|strip_tags',$myform_errors);
		
		
		if($this->form_validation->run()==true)
       {
             $email = $this->input->post('email');
           // $email = "ghj@gf.hgj";
            
            $this->load->model('Show_model','',TRUE);
            
                 $data = $this->Show_model->my_adv_by_email($email);
           // ["res"] =array("result"=>"success","code"=>"1");
              $elementCount  = count( $data["result"]);
                        if( ($elementCount>0) &&($data["code"]=="1")){
                            
                             ///set session
                             $this->load->library('session'); 
                            $this->session->set_userdata('user_email', $email);
                            
                            //==============
            
             foreach($data["result"] as &$value)
              {  
                  $value->date = strtotime($value->date);
        
                  $value->date=$this->time_elapsed_string3($value->date);
              } 
                        }
        }
         else
             
             $data =array("result"=>validation_errors(),"code"=>"2");
         
           echo json_encode  ($data);
     }
    //========================================================
    public function new_adv()                 
	{
        
		
		$myform_errors=array(
		'required'=>'%s نمیتواند خالی باشد',
		'valid_email'=>'%s باید شکل صحیح یک ایمیل باشد ',
		'regex_match'=>'%s صحیح نمیباشد ',
            'xss_clean'=>'کاراکتر های غیر مجاز',
            'strip_tags'=>'کاراکتر هایhtml غیر مجاز'
		);
		
		//rules
		$this->form_validation->set_rules('title','عنوان','required|trim|xss_clean|strip_tags',$myform_errors);
		$this->form_validation->set_rules('email','ایمیل','required|valid_email|trim|xss_clean|strip_tags',$myform_errors);
		$this->form_validation->set_rules('phone','شماره تماس','required|regex_match[/^[0-9]{11}$/]|strip_tags|xss_clean',$myform_errors);
		$this->form_validation->set_rules('description','توضیحات','required|trim|xss_clean|strip_tags',$myform_errors);
		
		if($this->form_validation->run()==true)
		{
            $imagename='deftyghult2.jpg';
                $name = $this->input->post('title');
                $email = $this->input->post('email');
                $category_id = $this->input->post('category_id');
                $phone = $this->input->post('phone');
                $description = $this->input->post('description');
                $city_id=$this->input->post('city');    
          //  echo $phone,$city_id,$category_id;
               $this->load->model('Adv_model','',TRUE);
                $t["res"] = $this->Adv_model->my_add_adv($name,$description,$email,$phone,$city_id,$category_id,$imagename);
               // $data =array("result"=>$t);      
               echo json_encode($t["res"]);	

				
		}else
		{
				//validation fails
             $data["res"] =array("result"=>validation_errors(),"code"=>"2");
            //header('Content-Type: application/json');
             echo json_encode  ($data["res"]);
		}
		
	}
    //==============================================
     public function my_add($name,$description,$email,$phone,$city,$category_id)
	{
		$this->load->model('Adv_model','',TRUE);
	         
		$t = $this->Adv_model->my_add_adv($name,$description,$email,$phone,$city_id,$category_id);
        $data["result"] =array("result"=>$t);      
       echo json_encode ($data["result"]);		
	}
    //================================================
    function valid_phone_number_or_empty($value)
{
    $value = trim($value);
    if ($value == '') {
        return TRUE;
    }
    else
    {
        if (preg_match('/^\(?[0-9]{3}\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/', $value))
        {
            return preg_replace('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/', '($1) $2-$3', $value);
        }
        else
        {
            return FALSE;
        }
    }
}
    //=====================
    public function logout(){
               $this->load->library('session'); 

        
        $this->session->unset_userdata('user_phone');
        $this->session->unset_userdata('user_email');
        echo "شما از حساب کاربری خود خارج شدید.";
    }
    ///===================
    public function check_login(){
         $data =array("result"=>"no_login","code"=>"0");
        
       $this->load->library('session'); 

        if($this->session->userdata('user_phone') != ''){
            
            $this->load->model('Show_model','',TRUE);
            
                 $data = $this->Show_model->my_adv_by_phone($this->session->userdata('user_phone'));
        }else
             if($this->session->userdata('user_email') != ''){
            
            $this->load->model('Show_model','',TRUE);
            
                 $data = $this->Show_model->my_adv_by_email($this->session->userdata('user_email'));
                    
            
        }
            
         $elementCount  = count( $data["result"]);
        if( ($elementCount>0) &&($data["code"]=="1")){
                         
            
             foreach($data["result"] as &$value)
              {  
                  $value->date = strtotime($value->date);
        
                  $value->date=$this->time_elapsed_string3($value->date);
              } 
    } 
        echo json_encode  ($data);
                           
    }
     //================================
       public function time_elapsed_string3($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return 'لحظاتی پیش';
    }

     $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 'year'   => 'سال',
                       'month'  => 'ماه',
                       'day'    => 'روز',
                       'hour'   => 'ساعت',
                       'minute' => 'دقیقه',
                       'second' => 'ثانیه'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . $a_plural[$str]  . ' قبل';
        }
    }
   
}
     //========================
}
