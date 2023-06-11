<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */
//=======================
/*public function some_page()
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

	   

     /*   $data['all_advs'] = $this->adv_model->fetch_advtable($per_page,$current_page,$city);
		$this->load->view('api/show_all_adv2',$data);
   }*/
 //======================
 
require_once 'include/DB_Functions.php';
header('Content-type: text/plain; charset=utf-8');
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['current_page']) && isset($_POST['city'])) {

    // receiving the post params
    $city = $_POST['city'];
    $current_page = $_POST['current_page'];
	
	//$current_page = "1";
    //$city ="1";
	$per_page = "3";
    // get the adv by email and password
    $adv = $db->fetch_advtable($per_page,$current_page, $city);

    if ($adv != false) {
        // use is found
       /* $response["error"] = FALSE;
        $response["adv"]["id"] = $adv["id"];
        $response["adv"]["name"] = $adv["name"];
        $response["adv"]["email"] = $adv["email"];
        $response["adv"]["phone"] = $adv["phone"];
        $response["adv"]["city_id"] = $adv["city_id"];
		$response["adv"]["img"] = $adv["img"];
		$response["adv"]["category_id"] = $adv["category_id"];
		$response["adv"]["accept"] = $adv["accept"];
		$response["adv"]["date"] = $adv["date"];
		$response["adv"]["expire"] = $adv["expire"];
		$response["adv"]["description"] = $adv["description"];
		$response["adv"]["instantaneous"] = $adv["instantaneous"];
        echo json_encode($response, JSON_UNESCAPED_UNICODE);*/
		echo json_encode($adv, JSON_UNESCAPED_UNICODE);
    } else {
        // adv is not found with the credentials
        $response["error"] = TRUE;
        //$response["error_msg"] = "اطلاعات وارد شده صحیح نمی باشد. لطفا دوباره تلاش کنید!";
		$response["error_msg"] = "error1";
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    //$response["error_msg"] = "مقادیر وارد شده ناقص میباشد!";
	$response["error_msg"] = "ereror2";
    echo json_encode($response);
}
?>

