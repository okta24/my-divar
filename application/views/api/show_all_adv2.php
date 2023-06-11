[
<?php 
foreach($all_advs->result() as $key)
{
?>
	
	{
		"name":"<?php echo $key->name; ?>",
		"description":"<?php echo $key->description; ?>",
		"date":"<?php  echo $key->date;?>",
		"id":"<?php echo $key->id;?>",
		"phone":"<?php echo $key->phone;?>",
		"email":"<?php echo $key->email;?>",
		"city_id":"<?php echo $key->city_id;?>",
		"category_id":"<?php echo $key->category_id;?>",
		"img":"<?php echo 'http://169.254.227.183/divar/assets/upload/'.$key->img; ?>"
		
	},
	
	
<?php } ?>
]

