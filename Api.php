<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	
	 public function __construct() {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->library("pagination");
    }

	
	public function index()
	{
	}
	//====================================

   public function some_page()
   {
 $this->load->model('adv_model','',TRUE);
   $current_page = $this->input->POST('current_page');
		$city = $this->input->POST('city');
		        $per_page = 3;

//$current_page = "1";
		//$city ="1";
        /*$current_index = ($current_page - 1) * $per_page;
	  
	    $config = array();
        $config["base_url"] = base_url() . "Api/example1";
        $config["total_rows"] = $this->adv_model->record_count();
        $config['per_page'] = $per_page; 

        $this->pagination->initialize($config);*/

	   

        $data['all_advs'] = $this->adv_model->fetch_advtable($per_page,$current_page,$city);
		$this->load->view('api/show_all_adv2',$data);
   }

	//========================================
	  public function example1() {
		  $this->load->model('adv_model','',TRUE);
        $config = array();
        $config["base_url"] = base_url() . "Api/example1";
        $config["total_rows"] = $this->adv_model->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 6;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
        $data["results"] = $this->adv_model->
            fetch_advtable($config["per_page"], $page);
        //$data["links"] = $this->pagination->create_links();

       // $this->load->view("example1", $data);
    }

	//========================================
	public function show_all_adv()
	{$city = $this->input->POST('city');
		$this->load->model('adv_model','',TRUE);
		$data['all_advs'] = $this->adv_model->get_all3($city);
		$this->load->view('api/show_all_adv2',$data);
	}
	//========================================
	public function by_category2()
	{
		$city = $this->input->POST('city');
	$cat_id = $this->input->POST('cat_id');
		$this->load->model('adv_model','',TRUE);
		$data['all_advs'] = $this->adv_model->get_by_cat($city,$cat_id);
		$this->load->view('api/show_all_adv2',$data);
	}
		//=========================================
     public function get_adv_by_parentid_json()
	{
		
     $p_id=$this->input->POST('p_cat_id');
     $city_id=$this->input->POST('city');
	$this->load->model('Show_model','',TRUE);
	$data['all_advs'] = $this->Show_model->get_adv_by_parentid_json($p_id,$city_id);
	$this->load->view('api/show_all_adv2',$data);
        
	}
	//=========================================
	//========================================
	public function my_remove_adv()
	{
		$id=$this->input->POST('id');
		$this->load->model("Adv_model",'',TRUE);	
		$this->Adv_model->delete_by_id_json($id);
		
	}
	//=======================
	
	public function my_search()
	{
		     $key_word2=$this->input->POST('key_word');
			 $city_id=$this->input->POST('city');
			 $this->load->model('Show_model','',TRUE);
			$data['all_advs'] = $this->Show_model->json_search_android($key_word2,$city_id);
			$this->load->view('api/show_all_adv2',$data);
	}
     //=========================================
	 public function my_phone_login(){
		     $phone = $this->input->post('phone');
            
            $this->load->model('Show_model','',TRUE);
            
                 $data["res"] = $this->Show_model->my_adv_by_phone($phone);
            
        
       //  else          
        //     $data["res"] =array("result"=>validation_errors(),"code"=>"2");
         
           echo json_encode  ($data["res"]);
	 }
	 //================================
	 
	  //=========================================
	 public function my_email_login(){
		     $email = $this->input->post('email');
            
            $this->load->model('Show_model','',TRUE);
            
            $data["res"] = $this->Show_model->my_adv_by_email($email);
           echo json_encode  ($data["res"]);
	 }
	 //================================
	public function by_category($id)
	{
		//$this->db->where('category_id',$id);
		$this->load->model('Show_model','',TRUE);
		$data['all_advs'] = $this->Show_model->get_by_category_id($id);
		$this->load->view('api/show_all_adv',$data);
	}
   
	//========================================
	public function get_new_adv()
	{
		//get client post params 
		//save params in db by adv_model
		$this->load->model('adv_model','',TRUE);
		
		$id= $this->input->POST('id');
		$mode= $this->input->POST('mode');
		$title= $this->input->POST('title');
		$description = $this->input->POST('description');
		$phone = $this->input->POST('phone');
		$email = $this->input->POST('email');
		$category = $this->input->POST('category');
		$city = $this->input->POST('city');

		$img = $this->input->POST('img');
		if($img!=""){
		$newname =  rand().'.png';
		$data = str_replace('data:image/png;base64,', '', $img);
		$data = str_replace(' ', '+', $data);
		$data = base64_decode($data);
		$file = 'assets/upload/'.$newname;
		$success = file_put_contents($file, $data);
		$data = base64_decode($data); 
		@$source_img = imagecreatefromstring($data);
		@$rotated_img = imagerotate($source_img, 90, 0); 
		$file = 'assets/upload/'.$newname;
		@$imageSave = imagejpeg($rotated_img, $file, 10);
		@imagedestroy($source_img);}else $newname="default.jpg";
				
		//decoded
		//save db 
		/*
		
		if($mode=="1")
		 print $this->adv_model->my_add_adv($title,$description,$email,$phone,$city,$category,$newname);
		else
		 if($mode=="0"){
			 $accept="0";
			$data["res"]= $this->adv_model->my_edit_adv($title,$description,$email,$phone,$city,$category,$newname,$accept,$id);
			echo json_encode  ($data["res"]);
		 }*/
		 if($mode=="0"){
			 $accept="0";
			$data["res"]= $this->adv_model->my_edit_adv($title,$description,$email,$phone,$city,$category,$newname,$accept,$id);
			echo json_encode  ($data["res"]);
		 }else
			 if($mode=="1"){
			$data["res"]= $this->adv_model->my_add_adv($title,$description,$email,$phone,$city,$category,$newname);
			echo json_encode  ($data["res"]);
		 }

	}
	
	//========================================
	public function search($keyword='')
	{
		$decoded_keyword= urldecode($keyword);
		$this->load->model('Show_model','',TRUE);
		$data['all_advs'] = $this->Show_model->search_by_keyword($decoded_keyword);
	
		$this->load->view('api/show_all_adv',$data);
			
	}
	//========================================
	public function user_login(){
		
		$this->load->model("User_model",'',TRUE);
		$phone = $this->input->POST("Phone");
		$password = $this->input->POST("Password");
		if($this->User_model->login($phone,$password)==true)
		{
			echo '1';
		}else
		{
			echo '0';
		}
	}
	//========================================
	public function user_advs($phone='')
	{	
		$this->load->model("User_model",'',TRUE);
		$data['all_advs'] = $this->User_model->get_user_advs($phone);
		$this->load->view('api/show_all_adv',$data);
	}
	//========================================
	public function remove_adv($id)
	{
		$this->load->model("Adv_model",'',TRUE);	
		$this->Adv_model->remove_one($id);
		
	}
	//=======================
	public function upgrade_adv($UpgradeAction,$id)
	{
		$this->load->model("Adv_model",'',TRUE);
		$this->Adv_model->upgrade_adv($UpgradeAction,$id);	
		
	}
	//=======================
	public function get_one_adv($id)
	{
		
		$this->load->model("Adv_model",'',TRUE);
		$data['all_advs'] = $this->Adv_model->get_one_adv_by_id($id);
		$this->load->view('api/show_all_adv',$data);
		
	}
	
	//============================
	public function edtia_dv($id)
	{
		$title= $this->input->POST('title');
		$description = $this->input->POST('description');
		
		$this->load->model("Adv_model",'',TRUE);
		$this->Adv_model->edit_adv($id,$title,$description);
		
		
	}
	
}