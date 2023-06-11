<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends CI_Controller {
    function __construct(){
            parent::__construct();
            
        }
	
	public function index()
	{
       $this->load->helper('form');
		$this->load->library('form_validation');
                    $this->load->model('Adv_model','',TRUE);
        	        $data["categories"] = $this->Adv_model->get_all_category_list()->result();
                    $this->load->helper('cookie');
                    if(get_cookie('city_id')!=''){
                    $data["adv"]=$this->Adv_model->by_city_id_json(get_cookie('city_id')); 
                        $elementCount  = count( $data["adv"]);
                        if( $elementCount>0){   
                         foreach($data["adv"] as &$value)
              {  
                  $value->date = strtotime($value->date);
        
                  $value->date=$this->time_elapsed_string3($value->date);
              }
                        }     
                        if(sizeof($data["adv"])==0)
                            $data["city"] = array('result' =>"موردی یافت نشد");
                    }else{
                        $data["adv"]=null;
           $data["city"] = array('result' => "لطفا یک شهر انتخاب کنید");
		
                    }
        $this->load->view('show/all',$data);		
	}
  //=======================================
	public function one($id=0)
	{
		if(isset($id))
		{
			$this->load->model('Show_model','',TRUE);
			$data["one_adv"] = $this->Show_model->get_one_by_id($id);
			
			$this->load->view('share/header');
			$this->load->view('show/one',$data);
			$this->load->view('share/footer');
		}
		
		
	}
    //===============================================
	
	public function category($category_name="",$id='',$parent_id='')
	{
		
		
			if(isset($id))
			{
				
				$category_name_decoded = urldecode($category_name);
				
				$this->load->model('Show_model','',TRUE);
				$data["category_advs"] = $this->Show_model->get_by_category_id($id);
				
				$data["categories"]=$this->Show_model->get_subcategories_list($id);
				
				
				$this->load->view('share/header');
				$this->load->view('show/category',$data);
				$this->load->view('share/sidebar',$data);
				$this->load->view('share/footer');
		}
	}
	
	
	
	public function City($city_name)
	{
		print($city_name);
	}
    //=========================================
    public function get_adv_by_parentid_json()
	{
		$this->load->model('Show_model','',TRUE);
       $id = $_POST['id'];
               $city_id= $_POST['city_id'];

		$data = $this->Show_model->get_adv_by_parentid_json($id,$city_id);
        
        if (is_array($data) || is_object($data))
{
        foreach($data as &$value)
              {  
                  $value->date = strtotime($value->date);
        
                  $value->date=$this->time_elapsed_string3($value->date);
              }        
}
        echo json_encode ($data);
	}
     //=========================================
    public function by_sub_category_json()
	{
		$this->load->model('Show_model','',TRUE);
       $id = $_POST['id'];
       $city_id= $_POST['city_id'];

		$data = $this->Show_model->get_by_sub_category_id2($id,$city_id);
if (is_array($data) || is_object($data))
{
 foreach($data as &$value)
              {  
                  $value->date = strtotime($value->date);
        
                  $value->date=$this->time_elapsed_string3($value->date);
              }
}
        echo json_encode ($data);
	}
     //=========================================
    public function by_parent_id_json()
	{
		$this->load->model('Show_model','',TRUE);
        $id = $_POST['id'];
		$data["result"] = $this->Show_model->get_by_parent_id2($id);
        echo json_encode ($data["result"]);
	}
    //=======================================
      public function all_json()
	{
		$this->load->model('Adv_model','',TRUE);
         $id = $_POST['id'];
		$data=$this->Adv_model->by_city_id_json($id);
if (is_array($data) || is_object($data))
{
         foreach($data as &$value)
              {  
                  $value->date = strtotime($value->date);
        
                  $value->date=$this->time_elapsed_string3($value->date);
              }
}
       
         echo json_encode($data);
	}
	//=========================================
    
    
	//=======================================
      public function all_cat_json()
	{
		$this->load->model('Adv_model','',TRUE);
		$data["all_cat"]=$this->Adv_model->all_cat();
         echo json_encode($data["all_cat"]);
	}
	//=======================================
      public function all_ostan_json()
	{
		$this->load->model('Location_model','',TRUE);
		$data["all_ostan"]=$this->Location_model->all_ostan();
         echo json_encode($data["all_ostan"]);
	}
   
	//=======================================
         public function all_city_json()
	{
		$this->load->model('Location_model','',TRUE);
		$data["all_city"]=$this->Location_model->all_city_json();
         echo json_encode($data["all_city"]);
	}
	//=======================================
           public function by_ostan_id_json()
	{
		$this->load->model('Location_model','',TRUE);
        $id = $_POST['id'];
		$data["one_ostan"]=$this->Location_model->by_ostan_id_json($id);
         echo json_encode($data["one_ostan"]);
	}
	//=======================================
      public function by_city_id_json()
	{
		$this->load->model('Show_model','',TRUE);
        $id = $_POST['id'];
		$data=$this->Show_model->by_city_id_json($id);
       if (is_array($data) || is_object($data))
{
         foreach($data as &$value)
              {  
                  $value->date = strtotime($value->date);
        
                  $value->date=$this->time_elapsed_string3($value->date);
              }
}
       
         echo json_encode($data);
	}
    //=========================================
    
      public function get_city_name_json()
	{
		$this->load->model('Location_model','',TRUE);
        $id = $_POST['id'];
		$data["city_title"] = $this->Location_model->get_city_name_json($id);
        echo json_encode ($data["city_title"]);
	}  
     //=======================================
	public function getadv_by_id_json()
	{
		
			$this->load->model('Show_model','',TRUE);
             $id = $_POST['id'];
			$data =array("result" => $this->Show_model->get_one_by_id($id));
      if (is_array($data) || is_object($data))
{
         foreach($data as &$value)
              { 
                  
                  $value[0]->date = strtotime($value[0]->date);
        
                  $value[0]->date=$this->time_elapsed_string3($value[0]->date);
              }
}
              
             echo json_encode ($data);
  }
    //===============================================
    
        public function json_search()
	{
		
			$this->load->model('Show_model','',TRUE);
             $word = $_POST['word'];
             $city = $_POST['city'];
        	$data = $this->Show_model->json_search($word,$city);
      if (is_array($data) || is_object($data))
{
         foreach($data as &$value)
              {  
                  $value->date = strtotime($value->date);
        
                  $value->date=$this->time_elapsed_string3($value->date);
              }
}

           echo json_encode ($data);
       
  }
   
    //===================================
    
       public function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    //$ago = new DateTime($datetime);
   // $diff = $now->diff($ago);
            $diff = $now->diff($datetime);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
    //==================================
    public function time_elapsed_string2($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 'year'   => 'years',
                       'month'  => 'months',
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
        }
    }
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
    
}
