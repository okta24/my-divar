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
		"category":"<?php echo $key->category_id;?>",
			"img":"<?php echo base_url()."/divar/assets/upload/".$key->img; ?>"
		
	},
	
	
<?php } ?>
]

