<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adv extends CI_Controller {
	
	public function index()
	{
		print("content deleted .");
	}
	
	public function remove($id=null)
	{
			$this->load->model('Adv_model','',TRUE);
			print($this->Adv_model->remove_one($id));
	}
	
	public function add()
	{
		$this->load->model('Adv_model','',TRUE);
		//----------------------------------------
				$config['upload_path']          = 'assets/upload/';
                $config['allowed_types']        = 'gif|jpg|png';
               //$config['max_size']             = 100;
               //$config['max_width']            = 1024;
               //$config['max_height']           = 768;
		
                $this->load->library('upload', $config);
				
				 if ( ! $this->upload->do_upload('advimg'))
                {
                        $error = array('error' => $this->upload->display_errors());
						print_r($error);
						$img_name="default.jpg";
                }
                else
                {
                
						$img_name = $this->upload->data()['file_name'];
						
                }
				
				
		//----------------------------------------
		
		
		$name = $this->input->post("name");
		$description = $this->input->post("description");
		$date = $this->input->post("date");
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		
		
		
		$t = $this->Adv_model->add_adv($name,$description,$date,$email,$phone,$img_name);
		print($t);
		
	}
	
	public function show_add_form()
	{
		
		$this->load->helper(array('form', 'url'));
		 
		$this->load->view('share/header');
		$this->load->view('adv/add');	
		$this->load->view('share/footer');
	}
	
	public function edit($id)
	{
		$this->load->model('Adv_model','',TRUE);
		$data["edit_adv"]=$this->Adv_model->edit($id);
		$this->load->view('adv/edit',$data);
	}
	
	public function done_edit($id)
	{
		$this->load->model('Adv_model','',TRUE);
		
		$name = $this->input->post("name");
		$description = $this->input->post("description");
		$date = $this->input->post("date");
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		
		$q=$this->Adv_model->done_edit($name,$description,$date,$email,$phone,$id);
		print($q);
		
	}
    
    public function my_add()
	{
		$this->load->model('Adv_model','',TRUE);
		//----------------------------------------
        
			/*	$config['upload_path']          = 'assets/upload/';
                $config['allowed_types']        = 'gif|jpg|png';    
		
                $this->load->library('upload', $config);
				
				 if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());
						print_r($error);
						$img_name="default.jpg";
                }
                else
                {
                
						$img_name = $this->upload->data()['file_name'];
						
                }*/
				
				
		//----------------------------------------
		
	
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$category_id = $this->input->post('category_id');
		$phone = $this->input->post('phone');
		$description = $this->input->post('description');
        $city_id=$this->input->post('city');
        
       // $name=mysqli_real_escape_string($name);
        
		$t = $this->Adv_model->my_add_adv($name,$description,$email,$phone,$city_id,$category_id);
        $data["result"] =array("result"=>$t);
              /*  $data["result"] =array(
			'name' => $name,
			'description' => $description,
			//'date' => $date ,
			'email'=> $email ,
			'phone'=>$phone,
			'category_id'=>$category_id
			);*/

        echo json_encode ($data["result"]);
		
	}
    ///=====================================
     public function delete_by_id_json()
	{
		$this->load->model('Adv_model','',TRUE);
        $id = $this->input->post('id');
        $t = $this->Adv_model->delete_by_id_json($id);
        $data["result"] =array("result"=>$t);
         echo json_encode ($data["result"]);
    }
    
	
}
