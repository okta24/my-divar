

<div class=" col-md-10 row myallcontent" style="direction:rtl">
<?php 


foreach($category_advs->result() as $key)
	{
?>
<a href="<?php echo base_url()."show/one/$key->id"; ?>">
  <div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <div class="caption">
        <h3><?php print($key->name); ?></h3>
        <p><?php print($key->description); ?></p>
        <p><?php print($key->date);?></p>
      </div>
    </div>
  </div>
  
  </a>
<?php
}
?>


  
  
</div>
