<?php
class Adv_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
		
		
		// My methods : 
		//========================================
		public function record_count() {
        return $this->db->count_all("advtable");
    }
	//============================================
	public function fetch_advtable($limit, $start,$city) {
            $this->db->limit($limit, $start);
			$this->db->select("*");
			$this->db->from("advtable");
			$this->db->order_by('id',"DESC");
			$this->db->where('city_id', $city );

			$query = $this->db->get();
			
				return $query;
        /*if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;*/
   }
   //======================================
		
		public function get_all()
		{
				$q=$this->db->get('advtable');
				return $q;
				
		}
  //==================================
		public function get_all3($city)
		{
			//$this->db->limit($limit, $start);
			$this->db->select("*");
			$this->db->from("advtable");
			$this->db->order_by('id',"DESC");
			    $this->db->where('city_id', $city );

			$query = $this->db->get();
			
				//$q = $this->db->get_where('advtable', array('city_id' => $city));
				return $query;
				
		}
		//=======================================
		public function get_by_cat($city,$cat_id)
		{
			$this->db->select("*");
			$this->db->from("advtable");
			$this->db->order_by('id',"DESC");
			    $this->db->where('city_id', $city );
				 $this->db->where('category_id', $cat_id );

			$query = $this->db->get();
			
				//$q = $this->db->get_where('advtable', array('city_id' => $city));
				return $query;
				
		}
   
		public function get_all_category_list()
		{
				$q=$this->db->get('categories');
				return $q;
				
		}
		
		public function remove_one($id=null)
		{
			$q = $this->db->get_where('advtable', array('id' => $id));
			if($q->num_rows() > 0)
			{
				$this->db->where('id',$id);
				$this->db->delete('advtable');
				return "deleted successfully!";
			}else
			{
				return "there is no adv by this id";
			}
		}
		
		public function add_adv($name,$description,$date,$email,$phone,$img_name,$city,$category)
		{
			$data = array(
			'name' => $name,
			'description' => $description,
			'email'=> $email ,
			'phone'=>$phone,
			'img'=>$img_name,
			'city_id'=>$city,
			'category_id'=>$category,
			);

			if($this->db->insert('advtable', $data))
			{
				return "آگهی با موفقیت ثبت شد. منتظر تایید سایت باشید. می توانید آگهی و وضعیت آنرا در بخش آگهی من مشاهده نمایید.";
			}
			else
				return"خطا ! دوباره تلاش کنید";
			
			
		}
		public function edit($id)
		{
			$q = $this->db->get_where('advtable', array('id' => $id));
			if($q->num_rows()>0)
			{
				return $q->result();
			}else
				return "there is no adv like this id";
		}
		
		public function done_edit($name,$description,$date,$email,$phone,$id)
		{
			$data = array(
				'name' => $name,
				'description' => $description,
				'date' => $date ,
				'email'=> $email ,
				'phone'=>$phone
			);

				$this->db->where('id', $id);
				if($this->db->update('advtable', $data))
				{
					return "updated success";
				}else
					return "Can't Update Data";
		}
		
		public function get_main_category_list()
		{
			$r=$this->db->get_where('categories',array("parent_id"=>0));
			return $r->result();
		}
    
		public function get_sub_category_list($parent_id)
		{
			$r=$this->db->get_where('categories',array("parent_id"=>$parent_id));
			return $r->result();
		}
    
		public function upgrade_adv($UpgrdaeAction,$id)
		
		{	
			$NowDate = date("Y-m-d");
			
			switch($UpgrdaeAction){
				
				case "nardeban":
					$data = array(
				'date' => $NowDate,
					);
					echo "آگهی شما نردبان شد";
			
				break;
				
				case "foori":
				$data = array(
				'fast' => 1,
					);
				echo "آگهی شما فوری شد";

				break;
				
				case "tamdid":
					
						$q = $this->db->get_where('advtable',array("id"=>$id));
						if($q->num_rows()> 0 )
						{
							$last_expire_value = $q->result_array()[0]['expire'];
						}else
							$last_expire_value= 0;
						
						$newExpire = $last_expire_value + 15 ;
						$data = array(
				'expire' => $newExpire,
					);
					
				break;
				
			}
			
			$this->db->where('id', $id);
			$this->db->update('advtable', $data);
			
			
			
		}
		
		//===================================================
		public function get_one_adv_by_id($id)
		{
				return $this->db->get_where('advtable',array('id'=>$id));
		}
		//===================================================
		public function edit_adv($id,$title,$description)
		{
			$data = array(
				'name' => $title,
				'description' => $description
			);
			
			$this->db->where('id', $id);
				if($this->db->update('advtable', $data))
				{
					echo "ویرایش انجام شد";
				}else
					echo"خطا ! ویرایش انجام نشد";
		}
    //======================================================
    public function my_add_adv($name,$description,$email,$phone,$city,$category_id,$imagepath)
		{
			$data = array(
			'name' => $name,
			'description' => $description,
			'city_id' => $city,
			'email'=> $email ,
			'phone'=>$phone,
			'category_id'=>$category_id,
            'img'=>$imagepath
                
			);

			if($this->db->insert('advtable', $data))
			
                 $data =array("result"=> "آگهی با موفقیت ثبت شد. منتظر تایید سایت باشید. می توانید آگهی و وضعیت آنرا در بخش آگهی من مشاهده نمایید.","code"=>"1");      
				
			
			else
                 $data =array("result"=>"خطایی رخ داد! دوباره تلاش کنید.","code"=>"0");
				
			return $data;
			
		}
     //======================================================
    public function my_edit_adv($name,$description,$email,$phone,$city,$category_id,$imagepath,$accept,$id)
		{
			$NowDate = date('Y-m-d H:i:s');
			
			$data = array(
			'name' => $name,
			'description' => $description,
			'city_id' => $city,
			'email'=> $email ,
			'phone'=>$phone,
			'category_id'=>$category_id,
            'img'=>$imagepath,
            'accept'=>$accept,
			'date'=>$NowDate
			);
            $this->db->where('id', $id);

			if($this->db->update('advtable', $data))
			
                 $data =array("result"=>"آگهی با موفقیت ویرایش شد.","code"=>"1");      
				
			
			else
                 $data =array("result"=>"خطایی رخ داد! دوباره تلاش کنید.","code"=>"0");
				
			return $data;
			
		}
    //===============================================================
	/*	 public function get_all2($id)
		{
				$this->db->select('*');
            $this->db->from('advtable'); 
            $this->db->where('id',$id);
            $query = $this->db->get(); 
            if($query->num_rows() != 0)
            {
                return $query->result();
            }

		}*/
    //===============================================================
		 public function all_cat()
		{
				$query=$this->db->get_where('categories', array('parent_id' => "0"))->result();
             return $query;
                
				
		}
    //=================================================
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
           /* else
            {
               // return  array('result' =>"موردی یافت نشد");
                return false;
            }*/
		}
     
    //=================================================
	public function delete_by_id_json($id)
		{
           
				$this->db->where('id',$id);
				$this->db->delete('advtable');
				return "آگهی شما با موفقیت حذف شد!";
			
		}

}
?>