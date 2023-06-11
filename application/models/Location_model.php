<?php
class Location_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
		
		
		// My methods : 
		
		
    //===============================================================
		 public function all_ostan()
		{
				$q=$this->db->get('province');
				return $q ->result();	
		}
    //===============================================================
     public function all_city_json()
		{
				$q=$this->db->get('city');
				return $q ->result();	
		}
    //===============================================================
     public function by_ostan_id_json($id)
		{
			$r=$this->db->get_where('city',array("province_id"=>$id));
			return $r->result();
		}
     //===============================================================
     public function get_city_name_json($id)
		{
			$r=$this->db->get_where('city',array("id"=>$id));
			return $r->result();
		}
    
	

}
?>