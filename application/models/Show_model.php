<?php
class Show_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
		
		public function get_one_by_id($id)
		{
			$q = $this->db->get_where('advtable', array('id' => $id));
			return $q->result();
		}
		
		public function get_by_category_id($id="")
		{
			
				$subcategories = $this->db->get_where('categories',array('parent_id'=>$id))->result();
				
				foreach($subcategories as $key)
				{
					$this->db->or_where('category_id',$key->id);
				}
				//+$this->db->or_where('category_id',$id);
				$q = $this->db->get('advtable');
				return $q;
				
		}
		
   
    //==========================================
    public function get_by_sub_category_id2($id,$city_id)
		{
			$q=$this->db->get_where('advtable', array('category_id' => $id,'city_id'=>$city_id,'accept'=>'1'))->result();
				//$this->db->where('category_id',$id);
				//$q = $this->db->get('advtable');
				return $q;
				
		}
    //=============================================
     public function get_by_parent_id2($id="")
		{
			$query=$this->db->get_where('categories', array('parent_id' => $id))->result();
             return $query;
		}
    	//==========================================
    public function get_adv_by_parentid_json($id,$city_id)
		{
			/*$q=$this->db->get_where('advtable', array('category_id' => $id))->result();
            return $q;*/
              $this->db->select('*');
            $this->db->from('advtable a'); 
            $this->db->join('categories b', 'b.category_id=a.category_id', 'left');
            $this->db->where('b.parent_id',$id);
            $this->db->where('a.city_id',$city_id);
            $this->db->where('a.accept',"1");
			$this->db->order_by('a.id','des'); 
           // $this->db->order_by('c.track_title','asc');         
           return $query = $this->db->get()->result(); 
            
				
		}
    //=======================================================
		public function get_subcategories_list($id)
		{
			
				$q = $this->db->get_where('categories' , array('parent_id'=>$id))->result();
				
				return $q;
		}
		
		public function search_by_keyword($keyword)
		{	
			$this->db->or_like('name',$keyword);
			$this->db->or_like('description',$keyword);
			$r = $this->db->get('advtable');
			return $r;
			
		}
    //==========================================
    public function json_search($keyword,$city)
		{	 
            $this->db->where('city_id',$city);
            $this->db->group_start();
			$this->db->or_like('name',$keyword);
			$this->db->or_like('description',$keyword);
            $this->db->group_end();
            $this->db->where('accept','1');
			$query = $this->db->get('advtable');
			if($query->num_rows() != 0)
            {
                return $query->result();
            }
			
		}
    //=======================================================
	public function json_search_android($keyword,$city)
		{	 
            $this->db->where('city_id',$city);
            $this->db->group_start();
			$this->db->or_like('name',$keyword);
			$this->db->or_like('description',$keyword);
            $this->db->group_end();
           // $this->db->where('accept','1');
			$r = $this->db->get('advtable');
			return $r;
			
		}
    //=======================================================
    public function by_city_id_json($id)
		{
            $this->db->select('*');
            $this->db->from('advtable'); 
            $this->db->where('city_id',$id);
            $this->db->where('accept','1');
            $query = $this->db->get(); 
            if($query->num_rows() != 0)
            {
                return $query->result();
            }
            
		}
		//=================================================
		 public function my_adv_by_phone($phone)
		{
            $this->db->select('*');
            $this->db->from('advtable'); 
            $this->db->where('phone',$phone);
            $query = $this->db->get(); 
            if($query->num_rows() != 0)
            {
                $data =array("result"=>$query->result(),"code"=>"1");     
               
            }else $data =array("result"=>"با این شماره تلفن هیچ آگهی ثبت نشده است.","code"=>"0");
            
             return $data;
		}
		//===============================================
     public function my_adv_by_email($email)
		{
            $this->db->select('*');
            $this->db->from('advtable'); 
            $this->db->where('email',$email);
            $query = $this->db->get(); 
            if($query->num_rows() != 0)
            {
                $data =array("result"=>$query->result(),"code"=>"1");     
               
            }else $data =array("result"=>"با این ایمیل هیچ آگهی ثبت نشده است.","code"=>"0");
            
             return $data;
		}
		//========================================
		public function record_count() {
        return $this->db->count_all("advtable");
    }
	//============================================
	public function fetch_advtable($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("advtable");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

}
?>
