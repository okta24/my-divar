<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	
	public function index()
	{
		print("test");
	}
	
	public function keyword($keyword_string="")
	{
		print($keyword_string);
	}
	
	
}
