<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	
	public function index()
	{
			$myform_validation_errors = array(
			'required'=>'%s نباید خالی باشد.',
			'min_lenght'=>'نمی تواند کمتر از 5 باشد %s'
			);
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			//set rules
			$this->form_validation->set_rules('user_name','user name','required|min_lenght[3]',$myform_validation_errors);
			$this->form_validation->set_rules('password','the password','required',$myform_validation_errors);
			
			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('test/myform');
			}else
				
				{
					$this->load->view('test/success');
				}
		
	}
}
	