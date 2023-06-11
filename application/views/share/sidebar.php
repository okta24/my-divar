<div class="col-md-2 ">
<?php
if(@$categories[0]->parent_id != 0 )
{
	?>
	<div><a href="<?php echo base_url(''); ?>"> بازگشت </a></div>
	<?php
}
foreach($categories as $key)
	{
		
?>
<a class="category_link" href="<?php echo base_url()."show/category/$key->title/$key->id/$key->parent_id"; ?>">
  <?php echo $key->title."<br>"?>
  </a>
  
	<?php 
	} 
	?>
</div>