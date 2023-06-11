<?php
class User_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
		public function login($phone,$password)
		{
			$result = $this->db->get_where('users',array('phone'=>$phone,'password'=>$password));
			if($result->num_rows()>0)
			{
				return true;
			}else
			{
				return false;
			}
		}
		
		public function get_user_advs($phone)
		{	
			$q = $this->db->get_where('advtable',array(
			'phone'=>$phone
			));
			return $q;
		}
}