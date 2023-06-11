<?php
require_once 'include/DB_Functions.php';

	$db = new DB_Functions();

    $city = $_POST['city'];
 
    $adv = $db->show_all($city);

	echo json_encode($adv, JSON_UNESCAPED_UNICODE);

?>

