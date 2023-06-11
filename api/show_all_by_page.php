<?php
require_once 'include/DB_Functions.php';
//header('Content-type: text/plain; charset=utf-8');
$db = new DB_Functions();

if (isset($_POST['current_page']) && isset($_POST['city'])) {

    $city = $_POST['city'];
    $current_page = $_POST['current_page'];
	$per_page = "3";

	//$current_page = "1";
    //$city ="1";
  
    $adv = $db->fetch_advtable($per_page,$current_page, $city);

	echo json_encode($adv, JSON_UNESCAPED_UNICODE);
}
?>

